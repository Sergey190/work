<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';
include("include/db_connect.php");
// Costumers class
require_once BASE_PATH . '/lib/Costumers/Costumers.php';
$costumers = new Costumers();

// Get Input data from query string
$search_string = filter_input(INPUT_GET, 'search_string');
$filter_col = filter_input(INPUT_GET, 'filter_col');
$order_by = filter_input(INPUT_GET, 'order_by');

// Per page limit for pagination.
$pagelimit = 15;

// Get current page.
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
	$page = 1;
}

// If filter types are not selected we show latest added data first
if (!$filter_col) {
	$filter_col = 'id';
}
if (!$order_by) {
	$order_by = 'Desc';
}

//Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();


//Start building query according to input parameters.
// If search string
if ($search_string) {
	$db->where('car', '%' . $search_string . '%', 'like');
	$db->orwhere('fio', '%' . $search_string . '%', 'like');
}

//If order by option selected
if ($order_by) {
	$db->orderBy($filter_col, $order_by);
}

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query.

$total_pages = $db->totalPages;
include BASE_PATH.'/includes/header.php';

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

  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>

    </head>

    <body>

        <div id="wrapper">

            <!-- The End of the Header -->

        <link  rel="stylesheet" href="assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- MetisMenu CSS -->
        <link href="assets/js/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>




<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>





        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Замовлення</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_customer.php?operation=create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Додати нове</a>
            </div>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php';?>

    <!-- Filters -->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Пошук</label>

            <input type="text" class="form-control" name="search_string" id="search-text" onkeyup="tableSearch()" >
            



<script type="text/javascript">
    


function tableSearch() {
    var phrase = document.getElementById('search-text');
    var table = document.getElementById('example');
    var regPhrase = new RegExp(phrase.value, 'i');
    var flag = false;
    for (var i = 1; i < table.rows.length; i++) {
        flag = false;
        for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
            flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
            if (flag) break;
        }
        if (flag) {
            table.rows[i].style.display = "";
        } else {
            table.rows[i].style.display = "none";
        }

    }
}


</script>

<script>
 $(document).ready( function () {
 $('#info-table').bdt();
 });
</script>




        </form>
    </div>
    <hr>
    <!-- //Filters <div id="export-section">
      <button id="exportButton" class="btn btn-lg btn-danger center-block"><span class="fa fa-file-pdf-o"></span> Export to PDF</button>
       <input type="button" id="btnExport" value="Export" />
    </div> -->


   

   <div class="table-holder">
        


    <!-- Table -->
    <table class="table table-hover" id="example">
        
      <thead>

    <tr>

<td width="105">Автомобіль</td>
<td width="90">ПІБ</td>
<td width="120">Нормер тел.</td>
<td>Адрес <br> подання</td>
<td>Дата подання</td>
<td width="35">Кіл. днів</td>

<td width="55">Факт. дата повернення</td>
<td width="75">Ціна за добу</td>
<td>Сума штрафа</td>
<td>Знижка</td>
<td>Общ. сумма</td>
<td>Статус</td>

<td>Дія</td>

    </tr>

  </thead>
  <tbody>


<?php 

$stmt = $pdo->query("SELECT * FROM  `zakas`   LEFT JOIN `price`  ON zakas.id = price.id");

$stmt->execute();

if($stmt->rowCount() > 0){

   while($row = $stmt->fetch(PDO::FETCH_BOTH)){

   


echo '
    <tr>
  
    
        <td>' . $row['car'] . '</td>
        <td>' . $row['fio'] . '</td>
        <td>' . $row['number'] . '</td>
        <td>' . $row['adres'] . '</td>

  <td>'.$row["data"]."-".$row["mes"].'
 
</td>
        <td>' . $row['koll'] . '</td>
   
<td>' . $row['fakdata'] . '</td>
 
        <td>' . $row['price'] . ' грн.</td>
        <td>' . $row['shraf'] . ' грн.</td>
         <td>' . $row['skidka'] . '  %.</td>
         <td>' . $row['profit'] . '  грн.</td>

          <td>' . $row['status'] . '    </td>
          
         <td>' . '

         <a href="product.php?  id=' . $row['id'] . '" class="btn btn-info"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
         <a href="update.php?  id=' . $row['id'] . '" class="btn btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
         <a href="zvit.php?  id=' . $row['id'] . '" class="btn btn-warning"> <i class="fa fa-print" aria-hidden="true"></i> </a>

         ' . '<a href="vendor/delete.php?id=' . $row['id'] . '" class="btn btn-danger delete_btn"><i class="glyphicon glyphicon-trash" onclick="if(confirm(\'Вы действительно  хочите удалить?\'))submit();else return false;"></i> </a>

         </td>

    </tr>' . "\n";
    }
}



 ?>



</tbody>
    </table>
    <!-- //Table -->
    </div>
    <!-- Pagination -->
    <div class="text-center">
    <?php echo paginationLinks($page, $total_pages, 'customers.php'); ?>
    </div>
    <!-- //Pagination -->
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    
    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
     </script>
<!-- //Main container -->

<?php include BASE_PATH . '/includes/footer.php';?>
