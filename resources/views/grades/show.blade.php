<x-app-layout>
<h1>Grade: {{ $grade->grade }}</h1>
<p>Subject: {{ $grade->subject->name }}</p>
<p>Student: {{ $grade->student->name }}</p>

</x-app-layout>