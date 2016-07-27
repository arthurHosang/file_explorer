<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 26/07/16
 * Time: 20:43
 */
class jsonUsuarios
{
    private $caminhoJSon;
    private $item;

    /**
     * jsonWalker constructor.
     * @param $item
     */
    public function __construct()
    {
        if(file_exists('configs_usuario/usuarios.json')){
            $this->caminhoJSon ='configs_usuario/usuarios.json';
        } else {
            if(file_exists('configs/usuarios.json')){
                $this->caminhoJSon ='configs/usuarios.json';
            }
        }
    }


    function login($login, $senha)
    {
        $arquivo2 = $this->caminhoJSon;

        $info = file_get_contents($arquivo2);

        $lendo = json_decode($info);

        $retorno = null;

        foreach ($lendo->usuarios as $campo) {
            if ($campo->login == $login && $campo->senha == $senha) {
                return true;
            }
        }

        return false;
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