<x-app-layout>
@foreach($subjects as $subject)
    <p>{{ $subject->name }}</p>
    <a href="{{ route('subjects.show', $subject->id) }}">Show Details</a>
    <a href="{{ route('subjects.edit', $subject->id) }}">Edit</a>
    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endforeach
<a href="{{ route('subjects.create') }}">Add</a>
</x-app-layout>
