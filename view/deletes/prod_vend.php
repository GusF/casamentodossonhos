<?php
require_once '../../Db/daohelper.php';
session_start();

try{
    $idProd = isset($_GET['cod_prod'])?$_GET['cod_prod']:null;
    $id = $_SESSION['id'];
    echo $id.'<br>';
    echo 'cod prod =  '.$idProd;
    $sql = "DELETE FROM produto WHERE cod_produto = '$idProd' AND cod_empresa = '$id'";
    $conn = connection();
    $execute = executeQuery($conn, $sql);
    

} catch (Exception $ex) {

}