
<div class="cls">
	<div class="zag">
		<h1>Спецпропозиція</h1>
	</div>
	<div class="aktio">
		<img src="imeges/thumb-articleSmall-400x190-6cdc.jpg">

		<br>
		<br>
		<a onClick="showContent('innfo.php')">БЕЗКОШТОВНІ ДНІ ОРЕНДИ</a>

	</div>

          
	<div class="ak2">
		<img src="imeges/thumb-articleSmall-400x190-beae.jpg">
		<br>
		<br>
			<a onClick="showContent('bro.php')">Замовляйте завчасно зі знижкою</a>
            
	</div>

</div>
<div class="cls">
    <div class="zag">
        <h1>Спецпропозиція Травеня</h1>
    </div>
    <div class="aktio">
        <img src="imeges/thumb-articleSmall-400x190-6cdc.jpg">

        <br>
        <br>
        <a onClick="showContent('innfo.php')">БЕЗКОШТОВНІ ДНІ ОРЕНДИ</a>

    </div>

          
    <div class="ak2">
        <img src="imeges/thumb-articleSmall-400x190-beae.jpg">
        <br>
        <br>
            <a onClick="showContent('bro.php')">Замовляйте завчасно зі знижкою</a>
            
    </div>

</div>

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
