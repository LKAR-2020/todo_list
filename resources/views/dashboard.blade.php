<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
                        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                            <div class="mb-4">
                                <h1 class="text-grey-darkest">Liste des tâches</h1>
                                <form action="{{ route('todo.store') }}" method="post">
                                    @csrf
                                    <div class="flex mt-4">
                                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" placeholder="ajouter une liste de tache " required autofocus />
                                        <x-button class="ml-4">
                                            {{ __('ajouter') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                            <div>
                                @foreach($todos as $todo)
                                <div class="flex mb-4 items-center">
                                    <p class="w-full text-grey-darkest">{{$todo->title}}</p>
                                    @if($todo->is_completed)
                                    <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green">complet</button>
                                    @else
                                    <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-grey border-grey hover:bg-grey">en cours</button>
                                    @endif
                                        <form action="{{route('todo.destroy',['todo'=>$todo->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">supprimer</button>
                                        </form>


                                    <form action="{{route('todo.update',['todo'=>$todo->id])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <x-button class="ml-4">
                                            {{ __('valider') }}
                                        </x-button>

                                    </form>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
