<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equines */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ejemplares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<style>
    .donut {
        position: relative;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 15px;
        background: conic-gradient(#b22222 calc(var(--percent) * 1%),
                #eee 0);
    }

    /* Hueco al centro */
    .donut::before {
        content: "";
        position: absolute;
        width: 70%;
        height: 70%;
        background: #fff;
        /* color de fondo */
        border-radius: 50%;
    }

    /* Número al centro */
    .donut span {
        position: relative;
        font-weight: bold;
        font-size: 1.2rem;
        color: black;
        z-index: 1;
    }

    /* Nombre debajo */
    .donut p {
        text-align: center;
        font-size: 0.9rem;
        margin-top: 5px;
    }

    .var-container {
        float: left;
        text-align: center;
        margin-left: 10px;
    }

    .nav-tabs.var-detail .nav-link {
        background-color: #eaeaea;
        border-radius: 5px !important;
        padding: 5px 10px !important;
        font-size: 14px !important;
        margin: 0 5px;
        color: black;
    }

    .nav-tabs.var-detail .nav-link.active {
        background-color: #be2e1d;
        color: white !important;
    }
</style>

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
                 <?=
                        Html::img(
                            "@web/images/radar-ejemplo.png",
                            [
                                'alt' => "radar-ejemplo.png",
                                'height' => 'auto',
                            ]
                        )
                        ?>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="post">
                <div class="row mb-3">
                    <?php
                    $colPpal = is_null($model->images) ? "12" : "6";
                    ?>
                    <div class="col-sm-<?= $colPpal; ?>">
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
                    <?php
                    if (!is_null($model->images)) {

                        ?>
                        <div class="col-sm-6">
                            <div class="row">
                                <?php foreach (json_decode($model->images) as $image): ?>
                                    <div class="col-sm-6">
                                        <?=
                                            Html::img(
                                                "@web/images/ejemplares/{$image}",
                                                [
                                                    'alt' => "{$image}",
                                                    'class' => 'img-fluid mb-3'
                                                ]
                                            )
                                            ?>
                                    </div>
                                    <!-- /.col -->
                                <?php endforeach; ?>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.col -->
                        <?php
                    }
                    ?>
                </div>
                <!-- /.row -->
            </div>

            

            <!--<div class="row">
                <div class="col-md-12">
                    <?php // $this->render('_variables', ['model' => $model]) ?>
                </div>
            </div>-->
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
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Información de las crías</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <?= $this->render('_charts', ['model' => $model]) ?>
            </div>

        </div>
        <!-- /.card-body -->
    </div>

</div>

<script>
    document.querySelectorAll('.donut').forEach(el => {
        const value = parseInt(el.dataset.value);
        const max = parseInt(el.dataset.max);
        const percent = (value / max) * 100;
        el.style.setProperty('--percent', percent);
    });
</script>