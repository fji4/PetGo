
window.onload = function() {
    console.log("enter");
    var manycards = document.getElementById('manypets');
    for(let i = 0; i < n; i++) {
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
    button.href="../View/View.html";
    button.className="btn btn-primary";
    let button_node = document.createTextNode("View");
    button.appendChild(button_node);

    let button_edit=document.createElement("a");
    button_edit.href="../Post/post.html";
    button_edit.className="btn btn-primary";
    let button_node_edit = document.createTextNode("Edit");
    button_edit.appendChild(button_node_edit);

    let button_delete=document.createElement("a");
    button_delete.href="profile.html";
    button_delete.className="btn btn-primary";
    let button_node_delete = document.createTextNode("Delete");
    button_delete.appendChild(button_node_delete);



    cardBody.appendChild(cardTitle);
    cardBody.appendChild(button);
    cardBody.appendChild(button_edit);
    cardBody.appendChild(button_delete);
    outerCard.appendChild(img);
    outerCard.appendChild(cardBody);

    return outerCard;
    
}

