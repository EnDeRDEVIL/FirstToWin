<?php
include './class/aula.class.php';
$aula = new Aula();
 
    

if(!empty($_POST['nomeAula'])){
    $nomeAula = $_POST ['nomeAula'];
    $descricao = $_POST ['descricao'];
    $duracao = $_POST ['duracao'];
    $dataPublicacao = $_POST ['dataPublicacao'];
    $link = $_POST ['link'];
 
    $aula->addAula($nomeAula,$descricao,$duracao,$dataPublicacao,$link);
    header('Location: aulaManagement.php?');
}else{
    echo '<script type="text/javascript">alert("Nome de Torneio já cadastrado!");</script>';
}
?>

