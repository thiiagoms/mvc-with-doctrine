# CRUD - One page

[en-Us]:  So, i did that simple application to improve my skill about how to create an single application in one page. Until this moment i have a lot of work to implement on this app like: :hammer:
  - AJAX requisitions
  - A server only for receive the information from the front-end
  - Improve the design of app (UX/UI) :pencil:
  - Implement file upload and more data (with strongest security) :closed_lock_with_key:
  - More Clean Code :pencil2:
  - Pagination of registers  :bookmark_tabs:
  
[pt-BR]:  Gostaria de agradecer primeiramente pelo interesse em verificar este repo :smile:, bom a aplicação se trata de um exemplo de aplicação de uma única página. A parte de crud está em perfeito funcionamento (mas em todo caso,  se estiver com algum problema basta entrar em contato que ficarei feliz em ajudar). As instruções de download e deploiy da aplicação sem encontram no *README* . Abaixo segue alguns itens que gostaria de implementar para melhorar ainda mais a aplicação :hammer:
  - Requisições AJAX (separando por definitivo o front-end do back-end)
  - Melhoria de interface (UX/UI) :pencil:
  - Implement file upload and more data
  - More Clean Code :pencil2:
  - Paginação :bookmark_tabs:

## Installation - Instalação

[en-US]: After to download the repository, you'll need to change the settings in **database/database.class.php**
``` php
 public $dbHost =  array('local'  =>  'NAME_YOUR_LOCAL_HOST', 'prod'  =>  '');
 public $dbUser =  array('local'  =>  'NAME_YOUR_USER_DATABASE', 'prod'  =>  '');
 public $dbPass =  array('local'  =>  'NAME_YOUR_DATABASE_PASSWORD', 'prod'  =>  '');
 public $dbName =  array('local'  =>  'NAME_OF_YOUR_DATABASE', 'prod'  =>  '');
```
If you want to deploy this application you'll need to complete the prod settings with your data.

[pt-BR]: Após fazer o download do repositorio, você precisará trocar as configurações do arquivo **database/database.class.php** com os seus respectivos dados da sua máquina:

``` php
 public $dbHost =  array('local'  =>  'NOME_DO_SEU_SERVIDOR_LOCAL', 'prod'  =>  '');
 public $dbUser =  array('local'  =>  'NOME_DO_SEU_USUARIO_LOCAL', 'prod'  =>  '');
 public $dbPass =  array('local'  =>  'SENHA_DO_BANCO_DE_DADOS', 'prod'  =>  '');
 public $dbName =  array('local'  =>  'NOME_DO_BANCO_DE_DADOS', 'prod'  =>  '');
```
