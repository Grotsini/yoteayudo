<?php
    define('servidor', 'bfassz2oczlfulvixj8l-mysql.services.clever-cloud.com');
    define('nombre_bd','bfassz2oczlfulvixj8l');
    define('usuario','usbnwxo7p3hke6y8');
    define('password','QWhSIgTTcYfpswxIhp0m');
    $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password);

    $received_data = json_encode(file_get_contents("php://input"));

    $data = array();

    if($received_data->query != ''){
        $query="SELECT A.id_ruta, CONVERT(A.fechaInicio, DATE) as fecha, CONVERT(A.fechaInicio,TIME) as hora, B.desc_grupo, C.placa, A.zonaRuta, D.desc_estado_ruta FROM ruta A LEFT JOIN grupo B ON A.id_grupo = B.id_grupo LEFT JOIN vehiculo C ON A.id_vehiculo = C.id_vehiculo LEFT JOIN estadoRuta D ON A.id_er = D.id_er WHERE A.id_ruta LIKE '%".received_data->query."%' ORDER BY id_ruta DESC";
    }
    else{
        $query = "SELECT A.id_ruta, CONVERT(A.fechaInicio, DATE) as fecha, CONVERT(A.fechaInicio,TIME) as hora, B.desc_grupo, C.placa, A.zonaRuta, D.desc_estado_ruta FROM ruta A LEFT JOIN grupo B ON A.id_grupo = B.id_grupo LEFT JOIN vehiculo C ON A.id_vehiculo = C.id_vehiculo LEFT JOIN estadoRuta D ON A.id_er = D.id_er";

    }
    $statement = $connect->prepare($query);

    $statement->execute();

    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
?>