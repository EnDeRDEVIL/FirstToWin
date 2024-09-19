<?php
    include 'inc/header.inc.php';
?>

<h1>Adicionar Usuário</h1>

<form method="POST" action="addUserSubmit.php">
    <label>Nome</label>
    <input type="text" name="nome"/>

    <label>Data Nascimento</label>
    <input type="date" name="dtNasc"/>

    <label>Nickname</label>
    <input type="text" name="nick"/>

    <label>Senha</label>
    <input type="text" name="senha"/>

    <label>Email</label>
    <input type="text" name="email"/>

    <label>Telefone</label>
    <input type="text" name="telefone"/>

    <label>Permissão</label>
    <input type="text" name="permissao"/>
    
    <input type="submit" value="Adicionar"/>
</form>

<?php
    include 'inc/footer.inc.php';
?>