<?php

use app\components\RuleEngine;
use yii\bootstrap4\Html;

// 1) armar lista de subcategorías seleccionadas en el mismo orden
$subsIndex = \app\models\Subcategories::find()
    ->with('category')
    ->indexBy('id')
    ->all();

$orderedSubs = [];
foreach ($improveKeys as $slug) {
    // ignorar casos compuestos (ej. 'dorso_cruz'), no son subcategorías directas
    if ($slug === 'dorso_cruz') {
        continue;
    }
    if (isset($slugMap[$slug]) && isset($subsIndex[$slugMap[$slug]])) {
        $orderedSubs[] = $subsIndex[$slugMap[$slug]];
    }
}

// 2) construir mapa de valores de caballos para búsqueda rápida
$horseValues = [];
foreach ($results as $horse) {
    $map = [];
    foreach ($horse->variableValues as $ev) {
        $map[$ev->subcategory_id] = $ev;
    }
    $horseValues[$horse->id] = $map;
}

$engine = new RuleEngine();

function getMatchQuality($slug, $horseValue, $variables, $gaitName, RuleEngine $engine)
{
    // allowed puede venir como simple o compuesto
    $allowed = $engine->getAllowedValues($slug, $gaitName, $variables);

    if (empty($allowed)) {
        return null;
    }

    // Caso simple: ['variable_id' => [2,3]]
    if (isset($allowed['variable_id'])) {
        $opts = $allowed['variable_id'];

        if (is_array($opts)) {
            // si hay orden → primero es verde, resto naranja
            $first = reset($opts);
            if ($horseValue == $first) {
                return 'green';
            } elseif (in_array($horseValue, $opts)) {
                return 'orange';
            }
        }
    }

    // Caso extendido: puede traer 'equal' => true
    if (isset($allowed[0]['variable_id'])) {
        $opts = $allowed[0]['variable_id'];
        $equal = $allowed[0]['equal'] ?? false;

        if ($equal && in_array($horseValue, $opts)) {
            return 'green';
        }
        $first = reset($opts);
        if ($horseValue == $first) {
            return 'green';
        } elseif (in_array($horseValue, $opts)) {
            return 'orange';
        }
    }

    return null;
}

?>
<div class="table-responsive">
    <table class="table table-striped text-successtable-border border-light">
        <thead class="border-light">
            <tr>
                <th scope="col"></th>
                <?php foreach ($results as $result):




                    ?>
                    <th scope="col">
                        <div class="widget-user-image text-center">
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/{$result->image_ppal}",
                                    [
                                        'alt' => 'Variable',
                                        'width' => '100px',
                                        'class' => 'img-circle elevation-2'
                                    ]
                                )
                                ?>
                        </div>
                        <div class="widget-user-image text-center" style="margin-top: 10px">
                            <strong>
                                <?= $result->name; ?>
                            </strong>
                        </div>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderedSubs as $sub): ?>
                <tr>
                    <th scope="row">
                        <?= htmlspecialchars($sub->name) ?>
                    </th>
                    <?php foreach ($results as $horse): ?>
                        <?php
                        $ev = $horseValues[$horse->id][$sub->id] ?? null;
                        $valor = $ev ? ($ev->variable->name ? "{$ev->variable->name}-{$ev->variable->value}" : $ev->variable_id) : '-';

                        $color = null;
                        if ($ev) {
                            $slug = array_search($sub->id, $slugMap); // recuperar slug original
                            if ($slug) {
                                $color = getMatchQuality($slug, $ev->variable->value ?? null, $variables, $gaitName, $engine);
                            }
                        }
                        ?>
                        <td class="text-center">
                            <?php//= htmlspecialchars($valor) ?>
                            <i class="nav-icon fas fa-fas fa-check-circle" style="color: <?= $color; ?>"></i>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>