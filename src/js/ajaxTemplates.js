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
            setTimeout(location.reload(), 1000);
        }
    })
}

// Load new site
function loadNewSite(url) {
    $("#main").load(url, function(responseTxt, statusTxt, xhr) {
        if(statusTxt == "error") {
            alert("Error: " + xhr.status + ": " + xhr.statusText);
            return;
        }

        document.querySelectorAll(".carousel").forEach((element) => {
            const instance = new mdb.Carousel(element);
        })
    });
}