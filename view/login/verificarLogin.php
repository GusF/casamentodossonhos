
<html>
<link href="../_css/default.css" rel=stylesheet>
    <div class="load"></div>
</html>
<script type="text/javascript">
		function loginsucessfully(){
			setTimeout("location.href='../perfil/perfil.php'", 500);
                        
		}

	</script>
<?php

require_once '../../Db/daohelper.php';
require_once '../funcoes/funcoes.php';
$email = isset($_REQUEST['email'])?$_REQUEST['email']:null;
$senha = isset($_REQUEST['senha'])?$_REQUEST['senha']:null;
$pdo= connection();


    $verificar = "SELECT email_usu, senha_usu from usuario where email_usu='$email' and senha_usu='$senha';";
    $validarLogin = executeSelect($pdo, $verificar);
    $count = $validarLogin->rowCount();

    if($count > 0){
       
            if( strpos(file_get_contents("../banimento/checkBan.txt"),$email) !== false) {
                echo "<script>alert('Você está Banido Permanentemente!');
                top.location.href='../login/';
                 </script>";
            }else{
                
            
        session_start();
        $_SESSION["email"]= $_POST["email"];
        $_SESSION["senha"]= $_POST["senha"];
        $verificar = ("SELECT cod_usu, defini_usu from usuario where email_usu = '$email' and senha_usu = '$senha';");
                $validarLogin = executeSelect($pdo, $verificar);
                $fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
                $id = $fetch->cod_usu;
                $defini = $fetch->defini_usu;
                $_SESSION["defini"] = $defini;
                $_SESSION["id"] = $id;
            echo "<script>loginsucessfully(); </script>"; 
        }
        }else{

            if( strpos(file_get_contents("../banimento/checkBan.txt"),$email) !== false) {
                echo "<script>alert('Você está Banido Permanentemente!');
                top.location.href='../login/';
                 </script>";
            }else{
            
            
            $verificar = "SELECT email_empre, senha_empre from empresa where email_empre='$email' and senha_empre='$senha';";
            $validarLogin = executeSelect($pdo, $verificar);
            $fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
            $count = $validarLogin->rowCount();
            }
            if($count > 0){
                session_start();
                $_SESSION["email"]= $_POST["email"];
                $_SESSION["senha"]= $_POST["senha"];
                $verificar = ("SELECT cod_empresa, defini_empre from empresa where email_empre = '$email' and senha_empre = '$senha';");
                $validarLogin = executeSelect($pdo, $verificar);
                $fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
                $defini = $fetch->defini_empre;
                $id = $fetch->cod_empresa;
                $_SESSION["defini"] = $defini;
                $_SESSION["id"] = $id;

                echo "<script>
                        loginsucessfully();
                </script>";
            
            }else{
            $verificar = "SELECT email_adm, senha_adm from adm where email_adm='$email' and senha_adm='$senha';";
            $validarLogin = executeSelect($pdo, $verificar);
            $count = $validarLogin->rowCount();
            if($count > 0){
                session_start();
                $_SESSION["email"]= $_POST["email"];
                $_SESSION["senha"]= $_POST["senha"];
                $verificar = ("SELECT cod_adm, defini_adm from adm where email_adm = '$email' and senha_adm = '$senha';");
                $validarLogin = executeSelect($pdo, $verificar);
                $fetch = $validarLogin->fetch(PDO ::FETCH_OBJ);
                $id = $fetch->cod_adm;
                $defini = $fetch->defini_adm;
                $_SESSION["id"] = $id;
                $_SESSION["defini"] = $defini;
                echo "<script>
                loginsucessfully();
                </script>";
                
            }else{
                echo "<script>alert('Usuarios Ou Senha Incorretos!');
                top.location.href='../login/';
                 </script>";
                }
    }
        }

    ?>

