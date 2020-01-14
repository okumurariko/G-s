@extends('layout')

@section('content')

    <div class="container mt-4">
        <div class="border p-4">

        @can('update', $text)
            <div class="mb-4 text-right">
                <a class="btn btn-primary" href="{{ route('texts.edit', ['text' => $text]) }}">
                    編集する
                </a>
                <form
                        style="display: inline-block;"
                        method="POST"
                        action="{{ route('texts.destroy', ['text' => $text]) }}"
                    >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger">削除する</button>
                </form>
            </div>
        @endcan
        
            
            <!-- 元の投稿を表示する -->

            <div class="user">
                投稿者 ： {{$text->user['name']}}
                </div>
                
            <h1 class="h5 mb-4">
                {{ $text->title }}
            </h1>
            <p class="mb-5">{!! nl2br(e($text->body)) !!}</p>

            <section>
            <!-- <h2 class="h5 mb-4">
                コメント
            </h2> -->

            <form class="mb-4" method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <input
                    name="text_id"
                    type="hidden"
                    value="{{ $text->id }}"
                >

                <div class="form-group">

                    
                    <input 
                        type="hidden"
                        id="user_id"
                        name="user_id"
                        value="{{ Auth::id() }}"
                        >
                        <!-- value="{{ old('user_id') }}" -->
                        @if ($errors->has('user_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('user_id') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="body">コメント文</label>
                    <textarea id="body"
                        name="body"
                        class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                        rows="4"
                    >{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <div class="invalid-feedback">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                    </div>

                    <div for="user_id">
                    ユーザー {{ Auth::user()->name }}
                    </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        コメントする
                    </button>
                </div>
            </form>

                @forelse($text->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>

                        <div class="user">
                        ユーザー ： {{$comment->user['name']}}
                        </div>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection
