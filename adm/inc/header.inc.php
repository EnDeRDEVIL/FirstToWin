<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>FTW</title>
</head>

<body>

    <header class="d-grid w-100 header clearfix">
        <div class="navbar navbar-warning bgTop">
            <div class="fluid-container d-flex justify-content-center clearfix">
                <a href="index.php" class="teste"><img src="img/logo2.png" class="img-fluid center" style="width: 30%"></a>
                <link rel="stylesheet" type="text/css" href="css/style.css">
            </div>

            <?php
            if(isset($_SESSION['logged']))
            {
                // $nome = $_POST['nome'];

                echo '<nav class="fluid-container text-white clearfix">
                        <p class="textSpacing2">Bem-vindo(a) '.$_SESSION['nick'].'</p>
                        <div class="fluid-container d-flex justify-content-center clearfix">
                            <button class="btn btn-light textSpacing2"><a href="exit.php">Sair</a></button><br>
                        </div>
                      </nav>';
            }
            ?>
            
        </div>
    </header>