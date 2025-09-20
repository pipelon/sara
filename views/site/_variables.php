<?php

use yii\bootstrap4\Html;
?>
<div class="row">

    <?php
    $categories = \app\models\Categories::find()->where(['active' => 1])->orderBy("order ASC")->all();
    foreach ($categories as $category):
        ?>
        <div class="col-md-4">
            <div class="card card-outline card-danger mb-3">
                <div class="card-header">
                    <h4 class="card-title"><?= Html::encode($category->name) ?></h4>
                    <div class="card-tools">
                        <a href="#" 
                           class="text-danger ml-2 open-info" 
                           data-title="<?= Html::encode($category->name) ?>"
                           data-description="<?= Html::encode($category->description) ?>">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </div>

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
                                    <a href="#"
                                       class="text-dark ml-1 open-info"
                                       data-title="<?= Html::encode($subcat->name); ?>"
                                       data-description="<?= Html::encode($subcat->description); ?>">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <?= Html::encode($subcat->name) ?>

                                </label>
                                <input type="range" 
                                       class="custom-range custom-range-danger" 
                                       id="customRange-<?= $customRangeId; ?>"
                                       data-input="<?= $customRangeId; ?>"
                                       min="<?= min(array_keys($options)); ?>" 
                                       max="<?= max(array_keys($options)); ?>"
                                       step="1"
                                       value="<?= Html::encode($model->variables[$customRangeId] ?? '') ?>">

                                <input type="hidden"
                                        id="<?= $customRangeId; ?>"
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

    <?php endforeach; ?>

</div>  