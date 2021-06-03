@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">

    <a href="{{route('discussions.create')}}" class="btn btn-success">Add Discussion</a>

    </div>
<div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                    <ul class="list-group">


                    @foreach($notifications as $notification)

                        <li class="list-group-item float-left">
                        @if($notification->type == 'App\Notifications\NewReplyAdded')

                        A new reply was added to your discussion

                        <strong>

                            {{ $notification->data['discussion']['title'] }}


                        </strong>


                        <a href="{{ route('discussions.show' ,$notification->data['discussion']['slug'] ) }}" class="btn btn-sm btn-info float-right">View</a>

                        @endif

                        @if($notification->type == 'App\Notifications\ReplyMarkAsBestReply')

                        Your reply in  <strong>{{ $notification->data['discussion']['title'] }}</strong>  was marked as best reply
                        <a href="{{ route('discussions.show' ,$notification->data['discussion']['slug'] ) }}" class="btn btn-sm btn-info float-right">View</a>

                        @endif


                        </li>
                    @endforeach

                    </ul>
                </div>
            </div>
@endsection

