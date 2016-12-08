<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Dodaj ogłoszenie</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink"
                                                                                           href="/accounts/login/">Sign
                        In</a></div>
            </div>
            <div class="panel-body">
                <?php echo validation_errors(); ?>
                <?php
                $attributes = array('name' => 'formularz', 'id' => 'formularz');
                echo form_open_multipart('', $attributes); ?>
                <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S'/>


                <form id="form" class="form-horizontal" method="post">
                    <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S'/>
                    <div id="div_id_select" class="form-group required">
                        <label for="id_select" class="control-label col-md-4  requiredField"> Select<span
                                class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 " style="margin-bottom: 10px">
                            <label for="sel1">kategoria ogłoszenia</label>
                            <select class="form-control" id="sel1" name="sel1">
                                <?php foreach ($kategorie as $k): ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label class="radio-inline"> Wyróżnić?</label>  <input type="radio" name="adwarded" id="adwarded" value="1"
                                                                           style="margin-bottom: 10px">Tak |  <input type="radio" name="adwarded" id="adwarded" value="0"
                                                                                                                     style="margin-bottom: 10px"> Nie
                        </div>
                    </div>

                    <div id="div_id_username" class="form-group required">
                        <label for="id_username" class="control-label col-md-4  requiredField"> Tytuł<span
                                class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md  textinput textInput form-control" id="name" maxlength="30"
                                   name="name" placeholder="Podaj tytuł ogłoszenia" style="margin-bottom: 10px"
                                   type="text"/>
                        </div>
                    </div>
                    <div id="div_id_email" class="form-group required">
                        <label for="id_email" class="control-label col-md-4  requiredField"> Cena<span
                                class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md emailinput form-control" id="cena" name="cena"
                                   placeholder="Podaj cenę/wynagrodzenie" style="margin-bottom: 10px" type="text"/>
                        </div>
                    </div>
                    <div id="div_id_password1" class="form-group required">
                        <label for="id_password1" class="control-label col-md-4  requiredField">Lokalizacja<span
                                class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input class="input-md textinput textInput form-control" id="lokalizacja" name="lokalizacja"
                                   placeholder="Podaj lokalizację" style="margin-bottom: 10px" type="text"/>
                        </div>
                    </div>
                    <div id="div_id_password2" class="form-group required">
                        <label for="id_password2" class="control-label col-md-4  requiredField"> Skrócony opis<span
                                class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <textarea class="input-md textinput textInput form-control" id="short_description"
                                      name="short_description"
                                      placeholder=" Podaj opis pokazywany przy liście ogłoszeń"
                                      style="margin-bottom: 10px" type="text"/></textarea>
                        </div>
                    </div>
                    <div id="div_id_name" class="form-group required">
                        <label for="id_name" class="control-label col-md-4  requiredField"> Pełen Opis<span
                                class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <textarea class="input-md textinput textInput form-control" id="description"
                                      name="description"
                                      placeholder="Podaj pełen opis, wyświtlany na stronie twojego ogłoszenia"
                                      style="margin-bottom: 10px" type="text"/></textarea>
                        </div>
                    </div>
                    <div id="div_id_name" class="form-group required">
                        <label for="id_name" class="control-label col-md-4  requiredField"> Główne Zdjęcie <span
                                class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <label class="btn btn-default btn-file" style="margin-bottom: 10px">
                                Wybierz <input type="file" name="photo">
                            </label>
                        </div>
                    </div>
                    <div class="form-group"></div>
                    <div id="dla_kategorii" class="dla_kategori">

                    </div>
                    <div class="form-group">
                        <div class="aab controls col-md-4 " id="last"></div>
                        <div class="controls col-md-8 nizej">
                            <input type="submit" name="Signup" value="Dodaj ogłoszenie" class="btn btn-primary btn btn-info"
                                   id="submit-id-signup"/>
                        </div>
                    </div>


                </form>

                </form>
            </div>
        </div>
    </div>
</div>

</div>

<script>

    // Define the `phonecatApp` module
    var phonecatApp = angular.module('phonecatApp', []);

    // Define the `PhoneListController` controller on the `phonecatApp` module
    phonecatApp.controller('PhoneListController', function PhoneListController($scope, $http) {
        $("select").change(function () {
            var field = document.getElementById('formularz').sel1.value;
            $http.get("<?=base_url()?>index.php/controller/pola/" + field)
                .then(function (response) {
                    var text = response.data;
                    $("#dla_kategorii").html(text);
                });
        })
            .change();
    });

</script>