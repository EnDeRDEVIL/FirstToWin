<?php
    session_start();
    include 'inc/header.inc.php';
?>



<div class="fluid-container bgMiddle sizeIndex justify-content-start">

    <h1 class="text-center h1space">Adicionar Aulas</h1>

    <div class="d-flex sizeDiv justify-content-center">
        <form method="POST" action="addAulaSubmit.php" class="d-table sizeForm">
            <label >Nome Aula:</label>
            <input type="text" name="nomeAula" class="space"/> <br><br>

            <label class="teste">Descrição:</label>
            <input type="text" name="descricao" class="space"/> <br><br>

            <label class="teste">Duração:</label>
            <input type="time" name="duracao" step="1" class="space"/> <br><br>

            <label class="teste">Data Publicação:</label>
            <input type="date" name="dataPublicacao" class="space"/> <br><br>

            <label class="teste">Link:</label>
            <input type="text" name="link" class="space"/> <br><br>

            
            <div class="d-flex justify-content-center clearfix">
                <input class="btnCenter btn btn-success btnCorrect" type="submit" value="Adicionar"/> <br><br>
            </div>
        </form>
    </div>

    <div class="fluid-container d-flex btnPosition justify-content-center">
        <button class="btn btn-secondary"><a href="aulaManagement.php">Voltar</a></button>
    </div>
</div>
<?php
    include 'inc/footer.inc.php';
?>