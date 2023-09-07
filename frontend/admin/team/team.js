import API from "../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);

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
const imageInput = document.querySelector('#image_input'); // Query all elements with the ID "image_file"
imageInput.addEventListener('change', function () {
    const selectedImage = imageInput.files[0];
    const imagePreview = document.querySelector("#image-membre");
    if (selectedImage) {
        imagePreview.src = URL.createObjectURL(selectedImage);
    }
});

function getAllMembres() {
    api.get('getMembres')
        .then(response => {
            const membres = response.data
            console.log(membres);
            const membres_cards = document.querySelector("#membres-cards");
            console.log(membres_cards)
            membres.map(membre => {
                const membre_card = `
                <div id="membre-${membre.id}" data-id-membre="${membre.id}" class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4"></div>
                        <div class="flex flex-col items-center pb-10">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="../../../backend/uploads/img/team/${membre.image}" alt="Bonnie image" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">${membre.last_name} ${membre.first_name}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">${membre.job}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">${membre.email}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">${membre.phone}</span>
                        </div>

                    <!-- Modal toggle -->
                    <div class="flex justify-center items-center m-5">
                        <a href="http://localhost/ActNews/frontend/admin/team/teamUpdate.php?id=${membre.id}" id="updateTeamButton" data-modal-toggle="teamModal" data-id-membre="${membre.id}" class=" updateTeamButton block text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-1 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                            Update User
                        </a>

                        <button type="button" data-id-membre="${membre.id}" class="delete-button text-white inline-flex items-center hover:text-white bg-red-600 border border-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-1 text-center dark:border-red-500 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Delete
                        </button>
                    </div>
                </div>
                `;
                membres_cards.innerHTML += membre_card;
            });
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', handleDeleteButtonClick);
            });
        })
}
function handleDeleteButtonClick(event) {
    const idToDelete = event.target.getAttribute('data-id-membre');
    if (idToDelete) {
        // Call a function to perform the delete operation using the 'idToDelete'
        deleteMembre(idToDelete);
        console.log(idToDelete);
    }
}
function deleteMembre(membreId) {
    const data = {
        id: membreId
    }
    api.post('deleteMembre', data)
        .then(response => {
            console.log(response);
            window.location.reload();
        })
}
getAllMembres();
const form_create_membre = document.querySelector('#form-create-membre');
form_create_membre.addEventListener('submit', (event)=> {
    event.preventDefault();
    const formData = new FormData(form_create_membre);
    const imageInput = document.getElementById('image_input');
    const image = imageInput.files[0];

    // Append form fields to the FormData object
    formData.append('title', formData.get('first_name')); // Assuming 'first_name' is the input field name for the title
    formData.append('description', formData.get('description'));
    formData.append('id_section', formData.get('section'));
    if (image) {
        formData.append('image', image);
    }
    api.postFormData('createMembre', formData)
    .then(response => {
        console.log(response);
        window.location.reload();
    })
    // console.log('Form Data Entries:');
    // for (const entry of formData.entries()) {
    //     console.log(entry[0], entry[1]);
    // }
});

