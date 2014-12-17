  
    <div id="sidebar">
	
	  <!-- #### Sidebar Box of Tags Begin #### -->

		<div class="sidebarbox">
		<div class="sidebarboxtop">
	
		<h2>Tags</h2>
	  <?php
	    foreach ( $data['most_tag_names'] as $tag) {
	      echo "<a href='".DIR."entries/index/tag=".$tag->name."'>".urldecode($tag->name)."  </a>";
	    }
	  ?>
		</div>
		</div>

		<!-- #### Sidebar Box End #### -->
