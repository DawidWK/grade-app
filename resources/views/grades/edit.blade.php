<x-app-layout>
<form action="{{ route('grades.update', $grade->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="number" name="grade" value="{{ $grade->grade }}">
    <select name="subject_id">
        @foreach($subjects as $subject)
            <option value="{{ $subject->id }}" @if($subject->id === $grade->subject_id) selected @endif>{{ $subject->name }}</option>
        @endforeach
    </select>
    <select name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}" @if($user->id === $grade->user_id) selected @endif>{{ $user->name }}</option>
        @endforeach
    </select>
    <button type="submit">Update Grade</button>
</form>
<a href="{{ route('grades.index') }}">Back</a>
</x-app-layout>