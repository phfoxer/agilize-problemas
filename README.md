# Problema I
Dentro do diretório /problema_i , abra o terminal de sua preferência e execute:

    php -S localhost:8080
Caso não tenha o php no seu path pode utilizar ferramentas online como o [http://phptester.net/](http://phptester.net/)

# Problema II
Dentro do diretório /problema_ii , abra o terminal de sua preferência e execute:

    php -S localhost:8080
Caso não tenha o php no seu path pode utilizar ferramentas online como o [http://phptester.net/](http://phptester.net/)

# Problema III

## Na aplicação de Back End
Adicione um banco de sua preferência ao .env
E na linha de comando execute os seguintes scripts:

    composer install

    php artisan migrate

    php artisan db:seed --class=UsersTableSeeder

    php artisan serve

No Front
Verifique os passos de instalação no site oficial do Angular [https://angular.io/guide/setup-local](https://angular.io/guide/setup-local)

Dentro do diretório problema-iii execute o script

    ng serve --o
