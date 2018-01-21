<?php

require_once("config.php");
$con=mysqli_connect($host, $fetchUsr, $fetchUsrPwd, $bd);
$return= new stdClass() ;
if(mysqli_connect_errno()){
    $return->error="Fallo al establecer la conexión: ".mysqli_connect_error();

}else{

   if ($resultado = mysqli_query($con, "SELECT * FROM oleos")) {
        $return->data=mysqli_fetch_all($resultado,MYSQLI_ASSOC);
        mysqli_free_result($resultado);
    }
   mysqli_close($con);
}


echo json_encode($return);

?>