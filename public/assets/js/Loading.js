var loading = document.getElementById('loading');
var contents = document.getElementById('contents');

window.addEventListener('load', function () {
    // setTimeout(function () {
    loading.classList.add('d-none');
    loading.parentNode.classList.replace('vh-100', 'd-none');
    contents.classList.remove('d-none');
    // }, 500);
});