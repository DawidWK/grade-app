<x-app-layout>
<form action="{{ route('subjects.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Subject Name">
    <textarea name="description" placeholder="Subject Description"></textarea>
    <button type="submit">Create Subject</button>
</form>
<a href="{{ route('subjects.index') }}">Back</a>
</x-app-layout>