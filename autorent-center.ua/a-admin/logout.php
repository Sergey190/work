<?php
require_once './config/config.php';
session_start();
session_destroy();


if(isset($_COOKIE['series_id']) && isset($_COOKIE['remember_token'])){
	clearAuthCookie();
}
header('Location:users.php');
exit;

 ?>