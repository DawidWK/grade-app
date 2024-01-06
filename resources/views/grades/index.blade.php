<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista ocen
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="p-6 text-gray-900">
                <table class="min-w-full">
                    <thead>
                            <tr>
                                <th class="border px-4 py-2">Uczeń</th>
                                <th class="border px-4 py-2">Oceny</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach($gradesGroupedByUser as $userId => $userGrades)
                            <tr>
                                <td class="border px-4 py-2">{{ $userGrades->first()->user->name }}</td>
                                <td class="border px-4 py-2">
                                    @foreach($userGrades as $grade)
                                        <span class="inline-block relative tooltip"
                                            title="{{ $grade->description }}"
                                            onmouseover="tooltip(this)"
                                        >
                                            <a href="{{ route('grades.edit', $grade->id) }}">{{ $grade->grade }}</a>
                                        </span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    <a href="{{ route('grades.create') }}">
                        <button class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Dodaj nowy
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function tooltip(element) {
        var tooltipText = element.getAttribute('description');
        if (tooltipText) {
            var tooltip = document.createElement('div');
            tooltip.classList.add('bg-gray-800', 'text-white', 'p-2', 'rounded', 'absolute', 'z-10', 'tooltiptext');
            tooltip.textContent = tooltipText;
            element.appendChild(tooltip);

            element.addEventListener('mouseout', function () {
                tooltip.parentNode.removeChild(tooltip);
            });
        }
    }
    
</script>