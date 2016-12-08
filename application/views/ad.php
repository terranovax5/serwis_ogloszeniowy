<?php foreach ($ad as $a): ?>
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="item-container">
                <div class="container">
                    <div class="col-md-12 nizej">
                        <div class=col-md-12">

                            <center>
                                <img class="ad_primary_photo" src="<?= base_url() ?>images/photos/<?= $a['photo'] ?>"
                                     alt=""/>
                            </center>
                        </div>


                    </div>

                    <div class="col-md-7">
                        <div class="product-title"><?= $a['name'] ?></div>
                        <div class="product-desc"><?= $a['short_description'] ?></div>
                        <div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i
                                class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i
                                class="fa fa-star-o"></i></div>
                        <hr>
                        <div class="product-price"><?= $a['cena'] ?></div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="col-md-12 product-info">
                    <ul id="myTab" class="nav nav-tabs nav_tabs">

                        <li class="active"><a href="#service-one" data-toggle="tab">Opis</a></li>
                        <li><a href="#service-two" data-toggle="tab">Informacje</a></li>
                        <li><a href="#service-three" data-toggle="tab">Więcej zdjęć</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="service-one">

                            <section class="container product-info">
                                <?= $a['description'] ?>
                            </section>

                        </div>
                        <div class="tab-pane fade" id="service-two">

                            <section class="container">
                                <h3><?= $a['name'] ?> informacje:</h3>
                                <?php foreach ($kolumny as $k): ?>
                                    <?php if ($k == 'ad_id') continue; ?>
                                    <li><?= $k ?> - <?= $a[$k] ?></li>
                                <?php endforeach; ?>

                            </section>

                        </div>
                        <div class="tab-pane fade" id="service-three">
                            <center>
                                <?php foreach ($photos as $p): ?>
                                    <img class="ad_primary_photo nizej"
                                         src="<?= base_url() ?>images/photos/<?= $p['photo'] ?>"
                                         alt=""/>
                                <?php endforeach; ?>
                            </center>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>