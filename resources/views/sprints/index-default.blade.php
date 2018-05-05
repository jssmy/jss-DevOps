@section('title','Cronogramas')

@extends('layouts.master')

@section('breadcrumb')
<div class="col-lg-6">
    <h3>Cronogramas</h3>
</div>
<div class="col-lg-6 text-right">
    <div class="btn-group">
        <a href="{{route('sprints.index', ['mode'=>'calendar'])}}" class="btn btn-sm btn-primary">
            Modo calendario</a>
        <a href="{{route('sprints.create')}}"
            class="btn btn-sm btn-success"
            data-toggle="modal" data-target="#modalLarge">Crear nuevo cronograma</a>
    </div>
</div>
@endsection

@section('content')

<div class="col-lg-12">
    <div class="gs-card">

        <h4 class="gs-card-title">
            Lista de cronogramas
        </h4>

        <div class="gs-card-content">
            @include('partials.boxes.sprint', [ 'list' => $sprints ])
        </div>
    </div>
</div>

@endsection
