@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach



{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- @foreach(Auth::user()->unreadNotifications as $not)
 {{$not}}
<li>
    <a class="dropdown-item">a new rent has been created: {{$not->created_at}}</a>
</li>
@endforeach --}}

<p>Your rent expires at: </p>
@php
// auth()->user()->unreadNotifications->first()->data['expires']
// dump(auth()->user()->unreadNotifications->last()->data['expires']);
// print_r(auth()->user()->unreadNotifications->last()->first()->data['expires']);
// var_dump(auth()->user()->unreadNotifications->last()->data['expires']);

//print_r(auth()->user()->unreadNotifications->last()->data['expires']);
@endphp
<br>


{{-- @foreach(Auth::user()->unreadNotifications as $not)

<li>
    <a class="dropdown-item">Your rent expires: {{$not->data['expires']}}</a>
</li>
@endforeach --}}

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
'into your web browser:',
[
'actionText' => $actionText,
]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
