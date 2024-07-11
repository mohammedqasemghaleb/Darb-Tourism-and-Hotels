///show and hide emagrency requset
function showHide() {
    let showHideElement = document.getElementById('emagrancyRequste');
    if (showHideElement.style.display === 'none') {
        showHideElement.style.display = 'flex';
    }
    else {
        showHideElement.style.display = 'none';
    }
}
function showHideDonate() {
    let showHideElement = document.getElementById('donateBlood');
    if (showHideElement.style.display === 'none') {
        showHideElement.style.display = 'block';
    }
    else {
        showHideElement.style.display = 'none';
    }
}