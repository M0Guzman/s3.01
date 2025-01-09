import $ from 'jquery';
window.$ = $;
import select2 from 'select2';

select2(document.rootElement, $);
console.log(select2)

$(document).ready(function() {
    $('.advancedSelect').select2({});
});


console.log("test")