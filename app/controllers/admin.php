<?php

class Admin extends Controller {

	public function __construct(){
		parent::__construct();
	}	

	public function login(){

		if(Session::get('loggin') == true){
			url::redirect('');
		}

		if(isset($_POST['submit'])){
            if($_POST['submit'] == 'login' ) {
			    $username = $_POST['username'];
			    $password = $_POST['password'];

			    $admin = $this->loadModel('admin_model');

			    if(Password::verify($password, $admin->get_hash($username)) == false){
				    die('wrong username or password');
                } else {
				    Session::set('loggin',true);
				    Url::redirect('');
                }
            }
            Url::redirect('');  //user cancelled the login precedure.
		}

		$data['title'] = 'Login';

		$this->view->rendertemplate('header',$data);
		$this->view->render('admin/login',$data);
		$this->view->rendertemplate('footer',$data);	
	}

	public function logout(){

		Session::destroy();
		Url::redirect('');

	}
}
