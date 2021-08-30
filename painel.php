<div class="sidenav">
    <a class="navbar-brand" href="#"><i class="fab fa-tripadvisor fa-2x"></i></a>
    <a href="?page=passageiro-exibir">Passageiros</a>
    <a href="?page=cidade-exibir">Cidades</a>
    <a href="?page=principal">Sair</a>
</div>
<div class="main text-center">
    <h3>Painel Principal do Site</h3>
    <h4>No Botão <a href="?page=principal" style="color: blue !important">Passageiros</a>, terá a exibição de todos os dados cadastrados, que têm inicio no Formulario na pagina <a href="?page=principal" style="color: blue !important">principal</a> do Site</h4>
    <h4>No botão <a href="?page=principal" style="color: blue !important">Cidades</a>, exibe todas as cidades cadastradas, é utilizado duas tabelas, mas o cadastro,edição e exclusão sâo unificados para ambas as cidades (origem e destino) utilizem o mesmo ID.</h4>
</div>
<style>
    /* The sidebar menu */
    .sidenav {
        height: 100%;
        /* Full-height: remove this if you want "auto" height */
        width: 160px;
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