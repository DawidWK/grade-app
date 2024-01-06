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
                                <th class="border px-4 py-2">Przedmiot</th>
                                <th class="border px-4 py-2">Oceny</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gradesGroupedByUser as $userId => $userGrades)
                                <tr>
                                    <td class="border px-4 py-2">{{ $userGrades->first()->subject->name }}</td>
                                    <td class="border px-4 py-2">
                                        @foreach($userGrades as $grade)
                                            <span class="inline-block relative tooltip"
                                                title="Opis: {{ $grade->grade }}"
                                                onmouseover="tooltip(this)"
                                            >
                                                {{ $grade->grade }}
                                            </span>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function tooltip(element) {
        var tooltipText = element.getAttribute('title');
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
