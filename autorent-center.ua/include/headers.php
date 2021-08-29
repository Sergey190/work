<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div id="logo">

<div class="imegess">
	 <p><a href="http://autorent-center.ua"><img src="imeges/logo.png" width="210" 
   height="60" title="real-car.ua"></a></p>

</div>



<div class="phon">
	<p><img src="imeges/15.jpg" width="30" 
   height="30" title="real-car.ua"></p>

</div>

	<div class="nomber">
		
		<nav>
  <ul class="topmenu">
    <li><a href="">Зв'язатися з нами 24/7</a>
       <ul class="submenu">
       	<li><a href="">0989911777</a>
    <li><a href="">0991911777</a></li>
     <li><a href="">0679911777</a></li>
     <li><a href="">0749911777</a></li>
     </ul>
    </li>
<div class="reg">
  <div class="viev">
  
    <?php if ( isset ($_SESSION['login']) ) : ?>
  Авторизован! <br/>
  Привет, <?php echo $_SESSION['logged_user']->login; ?>!<br/>

  <a href="logout.php">Выйти</a>

<?php else : ?>

  <a href="reg.php">Реєстрація/Авторізація</a>
<?php endif; ?>
  </div>
  <br>

</div>
</ul>

</nav>
	</div>

</div>







<div id="head" >

	<nav id="navigation" class="navbar sticky-top navbar-expand-lg navbar-light bg-light" role="navigation" >
    <div class="container">


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop2" aria-controls="navbarTop2" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="line"></span> 
        <span class="line"></span> 

        <span class="line" style="margin-bottom: 0;"></span>
      
      </button>


      <div class="collapse navbar-collapse" id="navbarTop2"  >
        <ul class="navbar-nav mr-auto" >
          <li class="nav-item">
            <a onClick="showContent('content.php')"  class="nav-link" >ГОЛОВНА</a>
          </li>
          <li class="nav-item dropdown">

      <a onClick="showContent('autopark.php')" class="nav-link ">АВТОПАРК</a>
            
          </li>
          <li class="nav-item">
            <a onClick="showContent('actions.php')" class="nav-link"   >АКЦІЇ</a>
          </li>
          <li class="nav-item">
            <a  onClick="showContent('yslovie.php')" class="nav-link" >УМОВА ПРОКАТУ</a>
          </li>
          <li class="nav-item dropdown">

             <a  href="login.php" class="nav-link" >ОНЛАЙН ЧАТ</a>
            
          </li>
          <li class="nav-item dropdown">
          <a onClick="showContent('contakt.php')" class="nav-link"   >КОНТАКТ</a>
          </li>
          
          </ul>
      </div>
    
         
                         </span>
                     </div>
                  </form>
              </div> 
          </li>
       </ul>
    </div>
</nav>



</div>

<div id="contenttt">
    <!-- CONTENT -->
</div> 
    <div id="loading" style="display: none"> 
   Йде завантаження... 
    </div> 
    
  


<style>

    



.nav-link{padding:5px;
margin: 15px;

}
.navbar-light .navbar-nav .nav-link{color:white;font-weight:600;}



li.nav-item.active a.nav-link,li.nav-item:hover a.nav-link,li.nav-item:focus a.nav-link,li.nav-item a.nav-link:hover,li.nav-item a.nav-link:focus{color:#fff}

.bg-light {
    background-color: black!important;
}
 .bg-light a:hover{
color: #DFDFDF;
background-color: red;
cursor: pointer;
}

.dropdown-menu{border-radius:0 }


.navbar-toggler{
    width: 47px;
    height: 34px;
    background-color: #7eb444;
    border:none;
}
.navbar-toggler .line{
    width: 100%;
    float: left;
    height: 2px;
    background-color: #fff;
    margin-bottom: 5px;
}
@media (min-width: 768px) {
.top-add{text-align: right}
}
@media (min-width: 991px) {
.dropdown-toggle::after{display:block;background-color:red;margin-left:auto;margin-right:auto;vertical-align:0;width:3px}

}
@media (max-width: 991px) {
#navbarTop2{border-top:1px solid;margin:0 15px}
li.nav-item{padding:0 15px}
}
@media (max-width: 767px) {
#navbarTop{margin:0 15px}
.logotip{text-align: center;margin-bottom: 10px}    
}
</style>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
