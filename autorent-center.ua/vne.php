<?php 
include("include/db_connect.php");

 ?>
<div id="conntent">
	<div class="vid">
		<div class="page">
 
  <div class="page-video">
    <video class="video" loop="loop" autoplay="" muted="" poster="">
      <source src="https://cdn.videvo.net/videvo_files/video/free/2016-09/small_watermarked/160820_121_NYC_OutOfFocusCarLights_1080p_preview.webm" type="video/mp4" />
    
    </video>

  </div>
 
  <div class="content">
    <h1 class="title">Оренда нових автомобілів з доставкою за адресою за годину</h1>
    <a onClick="showContent('bron.php')" class="button24">Взяти на прокат авто</a>
  </div>
  
	</div>

</div>

</div>



<ul class="hr20">
 
  <li>
  <li>
     <a onClick="showContent('biz.php')">Бізнес клас</a>
  </li>
  <li>
    <a onClick="showContent('ek.php')">Економ клас</a>
  </li>
  <li>
    <a onClick="showContent('vne.php')">Позашляховик </a>
  </li>
  <li>
    <a onClick="showContent('ctan.php')">Стандарт </a>
  </li>
</ul>
<br>
<br>
<br><br>
<br>
<br><br>
<br>
<br>

<br>
<br>
<br>
<ul class="products">
<?php 


$stmt = $pdo->query("SELECT * FROM  `price` LEFT JOIN car ON price.price_id = car.id_car WHERE klass = 'Внедорожники'  LIMIT 8 ");
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


