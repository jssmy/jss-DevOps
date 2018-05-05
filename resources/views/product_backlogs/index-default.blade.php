@section('title','Proyectos')

@extends('layouts.master')

@section('breadcrumb')
<div class="col-lg-6">
    <h3>Proyectos</h3>
</div>
<div class="col-lg-6 text-right">
    <a href="{{route('product_backlogs.create')}}" class="btn btn-sm btn-primary"
        data-toggle="modal" data-target="#modalLarge">Crear nuevo proyecto</a>
</div>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="gs-card">

        <h4 class="gs-card-title">
            Lista de proyectos agregados

        </h4>

        <div class="gs-card-content">
            @include('partials.boxes.product-backlog', [ 'list' => $backlogs->sortByDesc('favorite') ])
        </div>

    </div>
</div>

{{$backlogs->setPath('')->links()}}

@endsection
