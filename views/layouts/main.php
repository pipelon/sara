<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

if (Yii::$app->controller->action->id === 'login' || Yii::$app->controller->action->id === 'error') {
    /**
     * Do not use this code in your template. Remove it. 
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
            'main-login',
            ['content' => $content]
    );
    exit;
}

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$publishedRes = Yii::$app->assetManager->publish('@vendor/hail812/yii2-adminlte3/src/web/js');
$this->registerJsFile($publishedRes[1] . '/control_sidebar.js', ['depends' => '\hail812\adminlte3\assets\AdminLteAsset']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            .sidebar-dark-warning .nav-sidebar > .nav-item > .nav-link.active,
            .sidebar-light-warning .nav-sidebar > .nav-item > .nav-link.active,
            [class*="sidebar-dark-"] .nav-treeview > .nav-item > .nav-link.active, 
            [class*="sidebar-dark-"] .nav-treeview > .nav-item > .nav-link.active:focus, 
            [class*="sidebar-dark-"] .nav-treeview > .nav-item > .nav-link.active:hover{
                background-color: rgba(255, 255, 255, .1);
                color: #fff;
            }
            ul.nav-treeview  .nav-item .nav-icon.fas{
                font-size: 12px;
            }
            .row-happy-products .card .card-body,
            .row-happy-products .card .card-footer {
                text-align: center;
            }
            .table-list-happiness ul li a,
            .table-list-happiness ul li a:hover,
            .table-list-happiness .accordion button.btn-link,
            .table-list-happiness .accordion button.btn-link:hover{
                color: #d39e00 !important;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini">
        <?php $this->beginBody() ?>

        <div class="wrapper">
            <!-- Navbar -->
            <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

            <!-- Content Wrapper. Contains page content -->
            <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <?= $this->render('control-sidebar') ?>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?= $this->render('footer') ?>
        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
