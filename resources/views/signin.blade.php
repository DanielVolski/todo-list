@extends('layouts.base')

@section('title', 'Sign In')

@section('body')
    <form action="{{ route('signin') }}" method="post">
        @csrf

        <label for="email"></label>
        <input type="email" name="email">

        <label for="password"></label>
        <input type="password" name="password">

        <button type="submit"></button>
    </form>
@endsection