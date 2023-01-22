<h1>Bienvenue sur la mediathèque de Cyb3rToY</h1>
<div class="acceuil-container">
    <section class="films">
        <div class="en-tete">
            <h2>Films à l'affiche</h2>
            <div class="voir-tout">
                <a href="films">Voir tout</a>
            </div>
        </div>
        <div class="liste">
            <?php foreach($datas[0] as $film): ?>
                <div class="item">
                    <div class="image-container">
                        <a href="/films/details/<?= $film->getId() ?>">
                            <img src="/assets/images/affiches/<?= $film->getUrl_affiche() ?>.jpg">
                        </a>
                    </div>
                    <div class="bulle">
                        <h3 class="bulle__titre"><?= $film->GetTitre() ?></h3>
                        <div class="synopsis"><?= $film->getSynopsis() ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="series">
        <div class="en-tete">
            <h2>Séries à l'affiche</h2>
            <div class="voir-tout"><a href="series">Voir tout</a></div>
        </div>
        <div class="liste">
            <?php foreach($datas[1] as $serie): ?>
                <div class="item">
                    <div class="image-container">
                        <a href="/series/details/<?= $serie->getId() ?>">
                            <img src="/assets/images/affiches/<?= $serie->getUrl_affiche() ?>.jpg">
                        </a>
                    </div>
                    <div class="bulle">
                        <h3 class="bulle__titre"><?= $serie->GetTitre() ?></h3>
                        <div class="synopsis"><?= $serie->getSynopsis() ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="acteurs">
        <div class="en-tete">
            <h2>Acteurs en vedettes</h2>
            <div class="voir-tout"><a href="acteurs">Voir tout</a></div>
        </div>
        <div class="liste">
            <?php foreach($datas[2] as $acteur): ?>
                <a href="/acteurs/details/<?= $acteur->getId() ?>">
                    <div class="item">
                        <div class="image-container">
                            <img src="/assets/images/photos/<?= $acteur->getUrl_photo() ?>.jpg">
                        </div>
                        <h3 class="bulle__titre"><?= $acteur->GetPrenom() . " " . $acteur->getNom() ?></h3>
                        <div class="bulle">
                            <div class="bio"><?= $acteur->getBio() ?></div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="realisateurs">
        <div class="en-tete">
            <h2>Réalisateurs en vedettes</h2>
            <div class="voir-tout"><a href="/realisateurs">Voir tout</a></div>
        </div>
        <div class="liste">
            <?php foreach($datas[3] as $realisateur): ?>
                <a href="/realisateurs/details/<?= $realisateur->getId() ?>">
                    <div class="item">
                        <div class="image-container">
                            <img src="/assets/images/directors/<?= $realisateur->getUrl_photo() ?>.jpg">
                        </div>
                        <h3 class="bulle__titre"><?= $realisateur->GetPrenom() . " " . $realisateur->getNom() ?></h3>
                        <div class="bulle">
                            <div class="bio"><?= $realisateur->getBio() ?></div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>