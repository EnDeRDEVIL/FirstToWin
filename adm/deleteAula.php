<?php
    include 'class/aula.class.php';
    $aula = new Aula();
 
    if(!empty($_GET['id_aula'])){
        $id_aula = $_GET['id_aula'];
        $info = $aula->searchAula($id_aula);
        $aula->deleteAula($id_aula);
        header("Location: aulaManagement.php");
        exit;
   
    }else{
        echo '<script type="text/javascript">alert("deu bololô ao excluir o contato :( ")</script>';
        header("Location: aulaManagement.php");
        exit;
    }
 
?>