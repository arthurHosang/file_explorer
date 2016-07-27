<?php
require_once 'classes/arquivo.php';

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 26/07/16
 * Time: 19:25
 */
class pasta
{
    private $dir;
    private $arquivos;

    /**
     * pasta constructor.
     */
    public function __construct($dir)
    {
        $this->dir = $dir;
        $this->atualizaPasta();
        $this->ordernaArquivos();
    }

    public function atualizaPasta()
    {
        $diretorio = dir($this->dir);
        while ($arquivo = $diretorio->read()) {
            $this->addArquivo($arquivo);
        }
    }

    public function ordernaArquivos(){
        $temp = null;
        $arquivos = $this->getArquivos();

        for ($i = 0; $i < count($arquivos); $i++) {
            for ($j = 0; $j < count($arquivos); $j++) {
                if ($arquivos[$i]->getTitulo() < $arquivos[$j]->getTitulo()) {
                    $temp = $arquivos[$i];
                    $arquivos[$i] = $arquivos[$j];
                    $arquivos[$j] = $temp;
                }
            }
        }

        $this->setArquivos($arquivos);
    }

    public function getVisualizacao($tipo)
    {
        $retorno = "";
        $item = null;

        for ($i = 0; $i < sizeof($this->arquivos); $i++) {
            $item = $this->getArquivos()[$i];

            if ($item->getTipo() == $tipo){
                $retorno .= $item->getItemParaExibicao();
            }
        }

        return $retorno;
    }

    public function addArquivo($nomeArquivo)
    {
        if ($this->arquivos == null)
            $this->arquivos = array();

        $arquivo = new arquivo($this->dir, $nomeArquivo);

        array_push($this->arquivos, $arquivo);
    }

    /*Getters and Setters*/
    /**
     * @return mixed
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param mixed $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    /**
     * @return mixed
     */
    public function getArquivos()
    {
        return $this->arquivos;
    }

    /**
     * @param mixed $arquivos
     */
    public function setArquivos($arquivos)
    {
        $this->arquivos = $arquivos;
    }
}