## Seleção Laravel

Este projeto utiliza a linguagem PHP na versão 7.3 ou superior e o Framework Laravel na versão 8.

###  Para executar este projeto, siga as instruções a seguir:

- Clone o repositório executando o comando abaixo:
`git clone https://github.com/gabrielmoreira942/selecao-laravel.git`
- Navegue até o diretório `selecao-laravel`
- Execute o comando abaixo para instalar as dependências do projeto:
`composer update`
- Crie um arquivo `.env` usando como base o arquivo `.env.example`, presente no projeto.
- Configure no arquivo `.env` os parâmetros de conexão com o banco de dados à sua escolha.

	`DB_CONNECTION=mysql`
	`DB_HOST=127.0.0.1`
	`DB_PORT=3306`
	`DB_DATABASE=nome_do_seu_banco_de_dados`
	`DB_USERNAME=root`
	`DB_PASSWORD=`

- Após isso, rode o comando abaixo para criar a chave criptográfica do projeto:
`php artisan key:generate`
- Rode o comando abaixo para executar as migrações ou importe o arquivo presente no diretório **SQL**.
`php artisan migrate --seed`
- Rode o comando abaixo para executar o servidor de desenvolvimento:
`php artisan serve`

### Usuário padrão
A aplicação traz consigo um usuário padrão, que pode ser utilizado para login. Os dados são:

- E-mail: admin@admin.com.br
- Password: 12345678
