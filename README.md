# MEDIATHEQUE PROJECT

## Environnement

<ul>
    <li>APACHE 2.4</li>
    <li>PHP 8.1</li>
    <li>MYSQL 8.0</li>
</ul>

## Redirection d'URL

La redirection d'url se fait via une redirection automatique du server apache sur index.php puis un router en php. La redirection automatique du server se configure à partir du fichier ".htaccess" à la racine du projet.

Cependant apache n'est parfois pas configuré pour lire automatiquement le fichier ."htaccess". Si la redirection ne fonctionne pas, testez : "<b>sudo a2enmod rewrite</b>" (pour linux).
Sinon, il faut paramétrer le server apache pour activer l'option. Voir la DOC Apache.
