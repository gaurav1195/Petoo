<?php
	
	class Logout extends CI_Controller{

		function index() 
		{
		   session_start();
		   session_unset();
		   
		   $_SESSION['FBID'] = NULL;
		   $_SESSION['FULLNAME'] = NULL;
		   $_SESSION['EMAIL'] =  NULL;
		   header("Location: http://localhost:8081/petoo/");   
		}
	}     
?>