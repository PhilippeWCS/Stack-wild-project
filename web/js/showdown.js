$(document).ready(function () {
    var converter = new Showdown.converter();
    var contenu = $('#contentQuest').text().trim();
    var ret = converter.makeHtml(contenu);
    document.getElementById('contentQuest').innerHTML = ret;
})