<?php
    session_start();
    include 'inc/header.inc.php';
    include 'class/user.class.php';
    
    $user = new User();
    
?>


<div class="bgMiddle sizeIndex justify-content-start">

    <h1>Gerenciamento de Usuários</h1>

    <div class="d-flex justify-content-center clearfix">
        <div class="d-flex justify-content-center align-center text-center mb-3 me-5">
            <button class="btn btn-success"><a href="addUser.php">ADICIONAR</a></button>
        </div>

        <div class="d-flex justify-content-center align-center text-center mb-3 ms-5">
            <button class="btn btn-success"><a href="index.php">Voltar</a></button>
        </div>
    </div>

    <div class="d-flex justify-content-center align-center text-center size">

        <table class="table table-bordered" width="99%">
            <tr>
                <th class="fw-bold">ID</th>
                <th class="fw-bold">Nome</th>
                <th class="fw-bold">Data Nascimento</th>
                <th class="fw-bold">Nick</th>
                <!--<th class="fw-bold">Senha</th>-->
                <th class="fw-bold">Email</th>
                <th class="fw-bold">Telefone</th>
                <th class="fw-bold">Permissão</th>
                <th class="fw-bold"></th>
            </tr>

            <?php
                $lista = $user->listUsers();
                foreach($lista as $item) : 
            ?>

            <tbody class="">
                    <tr>
                        <td class="p-2"><?php echo $item['id_user']; ?></td>
                        <td class="p-2"><?php echo $item['nome']; ?></td>
                        <!--<td class="p-2"><?php //echo implode("/", array_reverse(explode("-", $item['dtNasc']))); ?></td>-->
                        <td class="p-2"><?php echo $item['nick']; ?></td>
                        <td class="p-2"><?php echo $item['senha']; ?></td>
                        <td class="p-2"><?php echo $item['email'] ;?></td>
                        <td class="p-2"><?php echo $item['telefone']; ?></td>
                        <td class="p-2"><?php echo $item['permissao']; ?></td>
                        <td class="p-2">
                            <button class="btn btn-dark btn-sm"><a href="editUser.php?id_user=<?php echo $item['id_user']?>">EDITAR</a></button>
                            <button class="btn btn-dark btn-sm"><a href="deleteUser.php?id_user=<?php echo $item['id_user']?>" onclick="return confirm('Você tem CERTEZA disso?')">EXCLUIR</a></button>
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