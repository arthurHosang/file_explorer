<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista Completa de Projetos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="_lib/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="_lib/bootstrap-plugins/sticky-footer.css" rel="stylesheet">
    <link href="_lib/hosang/tresareias.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>

<?php
require_once 'classes/pasta.php';
require_once 'classes/arquivo.php';
$p = new pasta('../');
$array = $p->getArquivos();

//            echo '<pre>';
//            echo $array[0]->getItemParaExibicao();
//            echo '</pre>';
?>

<header></header>

<div class="container">

    <div class="row">
        <div class="col-md-10 col-sm-offset-1">

            <div class="row">
                <div class="col-md-6">
                    <h1 class="cursor-pointer" onclick="$(this).parent().find('.list-group').collapse('toggle')">Meus Projetos</h1>
                    <div class="list-group collapse in">
                        <?php
                        echo $p->getVisualizacao('projeto');
                        ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <h1 class="cursor-pointer" onclick="$(this).parent().find('.list-group').collapse('toggle')">Doc de Bibliotecas</h1>
                    <div class="list-group collapse in">
                        <?php
                        echo $p->getVisualizacao('biblioteca');
                        ?>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <h1 class="cursor-pointer" onclick="$(this).parent().find('.list-group').collapse('toggle')">Meus Estudos</h1>
                    <div class="list-group collapse in">
                        <?php
                        echo $p->getVisualizacao('tutorial');
                        ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <h1 class="cursor-pointer" onclick="$(this).parent().find('.list-group').collapse('toggle')">Outros Sites</h1>
                    <div class="list-group collapse in">
                        <?php
                        echo $p->getVisualizacao('outro');
                        ?>
                    </div>
                </div>


            </div>


            <div class="row">

                <div class="col-md-6">
                    <h1 class="cursor-pointer" onclick="$(this).parent().find('.list-group').collapse('toggle')">Arquivos</h1>
                    <div class="list-group collapse">
                        <?php
                        echo $p->getVisualizacao('arquivo');
                        ?>
                    </div>
                </div>

            </div>



        </div>
    </div>

</div>

<footer></footer>

<script src="_lib/jQuerry/jquery-1.11.3.min.js"></script>
<script src="_lib/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script src="_lib/hosang/tresareias.js"></script>
<script>
    $(document).ready(function () {
            $('header').load('modelos/navbar.php');
            $('footer').load('modelos/footer.html');
        }
    )
</script>

</body>
</html>