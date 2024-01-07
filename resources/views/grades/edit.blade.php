<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edytuj ocenę
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="px-6 text-gray-900">
                    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col justify-start">
                            <label class="mt-6 block font-medium text-sm text-gray-700" for="grade">
                                Ocena
                            </label>
                            <input required min="1" max="6" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="number" value="{{ $grade->grade }}" name="grade" placeholder="Ocena od 1-6">

                            <label class="mt-6 block font-medium text-sm text-gray-700" for="subject_id">
                                Nazwa przedmiotu
                            </label>
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="subject_id">
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" @if($subject->id === $grade->subject_id) selected @endif>{{ $subject->name }}</option>
                                @endforeach
                            </select>

                            <label class="mt-6 block font-medium text-sm text-gray-700" for="user_id">
                                Uczeń
                            </label>
                            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if($user->id === $grade->user_id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select>

                            <label class="mt-6 block font-medium text-sm text-gray-700" for="description">
                                Opis oceny
                            </label>
                            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" name="description" placeholder="Opis oceny">{{ $grade->description }}</textarea>
                        </div>
                        <button class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit">Zapisz</button>
                        <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Usuń ocenę
                            </button>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
