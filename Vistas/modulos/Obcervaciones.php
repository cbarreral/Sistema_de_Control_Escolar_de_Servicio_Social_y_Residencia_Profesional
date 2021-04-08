<div class="content-wrapper">
    <section class="content-header">

<div class="box">
        <div class="container"><br>
            <?php
            $exp = explode("/",$_GET["url"]);
            $matricula = $exp[1];
            $idDocumento = $exp[2];
            $tipo=$exp[3];
            $Alumno = UsuariosC::VerUsuariosC("matricula",$matricula);
            if($tipo==1){
                $documento = DocumentosEcenC::VerDocumentosEcenC("id",$idDocumento);
            }else if($tipo==2){
                $documento = DocumentosEcenC::VerDocumentosRepC("id",$idDocumento);
            }
           
            
            foreach ($documento as $key => $vdoc) {
              
               
                echo '
                <div class="btn-group">
                <a class="btn btn-primary" href="http://localhost/Sistema/verCarpeta/'.$Alumno["id_carrera"].'/'.$matricula.'"><i class="fas fa-arrow-left"></i> Volver</a>
                <a class="btn btn-success" href="http://localhost/Sistema/Documentos/' . $vdoc["PDF"] . '" target="black" data-placement="top" title="Ver archivo PDF (' . $vdoc["PDF"] . ') "> Ver PDF en tamaño grande</a></td>
                
                </div>
                <hr>
                <h2>Observaciones para '.$Alumno["nombre"].' '.$Alumno["apellido"].' </h2>
                  <p>Documento: '.$vdoc["nombre"].' <td></p>
                    <div class="d-flex">
                        <div class="p-2 flex-grow-1">
                            <div class="container">
                                <iframe style="width: 700px; height: 500px;" class="responsive-iframe" src="http://localhost/Sistema/Documentos/'.$vdoc["PDF"].'"></iframe>
                            </div>
                        </div>
                        ';
             
                    }echo'
                    <div class="p-2"></div>
                        <div class="p-2"> ';
                        $chat = ChatC::VerMensajes("id_doc",$idDocumento);
                        
                        foreach ($chat as $key => $mensaje) {
                            $user = UsuariosC::VerUsuariosC("id",$mensaje["id_De"]);
                            if($matricula==$user["matricula"]){
                                echo'
                                <div class="container ">
                                
                                    <p>De: <span style="color:blue" >'.$user["rol"].' </span>  '.$user["nombre"].'  a las '.$mensaje["fecha"].'</p>
                                    <div class="alert alert-dark">
                                    <p>'.$mensaje["mensaje"].'</p>
                                    </div>
                                    <hr>
                               </div>
                                ';
                            }else{
                                 echo'
                            <div class="container ">
                            
                                <p>De: <span style="color:red" >'.$user["rol"].' </span> '.$user["nombre"].'  a las '.$mensaje["fecha"].'</p>
                                <div class="alert alert-info">
                                <p>'.$mensaje["mensaje"].'</p>
                                </div>
                                <hr>
                           </div>
                            ';
                            }
                           
                            
                     }
                         echo'
                                
                           
                        </div>
                    </div>
                   
  ';
          
            
            
            echo'
                <form action="" method="post">
                    <div class="d-flex">
                        <div class="p-2 w-100">
                        <input type="hidden" name="tipo" id=""value="'.$tipo.'">
                        <input type="hidden" name="matricula" id=""value="'.$matricula.'">
                        <input type="hidden" name="id_doc" id=""value="'.$idDocumento.'">
                        <input type="hidden" name="fecha" id=""value="'.date("h:m:s  d/m/y").'">
                            <input type="hidden" name="id_De" id=""value="'.$_SESSION["id"].'">
                            <p>Chat de Obcervaciones:</p>
                            <input type="text" name="mensaje" class="form-control" id="" placeholder="Mensaje..." >
                            <br><br>
                        </div>
                        <div class="p-2 flex-shrink-1">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </div>
               
                ';
                $EnviarMensaje = new ChatC();
                $EnviarMensaje->EnviarMensajeC();
                ?> 
                
                </form>
            </div>
        </div>
    </section>
</div>

