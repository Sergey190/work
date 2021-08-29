<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';
include("include/db_connect.php");

//Get DB instance. function is defined in config.php
$db = getDbInstance();

//Get Dashboard information
$numCustomers = $db->getValue ("customers", "count(*)");

include_once('includes/header.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Адмін панель: autorent-center.</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-basket fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                              <?php 

$stmt = $pdo->query("SELECT zakk, profit, mes  FROM  `zakas`  " ); //WHERE mes BETWEEN LAST_DAY(CURDATE()) + INTERVAL 1 DAY - INTERVAL 1 MONTH AND LAST_DAY(CURDATE())

$total = 0;
$total2 = 0;

$stmt->execute();

if($stmt->rowCount() > 0){
while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    $total += $row['zakk'];
      $total2 += $row['profit'];
   }
  }



 ?>
                            <div class="huge"><?php echo $total; ?></div>
                            <div>Кол. Замовлень</div>
                        </div>
                    </div>
                </div>
                <a href="customers.php">
                    
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-money fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $total2; ?> - грн.</div>
                            <div>Прибуток 2021</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                   
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
        
        </div>
        <div class="col-lg-3 col-md-6">
            
        </div>
    </div>
    <br>
    <br>

    <div class="row">

        <div class="col-lg-8">

<div class="col-lg-12">
            <h1 class="page-header">Статистика</h1>
      



<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/shieldui/script.js"></script>

<br><br><br>

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">

<!-- График --><div id="chart">

<script>
 $(function () {
 $("#chart").shieldChart({
 theme: "light",
 exportOptions: {
 image: false,
 print: false
 },
 axisX: {
 categoricalValues: ["2019", "2020", "2021", "2022", "2023", "2024", "2025", "20026", "2027", "2028", "2029", "2030", "2031", "2032", "2033"]
 },
 axisY: {
 axisTickText: {
 format: "{text:c}"
 },
 title: {
 text: "Цена (Грн в uan)"
 }
 },
 tooltipSettings: {
 chartBound: true
 },
 seriesSettings: {
 line: {
 enablePointSelection: true,
 pointMark: {
 activeSettings: {
 pointSelectedState: {
 drawWidth: 4,
 drawRadius: 4
 }
 }
 }
 }
 },
 primaryHeader: {
 text: "Цены на авто-прокат"
 },
 dataSeries: [{
 seriesType: '',
 collectionAlias: 'Прибиль',
 data: [840, 960, 1400, 1000, 0.177, 0.189, 0.180, 0.183, 0.188, 0.160, 0.176, 0.178]
 }, {
 seriesType: 'line',
 collectionAlias: 'Аренда',
 data: [120, 311, 1500, 1000, 0.102, 0.099, 0.110, 0.113, 0.117, 0.119, 0.123, 0.117]
 }]
 });
 });
 </script><!-- /.График -->


</div><!-- /.col-md-8 col-md-offset-2 -->
</div><!-- /.row -->
</div><!-- /.container -->

        <script src="lib/liteChart.min.js"></script>
<br><br><br>
<div id="chart1">

<script>
 $(document).ready(function () {
 $("#chart1").shieldChart({
 theme: "light",
 primaryHeader: {
 text: "Обзор бюджета"
 },
 exportOptions: {
 image: false,
 print: false
 },
 axisX: {
 categoricalValues: ["2019", "2020", "2021", "2022", "2023", "2024", "2025", "20026", "2027", "2028", "2029", "2030", "2031", "2032", "2033"]
 },
 tooltipSettings: {
 chartBound: true,
 axisMarkers: {
 enabled: true,
 mode: 'xy'
 } 
 },
 dataSeries: [{
 seriesType: 'line',
 collectionAlias: "Бюджет в тысячях",
 data: [2000, 1400, 1000, 234, 553, 665, 345, 123, 432, 545, 654, 345, 332, 456, 234]
 }]
 });
 });
 </script><!-- /.График -->

</div><!-- /.col-md-8 col-md-offset-2 -->




        </div>
            <!-- /.panel -->
        </div>
<br><br><br>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
       <br><br><br><br><br><br><br><br><br>




        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->


<?php include_once('includes/footer.php'); ?>
