import API from "../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php';
const api = new API(apiUrl);




document.addEventListener("DOMContentLoaded", function () {

    function createSectionCard(section) {
        const cardHtml = `
        <div class="bg-white shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4" id="${section.id_section}">
        <div class="header-car-section">
            <div class="md:flex md:items-center md:justify-between">
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">${section.section_title}</h1>
                <form action="">
                    <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                        <button type="button" data-modal-toggle="user-modal" data-id-section="${section.id_section}" class="add-responsable text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Add Responsable
                        </button>
                        <button type="button"  data-id-section="${section.id_section}" class="delete-section-btn text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Delete Section
                        </button>
                        <button type="button"  data-id-section="${section.id_section}" class="update-section-btn text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300- font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                            </svg>
                            Update Section
                        </button>
                    </div>
                </form>
            </div>
            <p class="text-lg text-gray-500 my-6">${section.section_description}</p>
        </div>
        <table class="table-fixed min-w-1/2 divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                        <label for="checkbox-all" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                    Name
                </th>
                <th scope="col" class="p-4">
                </th>
            </tr>
        </thead>
        ${createResponsiblesTable(section.responsibles, section.id_section)}
    </table>
    </div>
        `;

        return cardHtml;
    }
    function createResponsiblesTable(responsibles, id_section) {
        let tableHtml = `
        <tbody class="bg-white divide-y divide-gray-200" id="tbody-responsable">
        `
        responsibles.map(responsable => {
            tableHtml += `
            <tr class="hover:bg-gray-100">
            <td class="p-4 w-4">
                <div class="flex items-center">
                    <input id="checkbox-${responsable.user_id}" value="${responsable.user_id}" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                    <label for="checkbox-${responsable.user_id}" class="sr-only">checkbox</label>
                </div>
            </td>
            <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                <img class="h-10 w-10 rounded-full" src="../../../backend/uploads/img/profile/${responsable.user_image}" alt="">
                <div class="text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">${responsable.first_name} ${responsable.last_name}</div>
                    <div class="text-sm font-normal text-gray-500"><span>Email: </span>${responsable.email}</div>
                    <div class="text-sm font-normal text-gray-500"><span>Phone: </span>${responsable.phone}</div>
                </div>
            </td>
            <td class="p-4 whitespace-nowrap space-x-2">
                <button type="button" data-responsable-id="${responsable.user_id}" data-section-responsable-id="${id_section}" class="delete-responsable-section-btn text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    Delete From Section
                </button>
            </td>
        </tr>
            `;
        })
        tableHtml += '</table>';
        return tableHtml;

    }
    api.get('readSection')
        .then((sections) => {
            console.log("Sections", sections);
            const sectioModel = document.getElementById('section-model');
            sections.map(section => {
                const cardSection = createSectionCard(section);
                sectioModel.innerHTML += cardSection;
                /**
                 * Update Section system
                 */

                const updateSectionButtons = document.querySelectorAll(".update-section-btn");
                console.log(updateSectionButtons);
                updateSectionButtons.forEach(button => {
                    button.addEventListener("click", (event) => {
                        event.preventDefault();
                        const id_section = parseInt(event.currentTarget.getAttribute("data-id-section"));
                        setSectionInfosForUpdate(id_section);
                        isUpdateSectionModalOpen = true;
                        displayUpdateSectionModel(isUpdateSectionModalOpen);
                        const updateSectionForm = document.querySelector("#update-section-form");
                        updateSectionForm.addEventListener("submit", async function (event) {
                            event.preventDefault();
                            var formData = new FormData(updateSectionForm);
                            const sectionData = {
                                id_section: id_section,
                                title: formData.get('section_title'),
                                description: formData.get('section_description'),
                            }
                            console.log(sectionData);
                            api.post('updateSection', sectionData)
                                .then(response => {
                                    if (response.error) {
                                        console.log('Section Arror', response.error);
                                    } else {
                                        console.log(response);
                                        updateSectionForm.reset();
                                        window.location.reload();
                                    }
                                })
                        })
                    });
                });
            })
            api.get('userNotResponsable')
                .then((responsibles) => {
                    const responsableDontSection = document.getElementById('responsibles-dont-section');
                    console.log('Responsibles', responsibles);
                    responsibles.map(responsable => {
                        const responsableLigne = `
                            <tr class="hover:bg-gray-100 ">
                            <td class="p-4 w-4">
                            <div class="flex items-center">
                                <input id="checkbox-${responsable.id}" value="${responsable.id}" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded" name="responsibles[]">
                                <label for="checkbox-${responsable.id}" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                            <img class="h-10 w-10 rounded-full" src="../../../backend/uploads/img/profile/${responsable.image}" alt="">
                            <div class="text-sm font-normal text-gray-500">
                                <div class="text-base font-semibold text-gray-900">${responsable.first_name} ${responsable.last_name}</div>
                            </div>
                            </td>
                        </tr>`
                        responsableDontSection.innerHTML += responsableLigne;
                    })
                })

            /**
             * Ajouter Responsable to section
             */
            const addResponsableButtons = document.querySelectorAll(".add-responsable");
            console.log(addResponsableButtons);
            addResponsableButtons.forEach(button => {
                button.addEventListener('click', event => {
                    event.preventDefault();
                    const id_section = parseInt(event.currentTarget.getAttribute("data-id-section"));
                    console.log(id_section);

                    isResponsableSectionModalOpen = true;
                    displayResponsableSectionModel(isResponsableSectionModalOpen);

                })
                // api to get responsibles
                api.get('userNotResponsable')
                    .then((responsibles) => {
                        const responsableDontSection = document.getElementById('add-responsable to section');
                        console.log('Responsibles', responsibles);
                        responsibles.map(responsable => {
                            const responsableLigne = `
                                        <tr class="hover:bg-gray-100 ">
                                        <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-${responsable.id}" value="${responsable.id}" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded" name="responsibles[]">
                                            <label for="checkbox-${responsable.id}" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                        <img class="h-10 w-10 rounded-full" src="../../../backend/uploads/img/profile/${responsable.image}" alt="">
                                        <div class="text-sm font-normal text-gray-500">
                                            <div class="text-base font-semibold text-gray-900">${responsable.first_name} ${responsable.last_name}</div>
                                        </div>
                                        </td>
                                    </tr>`
                            responsableDontSection.innerHTML += responsableLigne;
                        })
                    })
            })

            /**
             * Add Section Modal
             */
            const btnOpenAddSection = document.querySelector("#btn-add-section");
            const btnCloseAddSection = document.querySelector("#close-add-section");
            var isAddSectionModalOpen = false;
            function displayAddSectionModel(isAddSectionModalOpen) {
                const addSectionModal = document.querySelector("#add-section-modal");
                if (isAddSectionModalOpen === false) {
                    addSectionModal.classList.remove('flex');
                    addSectionModal.classList.add('hidden');
                } else {
                    addSectionModal.classList.remove('hidden');
                    addSectionModal.classList.add('flex');
                }
                return isAddSectionModalOpen;
            }
            // Add event listener to the open button for Add Form
            btnOpenAddSection.addEventListener("click", function () {
                isAddSectionModalOpen = true;
                displayAddSectionModel(isAddSectionModalOpen);
            });
            // Add event listener to the close add user button 
            btnCloseAddSection.addEventListener("click", function () {
                isAddSectionModalOpen = false;
                displayAddSectionModel(isAddSectionModalOpen);
            });
            const deleteSectionButtons = document.querySelectorAll(".delete-section-btn");
            deleteSectionButtons.forEach(button => {
                button.addEventListener("click", (event) => {
                    const data = {
                        'id_section': parseInt(event.currentTarget.getAttribute("data-id-section"))
                    };
                    console.log(data);
                    if (confirm("Are you sure you want to delete this Section?")) {
                        api.delete('deleteSection', data)
                            .then(response => {
                                console.log('Server Message:', response.message);
                                window.location.reload();
                            })
                            .catch(response => {
                                console.log('Error Message', response.error);
                            })
                    }
                });
            });

            const deleteResponsableSectionButtons = document.querySelectorAll(".delete-responsable-section-btn");
            deleteResponsableSectionButtons.forEach(button => {
                button.addEventListener("click", (event) => {
                    event.preventDefault();
                    const data = {
                        'id_section': parseInt(event.currentTarget.getAttribute("data-section-responsable-id")),
                        'id_user': parseInt(event.currentTarget.getAttribute("data-responsable-id")),
                    };
                    console.log(data);
                    if (confirm("Are you sure you want to delete this Responsable from this Section?")) {
                        api.post('deleteResponsablefromSection', data)
                            .then(response => {
                                console.log('Server Message:', response.message);
                                window.location.reload();
                            })
                            .catch(response => {
                                console.log('Error Message', response.error);
                            })
                    }
                });
            });


        })
});


