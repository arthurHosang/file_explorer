<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 26/07/16
 * Time: 20:43
 */
class jsonWalker
{
    private $caminhoJSon;
    private $item;

    /**
     * jsonWalker constructor.
     * @param $item
     */
    public function __construct($caminho)
    {
        if(file_exists('configs_usuario/arquivos.json')){
            $this->caminhoJSon ='configs_usuario/arquivos.json';
        } else {
            if(file_exists('configs/arquivos.json')){
                $this->caminhoJSon ='configs/arquivos.json';
            }
        }

        $this->item = $this->getInfo($caminho);
    }


    function getInfo($caminho)
    {
        $arquivo2 = $this->caminhoJSon;

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


    /*Getters and Setters*/
    /**
     * @return string
     */
    public function getCaminhoJSon()
    {
        return $this->caminhoJSon;
    }

    /**
     * @param string $caminhoJSon
     */
    public function setCaminhoJSon($caminhoJSon)
    {
        $this->caminhoJSon = $caminhoJSon;
    }

    /**
     * @return null
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param null $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }


}