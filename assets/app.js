/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

// Import bootstrap JS
const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(() => {
    $('[data-toggle="popover"]').popover();
});

/* const collectionHolder = document.querySelector('#soft_skills_softskills');

let indexSoftSkills = collectionHolder.querySelectorAll('fieldset').length;
const addSoftSkill = () => {
    collectionHolder.innerHTML += collectionHolder.dataset.prototype.replace(/__name__/g,
    indexSoftSkills);
    indexSoftSkills++;
}

document.querySelector('#new-softskill').addEventListener('click', addSoftSkill); */
