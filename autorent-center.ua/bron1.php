<?php 
include("include/db_connect.php");

 ?>
<!DOCTYPE html>
<html>
    <head>
       <title>Группировка полей формы</title>
       <meta charset="utf-8">
    
    </head>
    <body>
        
        <main>

            <form action="insert_into.php" method="POST" oninput="dayscountval.value=dayscount.value">
                <fieldset>

                    <legend>Бронювання автомобіля</legend>
<br>
    <label>Выбирите автомобиль <span class="red">*</span></label> 
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

                <input type="tel" id="phone" name="phone"pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="Формат: 099999899"  required>

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
                    <a href="/">Повернуться на головну сторінку</a>
                </div>
</fieldset>

                
            </form> 
        </main>
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
    margin: 60px auto ;
    padding: 20px;
    width: 45%; 
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px #ccc;
}
fieldset {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #c0392b;
}
fieldset legend{
color: #c0392b;
}
label {
    display: block;
    margin-bottom: 5px;
    margin: 10px;
}
input {
    margin-bottom: 10px;
    width: 95%;
    height: 34px;
    margin: 15px;
}
output {
    display: inline-block;
    margin: 0 5px 10px;
    width: 30px;
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
    height: 50px;
    border: none;
    border-radius: 5px;
    background: #2c3e50;
    color: #fff;
}
.one-third-width {
    width: 73.3%;
}
.two-third-width {
    width: 96.6%;
}
.half-width {
    width: 100%;
    margin-left: 15px;: 
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
    width: 60%;
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
    width: 95%;
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
</html>