function refresh_opener() {
    if (window.opener.document.form_ordenar) {
        var d = window.opener.document.form_ordenar;
        var a = d.length;
        var c = new Array();
        for (var b = 0; b < a; b++) {
            c[b] = d.elements[b].value;
        }
    }
    if (window.opener.document.form_buscador) {
        var d = window.opener.document.form_buscador;
        var a = d.length;
        var c = new Array();
        for (var b = 0; b < a; b++) {
            c[b] = d.elements[b].value;
        }
    }
    window.close();
}