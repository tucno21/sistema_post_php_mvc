<?php

// variables generales y creador de muna lateral
include 'adminlte.php';

//cabeza de la pplantilla
include 'modules/AdminHead.php';

if (isset($_SESSION["inicioSession"]) && $_SESSION["inicioSession"] == "ok") {

    //menu supererior
    include 'modules/AdminMenu.php';

    //menu lateral
    include 'modules/AdminMenuLateral.php';



    // <!-- llamar a todas las url que tenemos dentro de MODULEs -->
    // isset — Determina si una variable está definida y no es null
    // la variable GET ruta viene del htacces
    if (isset($_GET["ruta"])) {
        if (
            $_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "usuarios" ||
            $_GET["ruta"] == "categorias" ||
            $_GET["ruta"] == "productos" ||
            $_GET["ruta"] == "clientes" ||
            $_GET["ruta"] == "ventas" ||
            $_GET["ruta"] == "crear-ventas" ||
            $_GET["ruta"] == "reportes"
        ) {
            include "modules/" . $_GET["ruta"] . ".php";
        } else {
            include "modules/404.php";
        }
    } else {
        include "modules/inicio.php";
    }

    //footer
    include 'modules/AdminFooter.php';
} else {
    include 'modules/login.php';
}

//script
include 'modules/AdminScript.php';
