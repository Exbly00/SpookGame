@extends('layouts.vue')

@section('title', 'SpookGame')

<script>
    const authUser = @json(auth()->user());
</script>

@section('app')
    @vite(['resources/js/app.js'])
@endsection
