<?php
    include 'class/tournament.class.php';
    $trnmt = new Tournament();
 
    if(!empty($_GET['id_tournament'])){
        $id_tournament = $_GET['id_tournament'];
        $info = $trnmt->searchTrnmt($id_tournament);
        $trnmt->deleteTrnmt($id_tournament);
        header("Location: trnmtManagement.php");
        exit;
   
    }else{
        echo '<script type="text/javascript">alert("deu bololô ao excluir o contato :( ")</script>';
        header("Location: trnmtManagement.php");
        exit;
    }
 
?>