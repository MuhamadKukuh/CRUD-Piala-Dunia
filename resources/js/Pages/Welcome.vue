<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import myImage from '@/dsad2.jpg';
import {ref, onMounted} from 'vue';
import axios from 'axios';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const Datas = ref([]);

onMounted(() => {
    getDatas()
})

const getDatas = async() =>{
    const response = await axios.get('http://127.0.0.1:8000/api/allData');

    Datas.value = response.data

}

</script>

<template>
    
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 border-b">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="https://flowbite.com/" class="flex items-center">
        <img src="@/gambar.png" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
        <span class="self-center text-xl text-red-800 font-bold whitespace-nowrap dark:text-white">Hello World</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <!-- <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a> -->
        </li>
        <li>
          <!-- <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a> -->
        </li>
        <li>
          <!-- <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a> -->
        </li>
        <li>
          <!-- <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a> -->
        </li>
        <li>
          <Link :href="route('login')" class="block py-2 pl-3 pr-4 text-red-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-800 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</Link>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="bg-white">
    <div class="grid container mx-auto grid-cols-3 px-20 max-w-screen-xl pt-20 pb-20">
        <div class="py-20 text-3xl text-center font-bold col-span-2 gap-2">
            <h1 class="text-red-800">Hello World</h1>
            <h1 class="text-gray-600 text-xl mt-4">"Judi mu ampas karna dukung emyu? tenang kamu bisa  mendapatkan info menarik seputra Piala Dunia Qatar 2022."</h1>
            <div class="flex justify-center">
                <button class="shadow-2xl shadow-red-400 px-6 py-2 bg-red-700 rounded-full hover:bg-red-900  mt-5 text-xl font-bold text-white">Mulai Bergabung</button>
            </div>
        </div>
        <div class="">
            <img src="@/gambar.png" class="max-h-80 ml-20" alt="">
        </div>
    </div>
</div>
<div class="grid container mx-auto px-20 max-w-screen-xl pt-8 pb-8">
        <div class="text-3xl text-center">
            <h1 class="font-bold text-red-800">Piala Dunia Qatar 2022</h1>
            <p class="text-sm grid font-light mt-4 text-gray-600">
                Piala Dunia FIFA 2022 (bahasa Arab: 2022 كأس العالم لكرة القدم‎) merupakan putaran final ke-22 Piala Dunia FIFA, turnamen sepak bola internasional empat tahunan yang diikuti oleh tim nasional pria senior anggota FIFA. Turnamen edisi ini dijadwalkan berlangsung di Qatar pada 20 November hingga 18 Desember 2022. Untuk pertama kali, Qatar menyelenggarakan turnamen ini dan menjadi Piala Dunia FIFA pertama yang pernah diadakan di Jazirah Arab, dan di negara mayoritas berpenduduk Muslim.
            </p>
        </div>
</div>

<div class="bg-white">
    <div class="grid container mx-auto grid-cols-2 gap-4 px-20 max-w-screen-xl pt-20 pb-20">
        <div class="col-span-2">
            <h1 class="text-center text-3xl text-red-800 font-bold">Papan Skor</h1>
            <div class="mytable">
                
                <div class="overflow-x-auto relative shadow-red-200 border shadow-2xl sm:rounded-lg mt-8">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6 bg-gray-50 text-red-800 dark:bg-gray-800">
                                    Negara
                                </th>
                                <th scope="col" class="py-3 px-6 text-red-800">
                                    Skor
                                </th>
                                <th scope="col" class="py-3 px-6 text-red-800 dark:bg-gray-800">
                                    Tanggal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 dark:border-gray-700" v-for="data in Datas" :key="data.id">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                    {{ data.team_a }} vs {{ data.team_b }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ data.skor }}
                                </td>
                                <td class="py-4 px-6 dark:bg-gray-800">
                                    {{ data.created_at.substr(0, 10) }}
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        
    </div>
</div>

<footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">Hello World™</a>. All Rights Reserved.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <!-- <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a> -->
        </li>
        <li>
            <!-- <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a> -->
        </li>
        <li>
            <!-- <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a> -->
        </li>
        <li>
            <!-- <a href="#" class="hover:underline">Contact</a> -->
        </li>
    </ul>
</footer>
            
</template>


