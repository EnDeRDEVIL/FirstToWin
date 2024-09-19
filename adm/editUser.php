<?php
    include 'class/user.class.php';
    $user = new User();
 
    if(!empty($_GET['id_user'])){
        $id_user = $_GET['id_user'];
        $info = $user->searchUser($id_user);
        if(empty($info['email'])){
            header("Location: /userManagment.php");
            exit;
        }
   
    }else{
        header("Location: /userManagment.php");
        exit;
    }
 
?>

<h1>Editar Usuário</h1>

<form method="GET" action="editUserSubmit.php">
    <input type="hidden" name="id_user" value="<?php echo $info['id_user'] ?>"/>

    <label>Nome</label>
    <input type="text" name="nome" value="<?php echo $info['nome'] ?>"/>

    <label>Data Nascimento</label>
    <input type="date" name="dtNasc" value="<?php echo $info['dtNasc'] ?>"/>

    <label>Nickname</label>
    <input type="text" name="nick" value="<?php echo $info['nick'] ?>"/>

    <label>Senha</label>
    <input type="text" name="senha" value="<?php echo $info['senha'] ?>"/>

    <label>Email</label>
    <input type="text" name="email" value="<?php echo $info['email'] ?>"/>

    <label>Telefone</label>
    <input type="text" name="telefone" value="<?php echo $info['telefone'] ?>"/>

    <label>Permissão</label>
    <input type="text" name="permissao" value="<?php echo $info['permissao'] ?>"/>
    
    <input type="submit" value="Editar"/>
</form>