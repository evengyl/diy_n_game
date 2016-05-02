 <?
    $hote = "mysql.hostinger.fr";
    $user = "u595216573_even";
    $Mpass = "legends";
    $base = 'u595216573_test';

    try
    {
    	$db_link  = mysqli_connect($hote, $user, $Mpass, $base)or die('erreur de connection');
    }
    catch (mysqli_sql_exception $e) { 
      throw $e; 
   }