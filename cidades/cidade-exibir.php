<div class="sidenav titulo">
    <a class="navbar-brand" href="#"><i class="fab fa-tripadvisor fa-2x"></i></a>
    <a href="?page=cidade-cadastrar">Cadastrar</a>
    <a href="?page=painel">Voltar</a>
    <a href="?page=principal">Sair</a>
</div>
<div class="main texto">
    <?php $sql = "SELECT * FROM destinos";
    $res = $conn->query($sql) or die($conn->error);
    $qtd = $res->num_rows;


    if ($qtd > 0) {
        print '<div class="shadow-lg mb-3 rounded">
    <div class="card-body text-center"style="background-color: #f2f2f2;"><h5><i class="fas fa-clipboard"></i>
      Cidades Registradas no Sistema<h5>
    </div>
  </div>';

        print '<p><i class="fas fa-search"></i> Encontrado <b>' . $qtd . '</b> resultado(s)</p> ';

        print '<div class="row row-cols-1 row-cols-md-4">';

        while ($row = $res->fetch_object()) {
            print '<div class="card text-center" style="width: 18rem;">
        <div class="card-header">Cidade-ID Nº ' . $row->id_destino . '</div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">Nome: ' . $row->cidade_destino . '</li>
        <li class="list-group-item">Preço da Passagem: R$ ' . $row->preco . '</li>
        <li class="list-group-item">';
            print "                  
        <a class='btn btn-warning btn-sm' onclick=\"location.href='?page=cidade-editar&id=" . $row->id_destino . "';\"><i class='far fa-edit'></i> Editar</a>
        <a class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=cidade-salvar&acao=excluir&id=" . $row->id_destino . "';}else{false;}\"><i class='fas fa-trash-alt'></i> Apagar</a>
        </li>
        </ul>
        </div>";
        }
    } else {
        print "<div class='alert alert-danger'>Nenhum resultado foi encontrado</div>";
    }
    print "</div>"
    ?>

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