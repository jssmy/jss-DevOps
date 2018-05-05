@section('title','Coversacion')

@extends('layouts.modal')

@section('content')

    @include('partials.forms.chat', ['route' => 'chat.store'])

@endsection