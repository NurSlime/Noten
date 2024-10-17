<?php

session_start();

if(isset($_POST['clear'])){
    require_once "GradeModel.php";
    models\GradeModel::deleteAll();

    header("Location: index.php");
} else{
    http_response_code(405);
}

?>
