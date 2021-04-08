

$(".T").on("click", ".EditarUsuario", function () {

    var Uid = $(this).attr("Uid");

    var datos = new FormData();
    datos.append("Uid", Uid);

    $.ajax({

        url: "Ajax/usuariosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function (resultadoJS) {

            $("#Uid").val(resultadoJS["id"]);

            $("#apellidoEU").val(resultadoJS["apellido"]);
            $("#nombreEU").val(resultadoJS["nombre"]);
            $("#matriculaEU").val(resultadoJS["matricula"]);
            $("#claveEU").val(resultadoJS["clave"]);
            $("#rolEU").val(resultadoJS["rol"]);
            $("#telefonoEU").val(resultadoJS["telefono"]);
            $("#direccionEU").val(resultadoJS["direccion"]);
            $("#correoEU").val(resultadoJS["correo"]);
            $("#tipoEU").val(resultadoJS["tipo"]);
            $("#a_academicoEU").val(resultadoJS["a_academico"])

            if (resultadoJS["rol"] == "Admin") {
                $("#carrera").hide();
            } else {
                $("#carrera").show();
            }

            $("#rolActual").html("Rol Actual:  " + resultadoJS["rol"]);

            $("#tipoActual").html("Tipo Actual:  " + resultadoJS["tipo"]);
            $("#idCarrera").html(resultadoJS["id_carrera"]);

            $("#rol").val(resultadoJS["rol"]);
            $("#rol").hide();

            $("#tipo").val(resultadoJS["tipo"]);
            $("#tipo").hide();

            $("#carr").val(resultadoJS["id_carrera"]);
            

            $("#aAcademico").val(resultadoJS["nombre"]); 
            $("#aAcademico").hide();
        }
    })
})

//Eliminar

$(".T").on("click", ".EliminarUsuario", function () {

    var Uid = $(this).attr("Uid");

    window.location = "index.php?url=usuarios&Uid=" + Uid;

})


$("#Validarmatricula"||"#matriculaEU").change(function () {

    $(".alert").remove();

    var matricula = $(this).val();
    var datos = new FormData();
    datos.append("verificarMatricula", matricula);

    $.ajax({
        url: "Ajax/usuariosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        success: function (resultadoJS) {

            if (resultadoJS) {
                $("#Validarmatricula").parent().after('<div class="alert alert-danger">La Matricula o Usuario ya Existe.</div>');
                $("#Validarmatricula").val("");
                $("#matriculaEU").parent().after('<div class="alert alert-danger">La Matricula o Usuario ya Existe.</div>');
                $("#matriculaEU").val("");
            }

        }
    })

})
