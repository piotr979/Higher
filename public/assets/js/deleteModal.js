let urlDelete = '';
const deleteButtons = document.querySelectorAll('.delete-buttons');
console.log(deleteButtons);
deleteButtons.forEach(button => {
    button.addEventListener("click", function (e) {
        console.log(button);
        urlDelete = '';
        const dataSet = e.target.parentNode.parentNode.dataset;
        urlDelete = dataSet.urldelete;
        console.log(urlDelete);
    });
});

const deleteModalButton = document.getElementById('delete-modal--button');
deleteModalButton.addEventListener('click', function () {
    goToPath(urlDelete);
})
function goToPath(urlPath) {
    console.log(urlPath);
    location.href = urlPath;
}