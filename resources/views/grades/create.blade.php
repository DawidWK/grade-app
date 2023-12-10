<x-app-layout>
<form action="{{ route('grades.store') }}" method="POST">
    @csrf
    <input type="number" name="grade" placeholder="Grade">
    <select name="subject_id">
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>
    <select name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <button type="submit">Create Grade</button>
</form>

</x-app-layout>