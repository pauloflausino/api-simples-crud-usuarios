# api-simples-crud-usuarios
Repositório para fins didáticos e para apreciar a lógica e ver a distribuição e ordem das coisas

API Simples com um CRUD de Usuários
A API CRUD de Usuários é uma aplicação simples, porém poderosa, desenvolvida para gerenciar informações de usuários em um sistema. Com ela, é possível realizar operações essenciais de manipulação de dados, utilizando os métodos GET, POST, PUT e DELETE de forma eficiente e segura. O principal objetivo desta API é fornecer uma interface para interação com um banco de dados de usuários, permitindo a criação, leitura, atualização e exclusão de registros de forma prática.

Criar novos usuários no sistema.
Listar todos os usuários ou buscar detalhes de um usuário específico.
Atualizar informações de um usuário existente.
Excluir um usuário da base de dados.

Objetivo da Aplicação
Esta aplicação tem como propósito um CRUD inicial, simples com o intuito de entender de como uma aplicação de um cadastro de usuário de um sistema pode ser feita.
Disponibilizo esse código para análise para quem deseja olhar de como desenvolvo e analisar a consistência do meu código fonte.

Como a API pode ser usada?
Imagine que você está criando uma plataforma de autenticação de usuários para um site ou aplicativo. Com esta API, você pode facilmente:

Cadastrar novos usuários quando eles se registram.
Listar os usuários em uma página de administração ou painel de controle.
Atualizar informações como nome e e-mail.
Excluir usuários quando necessário, como no caso de uma conta desativada.
A API foi projetada para ser simples e eficiente, mas também oferece a flexibilidade necessária para ser expandida com funcionalidades adicionais, como autenticação de usuários, validação de dados e integração com outros serviços.

Vantagens de Usar esta API:
Simplicidade: A API segue os princípios básicos de um CRUD, facilitando a compreensão e implementação.
Segurança: Utilizando métodos preparados com PDO, evita-se ataques como SQL Injection, garantindo maior segurança nas operações.
Escalabilidade: A estrutura básica pode ser facilmente expandida para incluir autenticação, validações de dados e funcionalidades mais avançadas.
Versatilidade: A API pode ser integrada em diferentes tipos de sistemas, como sites, apps móveis ou sistemas internos de administração.
Em resumo, a API CRUD de Usuários é uma solução prática e eficiente para gerenciar informações de usuários, oferecendo todas as funcionalidades essenciais para o controle de dados em qualquer tipo de aplicação. Ela serve como um alicerce sobre o qual você pode construir sistemas mais complexos, garantindo agilidade no desenvolvimento e flexibilidade para personalizações futuras.



Testando a API
Use ferramentas como Postman ou cURL para testar:

GET: GET localhost/api-simples/api.php
GET com ID: GET localhost/api-simples/api.php?id=1
POST: Envie {"nome": "Nome 001", "email": "nome1@email.com"}
PUT: PUT localhost/api-simples/api.php?id=1 com dados JSON.
DELETE: DELETE localhost/api-simples/api.php?id=1

Para executar um POST no Postman, siga os passos abaixo:

Passos para executar o POST no Postman
Abrir o Postman: Se ainda não tiver o Postman instalado, faça o download aqui.

Criar uma nova requisição:

No Postman, clique em "New" (ou "Novo") no canto superior esquerdo.
Selecione "Request" (ou "Requisição").
Configurar a requisição:

Selecione o método POST no menu suspenso ao lado da barra de URL.
No campo de URL, insira o endereço da sua API. Por exemplo:
arduino
Copiar código
localhost/api-simples/api.php
Configurar o corpo da requisição:

Clique na aba "Body" (Corpo) abaixo da barra de URL.
Selecione a opção "raw".
No menu suspenso à direita, escolha o formato JSON.
Inserir os dados JSON: No campo de texto que aparece, insira os dados que você deseja enviar. Exemplo:

json
Copiar código
{
    "nome": "Nome usuario",
    "email": "nome_usuario@email.com"
}
Enviar a requisição:

Após configurar a requisição, clique no botão "Send" (Enviar) no canto superior direito.
Verificar a resposta:

O Postman exibirá a resposta da API logo abaixo da área da requisição. Se a requisição for bem-sucedida, você verá os dados de resposta (geralmente em formato JSON) ou uma mensagem de sucesso, como:
json
Copiar código
{
    "id": 1
}



Para executar uma requisição PUT no Postman, siga os passos abaixo:

Passos para executar o PUT no Postman
Abrir o Postman: Se você ainda não tem o Postman instalado, faça o download aqui.

Criar uma nova requisição:

No Postman, clique em "New" (ou "Novo") no canto superior esquerdo.
Selecione "Request" (ou "Requisição").
Configurar a requisição:

No menu suspenso à esquerda da barra de URL, selecione o método PUT.
No campo de URL, insira o endereço da sua API, incluindo o ID do usuário que você deseja atualizar. Exemplo:
bash
Copiar código
localhost/api-simples/api.php?id=1
Configurar o corpo da requisição:

Clique na aba "Body" (Corpo) abaixo da barra de URL.
Selecione a opção "raw".
No menu suspenso à direita, escolha o formato JSON.
Inserir os dados JSON para atualização: No campo de texto, insira os dados que você deseja atualizar. Exemplo:

json
Copiar código
{
    "nome": "Nome Usuario",
    "email": "nome.usuario@email.com"
}
Enviar a requisição:

Após configurar a requisição, clique no botão "Send" (Enviar) no canto superior direito.
Verificar a resposta:

O Postman exibirá a resposta da API logo abaixo da área da requisição. Se a requisição for bem-sucedida, você verá uma mensagem de sucesso, como:
json
Copiar código
{
    "mensagem": "Usuário atualizado com sucesso"
}