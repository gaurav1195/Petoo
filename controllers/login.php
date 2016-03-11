<?php
	
	class Login extends CI_Controller{

		function index() 
		{
			session_start();
			require_once __DIR__ . '\src\Facebook\autoload.php';

			$fb = new Facebook\Facebook([
			  'app_id' => '802076536591684',
			  'app_secret' => 'f7edb7c4c64f8d248e41238aadab981e',
			  'default_graph_version' => 'v2.4',
			  'persistent_data_handler'=>'session'
			  ]);

			$helper = $fb->getRedirectLoginHelper();

			$permissions = ['email']; // optional
			   
			try {
			   if (isset($_SESSION['facebook_access_token'])) {
			      $accessToken = $_SESSION['facebook_access_token'];
			   } else {
			      $accessToken = $helper->getAccessToken();
			   }
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			   // When Graph returns an error
			   echo 'Graph returned an error: ' . $e->getMessage();

			   exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			   // When validation fails or other local issues
			   echo 'Facebook SDK returned an error: ' . $e->getMessage();
			   exit;
			 }

			if (isset($accessToken)) {
			   if (isset($_SESSION['facebook_access_token'])) {
			      $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			   } else {
			      // getting short-lived access token
			      $_SESSION['facebook_access_token'] = (string) $accessToken;

			      // OAuth 2.0 client handler
			      $oAuth2Client = $fb->getOAuth2Client();

			      // Exchanges a short-lived access token for a long-lived one
			      $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

			      $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

			      // setting default access token to be used in script
			      $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
			   }

			   // redirect the user back to the same page if it has "code" GET variable
			   if (isset($_GET['code'])) {
			      header('Location: ./');
			   }

			   // getting basic info about user
			   try {
			      //$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
			      //$profile = $profile_request->getGraphNode()->asArray();
			      $response = $fb->get('/me');
			      $usernode = $response->getGraphUser();
			   } catch(Facebook\Exceptions\FacebookResponseException $e) {
			      // When Graph returns an error
			      echo 'Graph returned an error: ' . $e->getMessage();
			      session_destroy();
			      // redirecting user back to app login page
			      header("Location: ./");
			      exit;
			   } catch(Facebook\Exceptions\FacebookSDKException $e) {
			      // When validation fails or other local issues
			      echo 'Facebook SDK returned an error: ' . $e->getMessage();
			      exit;
			   }
			   
			   // printing $profile array on the screen which holds the basic info about user
			  // print_r($profile);
			   //echo 'Logged in as: ' . $usernode->getName();
			   $data['main_content'] = 'interface';
			   $data['name'] = $usernode['name'];
			   $this->load->model('add_user');
			   $email = $usernode['name'];
			   //echo $usernode['email'];
			 //  if(!($this->add_user->already_exists($email)))
			   		$this->add_user->add_users($usernode->getName(), $email);
			   $this->load->view('includes/template', $data);
			   // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
			} else {
			   // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
				echo '<link rel = "stylesheet" href="css/style.css" type="text/css" media="screen" charset = "utf-8">';
				echo '<script src=" http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
				echo '<link href="css/bootstrap.min.css"  rel="stylesheet" >';
				echo '<br /><br /><br /><br /><br /><h1 class="text-info" style="text-align:center;font-size:100px">Welcome to Petoo</h1>';
				$loginUrl = $helper->getLoginUrl('http://localhost:8081/petoo/', $permissions);	
			  	echo '<div class="container" style="vertical-align:center">';
			  		echo '<br /><br /><br /><br /><br />';
			  		echo '<a class="btn btn-lg btn-primary btn-block" href="' . $loginUrl . '" type="submit">Login With Facebook</a>';
				echo '</div>';
			}
		}

					
			
	}

	

?>  