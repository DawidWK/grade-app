<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                Witaj {{ Auth::user()->name }} ({{ Auth::user()->permission }})!
                <div class="p-6 text-gray-900 flex">
                    

                    @if (Auth::user()->permission == 'administrator')
                         <a href="{{ route('register') }}" class="bunderline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Zarządzaj użytkownikami</a>
                         <a href="{{ route('admin.users') }}" class="bunderline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Admin panel</a>
                    @endif


                    @if (Auth::user()->permission == 'nauczyciel')
                        <a href="{{ route('grades.index') }}">
                            <button href=""  class="w-40 h-40 border shadow rounded m-2">
                                Zarządzaj ocenami
                            <button>
                        </a>
                        <a href="{{ route('subjects.index') }}">
                            <button href=""  class="w-40 h-40 border shadow rounded m-2">
                                Lista przedmiotów
                            <button>
                        </a>
                        <a href="{{ route('subjects.create') }}">
                            <button href=""  class="w-40 h-40 border shadow rounded m-2">
                                Utwórz nowy przedmiot
                            <button>
                        </a>
                    @endif

                    @if (Auth::user()->permission == 'uczen')
                        <br><br>
                        <a href="" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sprawdź swoje oceny</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
