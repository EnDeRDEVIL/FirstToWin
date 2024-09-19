<?php
    include 'class/user.class.php';
    $user = new User();
 
    if(!empty($_GET['id_user'])){
        $id_user = $_GET['id_user'];
        $info = $user->searchUser($id_user);
        $user->deleteUser($id_user);
        header("Location: userManagment.php");
        exit;
   
    }else{
        echo '<script type="text/javascript">alert("deu bololô ao excluir o contato :( ")</script>';
        header("Location: userManagment.php");
        exit;
    }
 
?>