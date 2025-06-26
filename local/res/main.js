// Variables
var randcol = '#cccccc7c'


// Functions
function effect(element, mode = 'default') {
    if (mode == 'default') {
        return 'Does absolutely nothing!';
    } else if (mode == 'hue') {
        randcol = '#' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0') + '7c';
        element.style.backgroundColor = randcol;
        console.log(mode + ' ' + randcol);
    } else {
        return 'Also does nothing.';
    }
}