// stages Ajax
function stageAjax(){
    data = new FormData();
    $.ajax({
    type: "POST",
    url: "./templates/composant/_stages.html.twig",
    data: data,
    contentType: false,
    processData: false,
    success: function(response) {
       document.querySelector(".content").innerHTML = response;
    },
    error: function(xhr, status, error) {
    alert("Une erreur s'est produite lors de la requÃªte AJAX : " + xhr.responseText);
    }
    });  
}

// technologie Ajax
function stageAjax(){
    data = new FormData();
    $.ajax({
    type: "POST",
    url: "./templates/composant/technologie.html.twig",
    data: data,
    contentType: false,
    processData: false,
    success: function(response) {
       document.querySelector(".content").innerHTML = response;
    },
    error: function(xhr, status, error) {
    alert("Une erreur s'est produite lors de la requÃªte AJAX : " + xhr.responseText);
    }
    });  
}

// certification Ajax
function stageAjax(){
    data = new FormData();
    $.ajax({
    type: "POST",
    url: "./templates/composant/certification.html.twig",
    data: data,
    contentType: false,
    processData: false,
    success: function(response) {
       document.querySelector(".content").innerHTML = response;
    },
    error: function(xhr, status, error) {
    alert("Une erreur s'est produite lors de la requÃªte AJAX : " + xhr.responseText);
    }
    });  
}