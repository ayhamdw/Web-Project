
function handleLikeIncremntal(elementId) {
    var likeElement = document.getElementById(elementId);
    var likeCounter = parseInt(likeElement.innerText);
    likeCounter++;
    likeElement.innerText = likeCounter;
    console.log(likeCounter);
    return likeCounter;
}
