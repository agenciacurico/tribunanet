@extends('layouts.tribunanet')

@section('title', 'TribunaNet')

@section('content')

<x-hero />

<div class="max-w-7xl mx-auto px-6 py-10">

    <x-home.live-game
        :liveGame="$liveGame"
    />

    <x-home.next-games
        :nextGames="$nextGames"
    />

    <x-home.finished-games
        :finishedGames="$finishedGames"
    />

</div>

@endsection