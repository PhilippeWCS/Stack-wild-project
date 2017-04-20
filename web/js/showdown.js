$(document).ready(function () {
    var converter = new Showdown.converter();
    var ret = converter.makeHtml($('#test').text());
    document.getElementById('test').innerHTML=ret
})

