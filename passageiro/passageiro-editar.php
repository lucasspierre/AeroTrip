<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<?php
$sql = "SELECT * FROM cliente AS c
INNER JOIN origem AS o
ON c.idorigem = o.id_origem
INNER JOIN destinos AS d
ON c.iddestino = d.id_destino
			WHERE id_passageiro = " . $_GET["id_passageiro"];

$res = $conn->query($sql) or die($conn->error);

$row = $res->fetch_object();
?>

<div class="sidenav titulo">
    <a class="navbar-brand" href="#"><i class="fab fa-tripadvisor fa-2x"></i></a>
    <a href="javascript:history.go(-1)">Voltar</a>
    <a href="?page=principal">Sair</a>
</div>
<div class="main texto">
    <div class="config-grupo">
        <form action="?page=passageiro-salvar" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_passageiro" value="<?php print $row->id_passageiro; ?>">
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Nome Completo do Passageiro</label>
                    <input type="text" name="nome" class="form-control formulario-cadastro" value="<?php print $row->nome; ?>" placeholder="Nome do Passageiro" required maxlength="60">
                </div>
                <div class="form-group col-md-4">
                    <label>CPF do Passageiro</label>
                    <input type="text" name="cpf" class="form-control formulario-cadastro" value="<?php print $row->cpf; ?>" id="cpf" placeholder="000.000.000-00" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control formulario-cadastro" value="<?php print $row->email; ?>" placeholder="nome@gmail.com" required maxlength="40">
                </div>
                <div class="form-group col-md-6">
                    <label>Telefone Celular</label>
                    <input type="text" name="tel" class="form-control formulario-cadastro" value="<?php print $row->tel; ?>" id="telefone" placeholder="(00) 00000-0000" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label>Endereço</label>
                    <input type="text" name="endereco" class="form-control formulario-cadastro" value="<?php print $row->endereco; ?>" required maxlength="50">
                </div>
                <div class="form-group col-md-4">
                    <label>CEP</label>
                    <input type="text" name="cep" class="form-control formulario-cadastro" value="<?php print $row->cep; ?>" id="cep" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>De:</label>
                    <select name='idorigem' class="form-control formulario-cadastro" required>
                        <option selected value="<?php print $row->idorigem ?>"><?php print $row->cidade_origem ?></option>
                        <?php
                        $sql_origem = "SELECT * FROM origem";
                        $res_origem = $conn->query($sql_origem);
                        while ($row_origem = $res_origem->fetch_object()) {
                            print "<option value='" . $row_origem->id_origem . "'>" . $row_origem->cidade_origem . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Para:</label>
                    <select name='iddestino' class="form-control formulario-cadastro" required>
                        <option selected value="<?php print $row->iddestino ?>"><?php print $row->cidade_destino ?></option>
                        <?php
                        $sql_destino = "SELECT * FROM destinos";
                        $res_destino = $conn->query($sql_destino);
                        while ($row_destino = $res_destino->fetch_object()) {
                            print "<option value='" . $row_destino->id_destino . "'>" . $row_destino->cidade_destino . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Passageiros:</label>
                    <select name="quantidade_passagens" class="form-control formulario-cadastro" required>
                        <option selected value="<?php print $row->quantidade_passagens ?>"><?php print $row->quantidade_passagens ?> Passageiro(s)</option>
                        <option value="1">1 Passageiro(s)</option>
                        <option value="2">2 Passageiro(s)</option>
                        <option value="3">3 Passageiro(s)</option>
                        <option value="4">4 Passageiro(s)</option>
                        <option value="5">5 Passageiro(s)</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Forma de Pagamento:</label>
                    <select name="pagamento" class="form-control formulario-cadastro" required>
                        <option selected value="<?php print $row->pagamento ?>">Boleto à Vista</option>
                        <option value="Boleto">Boleto à Vista</option>
                        <option value="Crédito">Cartão de Crédito</option>
                        <option value="Débito">Cartão de Débito</option>
                    </select>
                </div>
                <div class="form-group col-md-1">
                    <label>Partida:</label>
                    <input type="text" name="data_partida" class="form-control formulario-cadastro" id="data" value="<?php print $row->data_partida ?>" required>
                </div>
                <div class="form-group col-md-1">
                    <label>Chegada:</label>
                    <input type="text" name="data_chegada" class="form-control formulario-cadastro" id="datavolta" value="<?php print $row->data_chegada ?>" required>
                </div>
                <div class="form-group col-md-1">
                    <?php
                    $valor = $row->preco;
                    $quant_pass = $row->quantidade_passagens;
                    $conta = ($valor * $quant_pass) * 2;
                    $total = number_format((float)$conta, 2, ',', '');
                    ?>
                    <label>Valor Total:</label>
                    <input type="text" name="valor_total" class="form-control formulario-cadastro" value="R$ <?php print $total ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
<style>
    .titulo {
        font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    }

    .texto {
        font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 180px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #4278f5;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: white;
        display: block;
    }

    .sidenav a:hover {
        color: #91b1fa;
    }


    .main {
        margin-left: 180px;
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
</style>
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