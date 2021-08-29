<?php 
include("include/db_connect.php");

 ?>

<br>
<br>
<br>


<div class="title22">
  <span class="title-line"> Авто-парк  <i class="fa fa-car"></i></span>
</div>


<br>
<br>
<br>

<div class="ddd">
<ul class="products">
<?php 

$stmt = $pdo->query("SELECT * FROM  `price` LEFT JOIN car ON price.price_id = car.id_car   ");

$stmt->execute();

if($stmt->rowCount() > 0){

    while($row = $stmt->fetch(PDO::FETCH_BOTH)){

     if  ($row["image"] != "" && file_exists("./uploads_images/".$row["image"]))
{
	$img_path = './uploads_images/'.$row["image"];
$max_width = 450; 
$max_height = 560; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}else
{
$img_path = "/imeges/no-image.png";
$width = 250;
$height = 260;
} 
      
      echo '<li class="product-wrapper">
   <div class="product">
    <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" /><br><br>
    <br><h5>Модель:</h5> <p class="line_block">' . $row['model'] . '</p><br><br>
      <h5>Марка:</h5> <p class="line_block">' . $row['marka'] . '</p><br><br>
      <h5>Обем:</h5><p class="line_block">' . $row['obem'] . '</p><br><br>
      <h5>Класс:</h5> <p class="line_block">' . $row['klass'] . '</p><br><br>
     <h5>Привод:</h5>  <p class="line_block">' . $row['privod'] . '</p><br><br>
   <h5>Топливо:</h5>  <p class="line_block">' . $row['toplivo'] . '</p><br><br>
    <h5>Коробка:</h5>   <p class="line_block">' . $row['koroka'] . '</p><br><br>
   <h5>Тип Кузова:</h5>   <p class="line_block">' . $row['tipkuzova'] . '</p><br><br>
   <h5>Ціна за добу:</h5>   <p class="line_block"><h2>' . $row['price'] . ' грн.</h2></p><br>
     
     <br>
     <br>
      <a href="bron1.php" class="scccc""><span>Забронювати</span></a>
      </div>
   </li>';
       

    }
}

 ?>
</ul>



</div>




