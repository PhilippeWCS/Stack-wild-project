$(document).ready(function () {
    var id;
    var type;
    var url = $('#questionShow').data('url');

    $('#voteButton').on('click', function () {
        id = $(this).data('id');
        type = 'question';
        voteAjax(id, url, type, $(this));
    });
    $('.voteButton').on('click', function () {
        id = $(this).data('id');
        type = 'reponse';
        voteAjax(id, url, type, $(this));
    })
});

function voteAjax(id, url, type, button) {
    $.ajax({
        url : url,
        data : {
            'id' : id,
            'type' : type
            },
        dataType : 'json',
        success : function (vote) {
            $('#vote_'+id).text(vote.nbVote);
            button.remove();
        }
    });
}