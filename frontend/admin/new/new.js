import API from "../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);
document.addEventListener('DOMContentLoaded', function () {
    getAllNews();
})
/**
 * Buttons and Forms
 */
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

// send new to database
const createNewForm = document.querySelector('#create-new-form');
createNewForm.addEventListener('submit', (event) => {
    event.preventDefault();
    sendNew();
})
function sendNew() {
    const formData = new FormData(createNewForm);
    const data = {
        title: formData.get('title'),
        id_section: formData.get('section')
    }
    console.log(data);
    api.post('createNew', data)
        .then(response => {
            console.log(response);
            if (response.message) {
                window.location.reload();
            }
        })
}
// get all news from database
function getAllNews() {
    api.get('getNew')
        .then(response => {
            console.log(response);
            const datas = response.data;
            const news_cards = document.querySelector('#news-cards');
            datas.map(data => {
                const newCard = `
                <div class="container" id="new-${data.id} data-section-id="${data.id_section}">
                    <div href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                      <div class="font-normal text-gray-700 dark:text-gray-400"><span class="date">${data.section_title}</span> <span class="mx-1"></span> <span>${data.date_created}</span></div>
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${data.title}</h5>
                      <!-- Modal toggle -->
                      <div class="flex justify-between m-5"> <!-- Use justify-between to create space between buttons -->
                        <a id="updateNewButton" href="http://localhost/ActNews/frontend/admin/new/newUpdate.php?id=${data.id}" data-id-new="${data.id}" data-modal-toggle="newsModal" class="block text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                          Update Article
                        </a>
                
                        <button type="button" data-id-new="${data.id}" class="delete-button text-white inline-flex items-center hover:text-white bg-red-600 border border-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                          <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                          </svg>
                          Delete
                        </button>
                      </div>
                    </div>
              </div>
                `;
                news_cards.innerHTML += newCard;
            });
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', handleDeleteButtonClick);
            });
        })
}


// Function to handle delete button click
function handleDeleteButtonClick(event) {
    const idToDelete = event.target.getAttribute('data-id-new');
    if (idToDelete) {
        // Call a function to perform the delete operation using the 'idToDelete'
        deleteNews(idToDelete);
        console.log(idToDelete);
    }
}
function deleteNews(newsId) {
    const data = {
        id: newsId
    }
    api.post('deleteNew', data)
        .then(response => {
            console.log(response);
            window.location.reload();
        })
}
getAllNews();