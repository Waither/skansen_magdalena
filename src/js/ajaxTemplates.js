// File with ajax function templates

// Set cookie
function setCookie(name, value) {
    $.ajax({
        url: '/src/php/cookies/setCookie.php',
        type: 'POST',
        data: {
            name: name,
            value: value
        },
        success: function(result) {
            setTimeout(location.reload(), 2000);
        }
    })
}
