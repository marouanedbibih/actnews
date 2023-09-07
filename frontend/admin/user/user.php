<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: "#da373d",
          },
        },
      },
    };
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <title>Document</title>
</head>

<body>
  <!--Navbar Dashboard-->
  <div id="navbar-dashboard"></div>

  <div class="flex overflow-hidden bg-white pt-16">
    <!--Sidebar Dashboard-->
    <div id="sidebar"></div>
    >
    <div id="sidebar"></div>
    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
      <main>
        <!--Start User Header-->
        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
          <div class="mb-1 w-full">
            <div class="mb-4">
              <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                  <li class="inline-flex items-center">
                    <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                      <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                      </svg>
                      Home
                    </a>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                      </svg>
                      <a href="#" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Users</a>
                    </div>
                  </li>
                  <li>
                    <div class="flex items-center">
                      <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                      </svg>
                      <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">List</span>
                    </div>
                  </li>
                </ol>
              </nav>
              <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All users</h1>
            </div>
            <div class="sm:flex">
              <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                <form class="lg:pr-3" action="#" method="GET">
                  <label for="users-search" class="sr-only">Search</label>
                  <div class="mt-1 relative lg:w-64 xl:w-96">
                    <input type="text" name="email" id="users-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search for users">
                  </div>
                </form>
              </div>
              <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <button type="button" id="btn-add-user" class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                  <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                  </svg>
                  Add user
                </button>
              </div>
            </div>
          </div>
        </div>
        <!--End User Header-->
        <!--Start User List-->
        <div class="flex flex-col">
          <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
              <div class="shadow overflow-hidden">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
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
                      <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                        Birthday
                      </th>
                      <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                        Role
                      </th>
                      <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                        Password
                      </th>
                      <th scope="col" class="p-4">
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200" id="tbody-user">
                    <!--JavaScript Function User Table-->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!--End User List-->
        <!--Start User Footer-->
        <div class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
          <div class="flex items-center mb-4 sm:mb-0">
            <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
              <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
              <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
              </svg>
            </a>
            <span class="text-sm font-normal text-gray-500">Showing <span class="text-gray-900 font-semibold">1-20</span> of <span class="text-gray-900 font-semibold">2290</span></span>
          </div>
          <div class="flex items-center space-x-3">
            <a href="#" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
              <svg class="-ml-1 mr-1 h-5 w-5" fill=" currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
              </svg>
              Previous
            </a>
            <a href="#" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
              Next
              <svg class="-mr-1 ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
        <!--End User Footer-->
        <!-- Start Add User Modal -->
        <div class=" fixed inset-0 hidden  items-center justify-center z-50" id="add-user-modal">
          <div class="relative w-3/4 max-w-3/4 px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
              <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">Add new user</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" id="close-add-user">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd"></path>
                  </svg>
                </button>
              </div>
              <div class="p-6 space-y-6">
                <form action="#" class="grid grid-cols-2 gap-6" id="add-user-form" method="POST" enctype="multipart/form-data">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="first_name" class="text-sm font-medium text-gray-900 block mb-2">
                        First Name
                      </label>
                      <input type="text" name="first_name" id="first_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="First Name" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="lsat_name" class="text-sm font-medium text-gray-900 block mb-2">
                        Last Name
                      </label>
                      <input type="text" name="last_name" id="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Last Name" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="phone" class="text-sm font-medium text-gray-900 block mb-2">
                        Phone
                      </label>
                      <input type="text" name="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="ex:+212 xx-xxxxxxxxxx" required />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="email" class="text-sm font-medium text-gray-900 block mb-2">
                        Email
                      </label>
                      <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="name@example.com" required />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="birthday" class="text-sm font-medium text-gray-900 block mb-2">
                        Birthday
                      </label>
                      <input type="date" name="birthday" id="birthday" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="role" class="text-sm font-medium text-gray-900 block mb-2">
                        Role
                      </label>
                      <select name="role" id="role" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                        <option value="" disabled selected>Select role</option>
                        <option value="admin">Admin</option>
                        <option value="responsable">Responsaple</option>
                        <option value="collaborateur">Collaborateur</option>
                      </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="password" class="text-sm font-medium text-gray-900 block mb-2">
                        Password
                      </label>
                      <input type="password" name="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="password" required />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="confirm_password" class="text-sm font-medium text-gray-900 block mb-2">
                        Confirm Password
                      </label>
                      <input type="password" name="confirm_password" id="confirm_password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Bonnie" required />
                    </div>
                  </div>
                  <div class="col-span-1">
                    <!-- Right column with input file -->
                    <div class="flex flex-col items-center justify-center h-full p">
                      <div class="my-4">
                        <img class="rounded-full w-64 h-64" id="image-profile-add" src="../../../backend/uploads/img/profile/profile-image.webp" alt="image description">
                      </div>
                      <label for="image_file_add" class="image-input flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                          <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                          </svg>
                          <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                          <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="image_file_add" name="image_file_add" type="file" class="hidden" accept=".jpg, .jpeg, .png" />
                      </label>
                    </div>
                  </div>
                  <div class="col-span-2">
                    <button id="btn-save-user" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save</button>
                  </div>

                </form>
              </div>
            </div>
            <div>

            </div>
          </div>
        </div>
        <!-- End Add User Modal -->

        <!-- Start update User Modal -->
        <div class=" fixed inset-0 hidden  items-center justify-center z-50" id="edit-user-modal">
          <div class="relative w-3/4 max-w-3/4 px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
              <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">Edit user</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" id="close-edit-user">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd"></path>
                  </svg>
                </button>
              </div>
              <div class="p-6 space-y-6">
                <form action="#" class="grid grid-cols-2 gap-6" id="edit-user-form" method="POST" enctype="multipart/form-data">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="first_name" class="text-sm font-medium text-gray-900 block mb-2">
                        First Name
                      </label>
                      <input type="text" name="first_name" id="first_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="First Name" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="lsat_name" class="text-sm font-medium text-gray-900 block mb-2">
                        Last Name
                      </label>
                      <input type="text" name="last_name" id="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Last Name" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="phone" class="text-sm font-medium text-gray-900 block mb-2">
                        Phone
                      </label>
                      <input type="text" name="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="ex:+212 xx-xxxxxxxxxx" required />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="email" class="text-sm font-medium text-gray-900 block mb-2">
                        Email
                      </label>
                      <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="name@example.com" required />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="birthday" class="text-sm font-medium text-gray-900 block mb-2">
                        Birthday
                      </label>
                      <input type="date" name="birthday" id="birthday" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="role" class="text-sm font-medium text-gray-900 block mb-2">
                        Role
                      </label>
                      <select name="role" id="role" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" required>
                        <option value="" disabled selected>Select role</option>
                        <option value="admin">Admin</option>
                        <option value="responsable">Responsaple</option>
                        <option value="collaborateur">Collaborateur</option>
                      </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="password" class="text-sm font-medium text-gray-900 block mb-2">
                        Password
                      </label>
                      <input type="password" name="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="password" required />
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                      <label htmlFor="confirm_password" class="text-sm font-medium text-gray-900 block mb-2">
                        Confirm Password
                      </label>
                      <input type="password" name="confirm_password" id="confirm_password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Bonnie" required />
                    </div>
                  </div>
                  <div class="col-span-1">
                    <!-- Right column with input file -->
                    <div class="flex flex-col items-center justify-center h-full p">
                      <div class="my-4">
                        <img class=" rounded-full w-64 h-64" id="image-profile-update" src="" alt="image description">
                      </div>
                      <label for="image_file_update" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800  hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                          <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                          </svg>
                          <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                          <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="image_file_update" name="image_file_update" type="file" class="hidden" accept=".jpg, .jpeg, .png" />
                      </label>
                    </div>
                  </div>
                  <div class="col-span-2">
                    <button id="btn-save-user" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save</button>
                  </div>

                </form>
              </div>
            </div>
            <div>

            </div>
          </div>
        </div>
        <!-- End Edit User Modal -->
      </main>
      <!-- Footer Dashboard-->
      <div id="footer-dashboard"></div>
    </div>
  </div>

  <!--<script type="module" src="../../api/js/user-api.js"></script>-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="module" src="./user.js"></script>
  <script>
    $(document).ready(function() {
      $("#navbar-dashboard").load("../../admin/layout/navbar-dashboard.html");
      $("#sidebar").load("../../admin/layout/sidebar.html");
      $("#footer-dashboard").load("../../admin/layout/footer-dashboard.html");
    });
  </script>
</body>

</html>