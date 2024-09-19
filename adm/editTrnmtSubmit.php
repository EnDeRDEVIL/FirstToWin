<?php
include 'class/tournament.class.php';
$trnmt = new Tournament();
 
if(!empty($_GET['id_tournament']))
{

    $nomeTrnmt = $_GET ['nomeTrnmt'];
    $gameName = $_GET ['gameName'];
    $dataInicio = $_GET['dataInicio'];
    $dataFim = $_GET['dataFim'];
    $premiacao = $_GET ['premiacao'];
    $multiGanhadores = $_GET ['multiGanhadores'];
    $id_tournament = $_GET['id_tournament'];
 
    $trnmt->editTrmnt($nomeTrnmt,$gameName,$dataInicio,$dataFim,$premiacao,$multiGanhadores,$id_tournament);

    header('Location: trnmtManagement.php');
}
else
{
    echo '<script type="text/javascript">alert("Nome de Torneio já cadastrado!");</script>';
}
?>

