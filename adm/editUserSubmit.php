<?php
include './class/user.class.php';
$user = new User();
 
if(!empty($_GET['id_user'])){
    $id_user = $_GET['id_user'];
    $nome = $_GET ['nome'];
    $dtNasc = date('Y-m-d',strtotime($_GET ['dtNasc']));
    $nick = $_GET ['nick'];
    $senha = $_GET ['senha'];
    $email = $_GET ['email'];
    $telefone = $_GET ['telefone'];
    $permissao = implode(',',$_GET['permissao']);
 
    $user->editUser($nome,$dtNasc,$nick,$senha,$email,$telefone,$permissao,$id_user);
    header('Location: userManagment.php');
}else{
    echo '<script type="text/javascript">alert("Email já cadastrado! (BURRO!)");</script>';
}
?>