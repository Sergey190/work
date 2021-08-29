
<?php

include("include/db_connect.php");

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

    </head>

    <body>

                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li>
                                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Админ панель</a>
                                </li>

<li <?php echo (CURRENT_PAGE == "zakas.php" || CURRENT_PAGE == "add_customer.php") ? 'class="active"' : ''; ?>>
                                    <a href="#"><i class="fa fa-shopping-basket"></i> Заказы<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="zakas.php"><i class="fa fa-list fa-fw"></i>Перечислить все</a>
                                        </li>
                                    <li>
                                        <a href="add_customer.php"><i class="fa fa-plus fa-fw"></i>Добавить новое</a>
                                    </li>
                                    </ul>
                                </li>
                                <li>
                                <li <?php echo (CURRENT_PAGE == "customers.php" || CURRENT_PAGE == "add_customer.php") ? 'class="active"' : ''; ?>>
                                    <a href="#"><i class="fa fa-user-circle fa-fw"></i> Клиенты<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="customers.php"><i class="fa fa-list fa-fw"></i>Перечислить все</a>
                                        </li>
                                    <li>
                                        <a href="add_customer.php"><i class="fa fa-plus fa-fw"></i>Добавить новое</a>
                                    </li>
                                    </ul>
                                </li>


                                <li>
                                    <a href="admin_users.php"><i class="fa fa-users fa-fw"></i> Пользователи</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>

        <div id="wrapper">

           
            <!-- The End of the Header -->
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Заказ оформлен</h2>
        </div>
        
</div>
    

<?php 

$servername = "localhost";
$username = "Admin";
$password = "123456";
$dbname = "arenda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$car_name =  $_POST['country'];
$fio = $_POST['fio'];
$phone =  $_POST['phone']; 
$adres = $_POST['adres'];
$day = $_POST['day'];
$month = $_POST['month'];
$dayscount = $_POST['dayscount'];






 // Создаем ассоциативный массив для подстановки данных в запрос.
    $data = array(
        'car_name' => "$car_name",
        'fio' => "$fio",
        'phone' => "$phone",
        'adres' => "$adres",
         'day' => "$day",
          'month' => "$month",
           'dayscount' => "$dayscount",
    );


$sql = "INSERT INTO `zakas` (`id`, `car`, `fio`, `number`, `adres`, `data`, `mes`, `koll`,`fakdata`, `profit`, `shraf`,`skidka`, `zakk`,`status`,`chek`) VALUES (NULL, '$car_name', '$fio', '$phone', '$adres', '$day', '$month.', '$dayscount','0', '0', '0', '0.1', '1','Нове замовлення','000');";


if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}


$conn->close();

?>


<br>
<br>
<div class="oke">
    <img src="imeges/dd.png" class="fig" width="450" ><br><br>
    <h3>Заказ успешно создан</h3><br>
  
<style type="text/css">
    
    .oke{
text-align: center;
    }
</style>
</div>

<?php include_once 'includes/footer.php'; ?>