$(".T").on("click", ".BorrarComision",function(){
    var Mid = $(this).attr("Mid");
    var Cid = $(this).attr("Cid");
 
    window.location = "http://localhost/Sistema/index.php?url=crear-comisiones/"+Mid+"&Mid="+Mid+"&Cid="+Cid;
 
 })