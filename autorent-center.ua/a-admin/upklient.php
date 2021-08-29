

<?php





$servername = "localhost";
$username = "Admin";
$password = "123456";
$dbname = "arenda";

$id = $_POST['id'];
$fio = $_POST['fio'];

$adress = $_POST['adress'];
$phone = $_POST['phone'];

$emaill = $_POST['emaill'];

$birsday = $_POST['birsday'];

$inn = $_POST['inn'];
$shtrafts = $_POST['shtrafts'];

$login = $_POST['login'];
$pass = $_POST['pass'];







    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE `kilent` SET `fio`='$fio', `adress` = '$adress', `phone` = '$phone', `emaill` = '$emaill', `birsday` = '$birsday',`inn`='$inn',`shtrafts`='$shtrafts', `login`='$login',`pass`= '$pass' WHERE `kilent`.`id` = '$id' ";














    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded



?>
