



  <aside id="logo-sidebar" class="fixed flex flex-wrap top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
           <li>
              <a href="{{ url('admin/dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                 <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                    <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                 </svg>
                 <span class="ms-3">Dashboard</span>
              </a>
           </li>
           <li class="relative">
            <!-- Dropdown Button -->
            <button type="button"
                    class="flex items-center w-full p-2 text-gray-900 transition-colors duration-200 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                    aria-controls="dropdown-master"
                    data-collapse-toggle="dropdown-master">
                <div class="flex items-center">
                    <!-- Icon Container with animated background -->
                    <div class="relative">
                        <div class="absolute inset-0 rounded-lg transition-colors duration-200 bg-gray-200 dark:bg-gray-600 opacity-0 group-hover:opacity-10"></div>
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                             xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor"
                             viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                        </svg>
                    </div>
                    <span class="flex-1 ms-3 whitespace-nowrap">Data Master</span>
                </div>
                <!-- Animated Arrow -->
                <svg class="w-4 ml-auto h-4 transition-transform duration-200"
                     aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 10 6">
                    <path stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown Menu with smooth transition -->
            <ul id="dropdown-master"
                class="overflow-hidden transition-all duration-300 max-h-0"
                style="opacity: 0; transform: translateY(-10px);">
                <!-- Data Mahasiswa -->
                <li class="relative">
                    <a href="{{ url('admin/data-mahasiswa') }}"
                       class="flex items-center w-full p-2 text-gray-900 transition-all duration-200 rounded-lg pl-11 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        <div class="absolute left-0 w-1 h-full bg-blue-500 opacity-0 transition-opacity duration-200 rounded-r-lg group-hover:opacity-100"></div>
                        <svg class="w-4 h-4 mr-2 text-gray-500 transition-colors duration-200 group-hover:text-blue-500"
                             xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 20 20">
                            <path stroke="currentColor"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.949 8.949 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        <span class="transition-colors duration-200 group-hover:text-blue-500">Data Mahasiswa</span>
                    </a>
                </li>

                <!-- Data Admin -->
                <li class="relative">
                    <a href="{{ url('admin/manajemen-admin') }}"
                       class="flex items-center w-full p-2 text-gray-900 transition-all duration-200 rounded-lg pl-11 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 group">
                        <div class="absolute left-0 w-1 h-full bg-blue-500 opacity-0 transition-opacity duration-200 rounded-r-lg group-hover:opacity-100"></div>
                        <svg class="w-4 h-4 mr-2 text-gray-500 transition-colors duration-200 group-hover:text-blue-500"
                             xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 20 18">
                            <path stroke="currentColor"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                        </svg>
                        <span class="transition-colors duration-200 group-hover:text-blue-500">Data Admin</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Script -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.querySelector('[data-collapse-toggle="dropdown-master"]');
            const dropdownMenu = document.getElementById('dropdown-master');
            const arrow = dropdownButton.querySelector('svg:last-child');
            let isOpen = false;

            function toggleDropdown() {
                isOpen = !isOpen;

                // Rotate arrow
                arrow.style.transform = isOpen ? 'rotate(180deg)' : 'rotate(0)';

                // Toggle dropdown
                if (isOpen) {
                    dropdownMenu.style.maxHeight = dropdownMenu.scrollHeight + 'px';
                    dropdownMenu.style.opacity = '1';
                    dropdownMenu.style.transform = 'translateY(0)';
                    dropdownMenu.style.padding = '0.5rem 0';
                } else {
                    dropdownMenu.style.maxHeight = '0';
                    dropdownMenu.style.opacity = '0';
                    dropdownMenu.style.transform = 'translateY(-10px)';
                    dropdownMenu.style.padding = '0';
                }
            }

            // Toggle on click
            dropdownButton.addEventListener('click', toggleDropdown);

            // Handle active state
            const currentPath = window.location.pathname;
            const menuItems = dropdownMenu.querySelectorAll('a');

            menuItems.forEach(item => {
                if (item.getAttribute('href').endsWith(currentPath)) {
                    item.classList.add('bg-gray-100', 'dark:bg-gray-700');
                    item.querySelector('.bg-blue-500').style.opacity = '1';
                    // Open dropdown if current page is in the menu
                    if (!isOpen) toggleDropdown();
                }
            });
        });
        </script>
           <li>
            <a href="{{ url('manajemen-absensi') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Absensi</span>
                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
            </a>
        </li>
        <li>
            <a href="{{ url('admin/manajemen-jadwal') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h17A1.5 1.5 0 0 1 20 4.5v11a1.5 1.5 0 0 1-1.5 1.5h-17A1.5 1.5 0 0 1 0 15.5v-11ZM2 6v8h16V6H2Zm10 3a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm-4 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm8 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Jadwal</span>
            </a>
        </li>
           <li>
              <a href="{{ url('admin/laporan') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                    <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                    <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                 </svg>
                 <span class="flex-1 ms-3 whitespace-nowrap">Laporan</span>
              </a>
           </li>

        </ul>
     </div>
  </aside>








