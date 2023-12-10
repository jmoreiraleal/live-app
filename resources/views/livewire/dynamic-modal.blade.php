<div>
    @if($isOpen)
        <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex">
            <div class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex rounded-lg">
                @if($componentName)
                    @livewire($componentName)
                @endif
                <button wire:click="closeModal" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
                    Fechar
                </button>
            </div>
        </div>
    @endif
</div>
