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
    <select name="student_id">
        @foreach($students as $student)
            <option value="{{ $student->id }}" @if($student->id === $grade->student_id) selected @endif>{{ $student->name }}</option>
        @endforeach
    </select>
    <button type="submit">Update Grade</button>
</form>
<a href="{{ route('grades.index') }}">Back</a>
</x-app-layout>