
<?php

//include("include/db_connect.php");
$pdo = new PDO('mysql:host=localhost;dbname=arenda','Admin','123456');

?>


    

<?php 

function uploadImage($image)

{


 $extension = pathinfo($image['name'], PATHINFO_EXTENSION);

 $filename = uniqid() . "." . $extension;

 move_uploaded_file($image['tmp_name'], "uploads_images/" . $filename);

return $filename;

 }

$filename = uploadImage($_FILES['image']);





$sql = "INSERT INTO `car` (`id_car`,`model`, `marka`,`obem`, `klass`,`privod`, `toplivo`,`koroka`, `tipkuzova`, `image`,`goss`, `vin`,`poskodjena`) VALUES  (NULL,:model, :marka,:obem,:klass,:privod,:toplivo,:koroka,:tipkuzova,:image,:goss,:vin,:poskodjena)";




$statement = $pdo->prepare($sql);

$statement ->bindParam(":model", $_POST['model']);
$statement ->bindParam(":marka", $_POST['marka']);
$statement ->bindParam(":obem", $_POST['obem']);
$statement ->bindParam(":klass", $_POST['klass']);
$statement ->bindParam(":privod", $_POST['privod']);
$statement ->bindParam(":toplivo", $_POST['toplivo']);
$statement ->bindParam(":koroka", $_POST['koroka']);
$statement ->bindParam(":tipkuzova", $_POST['tipkuzova']);
$statement ->bindParam(":image", $filename);
$statement ->bindParam(":goss", $_POST['goss']);
$statement ->bindParam(":vin", $_POST['vin']);
$statement ->bindParam(":poskodjena", $_POST['poskodjena']);

$statement ->execute();

?>


<br>
<br>
<div class="oke">
    <img src="imeges/dd.png" class="fig" width="450" ><br><br>
    <h3>Авто успешно добавлен!</h3><br>
  
<style type="text/css">
    
    .oke{
text-align: center;
    }
</style>
</div>

<?php include_once 'includes/footer.php'; ?>