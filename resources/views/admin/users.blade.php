

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel Administratora - Zarządzanie Użytkownikami
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($users as $user)
                        <p>{{ $user->name }} - {{ $user->email }}</p>
                        <a href="{{ route('admin.edit', $user->id) }}" class="underline">Edytuj lub usuń</a>

                    @endforeach
                    <br>
                    <a href="{{ route('register') }}" class="bunderline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Dodaj użytkownika</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
