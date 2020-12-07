<?php
$host = "bfassz2oczlfulvixj8l-mysql.services.clever-cloud.com"; 
$user = "usbnwxo7p3hke6y8"; 
$password = "QWhSIgTTcYfpswxIhp0m"; 
$dbname = "bfassz2oczlfulvixj8l"; 
$id = '';

$con = mysqli_connect($host, $user, $password,$dbname);

$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = json_decode(file_get_contents('php://input'),true);


if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


switch ($method) {
    case 'GET':
      $id = $_GET['id'];
      $sql = "SELECT A.id_ruta, CONVERT(A.fechaInicio, DATE) as fecha, CONVERT(A.fechaInicio,TIME) as hora, B.desc_grupo, C.placa, A.zonaRuta, D.desc_estado_ruta FROM ruta A LEFT JOIN grupo B ON A.id_grupo = B.id_grupo LEFT JOIN vehiculo C ON A.id_vehiculo = C.id_vehiculo LEFT JOIN estadoRuta D ON A.id_er = D.id_er"; 
      break;
    /*case 'POST':
      $name = $_POST["name"];
      $email = $_POST["email"];
      $country = $_POST["country"];
      $city = $_POST["city"];
      $job = $_POST["job"];

      $sql = "insert into contacts (name, email, city, country, job) values ('$name', '$email', '$city', '$country', '$job')"; 
      break;*/
}

// run SQL statement
$result = mysqli_query($con,$sql);

// die if SQL statement failed
if (!$result) {
  http_response_code(404);
  die(mysqli_error($con));
}

if ($method == 'GET') {
    if (!$id) echo '[';
    for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
      echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
  } /*elseif ($method == 'POST') {
    echo json_encode($result);
  }*/ else {
    echo mysqli_affected_rows($con);
  }

$con->close();

?>