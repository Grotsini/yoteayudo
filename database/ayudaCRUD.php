<?php
    require "conexion.php";

    $datos = json_decode(file_get_contents("php://input"));
    $request = $datos->request;

    //Para la tabla de Ayuda
    //READ: Leer los registros de la base de datos
    if($request == 1) {
        $sql = "SELECT id_ayuda, nombre, cantidad FROM ayuda";
        $query = $mysqli->query($sql);

        $datos = array();
        while($resultado = $query->fetch_assoc()) {
            $datos[] = $resultado;
        }

        echo json_encode($datos);
        exit;
    }

    //CREAD: Insertar registro en la base de datos
    if($request == 2) {
        $nombre = $datos->nombre;
        $cantidad = $datos->cantidad;

        $sql_select = "SELECT nombre FROM ayuda WHERE nombre='$nombre'";
        $query_select = $mysqli->query($sql_select);

        if(($query_select->num_rows) == 0){
            $sql_insert = "INSERT INTO ayuda(nombre, cantidad) VALUES ('$nombre', '$cantidad')";
            if($mysqli->query($sql_insert) === TRUE){
                echo "Se registro exitosamente";
            }
            else {
                echo "Ocurrio un problema";
            }

        }
        else{
            echo "Esos datos ya existen";
        }
        exit;
    }

    //UPDATE: Actualiza el registro de la base de datos;
    if($request == 3){
        $id_ayuda = $datos->id_ayuda;
        $nombre = $datos->nombre;
        $cantidad = $datos->cantidad;

        $sql_edit = "UPDATE ayuda SET nombre='$nombre', cantidad='$cantidad' WHERE id_ayuda='$id_ayuda'";

        $query_update=$mysqli->query($sql_edit);

        echo "Se actualizo el registro";
        exit;

    }

    //DELETE: Borrar el registro de la base de datos

    if($request == 4){
        $id_ayuda = $datos->id_ayuda;
        
        $sql_delete = "DELETE FROM ayuda WHERE id_ayuda='$id_ayuda'";

        $query_delete = $mysqli->query($sql_delete);

        echo "Registro eliminado";
        exit;
    }
?>