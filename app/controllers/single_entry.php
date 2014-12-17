<?php

class Single_entry extends Controller{

  private $_entries;

	public function __construct(){
		parent::__construct();
    $this->_entries = $this->loadModel('entries_model');
	}
	

  //Display the entries. The parameters is a string dilemeted by "/"
  //The first parameter set the display method, the second parameter
  //set the parameters for the display method.
  //===============================================================
  // url:   display the single entries, fetched by 'url'.

	public function index($args ='pages=0-10'){
	  $args_array    = explode("=", $args);
	  $url           = $args_array[1];
	  
    $data['title'] = urldecode($url);
    ///////////////////////////////////////////////////////////
    //Generate the entries data 
    $data['entry'] = $this->_entries->get_entry_by_url($url);

    //Generate the comments data 
    $data['comments'] = $this->_entries->get_comments_by_url($url);
    
    //Generate the archive data
    $data['archives']=$this->_entries->get_archives();
    
    //Generate the tags data
    $data['most_tag_names']= $this->_entries->get_mostused_10_tags();
        
    $this->view->rendertemplate('header',$data);
    $this->view->render('entries/single_entry',$data);
    $this->view->render('entries/tags',$data);
    $this->view->render('entries/archives',$data);
    $this->view->rendertemplate('footer',$data);
	}

public function add(){
    if(Session::get('loggin') == true) {
		if(isset($_POST['submit'])) {
            if( $_POST['submit']=='Save' ) {
			    $title = $_POST['title'];
			    $entry = $_POST['entry'];
			    $tags  = urlencode($_POST['tags']);

                if(empty($title)){ $error[] = 'Please enter the title'; }
                if(empty($entry)){ $error[] = 'Please enter the entries'; }
                if(empty($tags)){ $error[] = 'Please enter the tags'; }

                if(!isset($error)){
			        /****************************************************/
                    /********** Update the entries table  ***************/
                    $url = $this->_make_url(urlencode($title));
                    $postdata = array(
                        'title' => $title,
                        'entry' => $entry,
                        'tags'  => $tags,
                        'url'   => $url
                    );
                    $this->_entries->add_entry($postdata);
                    /****************************************************/
                    /********** Update the tags table     ***************/
                    $this->_entries->add_tags_if_need($tags);

                    /****************************************************/
                    /********** Update the blog_tag table ***************/
                    $stored_entry = $this->_entries->get_entry_by_url( $url );
                    $this->_entries->add_blog_tag($stored_entry[0]->id, $tags);
                } //end of  if(!isset($error))
            } //end of if( $_POST['submit']=='Save' )
            Url::redirect('entries/index/pages=0,10');
        }

        $data['title'] = 'Add Entry';

        $this->view->rendertemplate('header',$data);
        $this->view->render('entries/add',$data,$error);
        $this->view->rendertemplate('footer',$data);	
    }
}

public function comment_add($blog_id){
    if(isset($_POST['submit'])) {
        if( $_POST['submit']=='Submit Comment' ) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];

            if(empty($name)){ $error[] = 'Please enter the name'; }
            if(empty($email)){ $error[] = 'Please enter the email'; }
            if(empty($comment)){ $error[] = 'Please enter comment'; }

            if(!isset($error)){
                /****************************************************/
                /********** Update the entries table  ***************/
                $postdata = array(
                    'name' => $name,
                    'email' => $email,
                    'comment'  => $comment,
                    'blog_id'       => $blog_id
                );
                $this->_entries->add_comment($postdata);
                    
            } //end of  if(!isset($error))
        } //end of if( $_POST['submit']=='Save' )
        $entry =$this->_entries->get_entry ($blog_id) ;
        $url = $entry[0]->url;
        Url::redirect('single_entry/url='.$url);
    }

    $data['title'] = $url;

    $this->view->rendertemplate('header',$data);
    $this->view->render('entries/single_entry',$data);
    $this->view->render('entries/tags',$data);
    $this->view->render('entries/archives',$data);
    $this->view->rendertemplate('footer',$data);
}

public function confirm_comment_delete($id){
	if(Session::get('loggin') == true) {
		//This is to handle the submit
        if(isset($_POST['submit']) ) {
            if( $_POST['submit'] == 'delete') { $this->_entries->delete_comment($_POST['id']); }
            Url::redirect('entries/index/pages=0,10');	
        }

		$data['title'] = 'Confirm Delete';
		$data['comment'] =  $this->_entries->get_comment($id);

		$this->view->rendertemplate('header',$data);
		$this->view->render('entries/confirm_comment_delete',$data);
		$this->view->rendertemplate('footer',$data);	
	  }
}

	public function confirm_delete($id){
	if(Session::get('loggin') == true) {
		//This is to handle the submit
    if(isset($_POST['submit']) ) {
      if( $_POST['submit'] == 'delete') { $this->_entries->delete_entry($_POST['id']); }
      Url::redirect('entries/index/pages=0,10');	
    }

		$data['title'] = 'Confirm Delete';
		$data['entries'] =  $this->_entries->get_entry($id);

		$this->view->rendertemplate('header',$data);
		$this->view->render('entries/confirm_delete',$data,$error);
		//$this->view->render('entries/entries',$data);
		$this->view->rendertemplate('footer',$data);	
	  }
	}
	
	public function edit($id){
    if(Session::get('loggin') == true) {
		if(isset($_POST['submit'])){
		  if( $_POST['submit']=='Update') {

			  $title = $_POST['title'];
			  $tags  = urlencode($_POST['tags']);
			  $entry = $_POST['entry'];

			  if(empty($title)){ $error[] = 'Please enter the title'; }
              if(empty($tags)) { $error[] = 'Please enter the tags';  }
			  if(empty($entry)){ $error[] = 'Please enter the entries'; }

			  if(!isset($error)){
				  $postdata = array(
					  'title' => $title,
					  'entry' => $entry,
					  'tags'  => $tags,
					  'url'   => $this->_make_url(urlencode($title))
				  );
				
				  $this->_entries->update_entry($postdata, array('id' => $id));
			  }
      } //endif of if($_POST['submit']=='Update')
      
      Url::redirect('entries/index/pages=0,10');
      
		}// endif of if(isset($_POST['submit']))

		$data['title']    = 'Edit Entry';
    $data['entries']  = $this->_entries->get_entry($id);

		$this->view->rendertemplate('header',$data);
		$this->view->render('entries/edit',$data,$error);
		$this->view->rendertemplate('footer',$data);	
		}
	}	
	private  function _make_url($title){
    $patterns = array('/\s+/');
    $replacements = array('-' );
    return preg_replace($patterns, $replacements, strtolower($title));
  }

}
