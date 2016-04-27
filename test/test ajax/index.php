<html>
<head>
		<style type="text/css">
		  div { width: 400px; height: 300px; float: left; margin: 5px; }
		  #premier { background-color: #F6E497; }
		  #troisieme { background-color: #CAF1EC; }
		  #quatrieme { background-color: #F1DBCA; }
	</style>
</head>
<body>


	<button id="majPremier">Mise à jour première zone</button>
	<button id="majDeuxieme">Mise à jour deuxième zone</button><br /><br />

	<div id="premier">
	  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	</div>

	<div id="deuxieme">
	  <img src="http://placehold.it/400x300">
	</div>

	<div id="troisieme">
	  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>

	<div id="quatrieme">
	  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
	</div>






<script src="jquery.js"></script>
<script>


  $(function()
  {
    $('#majPremier').click(function()
    {
      $('#premier').load('maj.html #part_1', function(){});
    });



    $('#majDeuxieme').click(function()
    {
      $('#deuxieme').load('maj.html #part_2', function(){});
    });

  });


</script>
</body>
<html>



