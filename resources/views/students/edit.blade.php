<x-app-layout>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $student->name }}">
    <textarea name="description">{{ $student->description }}</textarea>
    <button type="submit">Update Student</button>
</form>
<a href="{{ route('students.index') }}">Back</a>
</x-app-layout>