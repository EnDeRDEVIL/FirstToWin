<?php
    session_start();
    include 'inc/header.inc.php';
    include 'class/tournament.class.php';
    
    $trnmt = new Tournament();
?>


<div class="bgMiddle sizeIndex justify-content-start">

    <h1>Gerenciamento de Torneios</h1>

    <div class="d-flex justify-content-center clearfix">
        <div class="d-flex justify-content-center align-center text-center mb-3 me-5">
            <button class="btn btn-success"><a href="addTrnmt.php">ADICIONAR</a></button>
        </div>

        <div class="d-flex justify-content-center align-center text-center mb-3 ms-5">
            <button class="btn btn-success"><a href="index.php">Voltar</a></button>
        </div>
    </div>

    <div class="d-flex justify-content-center align-center text-center size">

        
        <table class="table table-bordered" width="99%">
            <tr>
                <th class="fw-bold">ID</th>
                <th class="fw-bold">Nome Torneio</th>
                <th class="fw-bold">Game Torneio</th>
                <th class="fw-bold">Data Início</th>
                <!--<th class="fw-bold">Senha</th>-->
                <th class="fw-bold">Data Fim</th>
                <th class="fw-bold">Premiação</th>
                <th class="fw-bold">Qtd. Ganhadores</th>
                <th class="fw-bold"></th>
            </tr>

            <?php
                $lista = $trnmt->listTrnmt();
                foreach($lista as $item) : 
            ?>

            <tbody class="">
                    <tr>
                        <td class="p-2"><?php echo $item['id_tournament']; ?></td>
                        <td class="p-2"><?php echo $item['nomeTrnmt']; ?></td>
                        <!--<td class="p-2"><?php //echo implode("/", array_reverse(explode("-", $item['dtNasc']))); ?></td>-->
                        <td class="p-2"><?php echo $item['gameName']; ?></td>
                        <td class="p-2"><?php echo implode("/", array_reverse(explode("-",$item['dataInicio']))); ?></td>
                        <td class="p-2"><?php echo implode("/", array_reverse(explode("-",$item['dataFim'])));?></td>
                        <td class="p-2"><?php echo 'R$'.$item['premiacao']; ?></td>
                        <td class="p-2"><?php echo $item['multiGanhadores']; ?></td>
                        <td class="p-2">
                            <button class="btn btn-dark btn-sm"><a href="editTrnmt.php?id_tournament=<?php echo $item['id_tournament']?>">EDITAR</a></button>
                            <button class="btn btn-dark btn-sm"><a href="deleteTrnmt.php?id_tournament=<?php echo $item['id_tournament']?>" onclick="return confirm('Você tem CERTEZA disso?')">EXCLUIR</a></button>
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