🍬 Sonho Doce
Bem-vindo ao Sonho Doce, um projeto criado com carinho para simular a experiência de um site de vendas de doces. Mais do que um sistema CRUD, este projeto é uma pequena vitrine funcional onde o usuário pode explorar, interagir e gerenciar sua conta e seus produtos com facilidade.

🛠️ Tecnologias Utilizadas
Laravel (Framework PHP) – estrutura robusta e elegante para lidar com rotas, controladores, autenticação e mais;

PHP – linguagem principal para o backend;

HTML + CSS – estrutura e estilo das páginas;

MySQL – banco de dados relacional usado para armazenar usuários, produtos e mensagens.

✨ Funcionalidades
O sistema conta com as principais operações de um ambiente de e-commerce simples, incluindo:

👤 Usuário
Criar conta

Fazer login e logout

Editar informações da conta

Excluir conta

🍭 Produtos (CRUD completo)
Adicionar novos doces

Editar informações dos produtos

Remover produtos cadastrados

📬 Contato
Enviar mensagem de contato para a loja

Visualizar mensagens recebidas (acesso administrativo)

Responder mensagens

Excluir mensagens

📂 Estrutura
A aplicação está organizada seguindo os padrões do Laravel, com controllers separados para cada responsabilidade (usuário, produtos, contato), models conectadas ao banco de dados e views limpas para uma navegação fluida.

💡 Objetivo do Projeto
Este projeto foi desenvolvido com fins educativos, para consolidar conhecimentos em Laravel, manipulação de banco de dados MySQL, uso de Blade Templates, e integração entre frontend e backend. Ao mesmo tempo, simula um cenário real de e-commerce, o que o torna um ótimo exercício prático.

🚀 Como rodar o projeto
Clone este repositório:

bash
Copiar
Editar
git clone https://github.com/seu-usuario/sonho-doce.git
Acesse o diretório do projeto:

bash
Copiar
Editar
cd sonho-doce
Instale as dependências:

bash
Copiar
Editar
composer install
Copie o .env.example para .env e configure seu banco de dados:

bash
Copiar
Editar
cp .env.example .env
Gere a chave da aplicação:

bash
Copiar
Editar
php artisan key:generate
Crie as tabelas:

bash
Copiar
Editar
php artisan migrate
Inicie o servidor:

bash
Copiar
Editar
php artisan serve
Acesse em: http://localhost:8000

🤝 Contribuição
Sinta-se à vontade para explorar, sugerir melhorias ou contribuir com o projeto. Toda colaboração é bem-vinda!
