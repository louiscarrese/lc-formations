@extends('layouts.master')

@section('title', 'Sessions')
@section('js-file', 'js/sessions-list.js')
@section('css-file', 'css/app.css')
@section('angularApp', 'sessionsListApp')

@section('content')
    @include('components.lists.sessions')



@endsection