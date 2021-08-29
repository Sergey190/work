
<?php 
include("include/db_connect.php");

 ?>



<!DOCTYPE html>
<html>
<head>
    <title>Real-car.ua</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="css/media.css" media="all and (max-width: 900px)">    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    

<link rel="SHORTCUT ICON" href="/favicon.ico" type="image/x-icon">

</head>
<script> 
    function showContent(link) { 
        var cont = document.getElementById('contenttt'); 
        var loading = document.getElementById('loading'); 
        cont.innerHTML = loading.innerHTML;   
        var http = createRequestObject(); 
        if( http )  
        { http.open('get', link); 
            http.onreadystatechange = function ()  
            {   if(http.readyState == 4)  
                {   cont.innerHTML = http.responseText;  }    } 
            http.send(null);  } 
        else  
        {  document.location = link;   }   } 
    // ajax объект
    function createRequestObject()  
    {  try { return new XMLHttpRequest() } 
        catch(e)  
        {  try { return new ActiveXObject('Msxml2.XMLHTTP') } 
            catch(e)  
            {   try { return new ActiveXObject('Microsoft.XMLHTTP') } 
                catch(e) { return null; }   } } } 
</script>
<body >

<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>

<script src="js/scripts.js"></script>












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
    echo "Спасибо, ".$_POST['fio'].", мы свяжемся с вами в самое ближайшее время!"; 
    } else {
        echo "Сообщение не отправлено!"; 
    }


$conn->close();

?>


<br>
<br>
<div class="oke">
    <img src="imeges/dd.png"><br><br>
    <h3>Заказ успешно создан!</h3><br>
    <a href="http://autorent-center.ua"> Вернуться на главную страницу</a>

</div>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br>
<?php 

include("include/footer.php");
 ?>

</body>
</html>