<?php 
include("include/db_connect.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Real-car.ua</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 

 <script src="js/jquery.min.js" type="text/javascript"></script>

        <script src="js/jquery.maskedinput.min.js"></script>
         <script src="js/inputmask.js"></script>

	<script> 
    function showContent(link) { 
        var cont = document.getElementById('contenttt'); 
        var loading = document.getElementById('loading'); 
        cont.innerHTML = loading.innerHTML;   
        var http = createRequestObject(); 
        if( http )  
        { http.open('get', link); 
            http.onreadystatechange = function ()  
            {   if(http.readyState == 4)  
                {   cont.innerHTML = http.responseText;  }    } 
            http.send(null);  } 
        else  
        {  document.location = link;   }   } 
    // ajax объект
    function createRequestObject()  
    {  try { return new XMLHttpRequest() } 
        catch(e)  
        {  try { return new ActiveXObject('Msxml2.XMLHTTP') } 
            catch(e)  
            {   try { return new ActiveXObject('Microsoft.XMLHTTP') } 
                catch(e) { return null; }   } } } 
</script>

<link rel="SHORTCUT ICON" href="/favicon.ico" type="image/x-icon">

</head>
<body >



<script src="js/scripts.js"></script>


<?php 
include("include/headers.php");

 ?>
<?php 

include("include/footer.php");
 ?>
<script>
showContent('content.php')
</script>





</body>
</html>
