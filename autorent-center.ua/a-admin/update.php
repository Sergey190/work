<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

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

//We are using same form for adding and editing. This is a create form so declare $edit = false.
}
  }

    /*
     * Получаем ID продукта из адресной строки - /product.php?id=1
     */

    $product_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $product = mysqli_query($connect, "SELECT  * FROM `zakas` WHERE `id` = '$product_id' ");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $product = mysqli_fetch_assoc($product);
   

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h2 class="page-header">Редагувати замовлення</h2>
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
            url: 'add_zaka.php',
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













<form  id="formx"  method="POST" action="javascript:void(null);" onsubmit="call()">  <fieldset >
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">

      <label for="disabledSelect">Авто *</label>
         <input value="<?= $product['car'] ?> " type="text" name="car" id="disabledTextInput" class="form-control" placeholder="ФИО"   required  > 

    </div>
    <div class="form-group">ПІБ *</label>
      <input value="<?= $product['fio'] ?>" type="text" name="fio" id="disabledTextInput" class="form-control" placeholder="Адрес" required>

    </div>
       <div  class="form-group">Номер тел. *</label>
      <input value="<?= $product['number'] ?>" type="text" name="number" class="mask-phone form-control" placeholder="Номер телефона" required>
 
<script>
$('.mask-phone').mask('+38 (999) 999-99-99');
</script>
    </div>
      <div class="form-group">Адрес подання</label>
      <input value="<?= $product['adres'] ?>" type="text"  name="adres" id="contactsForm" class="form-control" placeholder="Emaill" required>
    

    </div>
      <div class="form-group">Дата подання</label>
      <input  value="<?= $product['data'] ?>" id="date" name="data"  type="text" class="form-control" placeholder="Дата рождение" >

    </div>
 <div class="form-group">Місяць подання</label>
      <input  value="<?= $product['mes'] ?>" id="month" name="mes" type="text"  class="form-control" placeholder="Дата рождение" >

    </div> 
    <div class="form-group">Кількість днів</label>
      <input  value="<?= $product['koll'] ?>" id="koll" name="koll"  type="text" class="form-control" placeholder="Дата рождение" >

    </div> 

  <div class="form-group">Факт. дата повернення</label>
      <input  value="<?= $product['fakdata'] ?>" id="fakdata" name="fakdata"  type="date" class="form-control" placeholder="Дата рождение" >

    </div> 
  
<div class="form-group">Чек</label>
      <input  value="<?= $product['chek'] ?>" id="chek" name="chek"  type="text" class="form-control" placeholder="chek" >

    </div> 
    <br>
    <div class="form-group">Знижка</label>
   <?php  

                       $stmt = $pdo->query("SELECT skidka FROM  `skidka`   ");


echo '<select  id="skidka" name="skidka" class="skidka"  >';
echo '<option > '.$product['skidka'].' </option>';
while($row = $stmt->fetch(PDO::FETCH_BOTH)){


 echo '<option> '.$row['skidka'].' </option>';

                                               
                        }
                        
                         echo '</select> %';




?>

    </div> 


<br>

    <div  class="form-group">Сумма штрафа</label>
      <input  value="<?= $product['shraf'] ?>" id="shraf" name="shraf"  class="form-control" placeholder="Дата рождение" >

    </div>
    <br>
    <br>
 <label>Оберіть статус <span class="red">*</span></label> 
    <?php  

                       $stmt = $pdo->query("SELECT status FROM  `status`   ");


echo '<select  id="status" name="status" class="status"  >';
echo '<option > '.$product['status'].' </option>';
while($row = $stmt->fetch(PDO::FETCH_BOTH)){


 echo '<option> '.$row['status'].' </option>';

                                               
                        }
                        
                         echo '</select>';




?>

    <br>
    <br>
    <br>

    <div class="form-group"> </label>
        <?php 
 $stmt = $pdo->query("SELECT *  FROM `zakas`   LEFT JOIN `price`  ON zakas.id = price.id " );

$stmt->execute();



   while($row = $stmt->fetch(PDO::FETCH_BOTH)){

   


echo  ' 

';

$number =$product["koll"];
 
$number_2 =$row["price"];

$number_3 = $product["shraf"];
$number_4 = $product["skidka"];
 
$sum =($number * $number_2 +$number_3)/$number_4;
 


}



         ?>
         <div class="form-group">Кінцева сумма:</label>

<? echo $sum ;?> грн.


    </div>

<div  class="form-group"></label>
      <input type="hidden" value="<?= $sum ?>" id="www" name="profit"  class="form-control" >

    </div>





 




    <br>
    <br>
   
 <button type="submit" class="btn btn-primary">Зберегти</button>

  <a class="s11" href="zakas.php" >Відміна</a>
  </fieldset>

</form>








</div> 

<div id="results"></div>


</div>











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