<x-app-layout>
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Student Name">
    <input type="email" name="email" placeholder="Student Email">
    <input type="text" name="class" placeholder="Student Class">
    <button type="submit">Create Student</button>
</form>
<a href="{{ route('students.index') }}">Back</a>
</x-app-layout>