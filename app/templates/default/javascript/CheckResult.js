function CheckResult( ){
    //check upload result
    var  pDoc   = document.getElementById('upload_result').contentDocument;
    var  status= '';
    if(pDoc.body.innerHTML.length > 0) {
        var  result = pDoc.getElementById('result').innerHTML;
        var  img_url= pDoc.getElementById('img_url').innerHTML;
        if ( result == 'Successed' )  {
            status='Ready to upload';
            var image='<img  class="blogimage" src="' + img_url+ '">' ;
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
