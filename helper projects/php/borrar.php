<?php
$dir="localhost";
$usr="root";
$pwd="";
$db="ajaxExample";
$myconn=mysqli_connect($dir,$usr,$pwd,$db);
if(!$myconn){
    echo "Error en la conexión a db<br>"; 
}else{

    $select="delete from animales where id=".$_POST["id"];
    $query=mysqli_query($myconn,$select);
    if(!$query){
        echo "<BR>ERROR EN INSERCIÓN ".mysqli_error($myconn)."<BR>";
    }else{
        echo "ok";
    }
}
    mysqli_close($myconn);   
?>