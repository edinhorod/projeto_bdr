# projeto_bdr
Projeto BDR<br />
1 - Para instalar o projeto:<br />
&nbsp;&nbsp;Faça upload de todos os arquivos do projeto para o seu servidor web, geralmente a pasta www<br />
2 Para configurar o Banco de dados<br />
&nbsp;&nbsp;2.1 Para criar o banco de dados no MySQL<br />
&nbsp;&nbsp;&nbsp;&nbsp;2.1.1 Crie uma base de dados no seu servidor MySQL<br />
&nbsp;&nbsp;&nbsp;&nbsp;2.1.2 Abra o arquivo projeto_bdr.sql<br />
&nbsp;&nbsp;&nbsp;&nbsp;Caminho do arquivo: projeto_bdr/script_BD<br />
&nbsp;&nbsp;&nbsp;&nbsp;2.1.3 Execute o comando no servidor MySQL<br />
3 Configurar o Banco de Dados<br />
&nbsp;&nbsp;&nbsp;&nbsp;3.1 Abra o arquivo Banco.php<br />
&nbsp;&nbsp;&nbsp;&nbsp;Caminho do arquivo: projeto_bdr/classes/bd/<br />
&nbsp;&nbsp;&nbsp;&nbsp;3.2 Altere o construtor com as informações do seu banco de dados:<br />
&nbsp;&nbsp;&nbsp;&nbsp;$this->bd = new PDO("mysql:host=localhost;dbname=bdname", "user", "password");<br />
&nbsp;&nbsp;&nbsp;&nbsp;3.2.1 Em localhost, coloque o endereço do seu banco de dados<br />
&nbsp;&nbsp;&nbsp;&nbsp;3.2.2 Em dbname coloque o nome do seu banco de dados<br />
&nbsp;&nbsp;&nbsp;&nbsp;3.2.3 Em user coloque o nome do usuário do seu banco de dados<br />
&nbsp;&nbsp;&nbsp;&nbsp;3.2.4 Em password coloque a senha do usuário<br />
&nbsp;&nbsp;&nbsp;&nbsp;3.3 Salve o arquivo e faça updload novamente<br />
4 Acesse a página inicial do projeto pelo navegador<br />
&nbsp;&nbsp;&nbsp;&nbsp;Exemplo: www.projeto_bdr.com.br
