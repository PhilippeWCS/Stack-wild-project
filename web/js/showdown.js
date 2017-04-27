$(document).ready(function () {
    var converter = new Showdown.converter();
    var contents = document.getElementsByClassName('markdown');

    for (content of contents){
        var contentMarkdown = converter.makeHtml(content.innerHTML);
        content.innerHTML = contentMarkdown;
    }
})