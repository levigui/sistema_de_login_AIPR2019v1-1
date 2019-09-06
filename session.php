<?php 
//iniciando a sessao
session_start();
//Conctando com o bando de dados
require_once 'configDB.php';

if(isset($_SESSION['nomeUsuario'])){
    //echo "usuário logado!";
    $usuario = $_SESSION['nomeUsuario'];
    $sql = $conecta->prepare("SELECT * FROM usuario WHERE nomeUsuario = ?");
    $sql->bind_param("s", $usuario);
    $sql->execute();
    $resultado = $sql->get_result();
    $linha = $resultado->fetch_array(MYSQLI_ASSOC);

    $nome = $linha['nome'];
    $email = $linha['email'];
    $dataCriacao = $linha['dataCriacao'];
    $imagem = $linha['imagem'];
    
    
}else{
    //kick
    header("location: index.php");
}