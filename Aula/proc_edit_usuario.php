<?php
session_start();
include_once("conexao.php")



$id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL):

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE usuarios SET nome ='$nome', email = '$email', modified = NOW() WHERE ID = '$ID'";
$resultado_usuario = mysqli_query($conn, $result_usuario);




if (mysql_affected_rows($conn)) {
$_SESSION['msg'] = "<p style='color: goldenrod;'>Usuário editado com sucesso</p>";
header ("Location: index.php");
}else{
    $_SESSION['msg'] = "<p style='color: gray;'>Usuário não foi editado com sucesso</p>";
header("Location: editar.php?id=$id");
}
?>
