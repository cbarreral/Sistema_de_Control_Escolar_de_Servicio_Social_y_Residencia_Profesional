
$(".T").on("click", ".EliminarMateria",function(){
   var Mid = $(this).attr("Mid");
   var Cid = $(this).attr("Cid");

   window.location = "http://localhost/Sistema/index.php?url=crear-materias/"+Cid+"&Mid="+Mid+"&Cid="+Cid;

})