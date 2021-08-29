<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>ПІБ</label>
        <input type="text" name="fio" placeholder="Введіть своє повне ім'я">
     <div class="form-group">Адрес *</label>
      <input type="text" name="adres" id="disabledTextInput" class="form-control" placeholder="Адрес" required>

    </div>
       <div class="form-group">Номер телефону *</label>
      <input type="text" name="phone" class="mask-phone form-control" placeholder="Номер телефона" required>
 
<script>
$('.mask-phone').mask('+38 (999) 999-99-99');
</script>
    </div>
      <div class="form-group">Emaill *</label>
      <input type="text"  name="emaill" id="contactsForm" class="form-control" placeholder="Emaill" required>
    

    </div>
      <div class="form-group">Дата народження</label>
      <input id="date" name="month"value="1231" type="text" tabindex="1" class="form-control" placeholder="Дата народження" >

    </div>
    <div class="form-group">ІНН</label>
      <input id="inn" name="inn" value="" type="text" tabindex="1" class="form-control" placeholder="ІНН " >

    </div>
    <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="pass" placeholder="Введите пароль">
     

        <button type="submit">Зареєструватися</button>
        <p>
          У вас вже є аккаунт? - <a href="reg.php">авторизуйтесь</a>!
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>