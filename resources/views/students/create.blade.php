<x-app-layout>
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Student Name">
    <textarea name="description" placeholder="Student Description"></textarea>
    <button type="submit">Create Student</button>
</form>
<a href="{{ route('students.index') }}">Back</a>
</x-app-layout>