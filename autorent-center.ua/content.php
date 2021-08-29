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
  <h1 class="title">Оренда нових автомобілів <br> з доставкою за адресою за годину</h1>

    <div class="container_slider_css">
  <img class="photo_slider_css" src="https://columbauto.com.ua/upload/iblock/62b/62b0991a84f5ffa7f653ead8ed5fef64.jpg" alt="">
  
  <img class="photo_slider_css" src="https://oceanica.com.ua/wp-content/uploads/2020/02/oc-%D0%B2-%D0%BD%D0%B0%D0%BB%D1%96%D1%87-01.jpg" alt="">

  <img class="photo_slider_css" src="https://www.ixbt.com/img/n1/news/2020/7/4/Tesla-wrap-hero_large.jpg" alt="">
  <img class="photo_slider_css" src="https://columbauto.com.ua/upload/iblock/f6a/f6a50dc24d469279de4c2d0f68659187.jpg" alt="">

</div>

<main>

            <form action="insert_into.php" method="POST" oninput="dayscountval.value=dayscount.value">
                <fieldset>

                    <legend>Бронювання автомобіля</legend>
<br>
    <label>Оберіть автомобіль <span class="red">*</span></label> 
    <?php  

                       $stmt = $pdo->query("SELECT model, marka, obem FROM  `car`   ");


echo '<select id="country" name="country" class="country" >';
 echo '<option value="mark11a" id="ff"  placeholder="Выбрать автомобиль"></option>';
while($row = $stmt->fetch(PDO::FETCH_BOTH)){


 echo '<option> '.$row['marka'].'  '.$row['model'].' ' . $row['obem'] . ' л.</option>';

                                               
                        }
                        
                         echo '</select>';




?>



        
          <label>ПІБ  <span class="red">*</span></label> 
          <input type="search" name="fio" value="" required>
                <div class="one-third-width">
                  <label for="phone">Номер телефона:  <span class="red">*</span></label>

        <input  id="phone" name="phone" class="mask-phone form-control" required>

                   
 
<script>
$('.mask-phone').mask('+38 (999) 999-99-99');
</script>


       <label>Адрес подання</label> 
          <input type="search" name="adres" value=""   required>

                    <label>Дата</label> 
                    <input type="number" min="1" max="31" name="day" value="17">
                </div>
                <div class="two-third-width">
              <label>Місяць</label> 

  
                    <input type="month" name="month" value="2021-03">
          </div>
          <div class="half-width">
              <label>Кількість днів</label>
              1 <input type="range" min="1" max="31" step="1" name="dayscount" value="2"> 31
          </div>
          <div class="half-width output-area">
              <output name="dayscountval">2 </output>- кіл.дней
          </div>
        
          <div class="buttons">

            <input type="submit" value="Забронювати"><br><br>
                    
          </div>
</fieldset>

                
        </form> 
        </main>


 <div class="text-right">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="slider22">
                                    <h1>ЗАБРОНЮЙТЕ АВТО СЬОГОДНІ!</h1>
                                    <p>ЗА НИЗЬКУ ВІД 250 грн. НА ДЕНЬ ПЛЮС 15% СКИДКА <br>ДЛЯ НАШИХ КЛІЄНТІВ, ЩО ПОВЕРТАЮТЬСЯ</p>

                                </div>

                            </div>
                        </div>

                    </div>\


        <br>
        <br>
        <br>
        <br><br><br><br>
        <br>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <br>
        <br>
        <br>

    </body>

    <style type="text/css">
      
form {
   margin: 50px;
   float: left;
    padding: 20px;
    width: 44%; 
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px #ccc;
}
fieldset {
    padding: 20px;
    border-radius: 5px;
    border: 1px solid #c0392b;
}
fieldset legend{
color: #c0392b;
}
label {
    display: block;
    margin-bottom: 5px;
}
input {
    margin-bottom: 30px;
    width: 100%;
    height: 34px;
}
output {
    display: inline-block;
    margin: 0 5px 10px;
    width: 70px;
    height: 20px;
    text-align: center;
}
input, output {
    padding: 2px 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    vertical-align: middle;
    font-family: "Roboto";
}
input[type="submit"] { 
    display: inline-block;
    margin: 0 5px;
    padding: 6px 15px;
    width: auto;
    height: auto;
    border: none;
    border-radius: 5px;
    background: #2c3e50;
    color: #fff;
}
.one-third-width {
    width: 100%;
}
.two-third-width {
    width: 100%;
}
.half-width {
    width: 100%;
}
.one-third-width,
.two-third-width, 
.half-width {
    display: inline-block;
    margin-right: -4px;
}
.one-third-width input,
.two-third-width input {
    width: 100%;
}
.half-width input {
    width: 100%;
}
.half-width input[type="range"] {
    width: 50%;
}
.output-area {
    vertical-align: top;
}
.buttons {
    margin-top: 10px;
    text-align: center;
}

.country{
  margin-bottom: 10px;
    width: 50%;
    height: 34px;
       margin: 15px;
        padding: 2px 5px;
    border: 1px solid #ccc;
}

 option{
font-size: 16px;
 font-family: Arial,Helvetica,sans-serif;
}
    </style>
  </div>

	</div>

</div>

</div>












<br>
<br>
<br><br>
<br>
<br><br>
<br>
<br>

<br>

           
     
<div class="title22">
  <span class="title-line"> ВИБЕРИ СВІЙ АВТОМОБІЛЬ <i class="fa fa-car"></i></span>
</div>

      

<br>
<br><br>
<br>
<br><br>
<br>
<br>


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
<br>
<div class="ddd">
  

<ul class="products">
<?php 

$stmt = $pdo->query("SELECT * FROM  `price` LEFT JOIN car ON price.price_id = car.id_car  LIMIT 8 ");

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

