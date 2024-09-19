<?php
    session_start();
    include 'class/user.class.php';
    include 'inc/header.inc.php';
    $user = new User();
 
    if(!empty($_GET['id_user'])){
        $id_user = $_GET['id_user'];
        $info = $user->searchUser($id_user);
        if(empty($info['email'])){
            header("Location: /userManagment.php");
            exit;
        }
        $arrayperm = explode(',',$info['permissao']);

    }else{
        header("Location: /userManagment.php");
        exit;
    }
 
?>

<div class="fluid-container bgMiddle sizeIndex justify-content-start">
    <h1 class="text-center h1space">Editar Usuário</h1>

    <div class="sizeDiv d-flex justify-content-center">

        <form method="GET" action="editUserSubmit.php" class="d-table sizeForm">
            <input type="hidden" name="id_user" value="<?php echo $info['id_user'] ?>"/>

            <label>Nome</label>
            <input type="text" name="nome" class="space" value="<?php echo $info['nome'] ?>"/> <br><br>

            <label>Data Nascimento</label>
            <input type="date" name="dtNasc" class="space" value="<?php echo $info['dtNasc'] ?>"/><br><br>

            <label>Nickname</label>
            <input type="text" name="nick" class="space" value="<?php echo $info['nick'] ?>"/><br><br>

            <!--<label>Senha</label>
            <input type="text" name="senha" class="space" value="<?php //echo $info['senha'] ?>"/><br><br>-->

            <label>Email</label>
            <input type="text" name="email" class="space" value="<?php echo $info['email'] ?>"/><br><br>

            <label>Telefone</label>
            <input type="text" name="telefone" class="space" value="<?php echo $info['telefone'] ?>"/><br><br>

            <label class="fw-bold ms-2">Add</label>
            <?php if($user->searchPermissionAdd($arrayperm) == TRUE){ ?><input type="checkbox" id="add" name="permissao[]" value="add" <?php echo'checked';} 
            else {echo '<input type="checkbox" id="add" name="permissao[]" value="add"';}?>/>
            <label class="fw-bold ms-2">Edit</label>
            <?php if($user->searchPermissionEdit($arrayperm) == TRUE){ ?><input type="checkbox" id="edit" name="permissao[]" value="edit" <?php echo'checked';}
            else {echo '<input type="checkbox" id="add" name="permissao[]" value="edit"';}?> />
            <label class="fw-bold ms-2">Del</label>
            <?php if($user->searchPermissionDel($arrayperm) == TRUE){ ?><input type="checkbox" id="del" name="permissao[]" value="del" <?php echo'checked';}
            else {echo '<input type="checkbox" id="add" name="permissao[]" value="del"';}?>/> 
            <label class="fw-bold ms-2">Super</label>
            <?php if($user->searchPermissionSuper($arrayperm) == TRUE){ ?><input type="checkbox" id="super" name="permissao[]" value="super" <?php echo'checked';}
            else {echo '<input type="checkbox" id="add" name="permissao[]" value="super"';}?>/><br>
            
            <div class="d-flex justify-content-center btnPosition">
                <input class="btnCenter btn btn-success" type="submit" value="Editar"/> <br><br>
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