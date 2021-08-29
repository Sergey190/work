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
            <h2 class="page-header">Додати Клієнта</h2>
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
            url: 'add_kl.php',
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
















<form id="formx"  method="POST" action="javascript:void(null);" onsubmit="call()" >
  <fieldset >
    <div class="form-group">
      <label for="disabledSelect">ПІБ *</label>
     <?php  

                       $stmt = $pdo->query("SELECT fio FROM  `zakas`   ");


echo '<select name="fio" id="disabledSelect" class="form-control"" >';
 echo '<option value="mark11a" id="ff"  placeholder="Выберете ПІБ"></option>';
while($row = $stmt->fetch(PDO::FETCH_BOTH)){


 echo '<option> '.$row['fio'].' </option>';

                                               
                        }
                        
                         echo '</select>';




?>
    </div>
    <div class="form-group">Адрес *</label>
      <input type="text" name="adres" id="disabledTextInput" class="form-control" placeholder="Адрес" required>

    </div>
       <div class="form-group">Номер телефону *</label>
      <input type="text" name="phone" class="mask-phone form-control" placeholder="Номер телефона" required>
 
<script>
$('.mask-phone').mask('+38 (999) 999-99-99');
</script>
    </div>
      <div class="form-group">Emaill *</label>
      <input type="text"  name="emaill" id="contactsForm" class="form-control" placeholder="Emaill" required>
    

    </div>
      <div class="form-group">Дата народження</label>
      <input id="date" name="month"value="1231" type="text" tabindex="1" class="form-control" placeholder="Дата народження" >

    </div>
    <div class="form-group">ІНН</label>
      <input id="inn" name="inn" value="" type="text" tabindex="1" class="form-control" placeholder="ІНН " >

    </div>
     <div class="form-group">Штрафи під час оренди</label>
    
      <p><textarea   id="shtrafts" name="shtrafts" rows="10" cols="45" name="text"></textarea></p>

    </div>
    <div class="form-group">Логин</label>
      <input id="login" name="login" value="" type="text" tabindex="1" class="form-control" placeholder="login " >

    </div>
    <div class="form-group">Пароль</label>
      <input id="pass" name="pass" value="" type="password" tabindex="1" class="form-control" placeholder="pass " >

    </div>

    <br>
    <br>
   
 <button type="submit" class="btn btn-primary">Зберегти</button>
  </fieldset>
</form>


<div id="results"></div>

</div>
<script> 
  $(document).ready(function(){   
    $("#contactsForm").inputmask("email")
  });
</script>
<script type="text/javascript">
    $(function() {
        $.mask.definitions['~'] = "[+-]";
        $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy",completed:function(){alert("completed!");}});
        
        $("#phoneExt").mask("(999) 999-9999? x99999");
        $("#iphone").mask("+33 999 999 999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
        $("#product").mask("a*-999-a999", { placeholder: " " });
        $("#eyescript").mask("~9.99 ~9.99 999");
        $("#po").mask("PO: aaa-999-***");
        $("#pct").mask("99%");
        $("#phoneAutoclearFalse").mask("(999) 999-9999", { autoclear: false, completed:function(){alert("completed autoclear!");} });
        $("#phoneExtAutoclearFalse").mask("(999) 999-9999? x99999", { autoclear: false });

        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });

</script>

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