function CheckResult( ){
    //check upload result
    var  result = document.getElementById('upload_result').contentDocument.body.innerHTML;
    var  status= '';
    if(result.length > 0) {
        if ( result.indexOf('failed')  < 0)  {
            status='Ready to upload';
            var image='<img  class="blogimage" src="' + result + '">' ;
            InsertText('entryinput', image);
            Preview('entryinput','preview_frame');
        }else{
            status='upload failed.'
        }
        //update the status
        document.getElementById('upload_status').innerHTML=status;
        //document.getElementById('upload_result').contentDocument.body.innerHTML="";
        //enable the textarea agian
        document.getElementById('entryinput').disabled=false;
    }
}
