<x-app-layout>
    <p>Oceny dla uzytkownika: {{ $user->name }} </p>
@foreach($grades as $grade)
    <p>Grade: {{ $grade->grade }}</p>
    <p>Subject: {{ $grade->subject->name }}</p>
@endforeach
</x-app-layout>
