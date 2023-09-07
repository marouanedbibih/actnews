import API from "../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);
// Get the current URL
var currentURL = window.location.href;
// Create a URLSearchParams object to parse the URL
var urlParams = new URLSearchParams(new URL(currentURL).search);
// Get the value of the 'id' parameter
var id_new = urlParams.get('id');
function selectSection() {
    fetch('../../client/assets/json/sections.json')
        .then(response => response.json())
        .then(sections => {
            // console.log(sections);
            const section_select = document.querySelector("#section");
            // console.log(section_select);
            sections.map(section => {
                const option = `<option value="${section.id_section}">${section.title}</option>`;
                section_select.innerHTML += option;

            })
            // console.log(section_select)
        })
}
selectSection();


const createNewForm = document.querySelector('#create-new-form');
function setNewInfos() {

    api.getById('getNewById', id_new)
        .then(response => {
            console.log(response);
            if (response.data) {
                const data = response.data[0];
                createNewForm.querySelector('textarea[name="title"]').value = data.title;
                createNewForm.querySelector('select[name="section"]').value = data.id_section;
            }

        })
}
setNewInfos();
createNewForm.addEventListener('submit', (event) => {
    event.preventDefault();
    updateNew();
})
function updateNew() {
    const formData = new FormData(createNewForm);
    const data = {
        id: id_new,
        title: formData.get('title'),
        id_section: formData.get('section')
    }
    console.log(data);
    api.post('updateNew', data)
        .then(response => {
            console.log(response);
            if (response.message) {
                // window.location.reload();
                window.location.href = 'http://localhost/ActNews/frontend/admin/new/new.php';
            }
        })
}