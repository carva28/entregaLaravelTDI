#### TDI ENTREGA 15/11/2019

Projeto PBL - Público nas escolas 

Projeto com base nas tecnologias:
+ Laravel
+ Image Intervation http://image.intervention.io/getting_started/installation

1. `Git clone https://github.com/carva28/entregaLaravelTDI.git`
2. De seguida Ligar o XAMPP https://www.apachefriends.org/images/xampp-logo-ac950edf.svg
3. Abrir a pasta com um editor de código à escolha
4. `composer install` e `npm install`
+ Caso não tenha `"intervention/image": "^2.5",`, então deverá de instalar através `composer require intervention/image` e de seguida na pasta `config/app.php` deve adiconar no final `$providers` a seguinte linha `Intervention\Image\ImageServiceProvider::class` e também  dentro da função `$aliases` adiocione `'Image' => Intervention\Image\Facades\Image::class`, após isso execute no terminal o seguinte comando `php artisan storage:link`
5. Após isso execute no terminal os seeders inerentes à base de dados através do comando `php artisan db:seed`
6. Credenciais para login:
    

| email        | password  | 
| ------------- |:-------------:| 
| admin@tdi.pt     | admin123 |


7. Poderá explorar a API através do link http://localhost:{porta_do_seu_serivço}/docs
8. Este projeto tem como objetivo a produção de conteúdo jornalísitico por parte dos reporteres e editores, sendo que o editor pode criar um jornal mas o reporter não. Porém todos podem editar uma fotografia.
___
###### Autoria Diogo Carvalho ©  
###### 85289 MCMM UA
