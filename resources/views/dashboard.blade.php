@extends('layouts.master')
@section('title')Запись@endsection
@section('content')
    @include('includes.message-block')
    <header><h3>Комментарии</h3></header>
    <section class="row posts" style="height:650px;width: 900px; overflow-y:scroll;">
        <div class="col-md-12">
            @foreach($posts as $post)
                <article class="post" data-postid="{{ $post->id }}">
                        <h2>{{ $post->body }}</h2>
                        <img height="50px" src="{{ route('account.image', ['filename' =>  $post->user->first_name . '-' .  $post->user->id . '.jpg']) }}" alt="" class="rounded">
                        <div class="info" style="color: yellow;">
                            Последнее изменение от {{$post->user->first_name}}: {{ $post->created_at }}
                        </div>
                        <div class="interaction">
                            <a href="#" class="btn btn-info like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You Like this post' : 'Like' : 'Like' }}</a>
                            <a href="#" class="btn btn-info like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike' }}</a>
                            @if(Auth::user() == $post->user)
                                <a href="#" class="btn btn-danger edit">Редактировать</a>
                                <a class="btn btn-danger" href="{{ route('post.delete',['post_id' => $post->id]) }}">Удалить</a>
                            @endif
                            <p id="likes">Понравилось <span class="border rounded text-white">{{ DB::table('likes')->where('post_id', $post->id)->sum('like') }}</span></p>
                        </div>
                </article>
            @endforeach
        </div>
    </section>
<br/>
    <div class="col-md-9">
        {{--<header><h3>Что говорят?</h3></header>--}}
        <form action="{{ route('post.create') }}" method="post">
            <div class="form-group">
                <textarea class="form-control" name="body" id="new-post" rows="2" placeholder="Ваша запись..."></textarea>
                <button type="submit" class="btn btn-success">Создать запись</button>
            </div>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-content="modal" aria-label="Close"></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit') }}';
        var urlLike = '{{ route('like') }}';
    </script>
@endsection
