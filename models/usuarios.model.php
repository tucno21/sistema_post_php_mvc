<?php
//llamar la coneccion de MYSQL
require_once "conexion.php";

class ModeloUsuarios
{
    //recibe los datos de controller
    public static function MostrarUsuario($table, $colum, $valorColum)
    {
        //codigos de MYSQL PDO para traer solo el ususario // :$colum para comparar
        //$stmt Sentencias Preparadas en PDO
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $colum = :$colum");
        //comparar y que solo sera texto (PDO::PARAM_STR)
        $stmt->bindParam(":" . $colum, $valorColum, PDO::PARAM_STR);
        //ejecutar la linea de comando
        $stmt->execute();

        //enviar al controlador usuario
        return $stmt->fetch();

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }

    //ingresar datos
    public static function mdlIngresarUsuario($tabla, $datos)
    {
        //$stmt Sentencias Preparadas en PDO
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto) VALUE (:nombre, :usuario, :password, :perfil, :foto)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        //cerrar 
        $stmt->close();

        //limpiar objeto
        $stmt->null;
    }
}
