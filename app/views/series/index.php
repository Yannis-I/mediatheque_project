<h1>LISTE DES SÉRIES DISPONIBLES</h1>



<?php foreach ($datas as $data): ?>
    <div class="movie">
        <?= "<a class='clickable' href='series/details/" . $data["serie"]->getId() . "'><img class=\"movie__affiche\" src=\"assets/images/affiches/" . $data["serie"]->getUrl_affiche() . ".jpg\"></a>" ?>
        <div class="movie__content"> 
            <div class="movie__content__header">
                <h2 class="movie__content__header__titre">
                    <a class="clickable" href='/series/details/<?= $data["serie"]->getId() ?>'>   
                        <?= $data["serie"]->getTitre() ?>
                    </a>
                    <?= " <span>(".$data["serie"]->getAnnee().")</span>" ?>
                </h2>
                <div class="movie__content__header__saisons">
                    <?= $data["serie"]->getNbrSaisons() ?> saisons
                </div>
            </div>
            <div class="movie__content__grid">
                <div class="movie__content__grid__datas">
                    <div class="pre">
                        <div>De</div>
                        <div class="marge">Avec</div>
                    </div>
                    <div class="nom">
                        <div class="movie__content__grid__datas__unit real">
                            <?= "<a class='clickable' href='acteurs/details/" . $data["realisateur"][0]->getId() . "'>" . $data["realisateur"][0]->getPrenom() . " " . $data["realisateur"][0]->getNom() . "</a>" ?>
                        </div>
                        <?php foreach($data["acteurs"] as $acteur):?>
                            <div class="movie__content__grid__datas__unit acteurs">
                                <a class='clickable' href='acteurs/details/<?= $acteur->getId();?>'>
                                    <?= $acteur->getPrenom() . " " . $acteur->getNom(); ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <p class="movie__content__grid__synopsis">
                    <?= $data["serie"]->getSynopsis() ?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>