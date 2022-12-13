# MEDIATHEQUE PROJECT

## Environnement

APACHE 2.4
PHP 8.1
MYSQL 8.0

## Redirection d'URL

La redirection d'url se fait via une redirection automatique du server apache puis un router en php. La redirection automatique du server se configure à partir du fichier ".htaccess" à la racine du projet.

Cependant apache n'est parfois pas configuré pour lire le fichier ."htaccess". Si la redirection ne fonctionne pas, il faut paramétré le server apache pour activer l'option. Voir la DOC Apache.
