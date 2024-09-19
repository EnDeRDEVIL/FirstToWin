<?php
    session_start();
    include 'inc/header.inc.php';
?>



<div class="fluid-container bgMiddle sizeIndex justify-content-start">

    <h1 class="text-center h1space">Adicionar Torneio</h1>

    <div class="d-flex sizeDiv justify-content-center">
        <form method="POST" action="addTrnmtSubmit.php" class="d-table sizeForm">
            <label >Nome Torneio:</label>
            <input type="text" name="nomeTrnmt" class="space"/> <br><br>

            <label class="teste">Game Torneio:</label>
            <select name="gameName" class="space">
                <option value="Street Fighter 6">Street Fighter 6</option>
                <option value="Mortal Kombat 1">Mortal Kombat 1</option>
                <option value="Tekken 8">Tekken 8</option>
                <option value="Skull Girls">Skull Girls</option>
                <option value="Dead or Alive 6">Dead or Alive 6</option>
                <option value="2XKO">2XKO</option>
            </select> <br><br>

            <label class="teste">Data Início:</label>
            <input type="date" name="dataInicio" class="space"/> <br><br>

            <label class="teste">Data Fim:</label>
            <input type="date" name="dataFim" class="space"/> <br><br>

            <label class="teste">Premiação:</label>
            <input type="text" name="premiacao" class="space"/> <br><br>

            <label class="teste">Qtd. Ganhadores:</label>
            <input type="text" name="multiGanhadores" class="space"/> <br><br>

            
            <div class="d-flex justify-content-center clearfix">
                <input class="btnCenter btn btn-success btnCorrect" type="submit" value="Adicionar"/> <br><br>
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