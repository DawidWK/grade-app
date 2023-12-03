<x-app-layout>
@foreach($grades as $grade)
    <p>Grade: {{ $grade->grade }}</p>
    <a href="{{ route('grades.show', $grade->id) }}">Show Details</a>
    <a href="{{ route('grades.edit', $grade->id) }}">Edit</a>
    <form action="{{ route('grades.destroy', $grade->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endforeach
<a href="{{ route('grades.create') }}">Add</a>
</x-app-layout>