// Function send New section data
function sendNewSectionData() {
    const addSectionForm = document.getElementById("add-section-form");
    let formData = new FormData(addSectionForm);
    const checkedResponsibles = [];
    const checkboxes = document.querySelectorAll('input[name="responsibles[]"]:checked');
    checkboxes.forEach(checkbox => {
        checkedResponsibles.push(parseInt(checkbox.value));
    });
    const sectionData = {
        title: formData.get('section_title'),
        description: formData.get('section_description'),
        responsables: checkedResponsibles
    }
    console.log(sectionData);
    api.post('createSection', sectionData)
        .then(response => {
            if (response.error) {
                console.log('Section Arror', response.error);
            } else {
                console.log(response);
                addSectionForm.reset();
                window.location.reload();
            }
        })

}
const btnSaveAddSection = document.getElementById("btn-save-add-section");
btnSaveAddSection.addEventListener('click', function (event) {
    event.preventDefault();
    sendNewSectionData();
});


const deleteSectionButtons = document.querySelectorAll(".delete-section-btn");
deleteSectionButtons.forEach(button => {
    button.addEventListener("click", (event) => {
        const data = {
            'id_section': parseInt(event.currentTarget.getAttribute("data-id-section"))
        };
        console.log(data);
        if (confirm("Are you sure you want to delete this Section?")) {
            api.delete('deleteSection', data)
                .then(response => {
                    console.log('Server Message:', response.message);
                    window.location.reload();
                })
                .catch(response => {
                    console.log('Error Message', response.error);
                })
        }
    });
});




