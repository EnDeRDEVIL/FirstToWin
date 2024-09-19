<?php
    include 'class/tournament.class.php';
    include 'inc/header.inc.php';
    $trnmt = new Tournament();
 
    if(!empty($_GET['id_tournament'])){
        $id_tournament = $_GET['id_tournament'];
        $info = $trnmt->searchTrnmt($id_tournament);
        if(empty($info['id_tournament'])){
            header("Location: trnmtManagement.php");
            exit;
        }

    }else{
        header("Location: trnmtManagement.php");
        exit;
    }
?>

<div class="fluid-container bgMiddle sizeIndex justify-content-start">
    <h1 class="text-center h1space">Editar Usuário</h1>

    <div class="sizeDiv d-flex justify-content-center">

        <form method="GET" action="editTrnmtSubmit.php" class="d-table sizeForm">
            <input type="hidden" name="id_tournament" value="<?php echo $info['id_tournament'] ?>"/>

            <label >Nome Torneio:</label>
            <input type="text" name="nomeTrnmt" class="space" value="<?php echo $info['nomeTrnmt'] ?>"/> <br><br>

            <label class="teste">Game Torneio:</label>
            <select name="gameName" class="space">
                <option><?php echo $info['gameName'] ?> - Atual</option>
                <option value="Street Fighter 6">Street Fighter 6</option>
                <option value="Mortal Kombat 1">Mortal Kombat 1</option>
                <option value="Tekken 8">Tekken 8</option>
                <option value="Skull Girls">Skull Girls</option>
                <option value="Dead or Alive 6">Dead or Alive 6</option>
                <option value="2XKO">2XKO</option>
            </select> <br><br>

            <label class="teste">Data Início:</label>
            <input type="date" name="dataInicio" class="space" value="<?php echo $info['dataInicio'] ?>"/> <br><br>

            <label class="teste">Data Fim:</label>
            <input type="date" name="dataFim" class="space" value="<?php echo $info['dataFim'] ?>"/> <br><br>

            <label class="teste">Premiação:</label>
            <input type="text" name="premiacao" class="space" value="<?php echo $info['premiacao'] ?>"/> <br><br>

            <label class="teste">Qtd. Ganhadores:</label>
            <input type="text" name="multiGanhadores" class="space" value="<?php echo $info['multiGanhadores'] ?>"/> <br><br>

            
            <div class="d-flex justify-content-center btnPosition">
                <input class="btnCenter btn btn-success" type="submit" value="Editar"/> <br><br>
            </div>
        </form>
    </div>
    <div class="fluid-container d-flex btnPosition justify-content-center">
        <button class="btn btn-secondary"><a href="trnmtManagement.php">Voltar</a></button>
    </div>
</div>
<?php
    include 'inc/footer.inc.php';
?>