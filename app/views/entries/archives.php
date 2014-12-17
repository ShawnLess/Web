		<!-- #### Sidebar Box of Archives Begin #### -->

		<div class="sidebarbox">
		<div class="sidebarboxtop">
		<h2>Archives</h2>
		<ul>
		<?php
		  foreach ( $data['archives'] as $row ){
			  echo "<li><a href='".$row['url']."'>".$row['date']."</a> (".$row['count'].")</li>";
			}
	  ?>
		</ul>

    </div>
    </div>

		<!-- #### Sidebar Box End #### -->
		
	</div>
</div>


