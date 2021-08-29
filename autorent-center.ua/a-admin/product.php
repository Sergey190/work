



<?php
require_once './config/config.php';

include("include/db_connect.php");

 $product_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $product = mysqli_query($connect, "SELECT * FROM `zakas` WHERE `id` = '$product_id'");

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
                                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Адмін панель</a>
                                </li>

<li <?php echo (CURRENT_PAGE == "zakas.php" || CURRENT_PAGE == "add_customer.php") ? 'class="active"' : ''; ?>>
                                    <a href="#"><i class="fa fa-shopping-basket"></i> Замовлення<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="zakas.php"><i class="fa fa-list fa-fw"></i>Показати все</a>
                                        </li>
                                    <li>
                                        <a href="add_customer.php"><i class="fa fa-plus fa-fw"></i>Додати новое</a>
                                    </li>
                                    </ul>
                                </li>
                                <li>
                                <li <?php echo (CURRENT_PAGE == "customers.php" || CURRENT_PAGE == "add_customer.php") ? 'class="active"' : ''; ?>>
                                    <a href="#"><i class="fa fa-user-circle fa-fw"></i> Клієнти<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="customers.php"><i class="fa fa-list fa-fw"></i>Показати все</a>
                                        </li>
                                    <li>
                                        <a href="add_klient.php"><i class="fa fa-plus fa-fw"></i>Додати новое</a>
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
            <h2 class="page-header">Дані о замовлені</h2>
        </div>
        
</div>
<form></form>
<div class="container">
 <div class="row">

 <div class="col-md-offset-3 col-md-6">
 <form class="form-horizontal">
 <span class="heading"></span>
 <div class="form-group">
  <i class="fa fa-car"></i><h4>Автомобіль: <?= $product['car'] ?></h4>
 </div>
    <span class="heading"></span>

 <div class="form-group help">
  <h4> <i class="fa fa-user"></i>ПІБ: <?= $product['fio'] ?></h4>
  <i class="fa fa-user"></i>
 
 </div>

 <div class="form-group help">

  <h4> Номер тел.: <?= $product['number'] ?></h4>
  <i class="fa fa-volume-control-phone"></i>
  
 </div>

 <span class="heading"></span>


 <div class="form-group help">

  <h4>Адрес подання.: <?= $product['adres'] ?></h4>
  <i class="fa fa-location-arrow"></i>
   </div>

 <div class="form-group help">

  <h4>Дата подання.: <?= $product['data']  ?>-<?= $product['mes']?></h4>
  <i class="fa fa-calendar"></i>
   </div>
    <div class="form-group help">

  <h4>Кіл.днів.: <?= $product['koll'] ?></h4>
  <i class="fa fa-sun-o"></i>
   </div>
     <div class="form-group help">

  <h4>Штраф.: <?= $product['shraf'] ?> грн.</h4>
  <i class="fa-strikethrough"></i>
   </div>
     <div class="form-group help">

  <h4>Кінцева сумма.: <?= $product['profit'] ?> грн.</h4>
  <i class="fa fa-money"></i>
   </div>
    <div class="form-group help">

  <h4> Чек.: <?= $product['chek'] ?></h4>
  <i class="fa fa-credit-card"></i>
   </div>

     <h4> Знижка.: <?= $product['skidka']?>%</h4>
  <i class="fa fa-credit-card"></i>
   </div>



 
 </form>
  <a class="s11" href="zakas.php" >Відміна</a>
 </div>

 </div><!-- /.row -->
</div><!-- /.container -->


    
 
   

     



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
<style>
/* Demo Background */
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
body{background:url(/images/bg/bg-6.png)}

/* Form Style */
.form-horizontal{
 background: #fff;
 padding-bottom: 40px;
 border-radius: 15px;
 text-align: center;
}
.form-horizontal .heading{
 display: block;
 font-size: 35px;
 font-weight: 700;
 padding: 35px 0;
 border-bottom: 1px solid #f0f0f0;
 margin-bottom: 30px;
}
.form-horizontal .form-group{
 padding: 0 40px;
 margin: 0 0 25px 0;
 position: relative;
}
.form-horizontal .form-control{
 background: #f0f0f0;
 border: none;
 border-radius: 20px;
 box-shadow: none;
 padding: 0 20px 0 45px;
 height: 40px;
 transition: all 0.3s ease 0s;
}
.form-horizontal .form-control:focus{
 background: #e0e0e0;
 box-shadow: none;
 outline: 0 none;
}
.form-horizontal .form-group i{
 position: absolute;
 top: 12px;
 left: 60px;
 font-size: 17px;
 color: #c8c8c8;
 transition : all 0.5s ease 0s;
}
.form-horizontal .form-control:focus + i{
 color: #00b4ef;
}
.form-horizontal .fa-question-circle{
 display: inline-block;
 position: absolute;
 top: 12px;
 right: 60px;
 font-size: 20px;
 color: #808080;
 transition: all 0.5s ease 0s;
}
.form-horizontal .fa-question-circle:hover{
 color: #000;
}
.form-horizontal .main-checkbox{
 float: left;
 width: 20px;
 height: 20px;
 background: #11a3fc;
 border-radius: 50%;
 position: relative;
 margin: 5px 0 0 5px;
 border: 1px solid #11a3fc;
}
.form-horizontal .main-checkbox label{
 width: 20px;
 height: 20px;
 position: absolute;
 top: 0;
 left: 0;
 cursor: pointer;
}
.form-horizontal .main-checkbox label:after{
 content: "";
 width: 10px;
 height: 5px;
 position: absolute;
 top: 5px;
 left: 4px;
 border: 3px solid #fff;
 border-top: none;
 border-right: none;
 background: transparent;
 opacity: 0;
 -webkit-transform: rotate(-45deg);
 transform: rotate(-45deg);
}
.form-horizontal .main-checkbox input[type=checkbox]{
 visibility: hidden;
}
.form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
 opacity: 1;
}
.form-horizontal .text{
 float: left;
 margin-left: 7px;
 line-height: 20px;
 padding-top: 5px;
 text-transform: capitalize;
}
.form-horizontal .btn{
 float: right;
 font-size: 14px;
 color: #fff;
 background: #00b4ef;
 border-radius: 30px;
 padding: 10px 25px;
 border: none;
 text-transform: capitalize;
 transition: all 0.5s ease 0s;
}
@media only screen and (max-width: 479px){
 .form-horizontal .form-group{
 padding: 0 25px;
 }
 .form-horizontal .form-group i{
 left: 45px;
 }
 .form-horizontal .btn{
 padding: 10px 20px;
 }
}
</style>

  
<?php include_once 'includes/footer.php'; ?>