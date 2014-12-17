<?php
if(isset($error)){
	foreach($error as $error){
		echo "<p>$error</p>";
	}
}
?>
<!--  ------------------------------------------------------------------------------------------------------------------------- -->
<!--  The javascript  functions -->
<script   src=<?php echo url::get_template_path()."javascript/Preview.js"  ?>  > </script>
<script   src=<?php echo url::get_template_path()."javascript/PrepareUpload.js"  ?>  > </script>
<script   src=<?php echo url::get_template_path()."javascript/InsertText.js"  ?>  > </script>
<script   src=<?php echo url::get_template_path()."javascript/CheckResult.js"  ?>  > </script>
<!--  ------------------------------------------------------------------------------------------------------------------------- -->
<div id="content">    <!-- #### Start of the entries content #### -->
<div id="writeentry">
  <div id="writeentrytop">
	<form method="post" action=""  id="entryform">
	<!--  ------------------------------------------------------------------------------------------------------------------------- -->
    <!--                                                           The Text edit area                                                 --------------- -->
    <p> <input type="text" name="title" maxlength="150" /> 
        <label> Title </label>
    </p>
      <p> <input type="text" name="tags" maxlength="150" /> 
			<label> Tags </label> </p>
      <p>
		  <textarea name="entry" id="entryinput" cols="100%" rows="25" ></textarea> 
     </p>
			
     <input type="submit" name="submit" value="Save"/>
     <input type="submit" name="submit" value="Cancel"/>
     <input type="button"  value="Preview" onclick="Preview('entryinput', 'preview_frame')" />
	</form>
    <!--  ------------------------------------------------------------------------------------------------------------------------- -->
    <!--                                                           The upload tool box                                             --------------- -->
    <div id='upload_box'>
    <form method="post" action="../upload/upload"  id="uploadform"  enctype="multipart/form-data">
        <input type ="button"   name="action"  value="Insert Image"  onClick='PrepareUpload()'>
        <input type="file"   name="FilePath" id="uploaded_file" >
        <label id='upload_status'> Ready to upload</label>
    </form>
    </div>
    
    <p>     <iframe id="upload_result"  hidden='true'  onload='CheckResult()'  >     </iframe>    </p>
     <!--  ------------------------------------------------------------------------------------------------------------------------- -->
     <!--                                                           The Preview Area                                                    --------------- -->
     <iframe id="preview_frame"   src=<?php echo url::get_template_path()."Preview.html" ?>  >
     </iframe>
  </div>
</div>
		<!-- #### End of the entries content #### -->
</div>
