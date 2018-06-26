function busca(cat){

    if(!(window.location.pathname === '/trabalho-web2/index.php')){
        window.location.replace('index.php?pesquisa='+cat);
        return;
    }

    $('#container-produtos').load('produtos.php', {pesquisa: cat, request:true});
}