@extends('layouts.print')

@section('css-file', 'css/contrat.css')

@section('content')
    @foreach($inscriptions as $inscription)
	@include('print.contrat-content', $inscription)
    @endforeach
@endsection
