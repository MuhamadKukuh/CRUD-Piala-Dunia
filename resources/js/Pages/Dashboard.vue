<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, Head, useForm } from '@inertiajs/inertia-vue3';
import CarouselVue from '@/Components/Carousel.vue';
import myButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref, onMounted } from 'vue';
import LaraModal from '@/Components/Modal.vue';
import axios from 'axios';
import { isSet } from '@vue/shared';

const Props = defineProps({
    data : Array,
});

const PapanSkors = ref([])
const ValError = ref([])

// console.log(PapanSkors);

onMounted(() => {
    getAllData();
});

const getAllData = async() => {
   const response = await axios.get('http://127.0.0.1:8000/api/allData');

   PapanSkors.value = response.data
}


let showModal = ref(false);
const ida = ref('');
let ButtonTitle = ref('');

const Form = useForm({
    'team_a' : '',
    'team_b': '',
    'skor': '',
    'user_id' : 1,
});


function openModal(){
    Form.reset();
    showModal.value=true;
    ButtonTitle.value = "Tambah Data"
}
function closeModal(){
    showModal.value=false;
    Form.reset();
}



const insertData = async() => {
    // consoelog("hallo")
    await axios.post('http://127.0.0.1:8000/api/createData', {
        'team_a' : Form.team_a,
        'team_b' : Form.team_b,
        'skor' : Form.skor
    }).then(
        response => {
            console.log(response.data);
            if(response.data.status == "Success"){
                closeModal()
                getAllData()
            }else{
                ValError.value = response.data
            }
        }
    ).catch(err => {
        console.log(err);
    });

}

const updateData = (id) => {

    Form.post(route('updateScore', id));
    getAllData()
    closeModal();
}   

const getMyData = async() => {
    showModal.value= true;
    await axios.get('http://127.0.0.1:8000/api/myData').then(response => {
        console.log(response.data);
    });
}


const editData = async(id) => {
    await axios.get(`http://127.0.0.1:8000/api/myData/${id}`).then(response => {
        showModal.value=true;
        Form.team_a = response.data.team_a;
        Form.team_b = response.data.team_b; 
        Form.skor = response.data.skor; 
        ida.value = id;

        ButtonTitle.value = "Ubah Data"
    });
}

const Destroy = (id) => {
    Form.get(route('destroyAnying', id));
}
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard | <span class="text-lg font-light text-gray-800">Papan Skor</span></h2>
        </template>
        <LaraModal  :show="showModal" >
            <!-- Modal content -->
            <div class=" bg-white rounded-lg shadow dark:bg-gray-700">
                <button v-on:click="closeModal()" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Papan Skor | <span class="text-sm">Tambah Data</span></h3>
                    <div class="space-y-6">
                        <ul class="text-red-500 text-sm text-light" v-for="errors in ValError" :key="errors.id">
                            <InputError class="mt-2" :message="errors[0]" />
                        </ul>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="">
                                <InputLabel for="team_a" value="Team Pertama"/>
                                <TextInput 
                                id="team_a"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="Form.team_a"
                                autofocus
                                autocomplete="username"
                                />
                                
                                
                            </div>
                            <div class="">
                                <InputLabel for="team_b" value="Team Kedua"/>
                                <TextInput 
                                id="team_b"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="Form.team_b"
                                required
                                autofocus
                                autocomplete="username"
                                />
                            </div>
                        </div>
                        <div>
                            <InputLabel for="skor" value="Skor"/>
                            <TextInput 
                                id="skor"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="Form.skor"
                                required
                                autofocus
                                autocomplete="username"
                                />
                        </div>
                     
                        <myButton v-on:click="ida == ''? insertData() : updateData(ida)">{{ ButtonTitle }}</myButton>
                        
                    </div>
                </div>
            </div>
        </LaraModal>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="container mx-auto">
                    <myButton class="mb-5" v-on:click="openModal()">Tambah Data</myButton>
                    <section class="listFase">
                       
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                            Negara yang Bertanding
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Skor
                                        </th>
                                        <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="recapt in PapanSkors" :key="recapt.id" class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            {{ recapt.team_a }} vs {{ recapt.team_b }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ recapt.skor }}
                                        </td>
                                        <td class="py-4 px-6 bg-gray-50 dark:bg-gray-800">
                                            <!-- {{ substr(recapt.created_at) }} -->
                                            {{ recapt.created_at.substr(0, 10) }}
                                        </td>
                                        <td class="py-4 px-6">
                                           <myButton class="bg-indigo-600" v-on:click="editData(`${recapt.id}`)">Edit</myButton>
                                           <myButton class="bg-red-700 ml-2" v-on:click="Destroy(`${recapt.id}`)">Delete</myButton>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>

                    </section>
                </div>
            </div>
        </div>
        


        <!-- Main modal -->
    

    </AuthenticatedLayout>
</template>
<style>

.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 500ms ease-out;
}
</style>
