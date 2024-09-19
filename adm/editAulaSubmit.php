<?php
include 'class/aula.class.php';
$aula = new Aula();
 
if(!empty($_GET['id_aula']))
{
    $nomeAula = $_GET ['nomeAula'];
    $descricao = $_GET ['descricao'];
    $duracao = $_GET['duracao'];
    $dataPublicacao = $_GET['dataPublicacao'];
    $link = $_GET ['link'];
    $id_aula = $_GET['id_aula'];
 
    $aula->editAula($nomeAula,$descricao,$duracao,$dataPublicacao,$link,$id_aula);

    header('Location: aulaManagement.php');
}
else
{
    echo '<script type="text/javascript">alert("Nome de Torneio já cadastrado!");</script>';
}
?>

