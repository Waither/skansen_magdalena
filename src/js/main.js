// Main JS file

// DO NOT CHANGE TO NORMAL MODE
"use strict"

// Custom variables
let lastUsed;

// Change stylesheet
function changeMDBstyle(check) {
    var value = 'light';
    if (check) {
        value = 'dark';
    }
    setCookie('MDBstyle', value);
}

// Get last used function by user
$(window).on('unload', e => {
    setCookie('lastUsedFunction', lastUsed);
});