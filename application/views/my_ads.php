<div class="container">

    <?php foreach ($ads as $r): ?>


        <div class="bs-calltoaction bs-calltoaction-info" ng-repeat="x in names">
            <div class="row">
                <div class="col-md-9 cta-contents">
                    <h1 class="cta-title"><?= $r['name'] ?> &nbsp; <?= $r['created_date'] ?></h1>
                    <div class="cta-desc">
                        <p> <?= $r['cena'] ?> &nbsp; <?= $r['lokalizacja'] ?></p>
                        <p> <?= $r['short_description'] ?> </p>

                    </div>
                </div>
                <div class="col-md-3 cta-button">
                    <?php if ($this->session->userdata('user_id')): ?>
                        <a href="<?= base_url() ?>index.php/controller/przedluz/<?= $r['id'] ?>"
                           class="btn btn-lg btn-block btn-info">Przedłóż</a>
                        <a href="<?= base_url() ?>index.php/controller/usun/<?= $r['id'] ?>"
                           class="btn btn-lg btn-block btn-info">Usuń</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
    <div class="bs-calltoaction bs-calltoaction-info">
        <?php echo form_open_multipart('controller/add_photo'); ?>
        <div class="col-md-9 cta-contents">
            <h1>Dodaj zdjęcie do ogłoszenia</h1>
            <select class="form-control" id="id" name="id">
                <?php foreach ($ads as $k): ?>
                    <option value="<?= $k['id'] ?>"><?= $k['name'] ?></option>
                <?php endforeach; ?>
            </select>

            <input class="btn btn-lg btn-block btn-info" type="file" name="photo"/>
        </div>

        <input class="btn btn-lg btn-block btn-info" type="submit" value="upload"/>

        </form>
    </div>
</div>


</div>
