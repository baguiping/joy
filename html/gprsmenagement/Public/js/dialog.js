function openDialog(title,width,height,url,callBack,callBackValue){
$( "#dialog:ui-dialog" ).dialog( "destroy" );
$( "#dialog-modal-iframe" ).attr("src",url);
$( "#dialog-modal" ).attr("title",title);
//$("#ui-dialog-title-dialog-modal").html(title);
$("#ui-id-1").html(title);
$( "#dialog-modal" ).dialog({
autoOpen:true,
width:width,
height: height,
modal:true,
resizable: false,
external: true,
draggable: true,
position:'center',
close:function(){
$("#dialog-modal-iframe").attr("src","./Public/dialog.html");
callBack(callBackValue);
}
});
}
function openDialog1(title,width,height,url,callBack,callBackValue){
$( "#dialog:ui-dialog" ).dialog( "destroy" );
$( "#dialog-modal-1" ).attr("title",title);
$("#ui-dialog-title-dialog-modal-1").html(title);
$( "#dialog-modal-iframe-1" ).attr("src",url);
$( "#dialog-modal-1" ).dialog({ 
autoOpen:true,
width:width,
height: height,
modal:true,
resizable: false,
external: true,
draggable: true,
position:'center',
close:function(){
$("#dialog-modal-iframe-1").attr("src","./Public/dialog.html");
callBack(callBackValue);
}
});
}
function closeDialog(){
$("#dialog-modal-iframe").attr("src","./Public/dialog.html");
$("#dialog-modal").dialog("close");
}
function closeDialog1(){
$("#dialog-modal-iframe-1").attr("src","./Public/dialog.html");
$("#dialog-modal-1").dialog("close");
}
function setDialogui1(width,height){
$('#dialog-modal-1').dialog('option', 'width', width);
$('#dialog-modal-1').dialog('option', 'height', height);
$('#dialog-modal-1').dialog('option', 'position', 'center');
}
function openMainDialog(){
$("#dialog-modal").dialog("open");
}
function setDialogui(width,height){
$('#dialog-modal').dialog('option', 'width', width);
$('#dialog-modal').dialog('option', 'height', height);
$('#dialog-modal').dialog('option', 'position', 'center');
}