<x-app-layout>
    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $subject->name }}">
    <textarea name="description">{{ $subject->description }}</textarea>
    <button type="submit">Update Subject</button>
</form>
<a href="{{ route('subjects.index') }}">Back</a>
</x-app-layout>