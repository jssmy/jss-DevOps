@section('title',  trans('gitscrum.welcome-to-gitScrum-step-1'))

@extends('layouts.master-fluid', ['hideNavbar' => true, 'bodyClass' => 'body-wizard-step1'])

@section('content')

<div class="authentication__left-screen white">

    <div class="aligner">
        @if($provider=='github')
            <div class="content-area">

                <div class="text-center">
                    <h4>Puedes importar tus repositorios a <strong>{{ Config::get('app.name') }}</strong></h4>
                    <h5>Tienes {{$repositories->count()}} proyectos en github</h5>
                </div>

                <form action="{{route('wizard.step2','github')}}" method="post">

                    {{ csrf_field() }}

                    <div class="content-middle gs-card">

                        <div class="gs-card-content">

                            @include('partials.boxes.repositories', ['list'=>$repositories, 'columns'=>$columns])

                        </div>

                    </div>

                    <div class="text-center">
                        <button class="btn btn-lg btn-success btn-loader">Añadir repositorios a <strong>{{ Config::get('app.name') }}</strong></button>
                    </div>

                </form>

            </div>
        @endif

        @if($provider=='trello')
            <div class="content-area">

                <div class="text-center">
                    <h4>Boards found</h4>
                    <h5>You have {{$boards->count()}} boards</h5>
                </div>

                <form action="{{route('wizard.step2','trello')}}" method="post">

                    {{ csrf_field() }}

                    <div class="content-middle gs-card">

                        <div class="gs-card-content">

                            @include('partials.boxes.boards', ['list'=>$boards, 'columns'=>$columns])

                        </div>

                    </div>

                    <div class="text-center">
                        <button class="btn btn-lg btn-success btn-loader">
                        confirm to add boards into the <strong>{{ Config::get('app.name') }}</strong></button>
                    </div>

                </form>

            </div>
        @endif
    </div>

</div>

<div style="background-image: url('/img/config/home.jpg');" class="authentication__right-screen">

    <div class="aligner">
        <div class="content">

            <h1>DevOps</h1>
            

        </div>
    </div>

</div>
@endsection
