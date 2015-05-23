$(document).ready(function(){

    $('.glyphicon-plus').on('click', function(e){

        var content = $('#form_first').html()+'<span class="glyphicon glyphicon-minus"></span>';
        var newp = $("<p>");
        newp.html(content);

        newp.children('.glyphicon-plus').remove();

        $('#form_first').before(newp);

        $('.glyphicon-minus').not('#form_first .glyphicon-minus').on('click', function(){
            $(this).parent('p').remove();
        });

        return false;
    });
});