<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/fontawesome/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="images/icone.png" type="image/png" style="color: white !important;">
  <title>AeroTrip.com</title>
</head>
<!--PAGINAS DE CONTEUDO-->
<?php
include("database/conexao.php");
switch (@$_REQUEST["page"]) {
    ///PASSAGEIROS
  case 'passageiro-cadastrar':
    include("passageiro/passageiro-cadastrar.php");
    break;
  case 'passageiro-salvar':
    include("passageiro/passageiro-salvar.php");
    break;
  case 'passageiro-exibir':
    include("passageiro/passageiro-exibir.php");
    break;
  case 'passageiro-editar':
    include("passageiro/passageiro-editar.php");
    break;
  case 'passageiro-perfil':
    include("passageiro/passageiro-perfil.php");
    break;
  case 'confirmar':
    include("passageiro/confirmar.php");
    break;
    ///CIDADES
  case 'cidade-cadastrar':
    include("cidades/cidade-cadastrar.php");
    break;
  case 'cidade-salvar':
    include("cidades/cidade-salvar.php");
    break;
  case 'cidade-exibir':
    include("cidades/cidade-exibir.php");
    break;
  case 'cidade-editar':
    include("cidades/cidade-editar.php");
    break;
    ///PAINEL PRINCIPAL
  case 'painel':
    include("painel.php");
    break;
  default:
    include("principal.php");
}
?>
<script src="js/javascript.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
  $("#data").mask("00/00/0000");
  $("#datavolta").mask("00/00/0000");
  $("#telefone").mask("(00) 00000-0000");
  $("#cpf").mask("000.000.000-00");
  $("#cep").mask("00000-000");
  $("#valor").mask("000.00");
</script>

</html>