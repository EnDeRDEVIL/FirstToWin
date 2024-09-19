<?php
    session_start();
    include 'inc/header.inc.php';
    include 'class/aula.class.php';
    
    $aula = new Aula();
?>


<div class="bgMiddle sizeIndex justify-content-start">

    <h1>Gerenciamento de Torneios</h1>

    <div class="d-flex justify-content-center clearfix">
        <div class="d-flex justify-content-center align-center text-center mb-3 me-5">
            <button class="btn btn-success"><a href="addAula.php">ADICIONAR</a></button>
        </div>

        <div class="d-flex justify-content-center align-center text-center mb-3 ms-5">
            <button class="btn btn-success"><a href="index.php">Voltar</a></button>
        </div>
    </div>

    <div class="d-flex justify-content-center align-center text-center size">

        <table class="table table-bordered" width="99%">
            <tr>
                <th class="fw-bold">ID</th>
                <th class="fw-bold">Nome Aula</th>
                <th class="fw-bold">Descrição</th>
                <th class="fw-bold">Duração</th>
                <th class="fw-bold">Data Publicação</th>
                <th class="fw-bold">Link</th>

                <th class="fw-bold"></th>
            </tr>

            <?php
                $lista = $aula->listAula();
                foreach($lista as $item) : 
            ?>

            <tbody class="">
                    <tr>
                        <td class="p-2"><?php echo $item['id_aula']; ?></td>
                        <td class="p-2"><?php echo $item['nomeAula']; ?></td>
                        <td class="p-2"><?php echo $item['descricao']; ?></td>
                        <td class="p-2"><?php echo $item['duracao']; ?></td>
                        <td class="p-2"><?php echo implode("/", array_reverse(explode("-",$item['dataPublicacao'])));?></td>
                        <td class="p-2"><?php echo $item['link']; ?></td>
                        <td class="p-2">
                            <button class="btn btn-dark btn-sm"><a href="editAula.php?id_aula=<?php echo $item['id_aula']?>">EDITAR</a></button>
                            <button class="btn btn-dark btn-sm"><a href="deleteAula.php?id_aula=<?php echo $item['id_aula']?>" onclick="return confirm('Você tem CERTEZA disso?')">EXCLUIR</a></button>
                        </td>
                    </tr>
                </tbody>

            <?php
                endforeach;
            ?>
        </table>
    </div>
</div>


<?php
    include 'inc/footer.inc.php';
?>