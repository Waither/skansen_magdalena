// Main JS file

// Get function name
function getFuncName() { 
    return getFuncName.caller.name 
}

// Change stylesheet
function changeMDBstyle(check) {
    var value = 'light';
    if (check) {
        value = 'dark';
    }
    setCookie('MDBstyle', value);
}

// Change language
function changeLanguage(lg) {
    setCookie('language', lg);
}

// Load index
function loadIndex() {
    loadNewSite("/src/php/site/index.php");
}

// Load oilHistory
function loadHistoryOil() {
    loadNewSite("/src/php/site/oilHistory.php");
}

// Load mineHistory
function loadHistoryMine() {
    loadNewSite("/src/php/site/mineHistory.php");
}

// Load openingHours
function loadOpeningHours() {
    loadNewSite("/src/php/site/openingHours.php");
}

// Load tickets
function loadTickets() {
    loadNewSite("/src/php/site/tickets.php");
}

// Load gallery
function loadGallery() {
    loadNewSite("/src/php/site/gallery.php");
}

// Load contact
function loadContact() {
    loadNewSite("/src/php/site/contact.php");
}