// Variables
var randcol = '#cccccc7c';
var l = 'l';




// Functions
function effect(element, mode = 'default') {
    if (mode == 'default') {
        return 'Does absolutely nothing!';
    } else if (mode == 'hue') {
        randcol = '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0') + '7c';
        element.style.backgroundColor = randcol;
        console.log(`${mode}: ${randcol}`);
    } else {
        return 'Also does nothing.';
    }
}
function set_dsi(dsi = null, tab = 0) {
    l = document.getElementById(dsi);
    if (tab == 0) l.src = '../local/index.php';
    if (tab == 1) l.src = '../local/files.php';
    if (tab == 2) l.src = '../local/editor.php';
    if (tab == 3) l.src = '../local/input.php';
    if (tab == 4) l.src = '../local/output.php';
    if (tab == 5) l.src = '../local/execute.php';
    if (tab == 6) l.src = '../local/settings.php';
    if (tab == 7) l.src = '../local/other.php';
    console.log(`DSI: ${l.src}\n\nTab: ${tab}`);
}
// Other