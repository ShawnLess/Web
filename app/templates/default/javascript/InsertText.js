function InsertText(TextAreaID, txtToAdd){
    var hTextArea =document.getElementById(TextAreaID)
    var caretPos =    hTextArea.selectionStart;
    var textAreaTxt = hTextArea.value;
    hTextArea.value=textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos); 
 }
