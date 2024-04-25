var count = 0;
document.getElementById("myButton").onclick = function() {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "https://www.meme-arsenal.com/memes/52cd1d4bde1c7e325e821a794d3578cb.jpg"
        document.getElementById("demo").appendChild(img);
    }
}
