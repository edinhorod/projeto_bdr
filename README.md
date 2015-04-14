# projeto_bdr
Projeto BDR
1 - Para instalar o projeto:
  Faça upload de todos os arquivos do projeto para o seu servidor web, geralmente a pasta www
2 Para configurar o Banco de dados
2.1 Para criar o banco de dados no MySQL
  2.1.1 Crie uma base de dados no seu servidor MySQL
  2.1.2 Abra o arquivo projeto_bdr.sql
  Caminho do arquivo: projeto_bdr/script_BD
  2.1.3 Execute o comando no servidor MySQL
3 Configurar o Banco de Dados
  3.1 Abra o arquivo Banco.php
  Caminho do arquivo: projeto_bdr/classes/bd/
  3.2 Altere o construtor com as informações do seu banco de dados:
  $this->bd = new PDO("mysql:host=localhost;dbname=bdname", "user", "password");
    3.2.1 Em localhost, coloque o endereço do seu banco de dados
    3.2.2 Em dbname coloque o nome do seu banco de dados
    3.2.3 Em user coloque o nome do usuário do seu banco de dados
    3.2.4 Em password coloque a senha do usuário
  3.3 Salve o arquivo e faça updload novamente
4 Acesse a página inicial do projeto pelo navegador
  Exemplo: www.projeto_bdr.com.br
