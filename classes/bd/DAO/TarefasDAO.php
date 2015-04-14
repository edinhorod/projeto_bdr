<?php

class TarefasDAO {

    public function gravarTafera($tarefa) {
        $banco = new Banco();
        $banco->setComandoSQL("INSERT INTO tarefas (tarNome, tarDescricao, tarPrioridade)
                                VALUES
                                ('" . $tarefa->getTarNome() . "', 
                                    '" . $tarefa->getTarDescricao() . "',
                                        '" . $tarefa->getTarPrioridade() . "')");
        if ($banco->ExecutaSQL()) {
            return true;
        } else {
            return false;
        }
    }

    public function alterarTafera($tarefa) {
        $banco = new Banco();
        $banco->setComandoSQL("UPDATE tarefas SET tarNome = '" . $tarefa->getTarNome() . "',
                                tarDescricao = '" . $tarefa->getTarDescricao() . "',
                                    tarPrioridade = '" . $tarefa->getTarPrioridade() . "'
                                        WHERE tarId = '" . $tarefa->getTarId() . "'");
        if ($banco->ExecutaSQL()) {
            return true;
        } else {
            return false;
        }
    }

    public function apagarTafera($tarId) {
        $banco = new Banco();
        $banco->setComandoSQL("DELETE FROM tarefas WHERE tarId = " . $tarId);
        if ($banco->ExecutaSQL()) {
            return true;
        } else {
            return false;
        }
    }

    public function listarTarefaPorId($tarId) {
        $banco = new Banco();
        $banco->setComandoSQL("SELECT * FROM tarefas WHERE tarId = " . $tarId);
        $resultado = $banco->ExecutaSelect();
        if (!empty($resultado)) {
            $linha = $resultado[0];
            $tarefa = new Tarefas($linha["tarId"], $linha["tarNome"], $linha["tarDescricao"], $linha["tarPrioridade"]);
            return $tarefa;
        }
        return null;
    }

    public function listarTodasTarefas() {
        $lista = null;
        $banco = new Banco();
        $banco->setComandoSQL("SELECT * FROM tarefas 
                                ORDER BY(
                                    case when tarPrioridade = 'a' then 1
                                    when tarPrioridade = 'm' then 2        
                                    when tarPrioridade = 'b' then 3              
                                    when trim(tarPrioridade) is null then 4
                                    else 5 end
                                    )");
        $resultado = $banco->ExecutaSelect();
        if (!empty($resultado)) {
            foreach ($resultado as $linha) {
                $tarefa = new Tarefas();
                $tarefa->setTarId($linha["tarId"]);
                $tarefa->setTarNome($linha["tarNome"]);
                $tarefa->setTarDescricao($linha["tarDescricao"]);
                $tarefa->setTarPrioridade($linha["tarPrioridade"]);
                $lista[] = $tarefa;
            }
            return $lista;
        }
    }

}
