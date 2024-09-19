<?php
    session_start();
    include 'inc/header.inc.php';
    include 'class/user.class.php';

    if(!isset($_SESSION['logged']))
    {
        header("Location: loginAdm.php");
        exit;
    }

    $user = new User();
    $user->setUser($_SESSION['logged']);
?>
<div class="clearfix"></div>
<div class="fluid-container bgMiddle sizeIndex justify-content-start">
    <h1 class="text-center correct">Bem-Vindo ao Administrativo FTW</h1>

    <h3 class="textSpacing clearfix">Gerenciamentos Administrativos</h3>

    <div class="fluid-container correct clearfix">
        <ul>
            <li><a href="./userManagment.php" class="textSpacing3"><h4>Gerenciamento de Usuários</h4></a></li>
            <li><a href="./trnmtManagement.php" class="textSpacing3"><h4>Gerenciamento de Torneios</h4></a></li>
            <li><a href="./aulaManagement.php" class="textSpacing3"><h4>Gerenciamento de Aulas</h4></a></li>
        </ul>
    </div>

    
</div>
<?php
    include 'inc/footer.inc.php';
?>
