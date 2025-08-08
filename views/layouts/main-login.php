<?php
/* @var $this \yii\web\View */
/* @var $content string */

\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
$this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
\hail812\adminlte3\assets\PluginAsset::register($this)->add(['fontawesome', 'icheck-bootstrap']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Happiness Café | Acceso</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <?php $this->head() ?>
        <style type="text/css">
            .login-page{
                background: #FFFFFF
            }
            .btn.btn-primary.btn-block.btn-login-happiness{
                background: #D79328;
                border: 1px solid #D79328;
            }
            .icheck-primary > input:first-child:checked + input[type="hidden"] + label::before, .icheck-primary > input:first-child:checked + label::before {
                background-color: #D79328;
                border-color: #D79328;
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <?php $this->beginBody() ?>
        <div class="login-box">
            <div class="login-logo">
                <?=
                \yii\helpers\Html::img("@web/images/HappinessLogoFinalSmall.jpg",
                        [
                            'alt' => 'User Image'
                ])
                ?>
            </div>
            <!-- /.login-logo -->

            <?= $content ?>
        </div>
        <!-- /.login-box -->

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>