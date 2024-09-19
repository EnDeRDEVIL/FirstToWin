<?php
    session_start();
    include 'inc/header.inc.php';
?>


<div class="fluid-container bgMiddle sizeIndex justify-content-start">

    <h1 class="text-center h1space">Adicionar Usuário</h1>

    <div class="d-flex sizeDiv justify-content-center">
        <form method="POST" action="addUserSubmit.php" class="d-table sizeForm">
            <label >Nome:</label>
            <input type="text" name="nome" class="space"/> <br><br>

            <label class="teste">Data Nascimento:</label>
            <input type="date" name="dtNasc" class="space"/> <br><br>

            <label class="teste">Nickname:</label>
            <input type="text" name="nick" class="space"/> <br><br>

            <label class="teste">Senha:</label>
            <input type="text" name="senha" class="space"/> <br><br>

            <label class="teste">Email:</label>
            <input type="text" name="email" class="space"/> <br><br>

            <label class="teste">Telefone:</label>
            <input type="text" name="telefone" class="space"/> <br><br>

            <label>Permissões:
            <label class="fw-bold ms-2">Add</label>
            <input type="checkbox" id="add" name="permissao[]" value="add"/>
            <label class="fw-bold ms-2">Edit</label>
            <input type="checkbox" id="edit"  name="permissao[]" value="edit"/>
            <label class="fw-bold ms-2">Del</label>
            <input type="checkbox" id="del"  name="permissao[]" value="del"/>
            <label class="fw-bold ms-2">Super</label>
            <input type="checkbox" id="super"  name="permissao[]" value="super"/></br>
            
            <div class="d-flex justify-content-center clearfix">
                <input class="btnCenter btn btn-success btnCorrect" type="submit" value="Adicionar"/> <br><br>
            </div>
        </form>
    </div>

    <div class="fluid-container d-flex btnPosition justify-content-center">
        <button class="btn btn-secondary"><a href="userManagment.php">Voltar</a></button>
    </div>
</div>
<?php
    include 'inc/footer.inc.php';
?>