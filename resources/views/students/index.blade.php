<x-app-layout>
@foreach($students as $student)
    <p>{{ $student->name }}</p>
    <a href="{{ route('students.show', $student->id) }}">Show Details</a>
    <a href="{{ route('students.edit', $student->id) }}">Edit</a>
    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endforeach
<a href="{{ route('students.create') }}">Add</a>
</x-app-layout>
