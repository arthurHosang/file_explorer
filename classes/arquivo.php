<?php
require_once 'classes/jsonWalker.php';
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 26/07/16
 * Time: 19:16
 */
class arquivo
{
    private $pastaPai;
    private $nomeArquivo;
    private $titulo;
    private $descricao;
    private $link;
    private $imagem;
    private $tipo;

    /**
     * fileExplorer constructor.
     * @param string $dir
     */
    public function __construct($dirPai, $nomeArquivo)
    {
        $this->pastaPai = $dirPai;
        $this->nomeArquivo = $nomeArquivo;
        $this->titulo = ucwords(str_replace("_", " ", str_replace("-", " ", $nomeArquivo)));
        $this->descricao = str_replace('../', '', $dirPai.'/'.$nomeArquivo);
        $this->link = '/'.$nomeArquivo;


        if ($this->titulo != '..' && $this->titulo != '.'){
            if (is_dir($this->link)){
                $this->imagem = 'glyphicon-briefcase';
                $this->tipo = 'projeto';
            }else {
                $this->imagem = 'glyphicon-file';
                $this->tipo = 'arquivo';
            }
        }else{
            $this->tipo = 'sistema';
        }

        $this->atualizaInformacoesComBaseNoJSon();
    }

    public function atualizaInformacoesComBaseNoJSon(){

        $json = new jsonWalker($this->getLink());
        $json=$json->getInfo($this->getLink());

        if($json!=null){
            $this->imagem = property_exists($json, "classe") ? $json->classe : "";
            $this->titulo = property_exists($json, "nome") ? $json->nome : "";
            $this->descricao = property_exists($json, "descricao") ? $json->descricao : "";
            $this->link  = property_exists($json, "redirecionarPara") ? $json->redirecionarPara : $this->link ;
            $this->tipo  = property_exists($json, "tipo") ? $json->tipo : "";
        }
    }

    public function getItemParaExibicao()
    {
        $retorno = '';

        $retorno .= "<a href='{$this->getLink()}' class='list-group-item'>";
        $retorno .= "<h4 class='list-group-item-heading'>";
        $retorno .= "<span class='glyphicon {$this->getImagem()}'></span>";
        $retorno .= "&nbsp;{$this->getTitulo()}";
        $retorno .= "</h4>";
        $retorno .= "<p class='list-group-item-text'>{$this->getDescricao()}</p>";
        $retorno .= "</a>";

        return $retorno;
    }


    /*Getters and Setters*/
    /**
     * @return string
     */
    public function getPastaPai()
    {
        return $this->pastaPai;
    }

    /**
     * @param string $pastaPai
     */
    public function setPastaPai($pastaPai)
    {
        $this->pastaPai = $pastaPai;
    }

    /**
     * @return string
     */
    public function getNomeArquivo()
    {
        return $this->nomeArquivo;
    }

    /**
     * @param string $nomeArquivo
     */
    public function setNomeArquivo($nomeArquivo)
    {
        $this->nomeArquivo = $nomeArquivo;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param string $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }


}