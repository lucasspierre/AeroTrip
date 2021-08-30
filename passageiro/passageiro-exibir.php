<div class="sidenav titulo">
    <a class="navbar-brand" href="#"><i class="fab fa-tripadvisor fa-2x"></i></a>
    <a href="?page=painel">Voltar</a>
    <a href="?page=principal">Sair</a>
</div>
<div class="main texto text-center">
    <?php
    $sql = "SELECT * FROM cliente AS c
			INNER JOIN origem AS o
            ON c.idorigem = o.id_origem
            INNER JOIN destinos AS d
            On c.iddestino = d.id_destino";
    $res = $conn->query($sql) or die($conn->error);
    $qtd = $res->num_rows;
    if ($qtd > 0) {
        print '<div class="shadow-lg mb-3 rounded">
                <div class="card-body text-center"style="background-color: #f2f2f2;">
                <h5><i class="fas fa-clipboard"></i>
                  Compras de Passageiros Cadastrados no Sistema<h5>
                </div>
              </div>';
        print '<p><i class="fas fa-search"></i> Encontrado <b>' . $qtd . '</b> resultado(s)</p> ';

        print '<div class="row row-cols-1 row-cols-md-3">';

        while ($row = $res->fetch_object()) {
            print "<a style='color: black !important; text-decoration: none;' href='?page=passageiro-perfil&id_passageiro=" . $row->id_passageiro . "'>";
            print '
            <div class="col">
            <div class="card zoom shadow-lg mb-3 rounded">
              <div class="card-body border border-primary">
              <h5><i class="fas fa-id-card-alt"></i> ID do Passageiro: ' . $row->id_passageiro . '</h5>
              <h5><i class="fas fa-user-check"></i> Passageiro: '  . $row->nome . '</h5>
          </div>
          </div>
          </div>
          </a>';
        }
    } else {
        print "<div class='alert alert-danger'>Nenhum resultado foi encontrado</div>";
    }
    print '</div>'
    ?>
</div>
<style>
    .texto {
        font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        font-size: 18px;
    }

    .titulo {
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