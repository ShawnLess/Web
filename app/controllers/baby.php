<?php

class Baby extends Controller {

	public function __construct(){
		parent::__construct();
	}	

	public function baby(){
        if( Session::get('baby') == true){
		        Session::set('baby', false);
        }else{
            Session::set('baby', true);
        }
//      Session::set('baby', true);

        url::redirect('entries');
	}
}
