<?php

function ordenaMatriz($arrayPastas, $coluna)
{
    $temp = $arrayPastas[0];
    for ($i = 0; $i < count($arrayPastas); $i++) {
        for ($j = 0; $j <= count($arrayPastas); $j++) {
            if ($arrayPastas[$i][$coluna] < $arrayPastas[$j][$coluna]) {
                $temp = $arrayPastas[$i];
                $arrayPastas[$i] = $arrayPastas[$j];
                $arrayPastas[$j] = $temp;
            }
        }
    }
    return $arrayPastas;
}

function exibeVetor($array)
{
    echo "<div class='list-group'>";

    $caminho = "";
    $classe = "";
    $$apelido = "";
    $descricao = "";

    for ($i = 0; $i < count($array); $i++) {
        $projeto = getInfo($array[$i]['caminho']);

        if ($projeto != null) {
            $caminho = $array[$i]['caminho'];
            $classe = $projeto->classe;
            $apelido = $projeto->nome;
            $descricao = $projeto->descricao;
        } else {
            $caminho = $array[$i]['caminho'];
            $classe = $array[$i]['classe'];
            $apelido = $array[$i]['projeto'];
            $descricao = $caminho;
        }

        echo "<a href='{$caminho}' class='list-group-item'>";
        echo "<h4 class='list-group-item-heading'><span class='glyphicon {$classe}'></span>&nbsp;{$apelido}</h4>";
            echo "<p class='list-group-item-text'>" .$descricao. "</p>";
        echo "</a>";
    }

    echo "</div>";
}


function getInfo($caminho)
{
    $arquivo2 = "config.json";

    $info = file_get_contents($arquivo2);

    $lendo = json_decode($info);

    $retorno = null;

    foreach ($lendo->projetos as $campo) {
        if ($campo->caminho == $caminho) {
            $retorno = $campo;
        }
    }

    return $retorno;
}

?>

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <?php

    $pasta = '../';

    $array_diretorios_ignorar = array('..', '.', '.idea', 'launcher0');
    $arrayPastas = array();
    $arrayArquivos = array();

    if (is_dir($pasta)) {
        $diretorio = dir($pasta);
        $countPastas = -1;
        $countArquivos = -1;
        while ($arquivo = $diretorio->read()) {
            if ($arquivo != "launcher0" && $arquivo != "index.php") {
                if (!is_file($arquivo) && !(strpos($arquivo, ".") > -1)) {
                    $countPastas++;
                    $arrayPastas[$countPastas]['projeto'] = $arquivo;
                    $arrayPastas[$countPastas]['caminho'] = $pasta . $arquivo;
                    $arrayPastas[$countPastas]['classe'] = " glyphicon-briefcase ";
                } else {
                    if (!is_dir($arquivo)) {
                        $countArquivos++;
                        $arrayArquivos[$countArquivos]['projeto'] = $arquivo;
                        $arrayArquivos[$countArquivos]['caminho'] = $pasta . $arquivo;
                        $arrayArquivos[$countArquivos]['classe'] = " glyphicon-file ";
                    }
                }
            }
        }
        $diretorio->close();
    }

    $arrayPastas = ordenaMatriz($arrayPastas, 'projeto');
    $countArquivos = ordenaMatriz($countArquivos, 'projeto');


    echo "<div class='row'>";
    echo "<div class='col-md-5 col-sm-offset-1'>";
    echo "<br><h1>Meus Projetos</h1>";
    exibeVetor($arrayPastas);
    echo "</div>";

    echo "<div class='col-md-5'>";
    echo "<br><h1>Meus Arquivos</h1>";
    exibeVetor($arrayArquivos);
    echo "</div>";
    echo "</div>";
    ?>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="_lib/jquerry/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="_lib/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>