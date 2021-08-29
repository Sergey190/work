



<?php
require_once './config/config.php';

include("include/db_connect.php");

 $product_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $product = mysqli_query($connect, "SELECT * FROM `car` WHERE `id_car` = '$product_id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $product = mysqli_fetch_assoc($product);

//serve POST method, After successful insert, redirect to customers.php page.


//We are using same form for adding and editing. This is a create form so declare $edit = false.



?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Administrator</title>

        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- MetisMenu CSS -->
        <link href="assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="assets/js/jquery.maskedinput.min.js"></script>
         <script src="assets/js/inputmask.js"></script>

         


    </head>

    <body>
 <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li>
                                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Админ панель</a>
                                </li>

<li <?php echo (CURRENT_PAGE == "zakas.php" || CURRENT_PAGE == "add_customer.php") ? 'class="active"' : ''; ?>>
                                    <a href="#"><i class="fa fa-shopping-basket"></i> Замовлення<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="zakas.php"><i class="fa fa-list fa-fw"></i>Показати все</a>
                                        </li>
                                    <li>
                                        <a href="add_customer.php"><i class="fa fa-plus fa-fw"></i>Додати нове</a>
                                    </li>
                                    </ul>
                                </li>
                                <li>
                                <li <?php echo (CURRENT_PAGE == "customers.php" || CURRENT_PAGE == "add_customer.php") ? 'class="active"' : ''; ?>>
                                    <a href="#"><i class="fa fa-user-circle fa-fw"></i> Клиенты<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="customers.php"><i class="fa fa-list fa-fw"></i>Показати все</a>
                                        </li>
                                    <li>
                                        <a href="add_klient.php"><i class="fa fa-plus fa-fw"></i>Додати нове</a>
                                    </li>
                                    </ul>
                                </li>


                                <li>
                                    <a href="admin_users.php"><i class="fa fa-users fa-fw"></i> Користувачі</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>
    
        <div id="wrapper">

           
            <!-- The End of the Header -->
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Дані о автомобілях</h2>
        </div>
        
</div>
    

  



 <div class="container">
 <div class="row">

 <div class="col-md-4 col-sm-6">
 <div class="serviceBox">
 <div class="service-icon">
<i class="fa fa-car" aria-hidden="true"></i>
 </div>
  <?php 

     if  ($product["image"] != "" && file_exists("./uploads_images/".$product["image"]))
{
  $img_path = './uploads_images/'.$product["image"];
$max_width = 450; 
$max_height = 560; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}else
{
$img_path = "/imeges/no-image.png";
$width = 250;
$height = 260;

} 
 echo '<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /><br><br>'

     ?>
 <h5 class="title">Модель: <?= $product['model'] ?></h5>
 <p class="description">

 Марка.: <?= $product['marka'] ?><br><br>
 Обэм : <?= $product['obem'] ?><br><br>
    Класс: <?= $product['klass'] ?><br><br>
   Привод: <?= $product['privod'] ?><br><br>
    Топливо: <?= $product['toplivo'] ?><br><br>
     Коробка: <?= $product['koroka'] ?><br><br>
      Тип кузова: <?= $product['tipkuzova'] ?><br><br>
           Гос. Номер: <?= $product['goss'] ?><br><br>
      VIN: <?= $product['vin'] ?><br><br>
    


 </p>

 </div>
  <div class="container">
 <div class="row">

 <div class="col-md-4 col-sm-6">
 <div class="serviceBox">
 <div class="service-icon">
<i class="fa fa-car" aria-hidden="true"></i>
 </div>
 

 
   Пошкодження автомобіля:  <?= $product['poskodjena'] ?><br><br>
 </div>
 </div>
</div>

</div>
 </div>
</div>

</div>



<a class="s11" href="add_car.php" >Назад</a>














<style>
body{background:url(https://bootstraptema.ru/images/bg/bg-4.png)}

.serviceBox{
 border: 3px solid #8a716a;
 border-radius: 10px;
 margin-top: 30px;
 padding: 35px 30px;
 position: relative;
 width: 500px;
}
.serviceBox .service-icon{
 width: 80px;
 height: 60px;
 line-height: 60px;
 border-radius: 5px;
 background: #9074E3;
 font-size: 40px;
 color: #fff;
 text-align: center;
 position: absolute;
 top: -30px;
 right: 40px;
}
.serviceBox .service-icon:before{
 content: "";
 width: 100%;
 height: 100%;
 background: #fff;
 position: absolute;
 top: -20px;
 left: -45px;
 opacity: 0.1;
 transform: rotate(137deg) scale(1.5) skew(29deg) translate(-1px);
}
.serviceBox .service-icon:after{
 content: "";
 border-top: 11px solid #9074E3;
 border-right: 11px solid transparent;
 position: absolute;
 top: 100%;
 left: 50%;
 margin-left: -4px;
}
.serviceBox .title{
 font-size: 24px;
 color: #787472;
}
.serviceBox .description{
 font-size: 16px;
 color: #8a716a;
 line-height: 25px;
}
@media only screen and (max-width: 990px){
 .serviceBox{ margin-bottom: 30px; }
}
@media only screen and (max-width: 767px){
 .serviceBox{ margin-bottom: 40px; }
}



.s11 {
   background-image: linear-gradient(#FE5568 50%, #FE5568 50%), linear-gradient(silver 50%, silver 50%);
   background-position: center bottom;
   background-repeat: no-repeat;
   background-size: 0 2px, 100% 2px;
   color: #1E3A52;
   padding-bottom: 3px;
   transition: .5s ease-in-out;
}
.s11:hover {
   background-size: 100% 2px, 100% 2px;
   color: #FE5568;
}
</style>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            f_name: {
                required: true,
                minlength: 3
            },
            l_name: {
                required: true,
                minlength: 3
            },   
        }
    });
});
</script>



  
<?php include_once 'includes/footer.php'; ?>