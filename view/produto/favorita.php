<?php

include_once '../../Db/daohelper.php';
session_start();
$pdo = connection();

try{

    if(empty($_GET)){
        echo "Parâmetro Vazio";
    }else{

        $idUsu = isset($_GET['id'])?$_GET['id']:null;
        $idProd = isset($_GET['?cod'])?$_GET['?cod']:null;
        if(empty($idUsu)){
            echo '<script>';
            echo 'alert("Você precisa estar logado para Favoritar algum Produto ou Serviço!")';
            echo '</script>';
           
            echo '<script>';
                echo "location.href='../login/index.php'";
                echo '</script>';
           
        }else if(empty($idProd)){
           
        }else{
            $verific = "SELECT * FROM FAVORITA WHERE COD_PRODUTO = '$idProd' AND COD_USU = '$idUsu'";
            $executeSelect = executeSelect($pdo, $verific);
            if($executeSelect->rowCount() > 0){
                
               $delete = " DELETE FROM favorita
                           WHERE cod_produto='$idProd' and cod_usu ='$idUsu';";
                $sql = executeQuery($pdo, $delete);
                echo '<script>';
                echo "location.href='../loja/index.php'";
                echo '</script>';
            }else{
            $query = "INSERT INTO   FAVORITA(cod_produto, cod_status_favorita, cod_usu)
                        VALUES('$idProd', 'A', '$idUsu');";
            $execute = executeQuery($pdo, $query);
            echo '<script>';
                echo "location.href='../loja/index.php'";
                echo '</script>';}
        }
       
        
    }

}
 catch(Exeption $ex){

}