// apparition pour les section
function appears(nom) {
    var docs = document.querySelectorAll(".content");
    docs.forEach((doc) => doc.classList.remove("actif"));
    if(nom == "study"){
        document.querySelector('#study').classList.add("actif");
    }
    else if(nom == "stage"){
        document.querySelector('#stage').classList.add("actif");
    }
    else if(nom = "technologie"){
        document.querySelector('#technologie').classList.add("actif");   
    }
    else if(nom = "certification"){
        document.querySelector('#certification').classList.add("actif");   
    }
}