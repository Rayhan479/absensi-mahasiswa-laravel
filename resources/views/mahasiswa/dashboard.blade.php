{{-- <x-app-layout> --}}
@include('admin.layouts.app')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="flex justify-center bg-gray-100 py-10 p-14">
        <!---== First Stats Container ====--->
      <div class="container mx-auto pr-4">
        <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
          <div class="h-20 bg-red-400 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">BT SUBSCRIBERS</p>
          </div>
          <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p>TOTAL</p>
          </div>
          <p class="py-4 text-3xl ml-5">20,456</p>
          <!-- <hr > -->
        </div>
      </div>
          <!---== First Stats Container ====--->

        <!---== Second Stats Container ====--->
      <div class="container mx-auto pr-4">
        <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
          <div class="h-20 bg-blue-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">BT ACTIVE SUBSCRIBERS</p>
          </div>
          <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p>TOTAL</p>
          </div>
          <p class="py-4 text-3xl ml-5">19,694</p>
          <!-- <hr > -->
        </div>
      </div>
        <!---== Second Stats Container ====--->

      <!---== Third Stats Container ====--->
      <div class="container mx-auto pr-4">
        <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
          <div class="h-20 bg-purple-400 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">BT OPT OUTS</p>
          </div>
          <div class="flex justify-between pt-6 px-5 mb-2 text-sm text-gray-600">
            <p>TOTAL</p>
          </div>
          <p class="py-4 text-3xl ml-5">711</p>
          <!-- <hr > -->
        </div>
      </div>
      <!---== Third Stats Container ====--->

      <!---== Fourth Stats Container ====--->
      <div class="container mx-auto">
        <div class="w-72 bg-white max-w-xs mx-auto rounded-sm overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
          <div class="h-20 bg-purple-900 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">BT TODAY'S SUBSCRIPTION</p>
          </div>
          <div class="flex justify-between pt-6 px-5 mb-2 text-sm text-gray-600">
            <p>TOTAL</p>
          </div>
          <p class="py-4 text-3xl ml-5">0</p>
          <!-- <hr > -->
        </div>
      </div>
      <!---== Fourth Stats Container ====--->
    </div> --}}

    <div class="flex flex-row bg-gray-100 min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-5">
            <h2 class="text-lg font-bold">Sidebar</h2>
            <ul>
                <li class="mt-3"><a href="#" class="hover:text-gray-400">Dashboard</a></li>
                <li class="mt-3"><a href="#" class="hover:text-gray-400">Statistics</a></li>
                <li class="mt-3"><a href="#" class="hover:text-gray-400">Settings</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- First Stats Container -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <div class="h-20 bg-red-400 flex items-center justify-start px-5">
                        <p class="text-white text-lg font-bold">BT SUBSCRIBERS</p>
                    </div>
                    <div class="px-5 py-4">
                        <p class="text-sm text-gray-600">TOTAL</p>
                        <p class="text-3xl font-bold">20,456</p>
                    </div>
                </div>

                <!-- Second Stats Container -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <div class="h-20 bg-blue-500 flex items-center justify-start px-5">
                        <p class="text-white text-lg font-bold">BT ACTIVE SUBSCRIBERS</p>
                    </div>
                    <div class="px-5 py-4">
                        <p class="text-sm text-gray-600">TOTAL</p>
                        <p class="text-3xl font-bold">19,694</p>
                    </div>
                </div>

                <!-- Third Stats Container -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <div class="h-20 bg-purple-400 flex items-center justify-start px-5">
                        <p class="text-white text-lg font-bold">BT OPT OUTS</p>
                    </div>
                    <div class="px-5 py-4">
                        <p class="text-sm text-gray-600">TOTAL</p>
                        <p class="text-3xl font-bold">711</p>
                    </div>
                </div>

                <!-- Fourth Stats Container -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <div class="h-20 bg-purple-900 flex items-center justify-start px-5">
                        <p class="text-white text-lg font-bold">BT TODAY'S SUBSCRIPTION</p>
                    </div>
                    <div class="px-5 py-4">
                        <p class="text-sm text-gray-600">TOTAL</p>
                        <p class="text-3xl font-bold">0</p>
                    </div>
                </div>
            </div>
        </main>
    </div>




{{-- </x-app-layout> --}}


