function ajax_post(url,data,async){
var back = "error";
$.ajax({
url:url,
data:data,
type:'post',
async:async,
success:function(data){
back = data;
},
error:function(){
alert("���ӷ���������!");
}
});
return back;
}