<h1>
Pré-réquis
</h1>
<p>
PHP 8.0, Composer 2.1.1, Node 14.17.5, 
</p>
<hr/>
<h1>
Configurations
</h1>
<p>
Activer l'extension PHP permettant de connecter l'application à une base de données oracle en suivant 
ces tutoriels :
 </p>
 <ul>
 <li><a href="https://supercidadedigital.com.br/oracle-database-connections-in-php-laravel-over-ubuntu/">Tutoriel pour Linux</a> </li>
 <li><a href="https://www.youtube.com/watch?v=i9C2thlgOg8">Tutoriel pour Windows (avec XAMPP ou WAMPP)</a> </li>
</ul>
<h1>
Variables d'environnement
</h1>
<p>
A la racine du projet, il faudra renommer le fichier ".env.example" en ".env". 
<br/>
A l'intérieur de ce fichier, se retrouvent les identifiants de connexion à la base de données. Veuillez les modifier selon votre environnement.
</p>
<h1>
Lancer l'application
</h1>
<div>
<ul>
<li>
Installer les dépendances via les commandes suivantes : "composer install" puis "npm install" 
</li>
<li>
Démarrer le serveur Laravel via la commande "php artisan serve" 
</li>
<li>
Démarrer le serveur Javascript via la commande "npm run dev" 
</li> 
</ul>
</div>
<h1>
Base de données
</h1>
<ul>
<li>
Vous pouvez créer la structure de la base de données via la commande "php artisan migrate" .
</li>
<li>
Par la suite, vous pouvez ajouter des données factices de test via la commande "php artisan db:seed" .
<br/>
NB : Dans ce cas, les identifiants de connexion de l'administrateur seront : email => admin@mail.ci, mot de passe => password.
</li>
</ul>

<h3>
Enjoy !
</h3>
