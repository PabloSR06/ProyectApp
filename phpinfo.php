<?php  





try { 
    require './php/query/querys.php';
    require './php/conectDB.php';
    $db = conectDB();
    
    $json =  query_cars2($db, 1);
    
    //$array = json_decode($json);
    echo($json);
} catch (\Throwable $th) {
    echo "A ocurrido un error";
}



?>

