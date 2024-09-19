<?php
    include 'inc/header.inc.php';
    include 'class/user.class.php';
    
    $user = new User();
?>

<div class="bg-info d-grid">

    <h1>Gerenciamento de Usuários</h1>

    <hr>

    <div class="d-flex justify-content-center align-center text-center mb-3">
        <button class="btn btn-success"><a href="addUser.php">ADICIONAR</a></button>
    </div>


    <div = class="d-flex justify-content-center align-center text-center">

        <table class="table-bordered mb-5" width="99%">
            <tr>
                <th class="bg-light">ID</th>
                <th class="bg-secondary">Nome</th>
                <th class="bg-light">Data Nascimento</th>
                <th class="bg-secondary">Nick</th>
                <th class="bg-light">Senha</th>
                <th class="bg-secondary">Email</th>
                <th class="bg-light">Telefone</th>
                <th class="bg-secondary">Permissão</th>
                <th class="bg-light"></th>
            </tr>

            <?php
                $lista = $user->listUsers();
                foreach($lista as $item) : 
            ?>

            <tbody class="">
                    <tr>
                        <td class="p-2 bg-light"><?php echo $item['id_user']; ?></td>
                        <td class="p-2 bg-secondary"><?php echo $item['nome']; ?></td>
                        <td class="p-2 bg-light"><?php echo implode("/", array_reverse(explode("-", $item['dtNasc']))); ?></td>
                        <td class="p-2 bg-secondary"><?php echo $item['nick']; ?></td>
                        <td class="p-2 bg-light"><?php echo $item['senha']; ?></td>
                        <td class="p-2 bg-secondary"><?php echo $item['email'] ;?></td>
                        <td class="p-2 bg-light"><?php echo $item['telefone']; ?></td>
                        <td class="p-2 bg-secondary"><?php echo $item['permissao']; ?></td>
                        <td class="p-2 bg-light">
                            <button class="btn btn-dark btn-sm"><a href="editUser.php?id_user=<?php echo $item['id_user']?>">EDITAR</a></button>
                            <button class="btn btn-dark btn-sm"><a href="deleteUser.php?id_user=<?php echo $item['id_user']?>">EXCLUIR</a></button>
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