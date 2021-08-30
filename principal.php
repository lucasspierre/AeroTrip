<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<section class="cover">
    <nav class="navbar navbar-trans">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fab fa-tripadvisor fa-2x"></i></a>
            <a class="navbar-brand" href="?page=painel"><i class="fas fa-user-cog"></i></a>
        </div>
    </nav>
</section>
<header style="background-color: black !important;">
    <div class="imagem"></div>
    <p class="letreiro top-left">Viajar é <span class="typed-text"></span><span class="cursor">&nbsp;</span></p>
    <div class="container caixa-texto">
        <div class="col-7">
            <form action="?page=passageiro-cadastrar" method="POST" autocomplete="off">
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="titulos">De:</label>
                            <?php
                            $sql = "SELECT * FROM origem";
                            $res = $conn->query($sql);
                            print "<select name='idorigem' class='form-control formulario' required>";
                            print "<option selected disabled value=''>Origem</option>";
                            while ($row = $res->fetch_object()) {
                                print "<option value='" . $row->id_origem . "'>" . $row->cidade_origem . "</option>";
                            }
                            print "</select>";
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="titulos">Para:</label>
                            <?php
                            $sql = "SELECT * FROM destinos";
                            $res = $conn->query($sql);
                            print "<select name='iddestino' class='form-control formulario' required>";
                            print "<option selected disabled value=''>Destino</option>";
                            while ($row = $res->fetch_object()) {
                                print "<option value='" . $row->id_destino . "'>" . $row->cidade_destino . "</option>";
                            }
                            print "</select>";
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="titulos">Passageiros:</label>
                            <select class="form-control formulario" name="quantidade_passagens" required>
                                <option value="">Nº Passageiros</option>
                                <option value="1">1 Passageiro(s)</option>
                                <option value="2">2 Passageiro(s)</option>
                                <option value="3">3 Passageiro(s)</option>
                                <option value="4">4 Passageiro(s)</option>
                                <option value="5">5 Passageiro(s)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="label datas">Partida:</div>
                        <div class="label--right datas">Chegada:</div>
                        <div class="form-group">
                            <div class="input-daterange input-group">
                                <input name="data_partida" type="text" class="form-control bot" placeholder="DD/MM/AAAA" id="data" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text divisa"><i class="fas fa-plane"></i></span>
                                </div>
                                <input name="data_chegada" type="text" class="form-control bot" placeholder="DD/MM/AAAA" id="data" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary botao">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>
<div class="container pagina-principal">
    <div class="textos-principal">
        Destinos mais visitados
    </div>
    <div class="row text-center" style="padding-left: 13px">
        <div class="col-sm-3">
            <div class="img_section5">
                <a href="?page=principal.php" target="_blank">
                    <figure><img src="images/cidade1.jfif" width="250px" height="400px"></figure>
                </a>
                <span>
                    Londres, Reino Unido
                </span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="img_section5">
                <a href="?page=principal.php" target="_blank">
                    <figure><img src="images/cidade2.jpg" width="250px" height="400px">
                </a>
                </figure>
                <span class="texto">
                    Nova York, Eua
                </span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="img_section5">
                <a href="?page=principal.php" target="_blank">
                    <figure><img src="images/cidade3.jpg" width="250px" height="400px"></figure>
                </a>
                <span class="texto">
                    Paris, França
                </span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="img_section5">
                <a href="?page=principal.php" target="_blank">
                    <figure><img src="images/cidade4.jpg" width="250px" height="400px">
                    </figure>
                </a>
                <span class="texto">
                    Tokyo, Japão
                </span>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="img_section5">
                <a href="?page=principal.php" target="_blank">
                    <figure><img src="images/cidade5.jpeg" width="250px" height="400px"></figure>
                </a>
                <span>
                    Madri, Espanha
                </span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="img_section5">
                <a href="?page=principal.php" target="_blank">
                    <figure><img src="images/cidade6.jpeg" width="250px" height="400px">
                </a>
                </figure>
                <span class="texto">
                    Hong Kong, China
                </span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="img_section5">
                <a href="?page=principal.php" target="_blank">
                    <figure><img src="images/cidade7.jpeg" width="250px" height="400px"></figure>
                </a>
                <span class="texto">
                    Veneza, Itália
                </span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="img_section5">
                <a href="?page=principal.php" target="_blank">
                    <figure><img src="images/cidade8.jpeg" width="250px" height="400px">
                    </figure>
                </a>
                <span class="texto">
                    Patong, Tailândia
                </span>
            </div>
        </div>
    </div>
</div>

<footer id="sticky-footer" class="py-4 text-white-50" style="background-color: #212529">
    <div class="container text-center">
        <small>Copyright © AeroTrip.com</small>
    </div>
</footer>

<script>
    $('select[name=iddestino]').on('change', function() {
        var self = this;
        $('select[name=idorigem]').find('option').prop('disabled', function() {
            return this.value == self.value
        });
    });
    $('select[name=idorigem]').on('change', function() {
        var self = this;
        $('select[name=iddestino]').find('option').prop('disabled', function() {
            return this.value == self.value
        });
    });
</script>