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
                <div class="listeDeroulante">
                    <li>MEDIA</li>
                    <div class="list-cont">
                        <a href="/films">
                            <div class="list-cont__items item1">
                                <li>Films</li>
                            </div>
                        </a>
                        <a href="/series">
                            <div class="list-cont__items item2">
                                <li>Séries</li>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="listeDeroulante">
                    <li>VEDETTES</li>
                    <div class="list-cont">
                        <a href="/acteurs">
                            <div class="list-cont__items item1">
                                <li>Acteurs</li>
                            </div>
                        </a>
                        <a href="/realisateurs">
                            <div class="list-cont__items item2">
                                <li>Réalisateurs</li>
                            </div>
                        </a>
                    </div>
                </div>
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