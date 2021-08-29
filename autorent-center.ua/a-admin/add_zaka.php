



<?php





$servername = "localhost";
$username = "Admin";
$password = "123456";
$dbname = "arenda";

$id = $_POST['id'];
$car = $_POST['car'];
$fio = $_POST['fio'];

$number = $_POST['number'];
$adres = $_POST['adres'];
$data = $_POST['data'];

$mes = $_POST['mes'];
$koll = $_POST['koll'];
$fakdata = $_POST['fakdata'];
$shraf = $_POST['shraf'];
$skidka=$_POST['skidka'];

$profit = $_POST['profit'];
$status = $_POST['status'];
$chek =  $_POST['chek'];

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE `zakas` SET `car` = '$car', `fio` = '$fio', `number` = '$number',  `adres` = '$adres',  `data` = '$data', `mes` = '$mes', `koll` = '$koll', `fakdata` = '$fakdata', `shraf` = '$shraf', `skidka`='$skidka',`profit` = '$profit', `status` = '$status', `chek` = '$chek' WHERE `zakas`.`id` = '$id' ";














    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded

echo $stmt->rowCount() . " Записи ОБНОВЛЕНЫ успешно!";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>
