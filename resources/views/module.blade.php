@extends('layouts.master')

@section('title', 'Module')
@section('js-file', '/js/modules-detail.js')
@section('css-file', '/css/app.css')
@section('angularApp', 'modulesDetailApp')

@section('content')
    @include('components.modules.moduledetail')



@endsection