<?php

class Entries extends Controller{

  private $_entries; 

	public function __construct(){
		parent::__construct();
    $this->_entries = $this->loadModel('entries_model');  
	}
	  
	public function entries(){
	  $this->index('pages=0,10');
	}

  //Display the entries. The parameters is a string dilemeted by "/"
  //The first parameter set the display method, the second parameter
  //set the parameters for the display method.
  //===============================================================
  // month: display the entries posted in specific month.
  // tag  : display the entries with tags.
  // pages: display the entries in pages.

	public function index($args ='pages=0,5'){
	  $args_array    = explode("=", $args);
	  $method        = $args_array[0];
	  $para          = $args_array[1];
	  
		$data['title'] = 'Blogs';
		///////////////////////////////////////////////////////////
		//Generate the entries data 
		switch( $method ){
		    case 'month':
		        $month_year = explode(',', $para);
		        $data['entries'] = $this->_entries->get_entries_by_month($month_year[0], $month_year[1]);
		        break;
		    case 'tag':
		        $data['entries'] = $this->_entries->get_entries_by_tag($para);
		        break;
        case 'pages':
            $data['entries'] = $this->_entries->get_entries_by_range($para);
            break;
        default:              //get entry by pages.
            $data['entries'] = $this->_entries->get_entries();
		    break;   
		}
    //Generate the comments data
    $id_list=  array();
    foreach ( $data['entries']  as $record )  {
        $counts =$this->_entries->get_comment_count_by_blogid($record->id);
        array_push(  $id_list,   $counts[0]->num  );
    }

    $data['comments_count'] = $id_list;
    //Generate the archive data
    $data['archives']=$this->_entries->get_archives();

    //Generate the tags data
    $data['most_tag_names']= $this->_entries->get_mostused_10_tags();
        
    $this->view->rendertemplate('header',$data);
    $this->view->render('entries/entries',$data);
    $this->view->render('entries/tags',$data);
    $this->view->render('entries/archives',$data);
    $this->view->rendertemplate('footer',$data);
	}
}
