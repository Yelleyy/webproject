function nav() {
    var x = document.getElementById("nav");
    if (x.className === "links") {
        x.className += " responsive";
    } else {
        x.className = "links";
    }
}