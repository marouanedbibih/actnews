import API from "../../../api/js/api.js";

const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);
// Get the current URL
var currentURL = window.location.href;

// Create a URLSearchParams object to parse the URL
var urlParams = new URLSearchParams(new URL(currentURL).search);

// Get the value of the 'id' parameter
var id_membre = parseInt(urlParams.get('id'));
console.log(id_membre); // This will log the 'id' value (e.g., 8) to the console

function selectMembre() {
    fetch('../../client/assets/json/sections.json')
        .then(response => response.json())
        .then(sections => {
            console.log(sections);
            const section_select = document.querySelector("#section");
            console.log(section_select);
            sections.map(section => {
                const option = `<option value="${section.id_section}">${section.title}</option>`;
                section_select.innerHTML += option;

            })
            console.log(section_select)
        })
}
selectMembre();
function setMembreInfo(id_membre) {
    api.getById('getMembreById',id_membre)
        .then(response => {
            console.log(response)
            const datas = response.data;
            datas.map(data=>{
                const form_update_membre = document.querySelector('#form-update-membre');
                form_update_membre.querySelector("#last_name").value = data.last_name;
                form_update_membre.querySelector("#first_name").value = data.first_name;
                form_update_membre.querySelector("#job").value = data.job;
                form_update_membre.querySelector("#email").value = data.email;
                form_update_membre.querySelector("#phone").value = data.phone;
                form_update_membre.querySelector("#section").value = data.section_id
                form_update_membre.querySelector("#image-membre").src = `../../../backend/uploads/img/team/${data.image}`

            })
        })
}
setMembreInfo(id_membre);

const form_update_membre = document.querySelector('#form-update-membre');
form_update_membre.addEventListener('submit',function(event){
    event.preventDefault();
    const formData =new FormData(form_update_membre);
    const imageInput = document.getElementById('image_input');
    const image = imageInput.files[0];
    formData.append('id',id_membre)
    formData.append('last_name',formData.get('last_name'));
    formData.append('first_name',formData.get('first_name'));
    formData.append('email',formData.get('email'));
    formData.append('phone',formData.get('phone'));
    formData.append('job',formData.get('job'));
    formData.append('id_section',formData.get('section'));
    formData.append('image',image);

    console.log(formData)
    api.postFormData('updateMembre',formData)
        .then(response=>{
            console.log(response);
            window.location.href ='http://localhost/ActNews/frontend/admin/team/team.php';
        })

})



const imageInputAdd = document.querySelector('#image_input'); // Query all elements with the ID "image_file"
imageInputAdd.addEventListener('change', function () {
    const selectedImage = imageInputAdd.files[0];
    const imagePreview = document.querySelector("#image-membre");
    if (selectedImage) {
        imagePreview.src = URL.createObjectURL(selectedImage);
    }
});