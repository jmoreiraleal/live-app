@props(['name','title'])
<div
    x-data="{ show : false,name : '{{$name}}'}"
    x-show="show"
    x-on:open-modal.window="show = ($event.detail.name === name)"
    x-on:close-modal.window="show = false"
    x-on:keydown.scape.window="show = false"
    style="display:none;"
    class="fixed z-50 inset-0"
    x-transition.duration
>
    {{--Gray Background --}}
    <div x-on:click="show = false" class="fixed inset-0 bg-gray-300 opacity-400 opacity-40"></div>
    {{--Modal Body --}}
    <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl" style="max-height: 500px">
        <div>
            <button x-on:click="$dispatch('close-modal')">X</button>
        </div>
        @if(isset($title))
            <div class="py-3 flex items-center justify-center">
                {{$title}}
            </div>
        @endif

        <div>
            {{$body}}
        </div>
    </div>
</div>
