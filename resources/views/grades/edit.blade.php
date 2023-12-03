<x-app-layout>
    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $grade->name }}">
    <textarea name="description">{{ $grade->description }}</textarea>
    <button type="submit">Update Grade</button>
</form>
<a href="{{ route('grades.index') }}">Back</a>
</x-app-layout>