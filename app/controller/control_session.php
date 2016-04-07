<?php
if(isset($_SESSION))
{
	if(isset($_SESSION['pseudo']))
	{
		if($_SESSION['pseudo'] != '')
		{
			if($_SESSION['level'] != '')
			{
				//acces au jeu en lui même 
				
			}
			else
			{
				//on renvoi sur la page d'acceuil
			}
		}
		else
		{
			header('Location:index.php');
		}
	}
	else
	{
		
		//on renvoi sur la page d'acceuil		
	}
}


?>