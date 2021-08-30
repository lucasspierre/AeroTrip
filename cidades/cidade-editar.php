<?php
$sql = "SELECT * FROM destinos 
			WHERE id_destino = " . $_GET["id"];

$res = $conn->query($sql) or die($conn->error);

$row = $res->fetch_object();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<div class="sidenav titulo">
    <a class="navbar-brand" href="#"><i class="fab fa-tripadvisor fa-2x"></i></a>
    <a href="javascript:history.go(-1)">Voltar</a>
    <a href="?page=principal">Sair</a>
</div>
<div class="main texto">
    <form action="?page=cidade-salvar" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?php print $row->id_destino; ?>">
        <div class="form-group">
            <label>Nome da Cidade</label>
            <input type="text" name="cidade" class="form-control formulario-cadastro" value="<?php print $row->cidade_destino ?>" required placeholder="cidade ou Estado">
        </div>
        <div class="form-group">
            <label>Valor do Destino</label>
            <input type="text" name="preco" id="valor" class="form-control formulario-cadastro" value="<?php print $row->preco ?>" required placeholder="000.00">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
</div>
<style>
    .titulo {
        font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    }

    .texto {
        font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    }

    /* The sidebar menu */
    .sidenav {
        height: 100%;
        /* Full-height: remove this if you want "auto" height */
        width: 180px;
        /* Set the width of the sidebar */
        position: fixed;
        /* Fixed Sidebar (stay in place on scroll) */
        z-index: 1;
        /* Stay on top */
        top: 0;
        /* Stay at the top */
        left: 0;
        background-color: #4278f5;
        /* Black */
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 20px;
    }

    /* The navigation menu links */
    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: white;
        display: block;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
        color: #91b1fa;
    }

    /* Style page content */
    .main {
        margin-left: 180px;
        /* Same as the width of the sidebar */
        padding: 0px 10px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }
</style>