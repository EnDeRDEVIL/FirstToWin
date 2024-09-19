<?php
    session_start();
    require_once 'inc/header.inc.php';
    require_once 'class/user.class.php';

    if(!empty($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = md5($_POST['senha']);

        $users = new User();
        if($users->doLogin($email,$senha))
        {
            header("Location: index.php");
            exit;
        }
        else
        {
            echo '<span style="color: green">'."Usuário e/ou Senha incorreto(s)!!!".'</span>';
        }
    }
?>

<h1 class="text-center align-center">Login de Usuário</h1>

<div class="sizeDivLogin d-flex justify-content-center">
    <form method="POST" class="d-table sizedLogin bg-info">
            <label class="text-center">Usuário:</label>
            <input type="email" name="email" class="spaceLogin"> <br><br>

            <label class="text-center">Senha:</label>
            <input type="password" name="senha" class="spaceLogin"><br><br>

            <br><br><br>

            <button type="submit" value="entrar" class="btnCenter">Entrar</button>
    </form>
</div>


<?php
    include 'inc/footer.inc.php';
?>