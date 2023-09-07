
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
    <title>Section</title>
</head>

<body>
    <!--Navbar Dashboard-->
    <div id="navbar-dashboard"></div>
    <div class="flex overflow-hidden bg-white pt-16">
        <!--Sidebar Dashboard-->
        <div id="sidebar"></div>y
        >
        <div id="sidebar"></div>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <!--Start Section Header-->
                <div id="section-model">
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
                                                <a href="#" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Sections</a>
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
                                <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All sections</h1>
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
                                    <button type="button" id="btn-add-section" class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                                        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        Add New Section
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Section Header-->
                <!--Satrt Add Section Modal -->
                <div class="hidden fixed inset-0 items-center justify-center z-50" id="add-section-modal">
                    <div class="relative w-3/4 max-w-3/4 px-4 h-full md:h-auto">
                        <div class="bg-white rounded-lg shadow relative">
                            <div class="flex items-start justify-between p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold">Add New Section</h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" id="close-add-section">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6 space-y-6">
                                <form action="#" class="grid grid-cols-2 gap-6" id="add-section-form" method="POST" enctype="multipart/form-data">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label htmlFor="section_title" class="text-sm font-medium text-gray-900 block mb-2">
                                                Title
                                            </label>
                                            <input type="text" name="section_title" id="section_title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="First Name" required>
                                        </div>
                                        <div class="col-span-full">
                                            <label for="section_description" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                                            <textarea id="section_description" name="section_description" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4" placeholder="e.g. 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, Ram 16 GB DDR4 2300Mhz"></textarea>
                                        </div>
                                    </div>
                                    <div class="overflow-y-scroll">
                                        <table class="table-fixed min-w-full divide-y divide-gray-200">
                                            <thead>
                                                <td>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                </td>
                                            </thead>
                                            <tbody class="col-span-2 bg-white divide-y divide-gray-200" id="responsibles-dont-section">
                                                <!-- Responsable not Section genarate by javascript-->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-span-2">
                                        <button id="btn-save-add-section" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                <!-- End Add Section Modal -->
                <!-- Start Update Section Modal -->
                <div class="hidden fixed inset-0 items-center justify-center z-50" id="update-section-modal">
                    <div class="relative w-3/4 max-w-3/4 px-4 h-full md:h-auto">
                        <div class="bg-white rounded-lg shadow relative">
                            <div class="flex items-start justify-between p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold">Update Section</h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" id="close-update-section">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6 space-y-6">
                                <form action="#" class="grid grid-cols-1 gap-6" id="update-section-form" method="POST" enctype="multipart/form-data">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label htmlFor="title" class="text-sm font-medium text-gray-900 block mb-2">
                                                Title
                                            </label>
                                            <input type="text" name="section_title" id="section_title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="First Name" required>
                                        </div>
                                        <div class="col-span-full">
                                            <label for="section_description" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                                            <textarea id="section_description" name="section_description" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4" placeholder="e.g. 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, Ram 16 GB DDR4 2300Mhz"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <button id="btn-update-section" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
                <!-- End Add Section Modal -->

                <!--Satrt Add Responsable to Section Modal -->
                <div class="hidden fixed inset-0 items-center justify-center z-50" id="add-responsable-to-section-modal">
                    <div class="relative w-3/4 max-w-3/4 px-4 h-full md:h-auto">
                        <div class="bg-white rounded-lg shadow relative">
                            <div class="flex items-start justify-between p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold">Add Responsable to Section</h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" id="close-responsable-section">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fillRule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clipRule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-6 space-y-6">
                                <form action="#" class="grid grid-cols-1 gap-6" id="add-section-form" method="POST" enctype="multipart/form-data">
                                    <div class="overflow-y-scroll">
                                        <table class="table-fixed min-w-full divide-y divide-gray-200">
                                            <thead>
                                                <td>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                </td>
                                            </thead>
                                            <tbody class="col-span-2 bg-white divide-y divide-gray-200" id="add-responsable to section">
                                                <!-- Responsable not Section genarate by javascript-->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-span-2">
                                        <button id="btn-save-add-section" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                <!-- End Add Section Modal -->


            </main>
            <!-- Footer Dashboard-->
            <div id="footer-dashboard"></div>
        </div>
    </div>

    <!--<script type="module" src="../../api/js/user-api.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="./section.js"></script>
    <!-- <script type="model" src="./sectionApi.js"></script> -->
    <script>
        $(document).ready(function() {
            $("#navbar-dashboard").load("../../admin/layout/navbar-dashboard.html");
            $("#sidebar").load("../../admin/layout/sidebar.html");
            $("#footer-dashboard").load("../../admin/layout/footer-dashboard.html");
        });
    </script>
</body>

</html>