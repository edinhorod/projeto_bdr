<?php
require_once '../_autoloader.php';

$msg = new Mensagens();
$util = new Util();
$tarDAO = new TarefasDAO();

//DECLARANDO AS VARIÁVEIS
$tarefas = null;
$tarId = "";
$tarNome = "";
$tarDescricao = "";
$tarPrioridade = "";

//AO SELECIONAR UM OBJETO
if (isset($_GET["tarId"])) {
    $tarId = $util->protect($_GET["tarId"]);
    $tarefas = $tarDAO->listarTarefaPorId($tarId);
    $tarNome = $tarefas->getTarNome();
    $tarDescricao = $tarefas->getTarDescricao();
    $tarPrioridade = $tarefas->getTarPrioridade();
}

//EXCLUIR UM OBJETO
if (isset($_GET["excluir"])) {
    $tarId = $util->protect($_GET["excluir"]);
    $excluir = $tarDAO->apagarTafera($tarId);
    if ($excluir) {
        header('Location: index.php');
    }
}

if (isset($_POST["gravar"])) {
    $tarNome = $util->protect($_POST["tarNome"]);
    $tarDescricao = $util->protect($_POST["tarDescricao"]);
    $tarPrioridade = $util->protect($_POST["tarPrioridade"]);
    if (empty($tarNome)) {
        $msg->addMensagem("<div class=\"alert alert-danger alert-dismissable\">                                    
                                <strong>Atenção: </strong>Digite o nome da tarefa
                           </div>");
    } else if (empty($tarDescricao)) {
        $msg->addMensagem("<div class=\"alert alert-danger alert-dismissable\">                                    
                                <strong>Atenção: </strong>Digite a descrição da tarefa
                           </div>");
    } else if (empty($tarPrioridade)) {
        $msg->addMensagem("<div class=\"alert alert-danger alert-dismissable\">                                    
                                <strong>Atenção: </strong>Selecione uma prioridade
                           </div>");
    } else {
        $tarefa = new Tarefas();
        $tarefa->setTarNome($tarNome);
        $tarefa->setTarDescricao($tarDescricao);
        $tarefa->setTarPrioridade($tarPrioridade);
        if ($tarDAO->gravarTafera($tarefa)) {
            $msg->addMensagem("<div class=\"alert alert-success alert-dismissable\">                                    
                                <strong>Atenção: </strong>Dados Gravados Com Sucesso
                            </div>");
            $tarefa = null;
            $tarNome = "";
            $tarDescricao = "";
            $tarPrioridade = "";
        } else {
            $msg->addMensagem("<div class=\"alert alert-danger alert-dismissable\">                                    
                                <strong>Atenção: </strong>Erro Ao Gravar Dados
                           </div>");
            $tarId = "";
            $tarNome = "";
            $tarDescricao = "";
            $tarPrioridade = "";
        }
    }
}


if (isset($_POST["alterar"])) {
    $tarId = $_POST["tarId"];
    $tarNome = $util->protect($_POST["tarNome"]);
    $tarDescricao = $util->protect($_POST["tarDescricao"]);
    $tarPrioridade = $util->protect($_POST["tarPrioridade"]);
    if (empty($tarNome)) {
        $msg->addMensagem("<div class=\"alert alert-danger alert-dismissable\">                                    
                                <strong>Atenção: </strong>Digite o nome da tarefa
                           </div>");
    } else if (empty($tarDescricao)) {
        $msg->addMensagem("<div class=\"alert alert-danger alert-dismissable\">                                    
                                <strong>Atenção: </strong>Digite a descrição da tarefa
                           </div>");
    } else if (empty($tarPrioridade)) {
        $msg->addMensagem("<div class=\"alert alert-danger alert-dismissable\">                                    
                                <strong>Atenção: </strong>Selecione uma prioridade
                           </div>");
    } else {
        $tarefa = new Tarefas();
        $tarefa->setTarId($tarId);
        $tarefa->setTarNome($tarNome);
        $tarefa->setTarDescricao($tarDescricao);
        $tarefa->setTarPrioridade($tarPrioridade);
        if ($tarDAO->alterarTafera($tarefa)) {
            $msg->addMensagem("<div class=\"alert alert-success alert-dismissable\">                                    
                                <strong>Atenção: </strong>Dados Alterados Com Sucesso
                            </div>");
            $tarefa = null;
            $tarId = "";
            $tarNome = "";
            $tarDescricao = "";
            $tarPrioridade = "";
        } else {
            $msg->addMensagem("<div class = \"alert alert-danger alert-dismissable\">                                    
                                <strong>Atenção: </strong>Erro Ao Alterar Dados
                           </div>");
            $tarId = "";
            $tarNome = "";
            $tarDescricao = "";
            $tarPrioridade = "";
        }
    }
}

//LISTANDO TODAS AS TAREFAS
$listaTarefas = $tarDAO->listarTodasTarefas();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php include_once '../includes/_title.php'; ?></title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet" type="text/css"/>

        <!--CAIXA DE CONFIRMAÇÃO DA EXCLUSÃO-->
        <script src="js/jquery.min.js"></script>      
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>        
        <script type="text/javascript">
            $(document).ready(function () {
                $(".deletar").click(function (event) {
                    var apagar = confirm('Deseja Realmente EXCLUIR a Tarefa?');
                    if (apagar) {
                        // aqui vai a instrução para apagar registro
                    } else {
                        event.preventDefault();
                    }
                });
            });
        </script>
        <!--FIM CAIXA DE CONFIRMAÇÃO-->
    </head>
    <body>
        <div class="container pageTop">
            <div class="row">
                <?php
                include_once '../_menu.php';
                ?>
            </div>

            <form action="index.php" method="post">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        4. Desenvolva uma API Rest para um sistema gerenciador de tarefas (inclusão/alteração/exclusão).<br />
                        As tarefas consistem em título e descrição, ordenadas por prioridade.
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <?php
                                if (isset($msg)) {
                                    echo $msg;
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div style="//border: thin solid black;" class="col-xs-12 col-sm-12 col-md-6">
                                <input type="hidden" name="tarId" value="<?php if (isset($tarId)) echo $tarId; ?>" />
                                <div class="form-group">
                                    <label>Nome da tarefa*</label>
                                    <input class="form-control" type="text" name="tarNome" value="<?php if (isset($tarNome)) echo $tarNome; ?>">
                                </div>
                            </div>
                        </div>  

                        <div class="row">
                            <div style="//border: thin solid black;" class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Descrição *</label>
                                    <textarea class="form-control" rows="5" 
                                              name="tarDescricao"><?php if (isset($tarDescricao)) echo $tarDescricao; ?></textarea><br />
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div style="//border: thin solid black;" class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Prioridade da tarefa *</label><br />
                                    <?php
                                    $tarPri1 = "";
                                    $tarPri2 = "";
                                    $tarPri3 = "";
                                    if (!empty($tarefas)) {
                                        if ($tarefas->getTarPrioridade() == 'b') {
                                            $tarPri1 = 'checked';
                                        } else if ($tarefas->getTarPrioridade() == 'm') {
                                            $tarPri2 = 'checked';
                                        } else if ($tarefas->getTarPrioridade() == 'a') {
                                            $tarPri3 = 'checked';
                                        }
                                    }
                                    ?>
                                    <input type="radio" name="tarPrioridade" <?php echo $tarPri1; ?> value="b" /> <span class="text-success"><b>Baixa</b></span><br />
                                    <input type="radio" name="tarPrioridade" <?php echo $tarPri2; ?> value="m" /> <span class="text-warning"><b>Média</b></span><br />
                                    <input type="radio" name="tarPrioridade" <?php echo $tarPri3; ?> value="a" /> <span class="text-danger"><b>Alta</b></span><br />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div style="//border: thin solid black;" class="col-xs-12 col-sm-12 col-md-6">
                                <br />
                                <input type="submit" class="btn btn-success" 
                                       name="<?php
                                       if (empty($tarefas)) {
                                           echo "gravar";
                                       } else {
                                           echo "alterar";
                                       }
                                       ?>"  value="<?php
                                       if (empty($tarefas)) {
                                           echo "Gravar";
                                       } else {
                                           echo "Alterar";
                                       }
                                       ?>"/>
                                <input type="submit" name="cancelar" class="btn btn-success" value="Cancelar" />

                            </div>                            
                        </div>

                        <br />
                        <div class="row">
                            <div style="//border: thin solid black;" class="col-xs-12 col-sm-12 col-md-12 table-responsive">
                                <?php
                                if (!empty($listaTarefas)) {
                                    $textoPrioridade = "";
                                    $alerta = "";
                                    echo "<table class=\"table table-striped table-bordered table-hover\">
                                            <thead>
                                                <tr>
                                                    <th>Tarefa</th>
                                                    <th>Descrição</th>
                                                    <th>Prioridade</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody>";

                                    foreach ($listaTarefas as $tar) {
                                        if ($tar->getTarPrioridade() == 'b') {
                                            $textoPrioridade = "<span class=\"glyphicon glyphicon-flag text-success\" aria-hidden=\"true\"></span>";
                                            $alerta = "Baixa";
                                        } else if ($tar->getTarPrioridade() == 'm') {
                                            $textoPrioridade = "<span class=\"glyphicon glyphicon-flag text-warning\" aria-hidden=\"true\"></span>";
                                            $alerta = "Média";
                                        } else if ($tar->getTarPrioridade() == 'a') {
                                            $textoPrioridade = "<span class=\"glyphicon glyphicon-flag text-danger\" aria-hidden=\"true\"></span>";
                                            $alerta = "Alta";
                                        }
                                        echo "<tr>";
                                        echo "<td><a title=\"Clique para selecionar a tarefa\" href=\"index.php?tarId=" . $tar->gettarId() . "\">" . $tar->getTarNome() . "</a></td>";
                                        echo "<td>" . $tar->getTarDescricao() . "</td>";
                                        echo "<td class=\"text-center\"><a title=\"Prioridade da tarefa: " . $alerta . "\" href=\"\">" . $textoPrioridade . "</a></td>";
                                        echo "<td class=\"text-center\"><a class=\"deletar\" href=\"index.php?excluir=" . $tar->getTarId() . "\" title=\"Excluir tarefa\"><span class=\"glyphicon glyphicon-remove-circle text-danger\" aria-hidden=\"true\"></span></a></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="../bootstrap/js/main.js" type="text/javascript"></script>
</body>
</html>
