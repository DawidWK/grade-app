<x-app-layout>
<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $student->name }}">
    <input type="email" name="email" value="{{ $student->email }}">
    <input type="text" name="class" value="{{ $student->class }}">
    <button type="submit">Update Student</button>
</form>
<a href="{{ route('students.index') }}">Back</a>
</x-app-layout>