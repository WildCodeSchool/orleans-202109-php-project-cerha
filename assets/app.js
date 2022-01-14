/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import a2lixLib from '@a2lix/symfony-collection/src/a2lix_sf_collection';
// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// Import boostrap icon
import 'bootstrap-icons/font/bootstrap-icons.css';

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

a2lixLib.sfCollection.init({
    collectionsSelector: 'form #soft_skills div[data-prototype]',
    manageRemoveEntry: true,
    lang: {
        add: 'Ajouter une compétence',
        remove: '',
    },
});

a2lixLib.sfCollection.init({
    collectionsSelector: 'form #candidate_languages div[data-prototype]',
    manageRemoveEntry: true,
    lang: {
        add: 'Ajouter une langue',
        remove: '',
    },
});

a2lixLib.sfCollection.init({
    collectionsSelector: 'form #candidate_formations div[data-prototype]',
    manageRemoveEntry: true,
    lang: {
        add: 'Ajouter une formation',
        remove: '',
    },
});

a2lixLib.sfCollection.init({
    collectionsSelector: 'form #candidate_experience div[data-prototype]',
    manageRemoveEntry: true,
    lang: {
        add: 'Ajouter une éxperience',
        remove: '',
    },
});

a2lixLib.sfCollection.init({
    collectionsSelector: 'form #candidate_skills div[data-prototype]',
    manageRemoveEntry: true,
    lang: {
        add: 'Ajouter une compétence',
        remove: '',
    },
});

a2lixLib.sfCollection.init({
    collectionsSelector: 'form #hobbies div[data-prototype]',
    manageRemoveEntry: true,
    lang: {
        add: 'Ajouter un centre d\' intérêt',
        remove: '',
    },
});
