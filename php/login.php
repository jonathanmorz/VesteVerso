<?php
include("connection.php");


if(isset($_POST['Usuario']) || isset($_POST['Password'])) 
{
    if(strlen($_POST['Usuario']) == 0)
    {
        echo("Preencha seu usuário");
    }
    elseif(strlen($_POST['Password']) == 0)
    {
        echo("Preencha sua senha");
    }
    else
    {
        $usuario = $mysqli->real_escape_string($_POST['Usuario']);
        $Senha = $mysqli->real_escape_string($_POST['Password']);


        $sql_code = "SELECT * FROM clientes WHERE username = '$usuario' AND senha = '$Senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL" . $mysqli->error) ;

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1)
        {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION))
            {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../php/index.php");

        }
        else
        {
            echo("Falha ao logar! E-Mail ou Senha incorretos");
        }
    }
}

session_start();


?>