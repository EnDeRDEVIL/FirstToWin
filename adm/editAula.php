<?php
    session_start();
    include 'class/aula.class.php';
    include 'inc/header.inc.php';
    $aula = new Aula();
 
    if(!empty($_GET['id_aula'])){
        $id_aula = $_GET['id_aula'];
        $info = $aula->searchAula($id_aula);
        if(empty($info['id_aula'])){
            header("Location: /aulaManagement.php");
            exit;
        }

    }else{
        header("Location: /aulaManagement.php");
        exit;
    }
 
?>



<div class="fluid-container bgMiddle sizeIndex justify-content-start">
    <h1 class="text-center h1space">Editar Aula</h1>

    <div class="sizeDiv d-flex justify-content-center">

        <form method="GET" action="editAulaSubmit.php" class="d-table sizeForm">
            <input type="hidden" name="id_aula" value="<?php echo $info['id_aula'] ?>"/>

            <label>Nome Aula</label>
            <input type="text" name="nomeAula" class="space" value="<?php echo $info['nomeAula'] ?>"/> <br><br>

            <label>Descrição</label>
            <input type="text" name="descricao" class="space" value="<?php echo $info['descricao'] ?>"/><br><br>

            <label>Duração</label>
            <input type="time" name="duracao" class="space" step="1" value="<?php echo $info['duracao'] ?>"/><br><br>

            <label>Data Publicação</label>
            <input type="date" name="dataPublicacao" class="space" value="<?php echo $info['dataPublicacao'] ?>"/><br><br>

            <label>Link</label>
            <input type="text" name="link" class="space" value="<?php echo $info['link'] ?>"/><br><br>

            
            <div class="d-flex justify-content-center btnPosition">
                <input class="btnCenter btn btn-success" type="submit" value="Editar"/> <br><br>
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