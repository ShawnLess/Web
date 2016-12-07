
<?php
/*
Filename: entry_model.php
Created : 2014-6-19
Author  : Shawnless.xie@gmail.com
Function: the model of the entries. 
*/

class Entries_model  extends Model {

	public function __construct(){
		parent::__construct();
	}

  public function get_entries () {
     return $this->_db->select("SELECT * FROM ".PREFIX."entries ORDER BY id DESC");
  }

  public function get_entries_by_range ($index_range) {
     return $this->_db->select("SELECT * FROM ".PREFIX."entries ORDER BY id DESC LIMIT $index_range");
  }

  public function get_comment_count_by_blogid($id){
       return $this->_db->select("SELECT COUNT(*) AS num FROM ".PREFIX." comments WHERE blog_id=:blog_id", array(':blog_id'=>$id) );
  }
  
  public function get_entry ($id) {
     return $this->_db->select("SELECT * FROM ".PREFIX."entries WHERE id=:id", array(':id' => $id) );
  }

  public function get_comment ($id) {
     return $this->_db->select("SELECT * FROM ".PREFIX."comments WHERE id=:id", array(':id' => $id) );
  }
  public function get_tagid ($tag) {
     return $this->_db->select("SELECT id FROM ".PREFIX."tags WHERE name=:name", array(':name' => $tag) );
  }
  
  public function get_entry_by_url ($url) {
     return $this->_db->select("SELECT * FROM ".PREFIX."entries WHERE url=:url LIMIT 0,1", array(':url' => $url) );
  }
  
  public function get_entries_count_by_month ($month,$year) {
     return $this->_db->select("SELECT COUNT(*) AS num FROM ".PREFIX."entries WHERE MONTH(created)=:month AND YEAR(created)=:year",
                                              array(':month' => $month,':year' => $year) );
  }
  
  public function get_entries_by_month ($month,$year) {
     return $this->_db->select("SELECT * FROM ".PREFIX."entries WHERE MONTH(created)=:month AND YEAR(created)=:year ORDER BY id DESC",
                                              array(':month' => $month,':year' => $year) );
  }

  public function get_entries_by_tag ($tag) {
     return $this->_db->select("SELECT * FROM ".PREFIX."entries WHERE id IN ( SELECT blog_id FROM blog_tag WHERE tag_id = (SELECT id FROM tags WHERE name=:tag) ) ORDER BY id DESC",
                                              array(':tag' => $tag) );
  }

    public function get_comments_count_by_tag($tag){
    }
  
  public function get_comments_by_url( $url){
      return $this->_db->select("SELECT * FROM ".PREFIX."comments WHERE blog_id IN ( SELECT id FROM entries WHERE  url=:url)", array(':url'=>$url) );
  }

  public function get_mostused_10_tags(){ 
    $sql_clause= "SELECT name FROM "
                .PREFIX."tags WHERE id IN ("
                   ."SELECT tag_id FROM  ("
                         ."SELECT tag_id,COUNT(tag_id) FROM "
                         .PREFIX."blog_tag GROUP BY tag_id ORDER BY COUNT(tag_id) DESC LIMIT 0,10"
                   .") AS most_tag_ids"
                .")";  
    return $this->_db->select($sql_clause);
  }
  
  public function add_entry ($data) {
		$this->_db->insert(PREFIX."entries",$data);
	}

    public function add_comment ($data) {
		$this->_db->insert(PREFIX."comments",$data);
	}
	public function add_tag ($tag_data) {
		$this->_db->insert(PREFIX."tags",$tag_data);
	}
	
  public function add_blog_tag ($blog_id, $tags) {
   
    $tag_id_array = $this->_get_tag_id_from_names( $tags);
    
    foreach( $tag_id_array as $tag_id ) {
      $blog_tag_data = array( 'blog_id' => $blog_id, 'tag_id' => $tag_id->id );
    	$this->_db->insert(PREFIX."blog_tag",$blog_tag_data);
    }
	}
	 
