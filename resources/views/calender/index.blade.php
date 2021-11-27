@extends('layouts.app')
@section('', '')

@section('content')
    <div class="">
        <h1>カレンダー</h1>
        {{ $cal[01]['day'] }}
        {{ $cal[02]['day'] }}
        {{ $cal[03]['day'] }}
        {{ $cal[04]['day'] }}
    </div>
@endsection
