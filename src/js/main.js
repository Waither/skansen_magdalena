// Main JS file

// DO NOT CHANGE TO NORMAL MODE
"use strict"

// Custom variables
let lastUsed;

// Get last used function by user
$(window).on('unload', e => {
    setCookie('lastUsedFunction', lastUsed);
});

// Change stylesheet
function changeMDBstyle(check) {
    var value = 'light';
    if (check) {
        value = 'dark';
    }
    setCookie('MDBstyle', value);
}

// Change language using i18n
import Translator from './i18n';

new Translator;

// Load index
function loadIndex() {
    loadNewSite("/src/php/index/index.php");
    lastUsed = "loadIndex1";
}
function loadIndex1() {}