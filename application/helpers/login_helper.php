<?php

if (!defined('BASEPATH')) {exit('No direct script access allowed');}

function is_login()
{
	if (!empty($_SESSION['userid']) || !empty($_COOKIE['userid']))
	{
		return TRUE;
	}

	redirect('/');
}
?>
