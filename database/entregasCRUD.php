<?php
    include_once 'conexionMYSQL.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    //Recibir parámetros de Axios
    $_POST = json_decode(file_get_contents("php://input"),true);

    //Recepcion de los datos mediente POST desde el JS que vamos a utilizar para las rutas
    $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

    //Variables de la tabla

    //isset: Determina si una variable está definida y no es nula
    $id_ruta = (isset($_POST['id_ruta'])) ? $_POST['id_ruta'] : '';
    $fechaInicio = (isset($_POST['fechaInicio'])) ? $_POST['fechaInicio'] : '';
    $fechaFin = (isset($_POST['fechaFin'])) ? $_POST['fechaFin'] : '';
    $zonaRuta = (isset($_POST['zonaRuta'])) ? $_POST['zonaRuta'] : '';
    $id_grupo = (isset($_POST['id_grupo'])) ? $_POST['id_grupo'] : '';
    $id_vehiculo = (isset($_POST['id_vehiculo'])) ? $_POST['id_vehiculo'] : '';
    $id_er = (isset($_POST['id_er'])) ? $_POST['id_er'] : '';
    $placa = (isset($_POST['placa'])) ? $_POST['placa'] : '';
    $desc_grupo = (isset($_POST['desc_grupo'])) ? $_POST['desc_grupo'] : '';
    $desc_estado_ruta = (isset($_POST['desc_estado_ruta'])) ? $_POST['desc_estado_ruta'] : '';
    
    switch($opcion){
        case 1: //Insertar datos
            $consulta = "INSERT INTO ruta (fechaInicio, fechaFin, zonaRuta, id_grupo, id_vehiculo, id_er) VALUES ('$fechaInicio', '$fechaFin', '$zonaRuta', '$id_grupo', '$id_vehiculo', '$id_er')";

            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            break;
        case 2:
            $consulta = "UPDATE ruta SET fechaInicio='$fechaInicio', fechaFin='$fechaFin', zonaRuta='$zonaRuta', id_grupo='$id_grupo', id_vehiculo='$id_vehiculo', id_er='$id_er' WHERE id_ruta='$id_ruta'";

            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
        case 3:
            $consulta = "DELETE FROM ruta WHERE id_ruta='$id_ruta'";

            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            break;
        case 4:
            $consulta = "SELECT A.id_ruta, CONVERT(A.fechaInicio, DATE) as fecha, CONVERT(A.fechaInicio,TIME) as hora, B.desc_grupo, C.placa, A.zonaRuta, D.desc_estado_ruta FROM ruta A LEFT JOIN grupo B ON A.id_grupo = B.id_grupo LEFT JOIN vehiculo C ON A.id_vehiculo = C.id_vehiculo LEFT JOIN estadoRuta D ON A.id_er = D.id_er";

            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
            break;
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);
    $conexion = NULL;
?>