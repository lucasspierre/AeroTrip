<?php
session_start();
switch ($_REQUEST["acao"]) {
	case 'cadastrar':
		$sql = "INSERT INTO cliente (
				nome,
				cpf,
				email,
				tel,
				cep,
				endereco,
				data_partida,
				data_chegada,
				quantidade_passagens,
				valor_total,
				pagamento,
				idorigem,
                iddestino
			)VALUES(
				'" . $_POST["nome"] . "',
				'" . $_POST["cpf"] . "',
				'" . $_POST["email"] . "',
				'" . $_POST["tel"] . "',
				'" . $_POST["cep"] . "',
				'" . $_POST["endereco"] . "',
				'" . $_SESSION["data_partida"] . "',
				'" . $_SESSION["data_chegada"] . "',
				" . $_SESSION["quantidade_passagens"] . ",
				'" . $_POST["valor_total"] . "',
				'" . $_POST["pagamento"] . "',
                " . $_SESSION["idorigem"] . ",
				" . $_SESSION["iddestino"] . "
			)";
		$res = $conn->query($sql) or die($conn->error);

		if ($res == true) {
			print "<script>location.href='?page=confirmar&transation=" . $_SESSION["iddestino"] .  $_SESSION["iddestino"] . $_SESSION["idorigem"] . "';</script>";
		} else {
			print "<div class='alert alert-danger'>Não foi possível finalizar a compra.</div>";
			print "<script>location.href='?page=principal';</script>";
		}
		break;

	case 'editar':
		$sql = "UPDATE cliente 
						SET nome = '" . $_POST["nome"] . "', 
						cpf = '" . $_POST["cpf"] . "',
						email = '" . $_POST["email"] . "', 
						tel = '" . $_POST["tel"] . "',
						cep = '" . $_POST["cep"] . "', 
						endereco = '" . $_POST["endereco"] . "', 
						data_partida = '" . $_POST["data_partida"] . "', 
						data_chegada = '" . $_POST["data_chegada"] . "', 
						quantidade_passagens = '" . $_POST["quantidade_passagens"] . "',
						valor_total = '" . $_POST["valor_total"] . "',
						pagamento = '" . $_POST["pagamento"] . "',
						idorigem = '" . $_POST["idorigem"] . "', 
						iddestino = '" . $_POST["iddestino"] . "'
						WHERE id_passageiro = " . $_POST["id_passageiro"];

		$res = $conn->query($sql) or die($conn->error);

		if ($res == true) {
			print "<script>alert('Editado com sucesso!');</script>";
			print "<script>location.href='?page=passageiro-exibir';</script>";
		} else {
			print "<div class='alert alert-danger'>Não foi possível editar.</div>";
		}
		break;
	case 'excluir':
		$sql = "DELETE FROM cliente WHERE id_passageiro = " . $_REQUEST["id_passageiro"];
		$res = $conn->query($sql) or die($conn->error);

		if ($res == true) {
			print "<script>alert('Excluiu com sucesso!');</script>";
			print "<script>location.href='?page=passageiro-exibir';</script>";
		} else {
			print "<div class='alert alert-danger'>Não foi possível excluir.</div>";
		}
		break;
}
