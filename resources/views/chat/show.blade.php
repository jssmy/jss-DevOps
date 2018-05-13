@section('title','Chat')

@extends('layouts.master')

@section('breadcrumb')
<div class="col-lg-4">
    <h3>Team</h3>
</div>
<div class="col-lg-8">
    <h3>Conversacion</h3>
</div>
@endsection



@section('content')
<style>
    .messages {
        overflow-y: auto;
        height: 400px;
    }

</style>
<div class="col-lg-4">
    <div class="">        
        @foreach($members as $member)
            <div class="well">
                <div class="member">
                    <img src="{{ $member->profile->image_24 }}"></img>
                    <p><b>{{ $member->profile->display_name }}</b></p>
                    <p>{{ $member->profile->real_name }}</p>
                </div>    
            </div>
        @endforeach
    </div>    
</div>

<div class="col-lg-8">
    <div class="messages">        
        @foreach($messages as $message)
            <div class="well">
                <div class="message">
                <p><b>{{ $message->user }}</b></p>
                <p>{{ $message->text }}</p>
                </div>    
            </div>
        @endforeach
    </div>
    <hr />
    <div class="send_message">
        <form action="http://127.0.0.1:8000/message/store" method="post">
            <input type="hidden" name="chat_id" value="{{ $chat_id }}">
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" name="text" type="text" autocomplete="off">
                    <span class="input-group-btn">
                        <button id="frm_notes_submit" class="btn btn-default btn-loader" type="submit">Enviar</button>
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var out = document.getElementById("messages");
    // allow 1px inaccuracy by adding 1
    var isScrolledToBottom = out.scrollHeight - out.clientHeight <= out.scrollTop + 1;

    if(isScrolledToBottom)
        out.scrollTop = out.scrollHeight - out.clientHeight;
</script>
@endsection