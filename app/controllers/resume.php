<?php

class Resume extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function resume(){

		Session::set('baby', false);
		$data['title'] = 'Resume';

		$this->view->rendertemplate('header',$data);
		$this->view->render('resume/resume',$data);
		$this->view->rendertemplate('footer',$data);
	}

}