// const btnOpenUpdateSection = document.querySelector("#btn-update-section");
const btnCloseUpdateSection = document.querySelector("#close-update-section");
var isUpdateSectionModalOpen = false;
function displayUpdateSectionModel(isUpdateSectionModalOpen) {
    const updateSectionModal = document.querySelector("#update-section-modal");
    if (isUpdateSectionModalOpen === false) {
        updateSectionModal.classList.remove('flex');
        updateSectionModal.classList.add('hidden');
    } else {
        updateSectionModal.classList.remove('hidden');
        updateSectionModal.classList.add('flex');
    }
    return isUpdateSectionModalOpen;
}
// Add event listener to the open button for Add Form
// btnOpenUpdateSection.addEventListener("click", function () {
//     isUpdateSectionModalOpen = true;
//     displayUpdateSectionModel(isAddSectionModalOpen);
// });
// Add event listener to the close add user button 
btnCloseUpdateSection.addEventListener("click", function () {
    isUpdateSectionModalOpen = false;
    displayUpdateSectionModel(isUpdateSectionModalOpen);
});

function setSectionInfosForUpdate(id_section) {
    api.getById('readSectionById', id_section)
        .then((section) => {
            const updateSectionForm = document.getElementById('update-section-form');
            console.log(section)
            // Set the values in the form fields
            updateSectionForm.querySelector('#section_title').value = section[0].title;
            updateSectionForm.querySelector('#section_description').value = section[0].description;
        })
}

document.querySelector("#btn-update-section").addEventListener('sbmit', function (event) {
    event.preventDefault();
    updateSection(id_section);
});

/**
 * Add Responsable To Section Modal 
 */
const btnCloseResponsableSection = document.querySelector("#close-responsable-section");
var isResponsableSectionModalOpen = false;
function displayResponsableSectionModel(isResponsableSectionModalOpen) {
    const ResponsableSectionModal = document.querySelector("#add-responsable-to-section-modal");
    if (isResponsableSectionModalOpen === false) {
        ResponsableSectionModal.classList.remove('flex');
        ResponsableSectionModal.classList.add('hidden');
    } else {
        ResponsableSectionModal.classList.remove('hidden');
        ResponsableSectionModal.classList.add('flex');
    }
    return isResponsableSectionModalOpen;
}
btnCloseResponsableSection.addEventListener("click", function () {
    isResponsableSectionModalOpen = false;
    displayResponsableSectionModel(isResponsableSectionModalOpen);
});