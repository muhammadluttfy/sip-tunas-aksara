@component('mail::message')
    # Introduction

    The body of your message.
    {{-- get latest data student register --}}
    @component('mail::button', ['url' => 'http://localhost:8000/student/' . $student->id])
        View Student
    @endcomponent

    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks, {{ $student->no_identitas }}<br>
    {{ config('app.name') }}
@endcomponent
