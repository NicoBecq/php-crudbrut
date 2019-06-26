$(document).ready(function () {
    $(".delete-button").click(function(){
        var answer = confirm('Etes vous sûr de vouloir supprimer ce contact?');
        if (!answer)
        {
            event.preventDefault();
        }
    });

});