@extends('layouts.blank')
@section('content')
    <div class="pt-6 space-y-4">
        <p class="text-lg font-semibold text-center">Click on the state below to start</p>
        <div class="flex flex-wrap justify-center gap-6 ">
            @foreach (auth()->user()->states as $state)
                <a href="{{ route('survey', $state->name) }}"
                    class="px-6 py-2 text-lg capitalize border rounded shadow-sm ">{{ $state->name . ' state' }}</a>
            @endforeach
        </div>
    </div>
@endsection
