
$(".T").on("click", ".EliminarMateria",function(){
   var Mid = $(this).attr("Mid");
   var Cid = $(this).attr("Cid");

   window.location = "http://localhost:82/Sistema/index.php?url=catalogo/"+Cid+"&Mid="+Mid+"&Cid="+Cid;

})
