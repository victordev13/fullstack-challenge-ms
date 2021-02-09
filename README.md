## Blog Application

### Ferramentas utilizadas  :tw-1f527:
- API:
 - Framework PHP: [Symfony 5.2](http://symfony.com/ "Symfony 5.2")
 - Banco de Dados: MySQL
- Front End
 - Lib JavaScript: [NextJS](https://nextjs.org/ "NextJS") (React como base)

---
### Requisitos :fa-info-circle: 
- PHP 7.2^
- MySQL
- PDO Habilitado
- Composer 2.0.1^
---
### Orientações de build  :tw-1f525:
> Ambiente de desenvolvimento

- Backend
	1.Altere `.env`, e preencha suas credenciais 
		- db_user
		- db_password
		- db_name
	`DATABASE_URL=mysql://db_user:db_pass@127.0.0.1:3306/db_name`

	2.Instalar pacotes do composer
	`$ composer install`
	
	3.Iniciar configurações da aplicação
	`$ php bin/console app:run`
	
	4.Iniciar servidor na porta 8000
	`$ php bin/console server:run`
	
- Front End
	1.Instale os pacotes do NPM
	`$ npm install`
	
	2. Inicie o NextJS
	`$ npm run build`