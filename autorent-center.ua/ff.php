<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  
  <div class="wrapper">
    <section class="form signup">
      <header>Наш чат real-car.ua
      </header>
        <a  class="link" href="index.php"></a>
 <div class="link">Вернуться на гланую страницу: <a href="http://autorent-center.ua">Перейти</a></div>



      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>Ім'я</label>
            <input type="text" name="fname" placeholder="Иван" required>
          </div>
          <div class="field input">
            <label>Прізвище</label>
            <input type="text" name="lname" placeholder="Иванов" required>
          </div>
        </div>
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="Введите email" required>
        </div>
        <div class="field input">
          <label>Пароль</label>
          <input type="password" name="password" placeholder="Введите пароль" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Оберіть логотип</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Зарегистрироваться ">
        </div>
      </form>
      <div class="link">Вже зареєстровані? <a href="login.php">Увійти зараз</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
