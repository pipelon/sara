<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nuestro ejemplares';
$this->params['breadcrumbs'][] = $this->title;


// ARCHIVO CON TODOS LOS JS NECESARIOS PARA LA BUSAUEDA
$this->registerJsFile(Yii::getAlias('@web') . '/js/our-equines.js', ['depends' => [yii\web\JqueryAsset::className()]]);
?>
<style>
    .description-text {
        font-size: 12px;
    }
    .description-block > .description-header {
        font-size: 14px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <ul class="nav nav-tabs mb-3" id="horseTabs">
                            <li class="nav-item">
                                <a class="nav-link active filter-tab" href="#" data-filter="all">Todos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link filter-tab" href="#" data-filter="macho">Machos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link filter-tab" href="#" data-filter="hembra">Hembras</a>
                            </li>
                            <?php foreach ($gaits as $gait) : ?>
                                <li class="nav-item">
                                    <a class="nav-link filter-tab" 
                                       href="#" 
                                       data-filter="<?= preg_replace('/\s+/', '-', strtolower($gait->name)) ?>">
                                           <?= $gait->name ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="row">
                        <?php foreach ($model as $key => $value) : ?>
                            <div class="col-md-3 horse-card <?= preg_replace('/\s+/', '-', strtolower($value->gender)) ?> <?= preg_replace('/\s+/', '-', strtolower($value->gait->name)) ?>">
                                <!-- Widget: user widget style 1 -->
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <?=
                                    \yii\helpers\Html::img("@web/images/ejemplares/{$value->image_ppal}",
                                            [
                                                'alt' => "{$value->name}",
                                                'height' => '150px'
                                            ]
                                    )
                                    ?>                               
                                    <div class="card-footer"style="padding-top: 0">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="widget-user-header"style="height: 60px">
                                                    <h3 class="widget-user-username"><?= $value->name; ?></h3>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"><?= $value->gait->name ?></h5>
                                                    <span class="description-text">MARCHA</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header"><?= $value->gender ?></h5>
                                                    <span class="description-text">GÉNERO</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-3">
                                                <div class="description-block">
                                                    <h5 class="description-header"><?= $value->age ?></h5>
                                                    <span class="description-text">EDAD</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>