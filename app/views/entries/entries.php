
<?php
   if ( $data['entries'] ){
        $index=0;
        echo '<div id="content">  ';
        foreach ( $data['entries']  as $record )  {
          //#### Post Entry Begin ####
          $tags = explode(" ", $record->tags);
          
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
          //This function is moved to single_entry
          
        //#### The post foot  ####
        echo '<div class="postfooter">'."\n";
            echo '<span class="postcomment"></span>';
            echo "<a href='".DIR."single_entry/url=$record->url'>".$data['comments_count'][$index]. " comments  >>"."</a></h2>"."\n"  ;  
         echo '</div>'."\n";

         $index = $index +1;
        }
        echo '</div>';
    }
?>

