<?php

class CarrerasC
{

    //Crear carrera
    public function crearCarreraC()
    {
        if (isset($_POST["carrera"])) {
            $tablaBD = "carrera";
            $carrera = $_POST["carrera"];
            $resultado = CarrerasM::CrearCarreraM($tablaBD, $carrera);

            if ($resultado == true) {
                echo '<script>

                window.location = "carreras";

                </script>';
            }
        } 
    } 

    //Ver carreras

    public function VerCarrerasC()
    {
        $tablaBD = "carrera";
        $resultado = CarrerasM::VerCarrerasM($tablaBD);
        return $resultado;
    }

    static public function verCarreraC($columna,$valor){
        $tablaBD = "carrera";
        $resultado = CarrerasM::vercarreraM($tablaBD,$columna,$valor);
        return $resultado;
    }

    //Editar carreras

    public function EditarCarreraC()
    {
        $tablaBD = "carrera";
        $exp = explode("/", $_GET["url"]);
        $id = $exp[1];
        $resultado = CarrerasM::EditarCarreraM($tablaBD, $id);

        echo '
       <div class="col-md-6 colxs-12">
       <h2>Nombre de la carrera:</h2>
       <input type="text" name="carrera" value="'.$resultado["nombre"].'" class="form-control input-lg" required id="">
       <input type="hidden" name="Cid" value="'.$resultado["id"].'" class="form-control input-lg" id="">

       <br>
       <button class="btn btn-sucess" type="submit">Guradar datos</button>
   </div>
       ';
    }

    //Actualizar carrera
    public function ActualizarCarrerasC(){
        if(isset($_POST["carrera"])){
            $tablaBD = "carrera";
            $datosC = array("id"=>$_POST["Cid"],"carrera"=>$_POST["carrera"]);

            $resultado = CarrerasM::ActualizarCarrerasM($tablaBD,$datosC);

            if($resultado == true){
                echo '<script>

                window.location = "http://localhost/Sistema/carreras";

                </script>';
            }else{
                echo '<script>

                window.location = "http://localhost/Sistema/carreras";

                </script>';
            }
        }
    }

    //Borrar carrera

    public function BorrarCarrerasC()
    {
        $exp = explode("/", $_GET["url"]);
        $id = $exp[1];

        if(isset($id)){
            $tablaBD = "carrera";

            $resultado = CarrerasM::BorrarCarreraM($tablaBD, $id);

            if($resultado == true){
                echo '<script>

                window.location = "http://localhost/Sistema/carreras";

                </script>';
            }
        }
    }
}
