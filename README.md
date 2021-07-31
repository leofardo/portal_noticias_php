# Portal de Notícias

## Como foi feito?
Utilizei a linguagem PHP juntamente com o autoload do gerenciador de pacotes Composer para carregar automaticamente as classes dos meus arquivos PHP.
Utilizei o banco de dados MySQL para poder armazenar as notícias e as contas de usuário e utilizei o PDO do PHP.
Segui o padrão de Arquitetura MVC.

## Como configurar o site
1. Crie um banco de dados na sua maquina e coloque usuario, senha e db no arquivo Connection.php
2. Abra o arquivo sql.sql, copie tudo e cole dentro do banco de dados que você criou.
3. Depois disso para você adicionar noticias só clicar em login e digitar a conta admin@admin.com e senha 123.

## O que posso fazer no site?
Você pode criar uma conta nova ou logar nas já existentes, se você está na conta admin poderá acessar todas as contas registradas e adicionar um usuário como admin ou se ele já é
poderá rebaixá-lo para usuário normal.
Você sendo administrador poderá adicionar, remover ou editar quantas notícias quiser mas se você é somente membro vc só poderá vê-las

## Qual o objetivo desse projeto?
O objetivo desse projeto foi para testar meus conhecimentos em PHP, MySQL e o padrão de arquitetura MVC, mexer com rotas do site e
também foi um objetivo bloquear o acesso aos usuários normais de poder criar noticias, dando permissão somente aos administradores.

## Alertas importantes
- Não utilize XAMPP (poderá usar somente o MySQL do xampp) pois meu projeto não funcionará porque esse código manipula as rotas do projeto, que gera uma confusão com o XAMPP, crie um servidor http embutido no php através do cmd.
- Para você poder postar notícias é de suma importancia vc adicionar a conta que deixei no arquivo sql.sql, somente administradores conseguem adicionar noticias.
- Não foquei no front-end, a interface que está lá é só para "encher linguiça", o foco do projeto é o sistema de login, registro e as notícias.
- A senha fica criptografada no banco de dados então não esqueça os dados da sua conta. 
