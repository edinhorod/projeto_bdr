<?php
require_once '../_autoloader.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php include_once '../includes/_title.php'; ?></title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container pageTop">
            <div class="row">
                <?php
                include_once '../_menu.php';
                ?>
            </div>


            <div class="panel panel-success">
                <div class="panel-heading">
                    3. Refatore o código abaixo, fazendo as alterações que julgar necessário.<br />
                    <code>
                        <span style="color: #000000">
                            <span style="color: #000">&lt;?php<br /></span>
                            <span style="color: #0000BB">class</span> MyUserClass {<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">public function</span> getUserList() {<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="color: #660000">$dbconn</span> = <span style="color: #0000BB">new</span> DatabaseConnection(<span style="color: #FF8000">'localhost', 'user', 'password'</span>);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="color: #660000">$resultado</span> = <span style="color: #660000">$dbconn</span>->query(<span style="color: #FF8000">'localhost', 'user', 'password'</span>);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            sort($results);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            return <span style="color: #660000">$results</span>;<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;}<br />
                            }<br />
                            <span style="color: #0000BB">?&gt;</span>                    
                        </span>
                    </code>
                </div>
                <div class="panel-body">
                    <h3>Resolução</h3>
                    <code>
                        <span style="color: #000000">
                            <span style="color: #000">&lt;?php<br /></span>
                            <span style="color: #0000BB">class</span> MyUserClass {<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">public function</span> getUserList() {<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="color: #660000">$dbconn</span> = mysql_connect(<span style="color: #FF8000">'localhost', 'root', ''</span>);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            mysql_select_db(<span style="color: #FF8000">"projeto_bdr"</span>);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="color: #660000">$results</span> = mysql_query(<span style="color: #FF8000">'select tarNome from tarefas'</span>);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            return <span style="color: #660000">$results</span>;<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;}<br />

                            }<br />
                            <span style="color: #0000BB">?&gt;</span>

                        </span>
                    </code>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/main.js" type="text/javascript"></script>
    </body>
</html>
