@extends('template')

@section('content')
@livewire('main-component')
    <x-modal name="test" title="Modal 1">
        <!--Usa-se este para um modal simples-->
        <!--@slot('body')
            <span class="p-5">
                Body tag test
            </span>
        @endslot-->
        <!--Usa-se este para multiModals-->
                <x-slot:body>
                    <span class="p-5">Test Modal</span>
                </x-slot:body>
    </x-modal>

    <x-modal name="modal2" title="Modal 2">
        <!--Usa-se este para um modal simples-->
        <!--@slot('body')
            <span class="p-5">
                Body tag test
            </span>
        @endslot-->
        <!--Usa-se este para multiModals-->
                <x-slot:body>
                    <span class="p-5">Another Modal</span>
                </x-slot:body>
    </x-modal>

    <button x-data x-on:click="$dispatch('open-modal',{ name : 'test'})" class="px-3 py-1 bg-teal-500 text-white rounded">Open Modal 1</button>
    <button x-data x-on:click="$dispatch('open-modal',{ name : 'modal2'})" class="px-3 py-1 bg-teal-500 text-white rounded">Open Modal 2</button>
@endsection
