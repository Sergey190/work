  <div class="wrapper">
    <section class="users">
     

      <header>
        <?php 
            $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
  <p><a href="http://autorent-center.ua"><img src="imeges/logo.png" width="200" 
   height="50" title="real-car.ua"></a></p>

  <nav>

   
        
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
  
     <span><?php echo $row['fname']. " - " . $row['lname'] ?></span>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Выйти</a>
  </nav>
</header>
    </section>



  </div>