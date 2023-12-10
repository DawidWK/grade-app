<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Utworz nowy przedmiot
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="px-6 text-gray-900">
                    <form class="" action="{{ route('subjects.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col justify-start">
                            <label class="mt-6 block font-medium text-sm text-gray-700" for="name">
                                Nazwa przedmiotu
                            </label>
                            <input required class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="text" name="name" placeholder="np. Matematyka...">
                            <label requried class="mt-6 block font-medium text-sm text-gray-700" for="description">
                                Opis przedmiotu
                            </label>
                            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="description" placeholder="Na czym będzie polegał ten przedmiot..."></textarea>
                        </div>
                        <button class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">Zapisz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>