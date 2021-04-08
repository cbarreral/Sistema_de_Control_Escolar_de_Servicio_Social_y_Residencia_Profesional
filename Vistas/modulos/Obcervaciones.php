<div class="content-wrapper">
    <section class="content-header">

<div class="box">
        <div class="container"><br>
            <?php
            $exp = explode("/",$_GET["url"]);
            $matricula = $exp[1];
            $idDocumento = $exp[2];
            $Alumno = UsuariosC::VerUsuariosC("matricula",$matricula);
            $documento = DocumentosEcenC::VerDocumentosEcenC("id",$idDocumento);
            
            foreach ($documento as $key => $vdoc) {
              
               
                echo '<h2>Observaciones para '.$Alumno["nombre"].' '.$Alumno["apellido"].' </h2>
                  <p>Documento: '.$vdoc["nombre"].'</p>
                    <div class="d-flex">
                        <div class="p-2 flex-grow-1">
                            <div class="container">
                                <iframe style="width: 500px; height: 500px;" class="responsive-iframe" src="https://localhost/Sistema/Documentos/'.$vdoc["PDF"].'"></iframe>
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
                                <div class="container">
                                
                                    <p>De: '.$user["nombre"].'  a las '.$mensaje["fecha"].'</p>
                                    <div class="alert alert-dark">
                                    <p>'.$mensaje["mensaje"].'</p>
                                    </div>
                                    <hr>
                               </div>
                                ';
                            }else{
                                 echo'
                            <div class="container">
                            
                                <p>De: '.$user["nombre"].'  a las '.$mensaje["fecha"].'</p>
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
          
         
            ?>
            
            
                <form action="" method="post">
                    <div class="d-flex">
                        <div class="p-2 w-100">
                            <input type="hidden" name="user" id=""value="Carlos">
                            <input type="text" name="mensaje" class="form-control" id="" placeholder="Mensaje..." >
                        </div>
                        <div class="p-2 flex-shrink-1">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

