import API from "../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);

// Get the current URL
var currentURL = window.location.href;
// Create a URLSearchParams object to parse the URL
var urlParams = new URLSearchParams(new URL(currentURL).search);
// Get the value of the 'id' parameter
var id_article = urlParams.get('id');

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
/**
 * Set information in form
 */
const form_update_article = document.querySelector('#form-update-article');
function setInfoInForm() {
    api.getById('getArticleById', id_article)
        .then(response => {
            console.log(response);
            const article = response.data[0];
            console.log(article);
            form_update_article.querySelector('#title').value = article.title;
            form_update_article.querySelector('#description').value = article.description;
            form_update_article.querySelector('#section').value = article.id_section;
            form_update_article.querySelector('#image-article').src = `../../../backend/uploads/img/article/${article.image}`;
        })
}
setInfoInForm();

form_update_article.addEventListener('submit', async function (event) {
    event.preventDefault();
    const formData = new FormData(form_update_article);
    const imageInput = document.getElementById('image_input');
    const image = imageInput.files[0];
    formData.append('id_article', id_article);
    formData.append('title', formData.get('title'))
    formData.append('description', formData.get('description'))
    formData.append('id_section', formData.get('section'))
    if (image) {
        formData.append('image', image)
    }
    console.log('Form Data Entries:');
    // for (const entry of formData.entries()) {
    //     console.log(entry[0], entry[1]);
    // }
    api.postFormData('updateArticle', formData)
        .then(response => {
            console.log(response);
            window.location.href = 'http://localhost/ActNews/frontend/admin/article/article.php';
        })

})
const imageInputAdd = document.querySelector('#image_input'); // Query all elements with the ID "image_file"
imageInputAdd.addEventListener('change', function () {
    const selectedImage = imageInputAdd.files[0];
    const imagePreview = document.querySelector("#image-article");
    if (selectedImage) {
        imagePreview.src = URL.createObjectURL(selectedImage);
    }
});