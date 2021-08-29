

<?php 

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'Admin', '123456', 'arenda');


$result = $mysql->query("SELECT * FROM `kilent` WHERE `login` = '$login' AND `pass` = '$pass'");


$user = $result->fetch_assoc(); // Конвертируем в массив
if(count($user) == 0){
    echo "Такой пользователь не найден.";
    exit();
}
else if(count($user) == 1){
    echo "Логин или праоль введены неверно";
    exit();
}



$mysql->close();


 ?>
 <div class="oke">
    <img src="../imeges/dd.png" class="fig" width="450" ><br><br>
    <h3>Ви успішно авторозувались!</h3><br>
    <a href="/">Повернутися на головну сторінку</a>
  
<style type="text/css">
    
    .oke{
text-align: center;
    }
</style>
</div>