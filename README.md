Todo List
Este é um aplicativo de lista de tarefas simples, onde os usuários podem adicionar, remover e marcar tarefas como concluídas. O aplicativo foi desenvolvido utilizando o framework Laravel e o framework de estilização Tailwind CSS.

Funcionalidades
Registro de usuário
Autenticação de usuário (login/logout)
Adicionar uma nova tarefa
Remover uma tarefa
Marcar uma tarefa como concluída
Visualizar a lista de tarefas com paginação
Exibir mensagens de erro e sucesso
Pré-requisitos
PHP 7.4 ou superior
Composer
Banco de dados MySQL
Instalação
Faça o clone deste repositório para o diretório do seu servidor web.
Navegue até o diretório raiz do projeto e execute o comando composer install para instalar as dependências do Laravel.
Renomeie o arquivo .env.example para .env e configure as informações do banco de dados no arquivo .env.
Execute o comando php artisan key:generate para gerar uma chave única para a aplicação.
Execute o comando php artisan migrate para executar as migrações do banco de dados e criar as tabelas necessárias.
Opcionalmente, execute o comando php artisan db:seed para popular o banco de dados com alguns dados de exemplo (usuários e tarefas).
Inicie o servidor web para visualizar o aplicativo.
Uso
Acesse a página inicial do aplicativo para registrar uma nova conta ou fazer login com uma conta existente.
Após o login, você será redirecionado para a página principal, onde poderá ver a lista de tarefas, adicionar novas tarefas, remover tarefas e marcar tarefas como concluídas.
Ao adicionar ou remover uma tarefa, uma mensagem de sucesso será exibida.
Se ocorrerem erros durante a execução de uma ação, mensagens de erro serão exibidas.
Contribuição
Contribuições são bem-vindas! Se você encontrar algum problema ou tiver sugestões de melhorias, sinta-se à vontade para abrir uma issue ou enviar um pull request.

Licença
Este projeto está licenciado sob a licença MIT.
