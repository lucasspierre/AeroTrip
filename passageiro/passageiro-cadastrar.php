<?php
session_start();
$_SESSION['idorigem'] = $_POST['idorigem'];
$_SESSION['iddestino'] = $_POST['iddestino'];
$_SESSION['data_partida'] = $_POST['data_partida'];
$_SESSION['data_chegada'] = $_POST['data_chegada'];
$_SESSION['quantidade_passagens'] = $_POST['quantidade_passagens'];
?>
<?php
$sql_origem = "SELECT cidade_origem FROM origem WHERE id_origem=" . $_POST['idorigem'];
$res_origem = $conn->query($sql_origem) or die($conn->error);
$row_origem = $res_origem->fetch_object();

$sql_destino = "SELECT cidade_destino,preco FROM destinos WHERE id_destino=" . $_POST['iddestino'];
$res_destino = $conn->query($sql_destino) or die($conn->error);
$row_destino = $res_destino->fetch_object();

$valor = $row_destino->preco;
$quant_pass = $_POST["quantidade_passagens"];
$conta = ($valor * $quant_pass) * 2;
$total = number_format((float)$conta, 2, ',', '');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<div class="bg-pagina-cadastro"></div>
<div class="pagina-cadastro">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card cartao">
                    <div class="card-body cartao-corpo">
                        <h5 class="card-title logo"><i class="fas fa-plane fa-lg"></i> AIRLINES - Dados da Viagem</h5>
                        <p class="card-text">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><i class="fas fa-plane-departure"></i> Origem:</label>
                                        <input class="ticket" type="text" value="<?php print $row_origem->cidade_origem ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><i class="fas fa-plane-arrival"></i> Destino:</label>
                                        <input class="ticket" type="text" value="<?php print $row_destino->cidade_destino ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label><i class="far fa-calendar-alt"></i> Partida:</label>
                                        <input class="ticket" type="text" value="<?php print $_POST["data_partida"]; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><i class="far fa-calendar-alt"></i> Chegada:</label>
                                        <input class="ticket" type="text" value="<?php print $_POST["data_chegada"]; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><i class="fas fa-suitcase-rolling"></i> Passageiros:</label>
                                        <input class="ticket" type="text" value="<?php print $_POST["quantidade_passagens"]; ?> Passageiro(s)" readonly>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><i class="fas fa-dollar-sign"></i> Valor Total*:</label>
                                        <input class="ticket" type="text" value="R$ <?php print $total ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <small class="text-muted text-justify">*O valor total já inclui taxas e a quantidade de passageiros, quaisquer taxas adicionais devem ser desconsideradas.</small>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <a href="?page=principal"><button type="button" class="btn btn-dark ticket-botao">Voltar ao ínicio</button></a>
                                </div>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card cartao1">
                    <div class="card-body cartao-corpo1">
                        <h5 class="card-title logo1"><i class="fas fa-plane fa-lg"></i> AIRLINES - Dados do Passageiro</h5>
                        <p class="card-text">
                            <form action="?page=passageiro-salvar" method="POST">
                                <input type="hidden" name="acao" value="cadastrar">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label>Nome Completo do Comprador*</label>
                                        <input class="ticket1" type="text" name="nome" placeholder="Nome" required maxlength="60">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>CPF do Passageiro</label>
                                        <input class="ticket1" type="text" name="cpf" id="cpf" placeholder="000.000.000-00" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>E-mail</label>
                                        <input class="ticket1" type="email" name="email" placeholder="nome@gmail.com" required maxlength="40">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Telefone Celular</label>
                                        <input class="ticket1" type="text" name="tel" id="telefone" placeholder="(00) 00000-0000" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label>Endereço</label>
                                        <input class="ticket1" type="text" name="endereco" placeholder="Rua, bairro, quadra" required maxlength="50">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>CEP</label>
                                        <input class="ticket1" type="text" name="cep" id="cep" placeholder="00000-000" required>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Forma de Pagamento:</label>
                                        <select class="ticket" name="pagamento" required>
                                            <option selected disabled value="">Selecione o método de pagamento</option>
                                            <option value="Boleto">Boleto à Vista</option>
                                            <option value="Crédito">Cartão de Crédito</option>
                                            <option value="Débito">Cartão de Débito</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Total:</label>
                                        <input type="text" class="ticket1" name="valor_total" value="R$ <?php print $total ?>" readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark ticket-botao">Comprar</button>
                            </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>