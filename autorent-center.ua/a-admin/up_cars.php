<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
include("include/db_connect.php");


//serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = array_filter($_POST);

    //Insert timestamp
    $data_to_store['created_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    
    $last_id = $db->insert('customers', $data_to_store);

    if($last_id)
    {
    	$_SESSION['success'] = "Customer added successfully!";
    	header('location: customers.php');
    	exit();
    }
    else
    {
        echo 'insert failed: ' . $db->getLastError();
        exit();
    }



}

 $product_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $product = mysqli_query($connect, "SELECT  * FROM `car` WHERE `id_car` = '$product_id' ");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $product = mysqli_fetch_assoc($product);




//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;
include BASE_PATH.'/includes/header.php'

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

        <div id="wrapper">

           
            <!-- The End of the Header -->
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Редагувати дані Авто</h2>
        </div>
        
</div>
    
    <!-- Scripts -->

<script type="text/javascript">
    


$(document).ready(function () {
    $("form").submit(function () {
        // Получение ID формы
        var formID = $(this).attr('id');
        // Добавление решётки к имени ID
        var formNm = $('#' + formID);
        $.ajax({
            type: "POST",
            url: 'upp_car.php',
            data: formNm.serialize(),
            beforeSend: function () {
                // Вывод текста в процессе отправки
                $(formNm).html('<p style="text-align:center">Отправка...</p>');
            },
            success: function (data) {
                // Вывод текста результата отправки
                $(formNm).html('<p style="text-align:center">'+data+'</p>');
            },
            error: function (jqXHR, text, error) {
                // Вывод текста ошибки отправки
                $(formNm).html(error);
            }
        });
        return false;
    });
});





</script>
















<form id="formx"  method="POST" action="javascript:void(null);" onsubmit="call() " enctype="multipart/form-data">
  <fieldset >
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $product['id_car'] ?>">
      <label for="disabledSelect">Модель </label>

     <input value="<?= $product['model'] ?> " type="text" name="model" id="disabledTextInput" class="form-control" placeholder="Адрес" required>

    </div>
    <div class="form-group">Марка </label>
      <input value="<?= $product['marka'] ?> " type="text" name="marka" id="disabledTextInput" class="form-control" placeholder="Адрес" required>

    </div>
       <div class="form-group">Объём</label>
      <input  value="<?= $product['obem'] ?> " type="text" name="obem" class="mask-phone form-control" placeholder="Номер телефона" required>
 

    </div>
      <div class="form-group">Класс</label>
      <input   value="<?= $product['klass'] ?> " type="text"  name="klass" id="contactsForm" class="form-control" placeholder="Emaill" required>
    

    </div>
      <div class="form-group">Привод</label>
      <input  value="<?= $product['privod'] ?> "  id="date" name="privod"value="1231" type="text" tabindex="1" class="form-control" placeholder=" " >

    </div>
    <div class="form-group">Топливо</label>
      <input  value="<?= $product['toplivo'] ?> "  id="date" name="toplivo"value="1231" type="text" tabindex="1" class="form-control" placeholder=" " >

    </div>
    <div class="form-group">Коробка</label>
      <input  value="<?= $product['koroka'] ?> "  id="date" name="koroka"value="1231" type="text" tabindex="1" class="form-control" placeholder=" " >

    </div>
    <div class="form-group">Тип кузова</label>
      <input  value="<?= $product['tipkuzova'] ?> "  id="date" name="tipkuzova"value="1231" type="text" tabindex="1" class="form-control" placeholder="" >

    </div>


    <div class="form-group">Пошкодження автомобіля</label>
    
      <p><textarea value=""  id="poskodjena" name="poskodjena" rows="10" cols="45" name="text"><?= $product['poskodjena'] ?></textarea></p>

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





 

    <br>
    <br>
   
 <button type="submit" class="btn btn-primary">Зберегти</button>
 <a class="s11" href="add_car.php" >Відміна</a>
  </fieldset>
</form>


<div id="results"></div>

</div>
<style type="text/css">





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