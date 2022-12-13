# MEDIATHEQUE PROJECT

## Environnement

<ul>
    <li>APACHE 2.4</li>
    <li>PHP 8.1</li>
    <li>MYSQL 8.0</li>
</ul>

## Redirection d'URL

La redirection d'url se fait via une redirection automatique du server apache sur index.php puis un router en php. La redirection automatique du server se configure à partir du fichier <em>.htaccess</em> à la racine du projet.

Cependant apache n'est parfois pas configuré pour lire automatiquement le fichier <em>.htaccess</em>. Si la redirection ne fonctionne pas, testez : "<b>sudo a2enmod rewrite</b>" (pour linux).
Sinon, il faut paramétrer le server apache pour activer l'option. Voir la DOC Apache.

## Fichiers de configuration

### Le server apache

Le server apache utilise le fichier <b>.htaccess</b> à la racine du projet pour rediriger les URLs vers <em>index.php</em>.

### La base de données

<ul>
    <li>
    Le fichier <b>DB_Mediatheque.sql</b> à la racine du projet contient toutes les commandes pour créer la base de données.
    </li>
    <li>
    Le fichier de configuration pour l'accès à la base de données se trouve dans <b>core/Db.php</b>
    </li>
</ul>

### Le SCSS

Le scss est déjà compilé. Pour le modifié, utilisez l'extension VScode <b>Live Sass Compiler</b>. Le fichier de configuration de LSC est déjà paramétré et se trouve dans <b>.vscode/settings.json</b>
