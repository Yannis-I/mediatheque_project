<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mediathèque</title>

    <link rel="stylesheet" href="/assets/css/main.min.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <a href="/">
                    <div>
                        <li>ACCEUIL</li>
                    </div>
                </a>
                <a href="/films">
                    <div>
                        <li>FILMS</li>
                    </div>
                </a>
                <a href="/series">
                    <div>
                        <li>SÉRIES</li>
                    </div>
                </a>
            </ul>
        </nav>
    </header>

    <main class="main-container">
        <?= $contenu ?>
    </main>

    <footer>
        <p>&copy; Cyb3rToY all right reserved</p>
    </footer>

</body>

</html>