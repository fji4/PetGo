
window.onload = function() {
    console.log("enter");
    var manycards = document.getElementById('manypets');
    for(let i = 0; i < 12; i++) {
        manycards.appendChild(newcard("https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Gatto_europeo4.jpg/250px-Gatto_europeo4.jpg", "Cat"));
    }
}



function newcard(image, species){
    let outerCard = document.createElement("div");
    outerCard.className = "card";
    let img=document.createElement("img");
    img.className="card-img-top";
    img.src=image;
    img.alt="Fail to load the image.";
    let cardBody = document.createElement("div");
    cardBody.className = "card-body";
    let cardTitle = document.createElement("h5");
    cardTitle.className = "card-title";
    let node = document.createTextNode(species);
    cardTitle.appendChild(node);

    let button=document.createElement("a");
    button.href="#";
    button.className="btn btn-primary";
    let button_node = document.createTextNode("View");
    button.appendChild(button_node);
    cardBody.appendChild(cardTitle);
    cardBody.appendChild(button);
    outerCard.appendChild(img);
    outerCard.appendChild(cardBody);

    return outerCard;
    
}

