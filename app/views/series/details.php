<div class="movie-details">
    <h1><?= $movie->getTitre() ?></h1>

    <div class="movie-details__base">
        <div class="movie-details__base__affiche" >
            <img src="../../assets/images/affiches/<?= $movie->getUrl_affiche() ?>.jpg">
        </div>

        <div class="movie-details__base__datas">
            <div class="movie-details__base__datas__date">Sortie : <b><?= $movie->getAnnee() ?></b></div>
            <div class="movie-details__base__datas__nbrSaisons"><b><?= $movie->getNbrSaisons() ?></b> saisons</div>
            <div class="movie-details__base__datas__nbrEpisodes"><b><?= $movie->getNbrEpisodesTotal() ?></b> épisodes au total</div>
            <div class="movie-details__base__datas__synopsis"><?= $movie->getSynopsis() ?></div>
        </div>
    </div>

    <div class="movie-details__guests">
        <div class="movie-details__guests__director">
            <h3 class="def">Réalisateur</h3>
            <a href="../../realisateurs/details/<?= $realisateur->getId() ?>">
                <div class="item">
                    <div class="item__photo photo">
                        <img src="../../assets/images/directors/<?= $realisateur->getUrl_photo() ?>.jpg">
                    </div>
                    <div class="nom"><?= $realisateur->getPrenom() . " " . $realisateur->getNom() ?></div>
                </div>
            </a>
        </div>
        <div class="movie-details__guests__acteurs">
            <h3 class="acteurs">Acteurs</h3>
            <div class="movie-details__guests__acteurs__items">
                <?php foreach($acteurs as $acteur): ?>
                    <a href="../../acteurs/details/<?= $acteur->getId() ?>">
                        <div class="item">
                            <div class="item__photo photo">
                                <img src="../../assets/images/photos/<?= $acteur->getUrl_photo() ?>.jpg" >
                            </div>
                            <div class="nom"><?= $acteur->getPrenom() . " " . $acteur->getNom() ?></div>
                            <div class="personnage">
                                <?= $movie->getPersonnage($acteur->getID()) ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="movie-details__saisons">
        <h3>Nombres d'épisodes par saisons</h3>
        <table>
            <tr>
                <th>Saisons</th>
                <?php for($i = 1; $i <= $movie->getNbrSaisons(); $i++) : ?>
                    <td <?php if ($i % 2 != 0) {
                        echo " class='colImpaire'";
                    } ?>>
                        <?= $i ?>
                    </td>
                <?php endfor; ?>
            </tr>
            <tr>
                <th>Épisodes</th>
                <?php for($i = 1; $i <= $movie->getNbrSaisons(); $i++) : ?>
                    <td <?php if ($i % 2 != 0) {
                        echo " class='colImpaire'";
                    } ?>>
                        <?= $movie->getNbrEpisodes($i) ?>
                    </td>
                <?php endfor; ?>
            </tr>
        </table>
    </div>
</div>