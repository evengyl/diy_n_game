<html>
<head>
<title>Test</title>
<script text="javascript">

function timer()
{
  comp = setTimeout("go()",500);
}

function getXhr()
{
  var xhr = null; 

  if(window.XMLHttpRequest) // Firefox et autres
     xhr = new XMLHttpRequest();
  else
  {
    alert("Votre navigateur ne supporte pas les objets JS ajax..."); 
    xhr = false; 
  } 
  
  return xhr
}

function go()
{
  var xhr = getXhr()
   // On défini ce qu'on va faire quand on aura la réponse
  xhr.onreadystatechange = function()
  {
     // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
    if(xhr.readyState == 4 && xhr.status == 200)
    {
     
      var html = xhr.responseText;
      document.getElementById('heure_serveur').innerHTML = html;
        
    }
    else if(xhr.status == 404)
    {
      alert("Erreur 404"); 
    }
  }
  xhr.open("GET","essai.php",true);
  xhr.send(null);
  setTimeout('go()',500);
}
</script>   
</head>

<body onload='timer()'>
   <div id="heure_serveur">
      <?php echo date('l jS \of F Y h:i:s A'); ?>
    </div>
</body>
</html>