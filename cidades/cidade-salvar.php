<?php
session_start();
switch ($_REQUEST["acao"]) {
    case 'cadastrar':

        ///CADASTRAR CIDADE DESTINO
        $sql_destino = "INSERT INTO destinos (
            cidade_destino,
            preco
			)VALUES(
				'" . $_POST["cidade"] . "',
				'" . $_POST["preco"] . "'
			)";
        $res_destino = $conn->query($sql_destino) or die($conn->error);

        ///CADASTRAR CIDADE ORIGEM
        $sql_origem = "INSERT INTO origem (
            cidade_origem
			)VALUES(
				'" . $_POST["cidade"] . "'
			)";
        $res_origem = $conn->query($sql_origem) or die($conn->error);

        if ($res_destino == true) {
            print "<script>alert('Foi cadastrado com sucesso!');</script>";
            print "<script>location.href='?page=cidade-exibir';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
        }
        break;

    case 'editar':

        ///EDITAR CIDADE DESTINO
        $sql_destino = "UPDATE destinos
						SET cidade_destino = '" . $_POST["cidade"] . "', 
						preco = '" . $_POST["preco"] . "'
						WHERE id_destino = " . $_POST["id"];

        $res_destino = $conn->query($sql_destino) or die($conn->error);

        ///EDITAR CIDADE ORIGEM
        $sql_origem = "UPDATE origem
        SET cidade_origem = '" . $_POST["cidade"] . "'
        WHERE id_origem = " . $_POST["id"];
        $res_origem = $conn->query($sql_origem) or die($conn->error);

        if ($res_destino == true) {
            print "<script>alert('Editado com sucesso!');</script>";
            print "<script>location.href='?page=cidade-exibir';</script>";
        } else {
            print "<div class='alert alert-danger'>Não foi possível editar.</div>";
        }

        break;

    case 'excluir':

        ///EXCLUIR CIDADE DESTINO
        $sql_destino = "DELETE FROM destinos WHERE id_destino = " . $_REQUEST["id"];
        $res_destino = $conn->query($sql_destino) or die($conn->error);


        ///EXCLUIR CIDADE ORIGEM
        $sql_origem = "DELETE FROM origem WHERE id_origem = " . $_REQUEST["id"];
        $res_origem = $conn->query($sql_origem) or die($conn->error);

        if ($res_destino == true) {
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=cidade-exibir';</script>";
        } else {
            print "<div class='alert alert-danger'>Não foi possível excluir.</div>";
        }

        break;
}
