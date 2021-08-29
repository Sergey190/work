
<?php

include("include/db_connect.php");

?>


    

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

$fio = $_POST['fio'];
$adres = $_POST['adres'];
$phone =  $_POST['phone']; 
$emaill = $_POST['emaill'];
$month = $_POST['month'];
$inn = $_POST['inn'];
$shtrafts = $_POST['shtrafts'];
$login = $_POST['login'];
$pass = $_POST['pass'];








 // Создаем ассоциативный массив для подстановки данных в запрос.
    $data = array(
      
        'fio' => "$fio",
         'adres' => "$adres",
        'phone' => "$phone",
        'emaill' => "$emaill",
          'month' => "$month",
          
    );


$sql = "INSERT INTO `kilent` (`id`, `fio`, `adress`, `phone`, `emaill`, `birsday`,`inn`,`shtrafts`,`login`,`pass`) VALUES (NULL, '$fio', '$adres', '$phone', '$emaill', '$month','$inn','$shtrafts','$login','$pass');";


if ($conn->query($sql) === TRUE) {
    echo ""; 
    } else {
        echo "Сообщение не отправлено!"; 
    }



$conn->close();

?>


<br>
<br>
<div class="oke">
    <img src="imeges/dd.png" class="fig" width="450" ><br><br>
    <h3>Клиент успешно добавлен!</h3><br>
  
<style type="text/css">
    
    .oke{
text-align: center;
    }
</style>
</div>

<?php include_once 'includes/footer.php'; ?>