  /****************************************************************/
	public function update_entry ($data,$where) {
	  $blog_id = $where['id'];
	  
	  /*Update the entries */
		$this->_db->update(PREFIX."entries",$data, $where);

    /******* Delete the old record from blog_tag & tags table *******/
    /****************************************************************/
	  /* Get the old tag list */
	  $tag_id_array =$this->_db->select("SELECT tag_id FROM ".PREFIX."blog_tag WHERE blog_id=:blog_id", 
	                                   array( 'blog_id'=>$blog_id ));

	  /* Delete the old record from the blog_tag table, with limit=100 */
		$this->_db->delete(PREFIX."blog_tag",array('blog_id' => $blog_id ), 100);
		
		/* Delete the old record from the tags table */
		$this->_delete_tags_by_id( $tag_id_array);
		
		/******* ReAdd the new record into blog_tag & tags table *******/
		/****************************************************************/
		$this->add_tags_if_need($data['tags']);
		$this->add_blog_tag($blog_id, $data['tags']);
		
	}
 
  /****************************************************************/
  public function delete_entry ($id, $img_dir) {

    $entry = $this->get_entry($id);
    $tags  = $entry[0]->tags;
    
    /* Delete the record from the entries table */
		$this->_db->delete(PREFIX."entries", array('id' => $id));
		
		/* Delete the record from the blog_tag table, with limit=100 */
		$this->_db->delete(PREFIX."blog_tag",array('blog_id' => $id ), 100);
		
		$this->_delete_tags_by_name( $tags);
    
    /* Delete all the images contained in this entry    */
    $this->_delete_all_images( $entry[0]->entry, $img_dir );
	}

  /****************************************************************/
    public function delete_comment($id){
        $this->_db->delete(PREFIX."comments", array('id' => $id) );
    }
    
  /****************************************************************/
    public function get_archives(){
        $now = time();
        $month=date('m',$now);
        $year =date('Y',$now);
        $count=$this->get_entries_count_by_month($month,$year);
    
        $archives= array( 
            array(
            'date' => date('F Y',$now),
            'url'  => DIR."entries/index/month=$month,$year",
            'count'=> $count[0]->num
            )
        );
    
        for ($i=1; $i<=5; $i++){
            $time=strtotime("-$i month",$now);
            $month=date('m',$time);
            $year =date('Y',$time);
            $count=$this->get_entries_count_by_month($month,$year);
            array_push( $archives,
                array(
                    'date' => date('F Y',$time),
                    'url'  => DIR."entries/index/month=$month,$year",
                    'count'=> $count[0]->num
                ) 
            );
        }
        return $archives;
    }
    
	private function _get_tag_id_from_names( $tags ){
    $tag_array  =  explode(' ',$tags);  /* Get the tag name array */
    $tag_str    = "'".implode("','",$tag_array)."'";
    return $this->_db->select("SELECT id FROM ".PREFIX."tags WHERE name IN ($tag_str)");
	}
	
	/* Delete the tag if not used */
	private function _delete_tags_by_id ( $tag_id_array){
	  	foreach ( $tag_id_array as $tag_id ){

	    $tag_count= $this->_db->select("SELECT COUNT(*) AS num FROM ".PREFIX."blog_tag WHERE tag_id=:tag_id", 
	                                    array(':tag_id' => $tag_id->id) );
	                                    
	    if( $tag_count[0]->num == 0)   $this->_db->delete(PREFIX."tags", array('id' => $tag_id->id) );
	  }
	}
	
	/* Delete the tag if not used */
	private function _delete_tags_by_name ( $tags ){
	  $tag_id_array = $this->_get_tag_id_from_names( $tags);
	  $this->_delete_tags_by_id ( $tag_id_array );
	}
	
	
  /* Added the tag if not presented */
	public function add_tags_if_need ( $tags ){
	    $tag_array=explode(' ', $tags);
        foreach( $tag_array as $tag ){
          $tag_id=$this->get_tagid($tag);
          if( empty( $tag_id ) )  {
            $tag_data = array ( 'name' => $tag );
            $this->add_tag($tag_data);
          }
        }
	}
 
 /* delete all the images content in this entry */
 private function _delete_all_images( $html, $img_dir ){
   //get all the image tags from the content
   preg_match_all('/<img[^>]+>/i',$html, $img_tags); 
  
   $src_tag=array();
   foreach( $img_tags as $img_tag) {
     /* @[1][0]   src="http://../.../  
        @[2][0]   .....jpg
     */
     preg_match_all('/(src *= *"[^"]*\/)([^"]+)"/i',$img_tag[0], $src_tag);

     /*delete the image on the server */
     //Creat the full path to the image for saving
		 $filepath = $img_dir . $src_tag[2][0];
		 $absolute = $_SERVER['DOCUMENT_ROOT'].$filepath;
		  
		 if( ! unlink($absolute)){
		 	throw new Exception("Could't delete file:".$absolute);
		 }
   } 
 }
	
}
