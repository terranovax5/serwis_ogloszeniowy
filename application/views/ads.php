<div class="container">
    <div class="row">
        <div class="well tlo1">
            <h1 class="text-center">Wybierz ogłoszenie dla siebie</h1>
            <div class="list-group">

                <?php         $date = new DateTime();
                foreach ($ads as $a): ?>
                    <?php date_add($date, date_interval_create_from_date_string('-1 month'));
                    if($a['awarded']==1 && $a['created_date']>$date->format('Y-m-d')):?>
                    <a href="<?= base_url() ?>index.php/controller/ad/<?= $a['id'] ?>"" class="list-group-item">
                    <div class="media col-md-3">
                        <figure class="pull-left">
                            <img class="media-object img-rounded img-responsive img-ads"
                                 src="<?= base_url() ?>images/photos/<?= $a['photo'] ?>"
                                 alt="błąd zdjęcia">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <h4 class="list-group-item-heading"><?= $a['name'] ?></h4>
                        <p class="list-group-item-text"><?= $a['short_description'] ?></p>
                    </div>
                    <div class="col-md-3 text-center">
                        <h2> <?= $a['cena'] ?>
                            <small> </small>
                        </h2>
                        <div class="stars">
                            <?php if ($a['awarded'] > 0) echo '<span class="glyphicon glyphicon-star"></span>' ?>
                            <?php if ($a['awarded'] == 0) echo '<span class="glyphicon glyphicon-star-empty"></span>' ?>
                        </div>

                    </div>
                    </a><?php endif;?>
                <?php endforeach; ?>





                <?php foreach ($ads as $a): ?>
                    <?php date_add($date, date_interval_create_from_date_string('-1 month'));
                    if($a['awarded']==0 && $a['created_date']>$date->format('Y-m-d')):?>
                        <a href="<?= base_url() ?>index.php/controller/ad/<?= $a['id'] ?>"" class="list-group-item">
                        <div class="media col-md-3">
                            <figure class="pull-left">
                                <img class="media-object img-rounded img-responsive img-ads"
                                     src="<?= base_url() ?>images/photos/<?= $a['photo'] ?>"
                                     alt="błąd zdjęcia">
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <h4 class="list-group-item-heading"><?= $a['name'] ?></h4>
                            <p class="list-group-item-text"><?= $a['short_description'] ?></p>
                        </div>
                        <div class="col-md-3 text-center">
                            <h2> <?= $a['cena'] ?>
                                <small> </small>
                            </h2>
                            <div class="stars">
                                <?php if ($a['awarded'] > 0) echo '<span class="glyphicon glyphicon-star"></span>' ?>
                                <?php if ($a['awarded'] == 0) echo '<span class="glyphicon glyphicon-star-empty"></span>' ?>
                            </div>

                        </div>
                        </a><?php endif;?>
                <?php endforeach; ?>






            </div>

        </div>
    </div>
</div>


