
<?php
/*
Filename: upload_module.php
Created : 2014-12-9
Author  : Shawnless.xie@gmail.com
Function: the model to handle the uploaded files. 
*/

class Upload_model  extends Model {

    /*The directory in which the uploaded file will be placed.*/
    public $save_dir;
    /*The Maximun dimension of the images. Oversized images will be resampled*/
	public $max_image_dims;
    
	public function __construct(){
        parent::__construct();
	}
	/**
	 * Resizes/resamples an image upload via a web form
	 * 
	 * @param array     $file : the array contained in $_FILES;
     * @param string    $dest_path: the dir into which the uploade file will be saved
     * @param array     $max_dims: the maximum dimension of the images.
	 * @return string :  the name of the resized uploaded file; 
	 */
	public function processUploadedImage($file,$dest_path, $max_dims, $rename=TRUE){
        $this->save_dir       = $dest_path;
        $this->max_image_dims   = $max_dims;
		//Seperate the uploaded file array
		list($name,$type, $tmp, $err, $size) = array_values($file);
		//If an error occured,throw an exception.
		if($err != UPLOAD_ERR_OK){
			throw new Exception('An error occured with the upload');
			return;
		}
        
		$this->doImageResize($tmp);
		
		$this->checkSaveDir();
		
		if($rename== TRUE){
			$img_ext = $this->getImageExtension($type);
			$name    = $this->renameFile($img_ext);
		}
		
		//Creat the full path to the image for saving
		$filepath = $this->save_dir .$name;
		$absolute = $_SERVER['DOCUMENT_ROOT'].$filepath;
		
		if( !move_uploaded_file($tmp,$absolute)){
			throw new Exception("Could't save the uploaded file");
		}
		return $name;
	}
    /**********************************************
	 * Does the directory to be saved is writable ? 
	 ***********************************************/
	private function checkSaveDir(){
		$path=$_SERVER['DOCUMENT_ROOT'].$this->save_dir;
		if( !is_dir($path)){
			if( ! mkdir($path, 0777, true)){
				throw new Exception("Can't creat the directory");
			}
		}
	}
    /**********************************************
	 * Generates a random file name.
     * @para  string $ext： the extension of the uploaded file.
     * @return    string      :  the generated file name
	 ***********************************************/
    private function renameFile($ext){
		return time().'_'.mt_rand(1000,9999).$ext;
	}
    /**********************************************
	 *Get the file name extension.
     * @para  string $type： the MIME type string 
     * @return    string      :     the file name extension string
	 ***********************************************/
    private function getImageExtension($type){
		switch(strtolower($type) ){
			case 'image/gif': return '.gif';
			case 'image/jpeg':
			case 'image/jpg': return '.jpg';
			case 'image/png': return '.png';
			default: throw new Exception('File type is not recongnized.');
		}
	}
    /**********************************************
	 *Generate the formalized dimension of the  image.
     * @para  string $img： the file name of the uploaded image. 
     * @return    array      :    the formalized  image dimesion
	 ***********************************************/
    private function getNewDims($img){
		list($src_w, $src_h) = getimagesize($img);
		list($max_w, $max_h) = $this->max_image_dims;
		
		if( $src_w > $max_w || $src_h > $max_h)
			$scale = min($max_w/$src_w, $max_h/$src_h);
		else
			$scale = 1;
		
		//get the new dimensions
		$new_w = round($src_w *$scale);
		$new_h = round($src_h *$scale);
		return array($new_w, $new_h, $src_w, $src_h);
	}
    /**********************************************
	 *Get the  image handle function.
     * @para  string $img： the file name of the uploaded image. 
     * @return    array      :    ( the image creating  function name
     *                                              the image output function name)
	 ***********************************************/
    private function getImageFunctions($img){
		$info = getimagesize($img);
		switch(strtolower($info['mime']) ){
			case 'image/jpeg':
			case 'image/jpg':return array('imagecreatefromjpeg','imagejpeg');break;
			case 'image/gif':return array('imagecreatefromgif', 'imagegif');break;
			case 'image/png':return array('imagecreatefrompng','imagepng');break;
			default : return false; break;
		}
	}
    /**********************************************
	 *Resizing the image.
     * @para  string $img： the file name of the uploaded image. 
	 ***********************************************/  	
	private function doImageResize($img){
		$dims = $this->getNewDims($img);
		$func = $this->getImageFunctions($img);
		$src_img = $func[0]($img); /* created the new images*/
		$new_img = imagecreatetruecolor($dims[0], $dims[1]);
		
		if( imagecopyresampled($new_img, $src_img,0,0,0,0,$dims[0],$dims[1],$dims[2],$dims[3])){
			imagedestroy($src_img);
			if($new_img && $func[1]($new_img, $img)) { //output the resized image
                imagedestroy($new_img);
            }
			else throw new Exception('Failed to save the new image');
		}else{
			throw new Exception('Could not resample the image!');
		}
	}
}
