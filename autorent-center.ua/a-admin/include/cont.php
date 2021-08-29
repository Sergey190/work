<?php 
include("include/db_connect.php");







 ?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 18px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 18px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <a href="/a-admin">Главная</a>
  <a href="#services">Автомобили</a>
  <a href="#clients">Сдать в ареду</a>
  <a href="#contact">Добавить автопарк</a>
   <a href="/">Перейти на сайт</a>
</div>







<style>
#line_block { 
        width:270px; 
        height:90px; 
        color: white;
        background:black; 
        float:left; 
        margin: 10px 5px 5px 10px; 
        text-align:center;
        padding: 10px;
      font-size: 18px; /* Increased text to enable scrolling */
  margin-left: 180px;

        
        }
</style>







  <?php 

$stmt = $pdo->query("SELECT id, profit  FROM  `zakas`");

$total = 0;
$total2 = 0;

$stmt->execute();

if($stmt->rowCount() > 0){
while($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    $total += $row['id'];
      $total2 += $row['profit'];
   }
  }

 echo '<div id="line_block">';
 echo '<p class="datenews">Количество заказов:' . $total . '<br /></p>';
 echo '</div>';

      echo '<div id="line_block">';
      echo '<p class="datenews">Доход:' . $total2 . '<br /></p>';
      echo '</div>';

 ?>




<div class="ssa1">
  <label>Поиск</label>
<input type="text" name="1" placeholder="Поиск">
<button>Поиск</button>

</div>









<br>
<br>
<div class="main">
<div class="table-wrap">
  <table class="table-3">
  <thead>

    <tr>
 
<td>Автомобиль</td>
<td>ФИО</td>
<td>Нормер тел.</td>
<td>Адрес подачи</td>
<td>Дата подачи</td>
<td>Количество дней</td>
<td>Цена за сутки</td>
<td>Сума штрафа</td>
<td>Итоговая сумма</td>
<td>Редактирование</td>
<td>Удалить</td>
    </tr>

  </thead>
  <tbody>


<?php 

$stmt = $pdo->query("SELECT *, (round((koll * price) +shraf,2)) as profit  FROM  `zakas`   LEFT JOIN `price`  ON zakas.id = price.id");

$stmt->execute();

if($stmt->rowCount() > 0){

   while($row = $stmt->fetch(PDO::FETCH_BOTH)){

   


echo '
    <tr>
    
        <td>' . $row['car'] . '</td>
        <td>' . $row['fio'] . '</td>
        <td>' . $row['number'] . '</td>
        <td>' . $row['adres'] . '</td>
        <td>' . $row['data']  . $row["mes"]. '</td>
        <td>' . $row['koll'] . '</td>
        <td>' . $row['price'] . ' грн.</td>
        <td>' . $row['shraf'] . ' грн.</td>
         <td>' . $row['profit'] . '  грн.</td>
         <td>' . '<a href="delete-form-page.php?id=' . $row['id'] . '">Изменить </a></td>
        <td>' . '<a href="delete-form-page.php?id=' . $row['id'] . '">Удалить </a></td>
    </tr>' . "\n";
    }
}



 ?>



</tbody>
</table>

</div>
     </div>


</body>
</html> 



