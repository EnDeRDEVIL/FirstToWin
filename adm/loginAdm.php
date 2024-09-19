<?php
    include 'inc/header.inc.php';
?>

<form action="loginAdmSubmit.php">
    <div class="d-grid justify-content-center"> 
        <h1 class="text-center align-center">Login de Usário</h1>

        <label class="text-center">Usuário:</label>
        <input type="text" name="nome">

        <label class="text-center">Senha:</label>
        <input type="password" name="senha">

        <br><br><br>

        <button type="submit" value="entrar">Entrar</button>
    </div>
</form>