$(document).ready(function () {
    var url = $('#resolu').data('url');
    var id = $('#resolu').data('id');

    $('#resolu').on('click', function () {
        resoluAjax(id, url)
    });

    function resoluAjax(id, url) {
        $.ajax({
            url: url,
            data: {
                'id': id
            },
            dataType: 'json',
            success: function (vote) {
                $('.resolu').remove();
                $('#resoluGlyph_'+id).removeClass('resoluGlyphNone');
                $('#resoluGlyph_'+id).addClass('resoluGlyph');
            }
        });
    }
})
