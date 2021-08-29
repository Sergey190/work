<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Вхід в аккаут </header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Логін</label>
          <input type="text" name="email" placeholder="ivanov@gmail.com" required>
        </div>
        <div class="field input">
          <label>Пароль</label>
          <input type="password" name="password" placeholder="Введите свой пароль" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Войти в чат">
        </div>
      </form>
      <div class="link">Ще не зареєструвалися? <a href="ff.php">Зареєструватися </a></div>
       <div class="link">Повернутися на главну сторінку: <a href="http://autorent-center.ua">Перейти</a></div>
    </section>

  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
