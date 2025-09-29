<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equines */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ejemplares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-danger card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <?=
                            Html::img(
                                "@web/images/ejemplares/{$model->image_ppal}",
                                [
                                    'alt' => "{$model->name}",
                                    'height' => '150px',
                                    'class' => 'profile-user-img img-fluid img-circle'
                                ]
                            )
                            ?>
                    </div>

                    <h3 class="profile-username text-center"><?= $model->name; ?></h3>

                    <!--<p class="text-muted text-center">Software Engineer</p>-->

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Andar</b> <span class="float-right"><?= $model->gait->name; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Género</b> <span class="float-right"><?= $model->gender; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Edad</b> <span class="float-right"><?= $model->age; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Color</b> <span class="float-right"><?= $model->color; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Criadero</b> <span class="float-right"><?= $model->stud_farm ?? "-"; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Veterinario</b> <span class="float-right"><?= $model->vet ?? "-"; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Días de colecta</b> <span
                                class="float-right"><?= $model->colletion_days ?? "-"; ?></span>
                        </li>
                        <li class="list-group-item">
                            <b>Propietario</b> <span class="float-right"><?= $model->owner ?? "-"; ?></span>
                        </li>
                    </ul>

                    <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="post">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <?=
                            Html::img(
                                "@web/images/ejemplares/{$model->image_ppal}",
                                [
                                    'alt' => "{$model->name}",
                                    'class' => 'img-fluid'
                                ]
                            )
                            ?>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <?=
                                    Html::img(
                                        "@web/images/ejemplares/{$model->image_ppal}",
                                        [
                                            'alt' => "{$model->name}",
                                            'class' => 'img-fluid mb-3'
                                        ]
                                    )
                                    ?>
                                <?=
                                    Html::img(
                                        "@web/images/ejemplares/{$model->image_ppal}",
                                        [
                                            'alt' => "{$model->name}",
                                            'class' => 'img-fluid'
                                        ]
                                    )
                                    ?>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <?=
                                    Html::img(
                                        "@web/images/ejemplares/{$model->image_ppal}",
                                        [
                                            'alt' => "{$model->name}",
                                            'class' => 'img-fluid mb-3'
                                        ]
                                    )
                                    ?>
                                <?=
                                    Html::img(
                                        "@web/images/ejemplares/{$model->image_ppal}",
                                        [
                                            'alt' => "{$model->name}",
                                            'class' => 'img-fluid'
                                        ]
                                    )
                                    ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header p-2">
                            Acerca de mí
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <?= $model->about_me ?? '' ?>
                        </div><!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header p-2">
                            Historia
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <?= $model->history ?? '' ?>
                        </div><!-- /.card-body -->
                    </div>
                </div>
            </div>


            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>