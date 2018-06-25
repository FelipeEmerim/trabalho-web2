function busca() {
    let query = $('#txtBusca').val();
    if(!(window.location.pathname === '/trabalho-web2/index.php')){
        window.location.replace('index.php?pesquisa='+query);
        return;
    }

    $('#container-produtos').load('produtos.php', {pesquisa: query});

}

function categoria(cat){

    if(!(window.location.pathname === '/trabalho-web2/index.php')){
        window.location.replace('index.php?pesquisa='+cat);
        return;
    }

    $('#container-produtos').load('produtos.php', {pesquisa: cat});
}