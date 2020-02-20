# Agence-Immo

Techno utilisées

**Symfony V 5.0**

**Twig**

**Php V 7.2.11**

**Bootsrap V 4.4.1**

## Installation

Clone this repository

- Install dependencies :

    - `composer install`

- Create .env.local :

    - `touch .env.local`

- Paste 
`DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/agence_immo?serverVersion=5.7`

    - Replace db_user & db_password with your SQL credentials

- Create the database :

    - `symfony console doctrine:database:create` OR `symfony console d:d:c`

- Import the DB structure :

    - `symfony console doctrine:migrations:migrate` OR `symfony console d:m:m`

    - Type y to confirm modifications

### Usage :

- Run the Symfony 

    - `symfony serve -d`



If you want access to admin 

Paste in your user table this roles ["ROLE_ADMIN"]