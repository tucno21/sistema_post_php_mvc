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
                //variable para las consultas
                $table = "usuarios";
                $colum =  "usuario";
                $valorColum = $_POST["usuario"];

                //conectar y recibir una respuesta del MODEL
                //trae la fila del usuario que estoy buscando...
                $respuesta = ModeloUsuarios::MostrarUsuario($table, $colum, $valorColum);

                //comparar el ingreso con la tabla
                if ($respuesta["usuario"] == $_POST["usuario"] && $respuesta["password"] == $_POST["password"]) {

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
