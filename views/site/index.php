<?php

use yii\helpers\Html;

$this->title = '';
$this->params['breadcrumbs'] = [];

//TODO TEMPORAL
$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<style>
    .users-list img {
        width: 70px;
    }
</style>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>Total de ejemplares</p>
                </div>
                <div class="icon">
                    <i class="fas fa-horse"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>74<sup style="font-size: 20px">%</sup></h3>

                    <p>Tasa de éxito de cruces</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dna"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>1560</h3>

                    <p>Variables analizadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-microscope"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-hourglass-start"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tiempo por análisis</span>
                    <span class="info-box-number">2 seg</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-horse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Potrillos nacidos</span>
                    <span class="info-box-number">23</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-search"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Consultas por usuario</span>
                    <span class="info-box-number">12,3</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-venus-mars"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Consultas generadas</span>
                    <span class="info-box-number">453</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>


    <div class="row">
        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">últimos ejemplares</h3>

                    <div class="card-tools">
                        <span class="badge badge-danger">34 ejemplares</span>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="users-list clearfix">
                        <li>
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/rastastas250930013906.jpg",
                                    [
                                        'alt' => "horse",
                                        'height' => '80px',
                                    ]
                                )
                                ?>
                            <a class="users-list-name" href="#">Rastastas</a>
                            <span class="users-list-date">Today</span>
                        </li>
                        <li>
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/rastastas250930013906.jpg",
                                    [
                                        'alt' => "horse",
                                        'height' => '80px',
                                    ]
                                )
                                ?>
                            <a class="users-list-name" href="#">Norman</a>
                            <span class="users-list-date">Yesterday</span>
                        </li>
                        <li>
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/rastastas250930013906.jpg",
                                    [
                                        'alt' => "horse",
                                        'height' => '80px',
                                    ]
                                )
                                ?>
                            <a class="users-list-name" href="#">Rey de reyes</a>
                            <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/rastastas250930013906.jpg",
                                    [
                                        'alt' => "horse",
                                        'height' => '80px',
                                    ]
                                )
                                ?>
                            <a class="users-list-name" href="#">Rey de la colina</a>
                            <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/rastastas250930013906.jpg",
                                    [
                                        'alt' => "horse",
                                        'height' => '80px',
                                    ]
                                )
                                ?>
                            <a class="users-list-name" href="#">Trueno</a>
                            <span class="users-list-date">13 Jan</span>
                        </li>
                        <li>
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/rastastas250930013906.jpg",
                                    [
                                        'alt' => "horse",
                                        'height' => '80px',
                                    ]
                                )
                                ?>
                            <a class="users-list-name" href="#">Renegado</a>
                            <span class="users-list-date">14 Jan</span>
                        </li>
                        <li>
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/rastastas250930013906.jpg",
                                    [
                                        'alt' => "horse",
                                        'height' => '80px',
                                    ]
                                )
                                ?>
                            <a class="users-list-name" href="#">Sinjer</a>
                            <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                            <?=
                                Html::img(
                                    "@web/images/ejemplares/rastastas250930013906.jpg",
                                    [
                                        'alt' => "horse",
                                        'height' => '80px',
                                    ]
                                )
                                ?>
                            <a class="users-list-name" href="#">Tormento</a>
                            <span class="users-list-date">15 Jan</span>
                        </li>
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="javascript:">Ver todos los ejemplares</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">últimos usuarios registrados</h3>

                    <div class="card-tools">
                        <span class="badge badge-danger">8 New Members</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="users-list clearfix">
                        <li>
                            <img src="<?= $assetDir ?>/img/user2-160x160.jpg" alt="User Image">
                            <a class="users-list-name" href="#">Alexander Pierce</a>
                            <span class="users-list-date">Today</span>
                        </li>
                        <li>
                            <img src="<?= $assetDir ?>/img/user2-160x160.jpg" alt="User Image">
                            <a class="users-list-name" href="#">Norman</a>
                            <span class="users-list-date">Yesterday</span>
                        </li>
                        <li>
                            <img src="<?= $assetDir ?>/img/user2-160x160.jpg" alt="User Image">
                            <a class="users-list-name" href="#">Jane</a>
                            <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                            <img src="<?= $assetDir ?>/img/user2-160x160.jpg" alt="User Image">
                            <a class="users-list-name" href="#">John</a>
                            <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                            <img src="<?= $assetDir ?>/img/user2-160x160.jpg" alt="User Image">
                            <a class="users-list-name" href="#">Alexander</a>
                            <span class="users-list-date">13 Jan</span>
                        </li>
                        <li>
                            <img src="<?= $assetDir ?>/img/user2-160x160.jpg" alt="User Image">
                            <a class="users-list-name" href="#">Sarah</a>
                            <span class="users-list-date">14 Jan</span>
                        </li>
                        <li>
                            <img src="<?= $assetDir ?>/img/user2-160x160.jpg" alt="User Image">
                            <a class="users-list-name" href="#">Nora</a>
                            <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                            <img src="<?= $assetDir ?>/img/user2-160x160.jpg" alt="User Image">
                            <a class="users-list-name" href="#">Nadia</a>
                            <span class="users-list-date">15 Jan</span>
                        </li>
                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="javascript:">Ver todos los usuarios</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
    </div>

</div>