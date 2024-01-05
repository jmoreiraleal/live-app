<div x-data="{openCreateForm: false}" class="p-4 my-8 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
    <button type="button" @click="openCreateForm= true" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" @click="openCreateForm = true">Adicionar Produto</button>
    <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" @click="openCreateForm = false">Cancelar</button>


        <div
            x-data="{open: false, message: ''}"
            x-on:saved.window="event => {
            open = true;
            message = event.detail[0].message;
            setTimeout(() => { open = false; }, 2000);}"
            x-show="open"
            x-transition.leave.duration.500ms
            style="display: none;"
            id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 fixed top-5 right-5" role="alert">
            <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal dark:text-white" x-text="message"><!--@if(session()->has('message')){{ session('message') }} @endif--></div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>

    <div
        x-data="{name:'',price:''}"
        x-show="openCreateForm"
        x-transition.leave.duration.500ms
        style="display: none;"
        class="p-4 my-8 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form wire:submit.prevent="create"  class="max-w-sm mx-auto">
            <div class="mb-5"
                 x-on:saved.window="event => {
                    name=''}">
                <label for="produto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Produto:</label>
                <input type="text"  wire:model="name" x-model="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Informe a descrição do produto">
                @error('name')
                    <span x-transition.leave class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5"
                 x-data="priceMask()"
                 x-on:saved.window="event => {
                    name='';
                    price= '0,00';
                    console.log(event);
                    }">
                <label for="preco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preço:</label>
                <input type="text" wire:model="price" x-model="price"  @input="formatPrice" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Informe o valor do produto">
                @error('price')
                    <span x-transition.leave class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>
        </form>
    </div>
</div>
