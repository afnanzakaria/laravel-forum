@extends('layouts.app')

@section('content')


<div class="card">

  @include('partials.discussion-header')

    <div class="card-body">

    <div class="text-center">
        <strong>
            {{$discussion->title }}
        </strong>
        </div>


      <hr>

      {!! $discussion->content !!}

      @if($discussion->bestReply)

      <div class="card border-success my-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img width="40px" height="40px" style="border-radius: 50%" src="{{Gravatar::src($discussion->bestReply->owner->email)}}" alt="">
                    <strong>
                    {{$discussion->bestReply->owner->name}}
                    </strong>
                </div>

                <strong>
                    Best Reply
                    </strong>

            </div>
        </div>
        <div class="card-body">
        {!! $discussion->bestReply->content !!}
        </div>

      @endif

        </div>
    </div>

</div>

@foreach($discussion->replies()->paginate(3) as $reply)
<div class="card my-5">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div>
                <img width="40px" height="40px" style="border-radius: 50%" src="{{Gravatar::src($reply->owner->email)}}" alt="">
                <span>{{$reply->owner->name}}</span>

            </div>
            <div>
            @if(auth()->user()->id == $discussion->user_id)
                <form action="{{route('discussions.best-reply' , ['discussion' => $discussion->slug , 'reply'=> $reply->id] )}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary">Mark as best reply</button>
                </form>
            @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! $reply->content !!}
    </div>
</div>
@endforeach

{{$discussion->replies()->paginate(3)->links()}}

<div class="card my-5">
    <div class="card-header">
        Add Reply
    </div>
    <div class="card-body">

    @auth
    <form action=" {{route('replies.store' , $discussion->slug)}}" method="POST">

        @csrf
        <input id="content" type="hidden" name="content">
        <trix-editor input="content"></trix-editor>

        <button type="submit" class="btn btn-sm my-2 btn-success">Add reply</button>
    </form>

    @else

    <a href="{{route('login')}}" style="width: 100%; color: #fff " class="btn btn-primary">Log In Discussion</a>

    @endauth

    </div>
</div>

@endsection


@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
