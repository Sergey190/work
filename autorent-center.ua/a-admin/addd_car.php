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
            <h2 class="page-header">Добавить автомобиль</h2>
        </div>
        
</div>
    

<script type="text/javascript">
    


  $( document ).ready( function () {
                $( "form" ).submit( function () {
                    // Получение ID формы
                    var formID = $( this ).attr( 'id' );
                    var formNm = document.getElementById( formID );
                    $.ajax( {
                        type: "POST",
                        url: 'add_ca.php',
                        processData: false,
                        contentType: false,
                        data: new FormData( formNm ),
                        beforeSend: function () {
                            // Вывод текста в процессе отправки
                            $( formNm ).html( '<p style="text-align:center">Отправка...</p>' );
                        },
                        success: function ( data ) {
                            // Вывод текста результата отправки
                            $( formNm ).html( '<p style="text-align:center">' + data + '</p>' );
                        },
                        error: function ( jqXHR, text, error ) {
                            // Вывод текста ошибки отправки
                            $( formNm ).html( error );
                        }
                    } );
                    return false;
                } );
            } );



</script>
















<form id="formx"  method="POST" action="javascript:void(null);"   enctype="multipart/form-data">
  <fieldset >
    <div class="form-group">

    </div>
    <div class="form-group">Модель *</label>
      <input type="text" name="model" id="disabledTextInput" class="form-control" placeholder="Модель" required>

    </div>
       <div class="form-group">Марка *</label>
      <input type="text" name="marka" class="mask-phone form-control" placeholder="Марка" required>

    </div>

     
          <div class="form-group">Обем *</label>
      <input type="text" name="obem" class="mask-phone form-control" placeholder="Марка" required>

    </div>
      <div class="form-group">Класс *</label>
      <input type="text"  name="klass" id="contactsForm" class="form-control" placeholder="Класс" required>
    

    </div>
      <div class="form-group">Привод</label>
      <input id="date" name="privod" type="text" tabindex="1" class="form-control" placeholder="Привод" >

    </div>


     <div class="form-group">Вид топлива</label>
      <input id="date" name="toplivo" type="text" tabindex="1" class="form-control" placeholder="Вид топлива" >

    </div>
     <div class="form-group">Коробка</label>
      <input id="date" name="koroka"  type="text" tabindex="1" class="form-control" placeholder="Коробька" >

    </div>
     <div class="form-group">Тип кузова</label>
      <input id="date" name="tipkuzova"  type="text" tabindex="1" class="form-control" placeholder="Тип кузова" >

    </div>
  <div class="form-group">Картинка *</label><br>
        <br>
         <input type="file" name="image" id="file-lg" class="file-select file-select-lg" required>

<label for="file-lg" class="filename"><i class="fa fa-arrow-circle-o-up"></i>
    Выберите файл...
</label>
    </div>
    <script type="text/javascript">
        $(function() {
    $("input:file").change(function (){
        var fileName = $(this).val().split( '\\' ).pop();
        $(this).next('label').html('<i class="fa fa-file"></i> ' + fileName);
    });
});
    </script>
    <style type="text/css">
        .file-select {
    width: 0;
    height: 0;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.file-select.file-select-lg + label {
  padding: 10px 10px;
  font-size: 18px;
}

.file-select + label {
  font-size: 14px;
  display: inline-block;
  cursor: pointer;
  border: 1px solid #ccc;
  padding: 6px 10px;
  border-radius: 3px;
}

.file-select.file-select-sm + label {
  font-size: 12px;
  padding: 5px 10px;
}

.file-select:focus + label,
.file-select + label:hover {
  background: #ccc;
}
    </style>

    <div class="form-group">Гос.Номер</label>
      <input id="date" name="goss"  type="text" tabindex="1" class="form-control" placeholder="Гос.Номер" >

    </div>
    <div class="form-group">VIN</label>
      <input id="date" name="vin"  type="text" tabindex="1" class="form-control" placeholder="vin" >

    </div>
     <div class="form-group">Пошкодження автомобіля</label>
    
      <p><textarea value="<?= $product['poskodjena'] ?> "  id="poskodjena" name="poskodjena" rows="10" cols="45" name="text"></textarea></p>

    </div>

    <br>
    <br>
   
 <button type="submit" class="btn btn-primary">Сохранить</button>
  </fieldset>
</form>


<div id="results"></div>

</div>





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