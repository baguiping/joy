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
alert("连接服务器错误!");
}
});
return back;
}