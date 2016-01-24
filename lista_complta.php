<?php

function ordenaMatriz($arrayArquivos, $coluna)
{
    $temp = $arrayArquivos[0];
    for ($i = 0; $i < count($arrayArquivos); $i++) {
        for ($j = 0; $j <= count($arrayArquivos); $j++) {
            if ($arrayArquivos[$i][$coluna] < $arrayArquivos[$j][$coluna]) {
                $temp = $arrayArquivos[$i];
                $arrayArquivos[$i] = $arrayArquivos[$j];
                $arrayArquivos[$j] = $temp;
            }
        }
    }
    return $arrayArquivos;
}

function exibePastas($arrayArquivos)
{
    for ($i = 0; $i < count($arrayArquivos); $i++) {
        echo "<a href='{$arrayArquivos[$i]['caminho']}' class='list-group-item'>";
        echo "<h4 class='list-group-item-heading'><span class='glyphicon {$arrayArquivos[$i]['classe']}'></span> {$arrayArquivos[$i]['projeto']}</h4>";
        echo "<p class='list-group-item-text'>Lorem ipsum</p>";
        echo "</a>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="_lib/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-11 col-sm-offset-1">
            <br>
            <h1>Lista de Projetos</h1>
            <br>
        </div>
    </div>
    <div class="row">

        <div class="col-md-7 col-sm-offset-1">
            <div class="list-group">

                <?php

                $pasta = '../';

                $array_diretorios_ignorar = array('..', '.', '.idea', 'launcher0');
                $arrayPastas = array();

                if (is_dir($pasta)) {
                    $diretorio = dir($pasta);
                    $count = -1;
                    while ($arquivo = $diretorio->read()) {
                        if (!is_file($arquivo)) {
                            if ($arquivo != '..' && $arquivo != '.' && $arquivo != '.idea' && $arquivo != 'launcher0' && $arquivo != '_index.html') {
                                $count++;
                                $arrayArquivos[$count]['projeto'] = $arquivo;
                                $arrayArquivos[$count]['caminho'] = $pasta . $arquivo;
                                $arrayArquivos[$count]['classe'] = " glyphicon-asterisk";
                            }
                        }
                    }
                    $diretorio->close();
                }

                $arrayArquivos = ordenaMatriz($arrayArquivos, 'projeto');

                exibePastas($arrayArquivos);
                ?>
            </div>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="_lib/jquerry/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="_lib/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>