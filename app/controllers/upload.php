<?php

class Upload extends Controller{

  private $_upload; 

	public function __construct(){
		parent::__construct();
    $this->_upload = $this->loadModel('upload_model');
	}
	

/**********************************************
* Handle the uploaded images.
***********************************************/
public function upload(){
    if(!empty($_FILES['FilePath']['tmp_name'])){
        try {
            /*The maximum image width is restricted by the width of the blog contianer*/
            /* The maximum file size is constrained in .httpaccess file*/
            $img_name = $this->_upload->processUploadedImage($_FILES['FilePath'], "/Shawn/files/", array(520, 1024), FALSE);
        }catch(Exception $e){
            echo ($e->getMessage());
            die($e->getMessage());
        }
    }else{
			$img_name=NULL;
    }
    /****************************
     *  output the result of the uploading
    *****************************/
    if (	$img_name  )  {
        echo  DIR.'files/'.$img_name;
    }else{
        echo "failed";
    } 
}

}
