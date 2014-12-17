function PrepareUpload( ){
    document.getElementById('uploadform').target = 'upload_result'; 
	document.getElementById('uploadform').submit();
    
    //set the hidden frame content to empty
    var iFrame = document.getElementById("upload_result");
    iFrame.contentDocument.getElementsByTagName("body")[0].innerHTML = ""

    //disable the textarea
    document.getElementById('entryinput').disabled = 'true'; 

    //update the status text
    document.getElementById('upload_status').innerHTML='uploading....';
}
