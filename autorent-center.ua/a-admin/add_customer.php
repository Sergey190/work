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
        <script src="assets/js/jquery.maskedinput.min.js"></script>
         <script src="assets/js/inputmask.js"></script>

    </head>

    <body>

        <div id="wrapper">

           
            <!-- The End of the Header -->
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Бронювання автомобіля</h2>
        </div>
        
</div>
    

<form action="insert_into.php" method="POST" oninput="dayscountval.value=dayscount.value">
                <fieldset>

                    <legend>Оренда автомобіля</legend>
<br>
    <label>Обрати автомобіль <span class="red">*</span></label> 
    <?php  

                       $stmt = $pdo->query("SELECT model, marka, obem FROM  `car`   ");


echo '<select id="country" name="country" class="country" >';
 echo '<option value="mark11a" id="ff"  placeholder="Выбрать автомобиль"></option>';
while($row = $stmt->fetch(PDO::FETCH_BOTH)){


 echo '<option> '.$row['marka'].'  '.$row['model'].' ' . $row['obem'] . ' л.</option>';

                                               
                        }
                        
                         echo '</select>';




?>



              
                <label>ПІБ  <span class="red">*</span></label> 
                <input type="search" name="fio" value="" required>
                <div class="one-third-width">
                    <label for="phone">Номер телефону:  <span class="red">*</span></label>

                <input  id="phone" name="phone" class="mask-phone form-control" required>

                   
 
<script>
$('.mask-phone').mask('+38 (999) 999-99-99');
</script>

       <label>Адреса подання</label> 
                <input type="search" name="adres" value=""   required>

                    <label>Дата</label> 
                    <input type="number" min="1" max="31" name="day" value="17">
                </div>
                <div class="two-third-width">
                    <label>Місяць</label> 

  
                    <input type="month" name="month" value="2021-03">
                </div>
                <div class="half-width">
                    <label>Кількість днів</label>
                    1 <input type="range" min="1" max="31" step="1" name="dayscount" value="2"> 31
                </div>
                <div class="half-width output-area">
                    <output name="dayscountval">2 </output>- кол.днів
                </div>
                <div class="buttons">
                    <input type="submit" value="Бронювання"><br><br>
               
                </div>
</fieldset>

                
            </form> 
        </main>






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


  <style type="text/css">
        
        form {
    margin: 60px auto ;
    padding: 20px;
    width: 45%; 
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px #ccc;
}
fieldset {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #c0392b;
}
fieldset legend{
color: #c0392b;
}
label {
    display: block;
    margin-bottom: 5px;
    margin: 10px;
}
input {
    margin-bottom: 10px;
    width: 95%;
    height: 34px;
    margin: 15px;
}
output {
    display: inline-block;
    margin: 0 5px 10px;
    width: 30px;
    height: 20px;
    text-align: center;
}
input, output {
    padding: 2px 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    vertical-align: middle;
    font-family: "Roboto";
}
input[type="submit"] { 
    display: inline-block;
    margin: 0 5px;
    padding: 6px 15px;
    width: auto;
    height: 50px;
    border: none;
    border-radius: 5px;
    background: #2c3e50;
    color: #fff;
}
.one-third-width {
    width: 73.3%;
}
.two-third-width {
    width: 96.6%;
}
.half-width {
    width: 100%;
    margin-left: 15px;: 
}
.one-third-width,
.two-third-width, 
.half-width {
    display: inline-block;
    margin-right: -4px;
}
.one-third-width input,
.two-third-width input {
    width: 100%;
}
.half-width input {
    width: 100%;
}
.half-width input[type="range"] {
    width: 60%;
}
.output-area {
    vertical-align: top;
}
.buttons {
    margin-top: 10px;
    text-align: center;
}

.country{
    margin-bottom: 10px;
    width: 95%;
    height: 34px;
       margin: 15px;
        padding: 2px 5px;
    border: 1px solid #ccc;
}

 option{
font-size: 16px;
 font-family: Arial,Helvetica,sans-serif;
}
    </style>

<?php include_once 'includes/footer.php'; ?>