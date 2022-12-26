<h1>LISTE DES FILMS DISPONIBLES</h1>

<?php foreach ($datas as $data): ?>
    <div class="film">
        <?= "<a class='clickable' href='films/details/" . $data["film"]->getId() . "'><img class=\"film__affiche\" src=\"assets/images/affiches/" . $data["film"]->getUrl_affiche() . ".jpg\"></a>" ?>
        <div class="film__content"> 
            <div class="film__content__header">
                <h2 class="film__content__header__titre">
                    <a class="clickable" href='/films/details/<?= $data["film"]->getId() ?>'>   
                        <?= $data["film"]->getTitre() ?>
                    </a>
                    <?= " <span>(".$data["film"]->getAnnee().")</span>" ?>
                </h2>
                <div class="film__content__header__duree">
                    <?= $data["film"]->getDuree() ?>
                </div>
            </div>
            <div class="film__content__grid">
                <div class="film__content__grid__datas">
                    <div class="pre">
                        <div>De</div>
                        <div class="marge">Avec</div>
                    </div>
                    <div class="nom">
                        <div class="film__content__grid__datas__unit real">
                            <?= "<a class='clickable' href='acteurs/details/" . $data["realisateur"][0]->getId() . "'>" . $data["realisateur"][0]->getPrenom() . " " . $data["realisateur"][0]->getNom() . "</a>" ?>
                        </div>
                        <?php foreach($data["acteurs"] as $acteur):?>
                            <div class="film__content__grid__datas__unit acteurs">
                                <a class='clickable' href='acteurs/details/<?= $acteur->getId();?>'>
                                    <?= $acteur->getPrenom() . " " . $acteur->getNom(); ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="datas">
                        <!-- <div class="film__content__grid__datas__unit sortie">
                            <?= $data["film"]->getAnnee() ?>
                        </div> -->
                    </div>
                </div>
                <p class="film__content__grid__synopsis">
                    <?= $data["film"]->getSynopsis() ?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>