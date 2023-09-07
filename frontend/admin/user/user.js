
import API from "../../../api/js/api.js";

const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);
// Get the current URL
var currentURL = window.location.href;

// Create a URLSearchParams object to parse the URL
var urlParams = new URLSearchParams(new URL(currentURL).search);

// Get the value of the 'id' parameter
var id_membre = urlParams.get('id');

console.log(id_membre); // This will log the 'id' value (e.g., 8) to the console

document.addEventListener("DOMContentLoaded", () => {
  // dipslay all user information in table
  function displayUsersInfos() {
    api.get('readUser')
      .then((users) => {
        const tbody_user = document.getElementById("tbody-user");
        // Return HTML Tbody table
        const userHTML = users.map(user => {
          return (
            `
          <tr class="hover:bg-gray-100">
            <td class="p-4 w-4">
                <div class="flex items-center">
                    <input id="checkbox-${user.id}" aria-describedby="checkbox-1" type="checkbox"
                        class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                    <label for="checkbox-${user.id}" class="sr-only">checkbox</label>
                </div>
            </td>
            <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                <img class="h-10 w-10 rounded-full" src="../../../backend/uploads/img/profile/${user.image}" alt="">
                <div class="text-sm font-normal text-gray-500">
                    <div class="text-base font-semibold text-gray-900">${user.first_name} ${user.last_name}</div>
                    <div class="text-sm font-normal text-gray-500"><span>Email: </span>${user.email}</div>
                    <div class="text-sm font-normal text-gray-500"><span>Phone: </span>${user.phone}</div>
                </div>
            </td>
            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">${user.birthday}</td>
            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">${user.role}</td>
            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">${user.password}</td>
            <td class="p-4 whitespace-nowrap space-x-2">
                <button type="button" data-user-id="${user.id}"  class="edit-user-btn text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                    Edit user
                </button>
                <button type="button" data-user-id="${user.id}"  class="delete-user-btn text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    Delete user
                </button>
            </td>
          </tr>
            `
          )
        })

        // Inner Ligne in Table
        tbody_user.innerHTML = userHTML.join("");
        /**
         *  EDIT USER TRAITEMENT 
         */
        // Display edit-user-model
        var isEditModelOpen = false;
        function displayEditUserModel(isEditModelOpen, userId) {
          const editUserModel = document.querySelector("#edit-user-modal");
          if (isEditModelOpen === false) {
            editUserModel.classList.remove('flex');
            editUserModel.classList.add('hidden');
            console.log(userId);
          } else {
            editUserModel.classList.remove('hidden');
            editUserModel.classList.add('flex');
          }
          return isEditModelOpen;
        }
        // SET user informations in the form for update
        function setUserInfosForUpdate(userId) {
          api.getById('readUserbyId', userId)
            .then((users) => {
              const EditUserForm = document.getElementById('edit-user-form');
              // Set the values in the form fields
              EditUserForm.querySelector('#first_name').value = users[0].first_name;
              EditUserForm.querySelector('#last_name').value = users[0].last_name;
              EditUserForm.querySelector('#phone').value = users[0].phone;
              EditUserForm.querySelector('#email').value = users[0].email;
              EditUserForm.querySelector('#birthday').value = users[0].birthday;
              EditUserForm.querySelector('#role').value = users[0].role;
              // Display the user's image (assuming you have an image element with id 'image-profile')
              EditUserForm.querySelector('#image-profile-update').src = `../../../backend/uploads/img/profile/${users[0].image}`;
            })
        }
        // Edit Button function
        const editButtons = document.querySelectorAll(".edit-user-btn");
        editButtons.forEach(button => {
          button.addEventListener('click', (event) => {
            event.preventDefault();
            const user_id = event.currentTarget.getAttribute("data-user-id");
            isEditModelOpen = true;
            setUserInfosForUpdate(user_id);
            displayEditUserModel(isEditModelOpen, user_id);

            const updateUserForm = document.getElementById("edit-user-form");
            updateUserForm.addEventListener('submit', async function (event) {
              event.preventDefault();

              const formData = new FormData(updateUserForm);
              const userData = {
                "last_name": formData.get('last_name'),
                "first_name": formData.get('first_name'),
                "email": formData.get('email'),
                "phone": formData.get('phone'),
                "birthday": formData.get('birthday'),
                "role": formData.get('role'),
                "password": formData.get('password'),
                "confirm_password": formData.get('confirm_password'),
                "id": user_id,
              };

              api.post('updateUser', userData)
                .then(response => {
                  if (response.error) {
                    console.log('Server Error :', response.error);
                    alert(response.error);
                  } else {
                    console.log('Server Message:', response.message);
                    const userId = response.id;
                    // Handle image upload separately
                    const imageInput = document.getElementById('image_file_update');
                    const image = imageInput.files[0];

                    if (image) {
                      api.upload('updateImage', image, user_id)
                        .then(response => {
                          if (response.error) {
                            console.log('Server Error Image:', response.error);
                          } else {
                            console.log('Server Message Image:', response.message);
                            isEditModelOpen = false;
                            updateUserForm.reset();
                            displayEditUserModel(isEditModelOpen);
                            window.location.reload();
                          }
                        });
                    } else {
                      console.log('Image not selected.');
                      isEditModelOpen = false;
                      updateUserForm.reset();
                      displayEditUserModel(isEditModelOpen);
                      window.location.reload();
                    }
                  }
                })
            });
          });
        });
        // Add event listener to the close edit button
        document.getElementById("close-edit-user").addEventListener("click", function () {
          isEditModelOpen = false;
          displayEditUserModel(isEditModelOpen);
        });
        /**
         * Delete Button function
         */
        const deleteButtons = document.querySelectorAll(".delete-user-btn");
        deleteButtons.forEach(button => {
          button.addEventListener("click", (event) => {
            const data = {
              'id': event.currentTarget.getAttribute("data-user-id")
            };
            if (confirm("Are you sure you want to delete this user?")) {
              api.delete('deleteUser', data)
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
      });
  }
  displayUsersInfos();
});

/**
 * Frontend update user functions
 */
// Profile Image
const imageInputUpdate = document.querySelector('#image_file_update'); // Query all elements with the ID "image_file"
imageInputUpdate.addEventListener('change', function () {
  const selectedImage = imageInputUpdate.files[0];
  const imagePreview = document.querySelector("#image-profile-update");
  if (selectedImage) {
    imagePreview.src = URL.createObjectURL(selectedImage);
  }
});

/**
 * Frontend function Create New User
 */
// Add User Function
const addUserForm = document.getElementById("add-user-form");
addUserForm.addEventListener('submit', async function (event) {
  event.preventDefault();

  const formData = new FormData(addUserForm);
  const userData = {
    "last_name": formData.get('last_name'),
    "first_name": formData.get('first_name'),
    "email": formData.get('email'),
    "phone": formData.get('phone'),
    "birthday": formData.get('birthday'),
    "role": formData.get('role'),
    "password": formData.get('password'),
    "confirm_password": formData.get('confirm_password'),
  }
  api.post('createUser', userData)
    .then(response => {
      if (response.error) {
        console.log('Server Error :', response.error);
        alert(response.error);
      }
      else {
        console.log('Server Message:', response.message);
        console.log('User ID:', response.id);
        const userId = response.id;
        // Handle image upload separately
        const imageInput = document.getElementById('image_file_add');
        const image = imageInput.files[0];
        if (image) {
          api.upload('uploadImage', image, userId)
            .then(response => {
              if (response.error) {
                console.log('Server Error Image:', response.error);
              } else {
                console.log('Server Message Image:', response.message);
                addUserForm.reset();
                isModelOpen = false;
                displayAddUserModel(isModelOpen);
                window.location.reload();
              }
            });
        }
        else {
          console.log('image not exist in JavaScript');
          addUserForm.reset();
          isModelOpen = false;
          displayAddUserModel(isModelOpen);
          window.location.reload();
        }

      }
    })
})
// Display add-user-model
var isModelOpen = false;
function displayAddUserModel(isModelOpen) {
  const addUserModel = document.querySelector("#add-user-modal");

  if (isModelOpen === false) {
    addUserModel.classList.remove('flex');
    addUserModel.classList.add('hidden');
  } else {
    addUserModel.classList.remove('hidden');
    addUserModel.classList.add('flex');
  }

  return isModelOpen;
}
// Add event listener to the open button for Add Form
document.getElementById("btn-add-user").addEventListener("click", function () {
  isModelOpen = true;
  displayAddUserModel(isModelOpen);
});
// Add event listener to the close add user button 
document.getElementById("close-add-user").addEventListener("click", function () {
  isModelOpen = false;
  displayAddUserModel(isModelOpen);
  addUserForm.reset();
});
const imageInputAdd = document.querySelector('#image_file_add'); // Query all elements with the ID "image_file"
imageInputAdd.addEventListener('change', function () {
  const selectedImage = imageInputAdd.files[0];
  const imagePreview = document.querySelector("#image-profile-add");
  if (selectedImage) {
    imagePreview.src = URL.createObjectURL(selectedImage);
  }
});


