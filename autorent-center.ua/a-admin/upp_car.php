

<?php





$servername = "localhost";
$username = "Admin";
$password = "123456";
$dbname = "arenda";





$id = $_POST['id'];


$model = $_POST['model'];

$marka = $_POST['marka'];
$obem = $_POST['obem'];

$klass = $_POST['klass'];

$privod = $_POST['privod'];

$toplivo = $_POST['toplivo'];
$koroka = $_POST['koroka'];

$tipkuzova = $_POST['tipkuzova'];
$poskodjena = $_POST['poskodjena'];








    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE `car` SET `model` = '$model', `marka` = '$marka', `obem` = '$obem', `klass` = '$klass', `privod` = '$privod', `toplivo` = '$toplivo', `koroka` = '$koroka', `tipkuzova` = '$tipkuzova',`poskodjena`='$poskodjena' WHERE `car`.`id_car` = '$id' ";






    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded



?>
