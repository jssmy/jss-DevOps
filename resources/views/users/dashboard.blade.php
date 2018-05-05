@section('title','Dashboard')

@extends('layouts.master', ['bodyClass' => 'body-dashboard'])

@section('breadcrumb')

<div class="col-lg-6">
    <h3>Dashboard</h3>
</div>

<div class="col-lg-6 text-right">
    <div class="btn-group">
        <a href="{{route('wizard.step1','github')}}" class="btn btn-sm btn-primary">
            Actualizar repositorios</a>
    </div>
</div>

@endsection

@section('content')

<div class="gs-card">

    <div class="gs-card-content-title">

    </div>

    
    <div class="col-lg-4 border-right border-left">

        <div class="gs-card-content-title">
            <h5>Proyectos terminados
                <small>vs. total de proyectos</small></h5>
            <h6>20 <small>/32</small></h6>
        </div>

    </div>

    <div class="col-lg-4">

        <div class="gs-card-content-title">
            <h5>Tiempo promedio por proyecto
            
            <h6 class="low">45 días</h6>
        </div>

    </div>

</div>



<div class="col-lg-3 gs-card flat">

    <div class="shortcuts">
        <h4 class="gs-card-title">Accesos rápidos</h4>
        <div class="gs-card-content">
            <a href="{{route('issues.index',['slug' => 0])}}">Actividades Programadas</a>
                
        </div>
    </div>


    @include('partials.boxes.note', [ 'list' => $user,
        'type'=> 'users', 'title' =>'Notas',
        'percentage' => Helper::percentage($user, 'notes')])
</div>


<div class="col-lg-9 gs-card flat">
   

    <div>
        <div class="activities">
            <h4 class="gs-card-title">Actividades recientes</h4>
            <div class="gs-card-content">
                @each('partials.lists.activities-complete', $user->activities(null, 7), 'activity', 'partials.lists.no-items')
            </div>
        </div>
    </div>

</div>

@endsection
