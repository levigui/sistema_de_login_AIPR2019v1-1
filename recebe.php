<?php 

//É necessario fazer a conexão com o banco de dados
require_once "configDB.php";

function verificar_entrada($entrada){
    $saida = trim($entrada); //remove espaços antes e depois
    $saida = stripslashes($saida); //remove as barras
    $saida = htmlspecialchars($saida);
    return $saida;
}

if(isset($_POST['action']) && $_POST['action'] == 'cadastro'){

        //pegar os campos do formulario
        $nomeCompleto = verificar_entrada($_POST['nomeCompleto']);
        $nomeUsuario = verificar_entrada($_POST['nomeUsuário']);
        $emailUsuario = verificar_entrada($_POST['emailUsuário']);
        $senhaUsuario = verificar_entrada($_POST['senhaUsuário']);
        $senhaConfirma = verificar_entrada($_POST['senhaConfirma']);
        $concordar = $_POST['concordar'];
        $dataCriacao = date("Y-m-d H:i:s");
        // Hash de senha/ Codificação

        $senha = sha1($senhaUsuario);
        $senhaC = sha1($senhaConfirma);
        
        echo "<h5>Nome Completo: $nomeCompleto</h5>";
        echo "<h5>Nome Usuario: $nomeUsuario</h5>";
        echo "<h5>E-mail Usuario: $emailUsuario</h5>";
        echo "<h5>Senha Usuario: $senhaUsuario</h5>";
        echo "<h5>Senha Confirma: $senhaConfirma</h5>";
        echo "<h5>Concordar: $concordar</h5>";
        echo "<h5>Data: $dataCriacao</h5>";

        if($senha != $senhaC){
            echo "<h1> As senha nao conferem</h1>";
            exit();
        }else{
            echo "<h5>senha codificada: $senha</h5>";
        }

} else{
echo "<h1 style = 'color:tomato'> Esta Pagina Não Pode ser acessada Diretamente</h2>";

}