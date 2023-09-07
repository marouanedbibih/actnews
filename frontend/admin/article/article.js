import API from "../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);
/**
 * Function get all article from database and display in deshboard
 */
function displayArticle() {
    api.get('getArticle')
        .then(response => {
            console.log(response);
            const datas = response.data;
            const articles = document.querySelector('#articles');
            datas.map(data => {
                const short_description = data.description.substr(0, 150);
                const article_card = `
                <div data-id-article="${data.id}" data-id-section="${data.id_section}" class="w-3/4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="http://localhost/actNews/frontend/client/article.php?id=${data.id}">
                    <img class="rounded-t-lg w-full" src="../../../backend/uploads/img/article/${data.image}" alt="" />
                </a>
                <div class="p-5">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${data.section_title}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${data.date_published}</p>
                    <a href=""http://localhost/actNews/frontend/client/article.php?id=${data.id}"">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${data.title}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${short_description}</p>
                    <a href="http://localhost/actNews/frontend/admin/article/articleUpdate.php?id=${data.id}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update
                    </a>
                    <button data-id-article="${data.id}" class=" delete-button inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Delete
                    </button>
                </div>
            </div>
                `;
                articles.innerHTML += article_card;
            });
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', handleDeleteButtonClick);
            });
        })
}
displayArticle();

function handleDeleteButtonClick(event) {
    const idToDelete = event.target.getAttribute('data-id-article');
    if (idToDelete) {
        // Call a function to perform the delete operation using the 'idToDelete'
        deleteArticle(idToDelete);
        console.log(idToDelete);
    }
}

function deleteArticle(articleId) {
    const data = {
        id_article: articleId
    }
    api.post('deleteArticle', data)
        .then(response => {
            console.log(response);
            window.location.reload();
        })
}
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

const form_create_article = document.querySelector('#form-create-article');
form_create_article.addEventListener('submit', async function (event) {
    event.preventDefault();
    const formData = new FormData(form_create_article);
    const imageInput = document.getElementById('image_input');
    const image = imageInput.files[0];
    formData.append('title', formData.get('title'))
    formData.append('description', formData.get('description'))
    formData.append('id_section', formData.get('section'))
    formData.append('image', image)
    api.postFormData('createArticle', formData)
        .then(response => {
            console.log(response);
            window.location.reload();
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