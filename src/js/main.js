// Main JS file

// Custom variables
let lastUsed;

// Change stylesheet
function changeMDBstyle(value) {
    $.ajax({
        url: '/src/php/cookies/setCookie.php',
        type: 'POST',
        data: {
            name: 'MDBstyle',
            value: value
        },
        success: function(result) {
            console.log('Jest ciasteczko!', result);
            setTimeout(location.reload(), 5000);
        }
    })
}

$(window).on('unload', e => {
    $.ajax({
        url: '/src/php/cookies/setCookie.php',
        type: 'POST',
        data: {
            name: 'lastUsedFunction',
            value: lastUsed
        },
        success: function(result) {
            console.log('Jest ciasteczko!', result);
            setTimeout(location.reload(), 5000);
        }
    })
});