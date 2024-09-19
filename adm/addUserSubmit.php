<?php
include './class/user.class.php';
$user = new User();
 
if(!empty($_POST['email'])){
    $nome = $_POST ['nome'];
    $dtNasc = date('Y-m-d',strtotime($_POST ['dtNasc']));
    $nick = $_POST ['nick'];
    $senha = md5($_POST ['senha']);
    $email = $_POST ['email'];
    $telefone = $_POST ['telefone'];
    $permissao = implode(',',$_POST ['permissao']);
 
    $user->addUser($nome,$dtNasc,$nick,$senha,$email,$telefone,$permissao);
    header('Location: userManagment.php?');
}else{
    echo '<script type="text/javascript">alert("Email já cadastrado! (BURRO!)");</script>';
}
?>