<?php
include './class/tournament.class.php';
$trnmt = new Tournament();
 
if(!empty($_POST['nomeTrnmt'])){
    $nomeTrnmt = $_POST ['nomeTrnmt'];
    $gameName = $_POST ['gameName'];
    $dataInicio = $_POST ['dataInicio'];
    $dataFim = $_POST ['dataFim'];
    $premiacao = $_POST ['premiacao'];
    $telefone = $_POST ['telefone'];
    $multiGanhadores = $_POST ['multiGanhadores'];
 
    $trnmt->addTrnmt($nomeTrnmt,$gameName,$dataInicio,$dataFim,$premiacao,$multiGanhadores);
    header('Location: trnmtManagement.php?');
}else{
    echo '<script type="text/javascript">alert("Nome de Torneio já cadastrado!");</script>';
}
?>

