<h1>LISTE DES FILMS DISPONIBLES</h1>

<?php foreach ($listFilms as $film): ?>
    <div class="film">
        <?= "<img class=\"film__affiche\" src=\"assets/images/affiches/" . $film->getUrl_affiche() . ".jpg\">" ?>
        <div class="film__content">    
            <h2 class="film__content__titre">
                <?= $film->getTitre() ?>
            </h2>
            <div class="film__content__datas">
                <div class="film__content__datas__unit real">
                    <?= $film->getIdDirector() ?>
                </div>
                <div class="film__content__datas__unit sortie">
                    <?= $film->getAnnee() ?>
                </div>
                <div class="film__content__datas__unit duree">
                    <?= $film->getDuree() ?>
                </div>
            </div>
            <p class="film__content__synopsis">
                <?= $film->getSynopsis() ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>