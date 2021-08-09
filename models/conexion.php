<?php
//objeto PDO para conectar con la base de datos MYSQL
class Conexion
{
    public static function conectar()
    {
        $link = new PDO("mysql:host=localhost;dbname=post_sistema_mvc", "root", "root");
        //todo lo que se reciva sea con tildes o ñ
        $link->exec("set names utf8");

        return $link;
    }
}
