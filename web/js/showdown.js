$(document).ready(function () {
    var converter = new Showdown.converter();
    var contents = document.getElementsByClassName('markdown');

    for (content of contents){
        var contentMarkdown = converter.makeHtml(content.innerHTML);
        content.innerHTML = contentMarkdown;
        console.log(content);
    }
    //var contents = $('#').text().trim();
    console.log(test);
    //var ret = converter.makeHtml(contents);
    //document.getElementById('contenu').innerHTML = ret;
})