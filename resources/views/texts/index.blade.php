@extends('layout')

@section('content')
    <div class="mb-4">
        <a href="{{ route('texts.create') }}" class="btn btn-primary">
            投稿を新規作成する
        </a>
    </div>

    <div class="container mt-4">
        @foreach ($texts as $text)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $text->title }}
                </div>                          
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($text->body, 200))) !!}
                    </p>
                    <a class="card-link" href="{{ route('texts.show', ['text' => $text]) }}">
                        続きを読む
                    </a>
                </div>
                <div class="card-footer">

                <div class="user">
                ユーザー {{$text->username}}
                
                    </div>

                    <span class="mr-2">
                        投稿日時 {{ $text->created_at->format('Y.m.d') }}
                    </span>

                    @if ($text->comments->count())
                        <a class="badge badge-primary" href="{{ route('texts.show', ['text' => $text]) }}">
                            コメント {{ $text->comments->count() }}件
                        </a>
                    @endif

                    <!-- <div class="badge badge-primary"> -->
                        <a class="badge badge-primary" href="{{ route('texts.show', ['text' => $text]) }}">
                            コメントする
                        </a>
                    <!-- </div> -->

                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mb-5">
    {{ $texts->links() }}
</div>
@endsection