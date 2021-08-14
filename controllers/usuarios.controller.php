<?php

class ControllerUsuarios
{
    public function ingresoUsuario()
    {
        // recibe el nombre de usario por post
        if (isset($_POST["usuario"])) {
            //validar que solo sea letras y numeros
            if (
                preg_match('/^[a-zA-z0-9]+$/', $_POST["usuario"]) &&
                preg_match('/^[a-zA-z0-9]+$/', $_POST["password"])
            ) {
                $encritar = crypt($_POST["password"], '$2a$07$usesomesillystringforsalt$');
                //variable para las consultas
                $table = "usuarios";
                $colum =  "usuario";
                $valorColum = $_POST["usuario"];

                //conectar y recibir una respuesta del MODEL
                //trae la fila del usuario que estoy buscando...
                $respuesta = ModeloUsuarios::MostrarUsuario($table, $colum, $valorColum);

                //comparar el ingreso con la tabla
                if ($respuesta["usuario"] == $_POST["usuario"] && $respuesta["password"] == $encritar) {

                    //crear variable de la sesion
                    $_SESSION["inicioSession"] = "ok";
                    //luego enviar a pagina inicio
                    echo '<script>window.location="inicio"</script>';
                } else {
                    echo '<div class="alert alert-danger">error al ingresar intente de nuevo</div>';
                }
                // var_dump($respuesta["password"]);
            }
        }
    }


    public static function strCrearUsuario()
    {

        if (isset($_POST["nuevoUsuario"])) {

            //VALIDANDO ususario con tildes
            if (
                preg_match('/^[a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-z0-9]+$/', $_POST["nuevoPassword"])
            ) {
                //rta vaciado
                $ruta = "";
                //validar imagen
                if (isset($_FILES["nuevoFoto"]["tmp_name"])) {

                    //capturando el las dimensiones de la foto|
                    list($ancho, $alto) = getimagesize($_FILES["nuevoFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    //crear el directorio donde se alamacena la foto
                    $directorio = "views/dist/img/usuarios/" . $_POST["nuevoUsuario"];
                    mkdir($directorio, 0755);

                    //deacuerdo al tipo de imagen aplicamos funciones
                    if ($_FILES["nuevoFoto"]["type"] == "image/jpeg") {
                        //crear nuero aleatorio para el nombre de la foto
                        $aleatorio = mt_rand(100, 999);

                        //guardar en la siguiente ruta
                        $ruta = "views/dist/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevoFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        //cambiar el tamaño de la imagen
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        //guardar la imagen em el servidor
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["nuevoFoto"]["type"] == "image/png") {
                        //crear nuero aleatorio para el nombre de la foto
                        $aleatorio = mt_rand(100, 999);

                        //guardar en la siguiente ruta
                        $ruta = "views/dist/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";

                        $origen = imagecreatefrompng($_FILES["nuevoFoto"]["tmp_name"]);

                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        //cambiar el tamaño de la imagen
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        //guardar la imagen em el servidor
                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                $encritar = crypt($_POST['nuevoPassword'], '$2a$07$usesomesillystringforsalt$');

                $datos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "usuario" => $_POST["nuevoUsuario"],
                    "password" => $encritar,
                    "perfil" => $_POST["nuevoPerfil"],
                    "foto" => $ruta
                );

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script type="text/javascript">
                                    Swal.fire({
                                        icon: "success",
                                        title: "El usuario se guardo correctamente",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm:false
                                    }).then((result)=>{
                                        if(result.value){
                                        window.location = "usuarios"
                                        }
                                    });
                            </script>';
                }
            } else {
                echo '<script type="text/javascript">
                    Swal.fire({
                        icon: "error",
                        title: "El usuario no puede ir vacio o caracteres especiales...",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        if(result.value){
                        window.location = "usuarios"
                        }
                    });
                </script>';
            }
        }
    }
}
