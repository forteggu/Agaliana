<?php
$dir="localhost";
$usr="root";
$pwd="";
$db="ajaxExample";
$myconn=mysqli_connect($dir,$usr,$pwd,$db);
if(!$myconn){
    echo "Error en la conexión a db<br>"; 
}else{
    
    $select="select * from animales order by id desc";
    $query=mysqli_query($myconn,$select);
    if(!$query){
        echo "<BR>ERROR EN INSERCIÓN ".mysqli_error($myconn)."<BR>";
    }else{
        $array=[];
        while($res=mysqli_fetch_object($query)){
            $array[]=array("id"=>$res->id,
                           "nombre"=>$res->nombre,
                          "raza"=>$res->raza,
                          "descripcion"=>$res->descripcion,
                          "fechaNac"=>$res->fechaNac,
                          "urlImg"=>$res->urlImg);
        }
        echo json_encode($array);
    }
    mysqli_close($myconn);   
}
?>