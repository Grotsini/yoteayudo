<?php
    $mysqli = new mysqli(
        "bfassz2oczlfulvixj8l-mysql.services.clever-cloud.com",
        "usbnwxo7p3hke6y8",
        "QWhSIgTTcYfpswxIhp0m",
        "bfassz2oczlfulvixj8l"
    );

    if($mysqli->connect_errno){
        die("Fallo la conexion");
    } else {
        echo "Conexion exitosa";
    }


?>