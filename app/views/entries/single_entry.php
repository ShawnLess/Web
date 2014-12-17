
<?php 
   if ( $data['entry'] ){
          $record= $data['entry'][0];
          //#### Post Entry Begin ####
          $tags = explode(" ", $record->tags);
          echo '<div id="content">    <!-- #### Start of the entries content #### -->';
          $timestamp= strtotime($record->created);
		      echo '<div class="posttitle">'."\n"      ;
		        echo '<div class="postdate">'.date("M",$timestamp).'<span>'.date("d",$timestamp).'</span></div>'."\n";
		        echo "<h2> <a href='".DIR."single_entry/url=$record->url'>$record->title</a></h2>"."\n"  ;
		          echo '<div class="postinfo">'."\n"     ;
		          
		          echo '<span class="postauthcat">Posted at '.date("h:i a",$timestamp).' with tags: ' ;
		            foreach ( $tags as $tag)  echo "<a href='".DIR."entries/index/tag=".$tag."'>".urldecode($tag)." </a>"; 
		          echo "</span> \n";
		          
		          echo '</div>'."\n" ;
		        
		      echo '</div>'."\n"   ;
          
          //#### The post body  ####
          echo '<div class="posttext">'."\n";
          echo $record->entry."\n" ;
          echo '</div>'."\n";
          
          //#### The post operator  ####
          if(Session::get('loggin') == true) {
            echo '<div class="postfooter">'."\n";
   		        echo " <a href='".DIR."single_entry/add/'>Add</a> ";
		          echo " <a href='".DIR."single_entry/confirm_delete/$record->id'>Delete</a> ";
		          echo " <a href='".DIR."single_entry/edit/$record->id'>Edit</a> ";
            echo '</div>'."\n";
          }
          
        //#### The comments ####
        $comments_num = count($data['comments']);
        echo "<h3> ".$comments_num. " Comments on "  ."\"$record->title \"". "</h3>";
        echo "<ul id=\"commentlist\">";
        
        $even_comment_num=0;
        foreach ( $data['comments'] as $comment ) {
            $timestamp= strtotime($comment->date);
            if( $even_comment_num == 0)  {
                echo  "<li class=\"commentalt\">";
                $even_comment_num = 1;
            }else {
                echo " <li >";
                $even_comment_num  = 0;
            }
            
            echo "<a href=\"#\" class=\"commentname\">"   .$comment->name. "</a>  said on ".date("M d, Y",$timestamp). " at ".date("h:i:sa",$timestamp);
                 echo "<p>" .$comment->comment."</p>\n" ;
            echo "</li>";
            
            if(Session::get('loggin') == true) {
                echo '<div class="postfooter">'."\n";
                  echo " <a href='".DIR."single_entry/confirm_comment_delete/$comment->id'>Delete</a> ";
                 echo '</div>'."\n";
		    }    
        }

          echo "</ul>";
          //#### The comments  form####
          echo <<<FROM_text_head
        <div id="writecomment">
        <div id="writecommenttop">
        
FROM_text_head;
                
        echo '<form action="'.DIR."single_entry/comment_add/".$record->id.'" method="post" id="commentform">'."\n";
        echo <<<FROM_text_tail
		    <p><input type="text" name="name" id="name" value="" size="22" tabindex="1" />
		    <label for="author">Name (required)</label></p>

		    <p><input type="text" name="email" id="email" value="" size="22" tabindex="2" />
		    <label for="email">E-Mail (will not be published) (required)</label></p>

		    <p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

		    <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		    <input type="hidden" name="comment_post_ID" value="1" /></p>
		</form>

		</div>
		</div>
FROM_text_tail;
    echo '</div>';
    }
?>

