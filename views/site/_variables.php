<?php

use yii\bootstrap4\Html;

$categories = \app\models\Categories::find()->where(['active' => 1])->orderBy("order ASC")->all();

?>
<div class="row">

    <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100 sara-tab" id="vert-tabs-tab" role="tablist"
            aria-orientation="vertical">
            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab"
                aria-controls="vert-tabs-home" aria-selected="true">¿Cómo usar S. A. R. A.?</a>
            <?php foreach ($categories as $category): ?>
                <?php $slugCat = Yii::$app->utils->slugify($category->name) ?>
                <a class="nav-link" id="vert-<?= $slugCat; ?>-tab" data-toggle="pill" href="#vert-<?= $slugCat; ?>"
                    role="tab" aria-controls="vert-<?= $slugCat; ?>" aria-selected="false">
                    <?= $category->name; ?>
                </a>
            <?php endforeach; ?>
            <a class="nav-link" id="vert-tabs-mejoramiento-tab" data-toggle="pill" href="#vert-tabs-mejoramiento"
                role="tab" aria-controls="vert-tabs-mejoramiento" aria-selected="false">
                MEJORAMIENTO DEL REPRODUCTOR
            </a>
        </div>
    </div>
    <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-tabContent">
            <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel"
                aria-labelledby="vert-tabs-home-tab">
                <div class="description">
                    <h3 class="h3subtitu" style="font-weight: bold; font-size: 16px;"></h3>
                    <p>
                        Con el objetivo de facilitar la selección y descarte de
                        reproductores S.A.R.A posee 2 fases principales.
                    </p>
                    <p>
                        <b>Fase 1 o Fase de Descripción</b>
                    </p>
                    <p style="text-align: justify">
                        Consiste en la caracterización morfológica y descripción
                        del desplazamiento del ejemplar a mejorar, implica
                        llenar parcial o totalmente el formulario de variables,
                        esto le permite al programa perfilar la yegua
                        que se desea mejorar.
                    </p>
                    <p>&nbsp;</p>
                    <p>
                        <b>Fase 2 o Fase de Mejoramiento Esperado</b>
                    </p>
                    <p style="text-align: justify">
                        Durante esta fase existen 2 opciones que
                        le permitirán identificar los potenciales
                        reproductores para su yegua.
                    </p>
                    <p style="text-align: justify">
                        La primera opción es utilizar el botón <b>BUSCAR</b>,
                        con el cual usted selecciona las características
                        que según su criterio son las fundamentales a
                        mejorar por el Reproductor, el programa buscará
                        los ejemplares que cumplan con estas características.
                    </p>
                    <p style="text-align: justify">
                        Opción 2 o Botón de <b>SUGERENCIAS</b>, para utilizar esta función
                        asegurese de calificar completamente las variables de
                        ( Aplomos, Alzada, Balance, Morfometría y Movimiento)
                        con estos valores y nuestros criterios S.A.R.A identificara
                        los reproductores ideales para este ejemplar.
                    </p>
                    <p>&nbsp;</p>
                    <p>
                        <b>Resultados</b>
                    </p>
                    <p style="text-align: justify">
                        Finalizadas las fases 1 y 2 puede
                        abrir el perfil completo de los
                        reproductores seleccionados por nuestro
                        software para su yegua,
                        y analizar la compatibilidad de
                        los ejemplares de manera detallada.
                    </p>
                    <p>&nbsp;</p>
                    <p>
                        <b>Importante </b>
                    </p>
                    <p style="text-align: justify">
                        Si no comprende la evaluación de
                        alguna variable, es preferible dejar
                        la casilla en blanco y nuestro software
                        omitirá esta casilla evitando resultados erróneos.
                    </p>
                    <p style="text-align: justify">
                        Recomendamos usar información de ejemplares
                        mayores a los 36 meses esto garantiza que la
                        información usada sea compatible con la manejada
                        por nuestro programa.
                    </p>
                    <p style="text-align: justify">
                        A medida que aumente el número de variables
                        evaluadas, S.A.R.A arrojara resultados
                        mas específicos y detallados para
                        cada ejemplar.
                    </p>
                </div>
            </div>

            <?php foreach ($categories as $category): ?>
                <?php $slugCat = Yii::$app->utils->slugify($category->name) ?>
                <div class="tab-pane fade" id="vert-<?= $slugCat; ?>" role="tabpanel"
                    aria-labelledby="vert-<?= $slugCat; ?>-tab">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card card-outline card-danger mb-3">
                                <div class="card-header">
                                    <h4 class="card-title"><?= Html::encode($category->name) ?></h4>
                                    <!--<div class="card-tools">
                                        <a href="#" class="text-danger ml-2 open-info"
                                            data-title="<?php //= Html::encode($category->name) ?>"
                                            data-description="<?php //= Html::encode($category->description) ?>">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </div>-->

                                </div>
                                <div class="card-body">
                                    <?php
                                    $subcategories = \app\models\Subcategories::find()
                                        ->where(['category_id' => $category->id, 'active' => 1])
                                        ->all();

                                    foreach ($subcategories as $subcat):
                                        $variables = \app\models\Variables::find()
                                            ->where(['subcategory_id' => $subcat->id, 'active' => 1])
                                            ->all();

                                        // construir opciones con índice secuencial
                                        $options = [];
                                        $i = 1;
                                        foreach ($variables as $var) {
                                            $options[$i] = $var->name;
                                            $i++;
                                        }

                                        // valor actual si existe
                                        $selected = isset($existingValues[$subcat->id]) ? $existingValues[$subcat->id]->variable_id : null;

                                        //id del customRange
                                        $customRangeId = Yii::$app->utils->slugify($category->name) . "-" . Yii::$app->utils->slugify($subcat->name);
                                        ?>

                                        <?php if (!empty($options)): ?>
                                            <div class="form-group variable">
                                                <label for="customRange-<?= $customRangeId; ?>">
                                                    <a href="#" class="text-dark ml-1 open-info"
                                                        data-title="<?= Html::encode($subcat->name); ?>"
                                                        data-description="<?= Html::encode($subcat->description); ?>">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    <?= Html::encode($subcat->name) ?>

                                                </label>
                                                <input type="range" class="custom-range custom-range-danger"
                                                    id="customRange-<?= $customRangeId; ?>" data-input="<?= $customRangeId; ?>"
                                                    min="<?= min(array_keys($options)); ?>" max="<?= max(array_keys($options)); ?>"
                                                    step="1" value="<?= Html::encode($model->variables[$customRangeId] ?? '') ?>">

                                                <input type="hidden" id="<?= $customRangeId; ?>"
                                                    name="SaraSearch[variables][<?= $customRangeId; ?>]"
                                                    data-range="customRange-<?= $customRangeId; ?>"
                                                    value="<?= Html::encode($model->variables[$customRangeId] ?? '') ?>">

                                                <div class="d-flex justify-content-between px-1">
                                                    <?php foreach ($options as $key => $label): ?>
                                                        <span class="labelVariableRange"><?= Html::encode($label); ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <?=
                                Html::img(
                                    "@web/images/variable.jpg",
                                    [
                                        'alt' => 'Variable',
                                        'width' => '100%'
                                    ]
                                )
                                ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="tab-pane text-left fade" id="vert-tabs-mejoramiento" role="tabpanel"
                aria-labelledby="vert-tabs-mejoramiento-tab">
                <?= $this->render('_mejoramiento', ['model' => $model, 'form' => $form])
                    ?>
            </div>
        </div>
    </div>
</div>