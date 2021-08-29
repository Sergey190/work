    <?php


if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторізація и Реєстрація</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<!-- Форма авторизации -->





    <form action="vendor/signin.php" method="post">
        <label>Логін</label>
        <input type="text" name="login"  placeholder="Введите свой логин" >
        <label>Пароль</label>
        <input type="password" name="pass" placeholder="Введите пароль">
       
        <button type="submit" name="do_login">Війти</button>
        <p>
           У вас немає облікового запису? - <a href="/register.php">зареєструйтеся</a>!
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