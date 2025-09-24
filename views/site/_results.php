<?php

use app\components\RuleEngine;
use yii\bootstrap4\Html;

function getMatchQuality($slug, $horseValue, $variables, $gaitName, RuleEngine $engine)
{
    $allowed = $engine->getAllowedValues($slug, $gaitName, $variables);
    if (empty($allowed)) {
        return null;
    }

    // caso simple
    if (isset($allowed['variable_id'])) {
        $opts = $allowed['variable_id'];
        $first = reset($opts);
        if ($horseValue == $first)
            return '#2ecc71';
        if (in_array($horseValue, $opts))
            return 'orange';
    }

    // caso extendido con equal
    if (isset($allowed[0]['variable_id'])) {
        $opts = $allowed[0]['variable_id'];
        $equal = $allowed[0]['equal'] ?? false;
        if ($equal && in_array($horseValue, $opts))
            return '#2ecc71';
        $first = reset($opts);
        if ($horseValue == $first)
            return '#2ecc71';
        if (in_array($horseValue, $opts))
            return 'orange';
    }

    // caso compuesto dorso_cruz
    if ($slug === 'dorso_cruz' && is_array($horseValue)) {
        // $horseValue = ['linea-superior-cruz' => X, 'linea-superior-tamano-dorso' => Y]
        foreach ($allowed as $pair) {
            $ok = true;
            foreach ($pair as $subSlug => $expected) {
                if (($horseValue[$subSlug] ?? null) != $expected) {
                    $ok = false;
                    break;
                }
            }
            if ($ok)
                return '#2ecc71'; // match exacto
            else return 'orange';

        }
        return 'orange';
    }

    return null;
}

?>
<div class="table-responsive">
    <table class="table table-striped text-successtable-border border-light table-bordered table-result-sara">
        <thead class="border-light">
            <tr>
                <th scope="col"><span>VARIABLES <BR> MEJORAMIENTO</span></th>
                <?php foreach ($results as $horse):
                    ?>
                    <th scope="col">
                        <div class="widget-user-image text-center">
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/{$horse->image_ppal}",
                                    [
                                        'alt' => 'Variable',
                                        'width' => '100px',
                                        'class' => 'img-circle elevation-2'
                                    ]
                                )
                                ?>
                        </div>
                        <div class="text-center" style="margin-top: 10px"><strong><?= Html::encode($horse->name) ?></strong>
                        </div>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderedSubs as $item): ?>
                <?php if ($item['type'] === 'single'): ?>
                    <?php $sub = $item['sub']; ?>
                    <tr>
                        <th scope="row"><?= Html::encode($sub->name) ?></th>
                        <?php foreach ($results as $horse): ?>
                            <?php
                            $ev = $horseValues[$horse->id][$sub->id] ?? null;
                            $valor = $ev ? ($ev->variable->value ?? null) : null;
                            $color = $valor ? getMatchQuality($item['slug'], $valor, $variables, $gaitName, $engine) : null;
                            ?>
                            <td class="text-center">
                                <i class="far fa-circle" style="color: <?= $color ?: 'gray' ?>"></i>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php elseif ($item['type'] === 'composite' && $item['slug'] === 'dorso_cruz'): ?>
                    <tr>
                        <th scope="row">Cruz + Dorso</th>
                        <?php foreach ($results as $horse): ?>
                            <?php
                            $cruzId = $slugMap['linea-superior-cruz'] ?? null;
                            $dorsoId = $slugMap['linea-superior-tamano-dorso'] ?? null;

                            $evCruz = $cruzId ? ($horseValues[$horse->id][$cruzId] ?? null) : null;
                            $evDorso = $dorsoId ? ($horseValues[$horse->id][$dorsoId] ?? null) : null;

                            $valores = [
                                'linea-superior-cruz' => $evCruz ? ($evCruz->variable->value ?? null) : null,
                                'linea-superior-tamano-dorso' => $evDorso ? ($evDorso->variable->value ?? null) : null,
                            ];

                            $color = getMatchQuality('dorso_cruz', $valores, $variables, $gaitName, $engine);
                            ?>
                            <td class="text-center">
                                <i class="far fa-circle" style="color: <?= $color ?: 'gray' ?>"></i>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>