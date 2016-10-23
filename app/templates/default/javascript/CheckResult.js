function CheckResult( ){
    //check upload result
    var  pDoc   = document.getElementById('upload_result').contentDocument;
    var  status= '';
    if(pDoc.body.innerHTML.length > 0) {
        var  result = pDoc.getElementById('result').innerHTML;
        var  img_url= pDoc.getElementById('img_url').innerHTML;
        var  desc_text = document.getElementById("desc").value;

        if ( result == 'Successed' )  {
            status='Ready to upload';
            var image_text   =  '<div class="gallery">\n';
                image_text  +=  '<img  class="blogimage" src="' + img_url+ '">\n' ;
                image_text  +=  '<div class="desc">' + desc_text + '</div>\n';
                image_text  +=  '</div>'
            InsertText('entryinput', image_text);
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
