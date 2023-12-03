<x-app-layout>
<form action="{{ route('grades.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Grade Name">
    <textarea name="description" placeholder="Grade Description"></textarea>
    <button type="submit">Create Grade</button>
</form>
<a href="{{ route('grades.index') }}">Back</a>
</x-app-layout>