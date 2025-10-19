<?php

use hail812\adminlte3\assets\AdminLteAsset;
use yii\web\JqueryAsset;


// Registrar AdminLTE
AdminLteAsset::register($this);

// Registrar Chart.js directamente desde el vendor original
$this->registerJsFile('@web/../vendor/almasaeed2010/adminlte/plugins/chart.js/Chart.js', [
    'depends' => [JqueryAsset::class],
]);
?>

<div class="col-md-3">
    <h6><b>Sexo de las crías</b></h6>
    <canvas id="chartSexo"></canvas>
</div>

<div class="col-md-3">
    <h6><b>Distribución Colores de crías</b></h6>
    <canvas id="chartColores"></canvas>
</div>

<div class="col-md-3">
    <h6><b>Yeguas Usadas con el reproductor</b></h6>
    <canvas id="chartYeguas"></canvas>
</div>

<div class="col-md-3">
    <h6><b>Líneas genéticas usadas con el reproductor</b></h6>
    <canvas id="chartLineas"></canvas>
</div>

<?php
$this->registerJs(<<<JS
// Configuración global
//Chart.defaults.global.legend.display = false;

const ctxSexo = document.getElementById('chartSexo');
new Chart(ctxSexo, {
  type: 'pie',
  data: {
    labels: ['Machos', 'Hembras'],
    datasets: [{
      data: [60, 40],
      backgroundColor: ['#36A2EB', '#FF6384']
    }]
  }
});

const ctxColores = document.getElementById('chartColores');
new Chart(ctxColores, {
  type: 'pie',
  data: {
    labels: ['Castaño', 'Zaino', 'Moro', 'Alazán', 'Negro'],
    datasets: [{
      data: [20, 25, 15, 25, 15],
      backgroundColor: ['#FFB085', '#D6CBB3', '#E8E8E8', '#FFD07A', '#3E3E3E']
    }]
  }
});

const ctxYeguas = document.getElementById('chartYeguas');
new Chart(ctxYeguas, {
  type: 'pie',
  data: {
    labels: ['Trochadoras', 'Trot. galoperas', 'Troch. galoperas'],
    datasets: [{
      data: [35, 25, 40],
      backgroundColor: ['#FF6384', '#36A2EB', '#77DD77']
    }]
  }
});

const ctxLineas = document.getElementById('chartLineas');
new Chart(ctxLineas, {
  type: 'pie',
  data: {
    labels: ['Dulce sueño', 'Cortesano', 'Patrimonio'],
    datasets: [{
      data: [30, 30, 40],
      backgroundColor: ['#FF6384', '#36A2EB', '#77DD77']
    }]
  }
});
JS);
?>