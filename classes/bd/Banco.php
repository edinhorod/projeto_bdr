<?php

class Banco {

    private $comandoSQL; //Qual o comando a ser executado ($comandoSQL)
    private $bd; //Representação do BD a ser utilizado

    //Atribui o comando a ser executado

    public function setComandoSQL($valor) {
        $this->comandoSQL = $valor;
    }

    //Retorna o último comando SQL exutado/a ser executado no BD
    public function getComandoSQL() {
        return($this->comandoSQL);
    }

    //Construtor do Objeto: Informa para a classe qual o BD a ser utilizado
    function __construct() {
        $this->bd = new PDO("mysql:host=localhost;dbname=projeto_bdr", "root", "");
        //$this->bd = new PDO("mysql:host=mysql04.hstbr.net;dbname=", "", "");
    }

    //Responsável por executar os comandos de INSERT, UPDATE E DELETE
    public function ExecutaSQL() {
        if ($this->comandoSQL != "")
            return($this->bd->exec($this->comandoSQL));
        else
            return(false);
    }

    //Responsável por executar os comandos de SELECT
    public function ExecutaSelect() {
        if ($this->comandoSQL != "") {
            $dados = $this->bd->query($this->comandoSQL);
            return($dados->fetchAll());
        }
        else
            return(false);
    }

    //Método destrutor: responsável por fechar a conexão com o BD
    function __destruct() {
        $this->bd = null;
    }

    //Responsável por executar os comandos de INSERT, UPDATE E DELETE usando instruções preparadas
    public function ExecutaSQLPreparada($parametros) {
        if ($this->comandoSQL != "") {
            $consulta = $this->bd->prepare($this->comandoSQL);
            return($consulta->execute($parametros));
        }
        else
            return false;
    }

    //Responsável por executar os comandos de SELECT
    public function ExecutaSelectPreparada($parametros) {
        if ($this->comandoSQL != "") {
            //$dados = $this->bd->query($this->comandoSQL);
            $consulta = $this->bd->prepare($this->comandoSQL);
            $consulta->execute($parametros);
            return($consulta->fetchAll());
        }
        else
            return(false);
    }

}

?>