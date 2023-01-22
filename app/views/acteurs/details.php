<h1><?= $datas[0]->getPrenom() . " " . $datas[0]->getNom() ?></h1>
<div class="vedette">
    <div class="bio">
        <img src="/assets/images/photos/<?= $datas[0]->getUrl_photo() ?>.jpg">
        <p><?= $datas[0]->getBio() ?></p>
    </div>

    <h2>Films et séries avec <?= $datas[0]->getPrenom() . " " . $datas[0]->getNom() ?></h2>
    <div class="list-cont">
        <?php if(!empty($datas[1])): ?>
            <?php foreach($datas[1] as $movie): ?>
                <a href="/films/details/<?= $movie->getId() ?>">
                    <div class="affiche">
                        <img src="/assets/images/affiches/<?= $movie->getUrl_affiche() ?>.jpg">
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if(!empty($datas[2])): ?>
            <?php foreach($datas[2] as $movie): ?>
                <a href="/series/details/<?= $movie->getId() ?>">
                    <div class="affiche">
                        <img src="/assets/images/affiches/<?= $movie->getUrl_affiche() ?>.jpg">
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>