<?php
setcookie('Loggedin', true);
if (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == false) {
    header("Location: http://www.google.com");
    exit();
}
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
                    2. Refatore o código abaixo, fazendo as alterações que julgar necessário.<br />
                    <code>
                        <span style="color: #000000">
                            <span style="color: #0000BB">if</span>(<span style="color: #0000BB">isset</span>(
                            <span style="color: #660000">$_SESSION</span>[<span style="color: #FF8000">'loggedin'</span>])
                            && <span style="color: #660000">$_SESSION</span>[<span style="color: #FF8000">'loggedin'</span>])
                            == <span style="color: #0000BB">true</span>) {<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            header(<span style="color: #FF8000">"Location: http://www.google.com"</span>);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            exit();<br />
                            } <span style="color: #0000BB">elseif</span> (<span style="color: #0000BB">isset</span>
                            <span style="color: #660000">($_COOKIE</span>[<span style="color: #FF8000">'Loggedin'</span>]) && 
                            <span style="color: #660000">$_COOKIE</span>[<span style="color: #FF8000">'Loggedin'</span>] == <span style="color: #0000BB">true</span>) {<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            header(<span style="color: #FF8000">"Location: http://www.google.com"</span>);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            exit();<br />
                            }                    
                        </span>
                    </code>
                </div>
                <div class="panel-body">

                </div>
                <div class="panel-body">
                    <h3>Resolução</h3>

                    <code>
                        <span style="color: #000000">
                            <span style="color: #000">&lt;?php<br /></span>
                            session_start();<br />
                            setcookie(<span style="color: #FF8000">'Loggedin'</span>, <span style="color: #0000BB">true</span>);<br />
                            <span style="color: #660000">$_SESSION</span>[<span style="color: #FF8000">"loggedin"</span>] = true;<br />
                            <span style="color: #0000BB">if</span>(<span style="color: #0000BB">isset</span>(
                            <span style="color: #660000">$_SESSION</span>[<span style="color: #FF8000">'loggedin'</span>])
                            && <span style="color: #660000">$_SESSION</span>[<span style="color: #FF8000">'loggedin'</span>])
                            == <span style="color: #0000BB">true</span>) {<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            header(<span style="color: #FF8000">"Location: http://www.google.com"</span>);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            exit();<br />
                            } <span style="color: #0000BB">else if</span> (<span style="color: #0000BB">isset</span>
                            <span style="color: #660000">($_COOKIE</span>[<span style="color: #FF8000">'Loggedin'</span>])
                            && <span style="color: #660000">$_COOKIE</span>[<span style="color: #FF8000">'Loggedin'</span>]
                            == <span style="color: #0000BB">true</span>) {<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            header(<span style="color: #FF8000">"Location: http://www.google.com"</span>);<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            exit();<br />
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
