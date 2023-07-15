<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$note->trashed()? __('Notes'): __('Trash')  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="flex">
                @if(!$note->trashed())
                <p class="opacity-70 text-white">
                    <strong>Create at: </strong>{{ $note->created_at->diffForHumans() }}
                </p>

                <p class="opacity-70 ml-8 text-white">
                    <strong>Updated: </strong>{{ $note->updated_at->diffForHumans() }}
                </p>

                <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto hover:btn-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mr-2 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>

                    Edit Note
                </a>

                <form action="{{ route('notes.destroy', $note) }}" method="post">

                    @method('delete')

                    @csrf

                    <button type="submit" onclick="return confirm('Are you sure you want to move this note to trash?')" class="btn btn-danger text-white bg-red- hover:btn-danger-hover ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mb-1 mr-1 inline">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>

                        Move to trash
                    </button>

                </form>
                @else
                <p class="opacity-70 text-white">
                    <strong>Deleted: </strong>{{ $note->created_at->diffForHumans() }}
                </p>


                <form action ="{{ route('trashed.update',$note) }}" method="post" class="ml-auto">
                @method('put')
                @csrf
                <button type="submit" class="btn-link  hover:btn-hover">Restore Note</button>

                </form>


                <form action="{{ route('trashed.destroy', $note) }}" method="post">

                    @method('delete')

                    @csrf

                    <button type="submit" onclick="return confirm('Do you really want to delete this note forever?')" class="btn btn-danger text-white bg-red- hover:btn-danger-hover ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 mb-1 mr-1 inline">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>

                        Delete Forever
                    </button>

                </form>
                @endif

            </div>

            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4xl">
                    {{ $note->title }}
                </h2>

                <p class="mt-6 whitespace-pre-wrap">{{ $note->text }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
