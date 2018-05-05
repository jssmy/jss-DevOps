@section('title','Proyecto'))

@extends('layouts.master')

@section('breadcrumb')
<div class="col-lg-6">
    <h3>Proyecto</h3>
</div>
<div class="col-lg-6 text-right">
    <a href="#" class="btn btn-sm btn-success">
        <i class="fa fa-slack" aria-hidden="true"></i> 
        Conversión
    </a> |
    <a href="#" class="btn btn-sm btn-danger">
        <i class="fa fa-trello" aria-hidden="true"></i> 
        Cronograma
    </a> |
    @include('partials.lnk-favorite', ['favorite' => $productBacklog->favorite, 'type' => 'product_backlogs',
        'id' => $productBacklog->id, 'btnSize' => 'btn-sm font-bold', 'text' =>'Marcar como favorito'])

    <a href="{{route('product_backlogs.edit', ['slug' => $productBacklog->slug])}}"
        class="btn btn-sm btn-primary"
        data-toggle="modal" data-target="#modalLarge">
        <i class="fa fa-pencil" aria-hidden="true"></i> Editar proyecto</a>


</div>
@endsection

@section('main-title')
<span>{{$productBacklog->title}}</span>
@endsection

@section('content')
<div class="col-lg-4">


    <hr />

    @include('partials.boxes.note', [ 'list' => $productBacklog, 'type'=> 'product_backlogs',
        'title' => 'Notes', 'percentage' => Helper::percentage($productBacklog, 'notes')])

    @include('partials.boxes.attachment', ['id'=>$productBacklog->id, 'type'=>'product_backlogs', 'list' => $productBacklog->attachments])

</div>

<div class="col-lg-8">

    <div class="well">
        <h6>Clona usando SSH o HTTPS</h6>
        <p><strong>SSH</strong>: {{$productBacklog->ssh_url}}</p>
        <p><strong>HTTPS</strong>: {{$productBacklog->clone_url}}</p>
    </div>

    @if(!empty($productBacklog->description))
    <p class="description">
        <small>Descripción</small>
        <span>{!! nl2br(e($productBacklog->description)) !!}</span>
    </p>
    @endif

    <div class="tabs-container">
        <ul class="nav nav-tabs">
           
            <li class=""><a data-toggle="tab" href="#tab-comments">Comentarios
                    ({{$productBacklog->comments->count
            ()}})</a></li>
            
        </ul>
        <div class="tab-content">
         
            <div id="tab-comments" class="tab-pane">
                <div class="panel-body">
                    @include('partials.forms.comment', ['id'=>$productBacklog->id, 'type'=>'product_backlogs'])
                    @each('partials.lists.comments', $productBacklog->comments, 'comment', 'partials.lists.no-items')
                </div>
            </div>
            
        </div>


    </div>

</div>
@endsection
