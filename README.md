# Sobre
Projeto criado para demonstrar habilidades usando Laravel 7 realizando o teste disponível no link [https://github.com/BeeCoffee/teste-tecnico-php-laravel](https://github.com/BeeCoffee/teste-tecnico-php-laravel)

# Requisitos

- PHP 7.4
- MySQL
- Composer
- Extensão php-xml
- Extensão php-json
- Extensão php-mbstring
- Extensão php-mysql

# Instalação
1. Clone o repositório
   
   ``` git clone https://github.com/fboasorte/teste-pratico-beecoffee.git```

2. Entre no repositório e instale as dependencias
   
   ``` composer install ```

3. Copie o arquivo ```.env```

    ```cp .env.example .env```

4. Crie o banco de dados com o nome desejado no MySQL, como por exemplo beecoffee, pode ser feito via linha comando ou por softwares como DBeaver ou MySQL Workbench

    ```CREATE DATABASE beecoffee```

5. Adicione as credenciais de usuário e senha com acesso ao banco de dados no arquivo ```.env```, como no exemplo:

```
DB_DATABASE=beecoffee
DB_USERNAME=user
DB_PASSWORD=password
```

6. Gera uma nova chave

    ```php artisan key:generate```
7. Aplique as migrations do banco de dados
   
   ```php artisan migrate```

8. O código está com algumas seeds para popular o banco, se quiser pode rodá-las junto com migrations

    ```php artisan migrate --seed```

9. Inicie o servidor

    ```php artisan serve```

10.  Acesse a URL [http://127.0.0.1:8000/pacientes](http://127.0.0.1:8000/pacientes) para usar o sistema