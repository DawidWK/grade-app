<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                Witaj {{ Auth::user()->name }} ({{ Auth::user()->permission }})!
                <div class="p-6 text-gray-900 flex">
                    

                    @if (Auth::user()->permission == 'administrator')
                         <a href="{{ route('admin.users') }}" >
                            <button class="w-40 h-40 border shadow rounded m-2 hover:bg-slate-50">
                                Zarządzaj użytkownikami
                            </button>
                        </a>
                        <a href="{{ route('register') }}" >
                            <button class="w-40 h-40 border shadow rounded m-2 hover:bg-slate-50">
                                Dodaj użytkownika
                            </button>
                        </a>

                    @endif


                    @if (Auth::user()->permission == 'nauczyciel')
                        <a href="{{ route('grades.index') }}">
                            <button class="w-40 h-40 border shadow rounded m-2 hover:bg-slate-50">
                                Zarządzaj ocenami
                            </button>

                        </a>
                        <a href="{{ route('subjects.index') }}">
                            <button class="w-40 h-40 border shadow rounded m-2 hover:bg-slate-50">
                                Lista przedmiotów
                            </button>
                        </a>
                        <a href="{{ route('subjects.create') }}">
                            <button class="w-40 h-40 border shadow rounded m-2 hover:bg-slate-50">
                                Utwórz nowy przedmiot
                            </button>
                        </a>
                    @endif

                    @if (Auth::user()->permission == 'uczen')
                        <a href="{{ route('grades.user', Auth::user()->id) }}">
                            <button class="w-40 h-40 border shadow rounded m-2 hover:bg-slate-50">
                                Sprawdź oceny
                            </button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
