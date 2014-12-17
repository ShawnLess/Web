<?php
  $name = $data['comment'][0]->name;
  $id    = $data['comment'][0]->id;
?>
<div id="content">    <!-- #### Start of the entries content #### -->
<div id="writeentry">
  <div id="writeentrytop">
  <!--The action is this url request.   -->
	<form method="post" action=""  id="entryform">
		<fieldset>
      <p>  Are you sure to delete the comment posted by "<?php echo $name ;?> " ?</p>			
			<input type="submit" name="submit" value="delete"/>
			<input type="submit" name="submit" value="Cancel"/>
			<input type="hidden" name="id"     value="<?php echo $id ;?>" />
		</fieldset>
	</form>
  </div>
</div>
</div>
