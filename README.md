## Blog Application

### Ferramentas utilizadas  :wrench:
- API:
 - Framework PHP: [Symfony 5.2](http://symfony.com/ "Symfony 5.2")
 - Banco de Dados: MySQL
- Front End
 - Lib JavaScript: [NextJS](https://nextjs.org/ "NextJS") (React como base)

Screenshots: [Ver](https://github.com/victordev13/fullstack-challenge-ms/tree/development/screenshots "Ver")

---
### Requisitos :information_source: 
- PHP 7.2^
- MySQL
- PDO Habilitado
- Composer 2.0.1^
---
### Orientações de build  :fire:
> Ambiente de desenvolvimento

- #### Back-End
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
	
- ### Front-End
	1.Instale os pacotes do node
	
	`$ npm install`
	
	2.Inicie o NextJS na porta 3000
	
	`$ npm run build && npm run start`
	
	3.Acesse:[http://localhost:3000](http://localhost:3000)
	
----
Criado em:  02/2021
