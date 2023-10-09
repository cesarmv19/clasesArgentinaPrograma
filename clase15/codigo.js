
$('#boton-consultar').click(function(){
    var usuario = $('#input-usuario').val();
    var url = 'https://api.github.com/users/' + usuario + '/repos';
    $.get(url, function(respuesta){
        var repositorios = respuesta.map(function(repo){
            return '<li>' + repo.name + '</li>';
        }).join('');
        $('#lista-repos').html(repositorios);
    });
});


$('#mult').click(function(){
    var numer1 = $('#num1').val();
    var numer2 = $('#num2').val();
    var result = numer1 * numer2;
    $('#resul').addClass('resul');
    $('#resul').html(result);
    
})

$('#mult').mouseover(function(){
    $('#mult').addClass('resul');
})
$('#mult').mouseout(function(){
    $('#mult').removeClass('resul');
})