<div class="sidenav titulo">
    <a class="navbar-brand" href="#"><i class="fab fa-tripadvisor fa-2x"></i></a>
    <a href="?page=passageiro-exibir">Voltar</a>
    <a href="?page=principal">Sair</a>
</div>
<div class="main text-center texto">
    <?php
    $sql = "SELECT * FROM cliente AS c
			INNER JOIN origem AS o
            ON c.idorigem = o.id_origem
            INNER JOIN destinos AS d
            On c.iddestino = d.id_destino WHERE id_passageiro=" . $_GET["id_passageiro"];
    $res = $conn->query($sql) or die($conn->error);
    $row = $res->fetch_object();

    print '
    <div class="row justify-content-center">
    <div class="col-3">
    <div class="card shadow-lg rounded">
      <div class="card-body border border-primary texto">
        <h5 class="card-title"><i class="fas fa-user-alt"></i> Passageiro: ' . $row->nome . '<br><i class="fas fa-id-card-alt"></i> ID Passageiro: ' . $row->id_passageiro . '</h5>
        <p class="card-text">
          <b><i class="fas fa-id-card"></i> CPF : </b>' . $row->cpf . '<br>
          <b><i class="fas fa-envelope-open-text"></i> E-mail : </b>' . $row->email . '<br>
          <b><i class="fas fa-phone-alt"></i> Telefone Celular : </b>' . $row->tel . '<br>
          <b><i class="fas fa-map-marker-alt"></i> CEP : </b>' . $row->cep . '<br>
          <b><i class="fas fa-map-marked-alt"></i> Endereço : </b>' . $row->endereco . '<br>
          <b><i class="far fa-calendar-alt"></i> Data de Partida : </b>' . $row->data_partida . '<br>
          <b><i class="far fa-calendar-alt"></i> Data de Chegada : </b>' . $row->data_chegada . '<br>
          <b><i class="fas fa-suitcase-rolling"></i> Número de Passagens : </b>' . $row->quantidade_passagens . '<br>
          <b><i class="fas fa-dollar-sign"></i> Valor Total : </b>' . $row->valor_total . '<br>
          <b><i class="fas fa-hand-holding-usd"></i> Pagamento : </b>' . $row->pagamento . '<br>
          <b><i class="fas fa-plane-departure"></i> Origem : </b>' . $row->cidade_origem . '<br>
          <b><i class="fas fa-plane-arrival"></i> Destino: </b>' . $row->cidade_destino . '</p>';
    print "
          <a class='btn btn-warning btn-sm' onclick=\"location.href='?page=passageiro-editar&id_passageiro=" . $row->id_passageiro . "';\"><i class='far fa-edit'></i> Editar</a>
          <a class='btn btn-danger btn-sm' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=passageiro-salvar&acao=excluir&id_passageiro=" . $row->id_passageiro . "';}else{false;}\"><i class='fas fa-trash-alt'></i> Apagar</a>
  </div>
  </div>
  </div>";
    ?>
</div>
<style>
    /* The sidebar menu */
    .titulo {
        font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    }

    .texto {
        font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
        font-size: 18px;
    }

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
        margin-left: 160px;
        /* Same as the width of the sidebar */
        padding: 0px 10px;
        padding-top: 100px;
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