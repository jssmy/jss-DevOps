@section('title','Crear proyecto')

@extends('layouts.modal')

@section('content')

    @include('partials.forms.product-backlog', ['route' => 'product_backlogs.store'])

@endsection
