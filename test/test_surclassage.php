<?php

function affiche_pre($var_a_print)
{
    ?><div class='col-xs-12' style='margin-bottom:50px;'><pre><?
        print_r($var_a_print);
    ?></pre></div><?
}





class user
{
	public $user;
	
	function __construct()
	{
		$this->user = 1;

		$this->user = new user_r($this->user);
		$this->user = new user_b($this->user);
		$this->user = new user_u($this->user);
	}
}

class user_r
{
	function __construct($user)
	{
		$user = $user +1;
	}
}



class user_b
{
	function __construct($user)
	{
		$user = $user +1;
	}
}



class user_u
{
	function __construct($user)
	{
		$user = $user +1;
	}
}




$user = new user();



affiche_pre($user);
