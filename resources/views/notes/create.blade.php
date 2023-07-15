<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">



                <form action="{{ route('notes.store') }}" method="post">
                    @csrf

                    <x-input
                        class="sm:rounded-md mb-1 w-full border-gray-300"
                        type="text"
                        field="title"
                        name="title"
                        placeholder="Title"
                        autocomplete="off"
                        :value="@old('title')">
                    </x-input>

                    <x-textarea
                        class="w-full mt-4"
                        field="text"
                        name="text"
                        rows="10"
                        placeholder="Start typing here..."
                        :value="@old('text')">
                    </x-textarea>

                    <button class="btn-link btn-md hover:btn-hover mt-6">
                        Save Note
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 mb-2 ml-1 -rotate-45 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
