@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                投稿の編集
            </h1>

            <form method="POST" action="{{ route('texts.update', ['text' => $text]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }} 

                <fieldset class="mb-4">

                    <div class="form-group">
                        <label for="user_id">
                        <!-- ユーザー  -->
                        </label>
                        <input 
                        type="hidden"
                        id="user_id"
                        name="user_id"
                        value="{{ Auth::id() ?: $text->Auth::id()}}"
                        >
                        <!-- value="{{ old('user_id') }}" -->
                        @if ($errors->has('user_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('user_id') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                    <div class="user">
                        ユーザー ： {{$text->user['name']}}
                        </div>
                        </br>
                        <label for="title">
                            タイトル
                        </label>
                        <input
                            id="title"
                            name="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') ?: $text->title }}"
                            type="text"
                        >
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="body">
                            本文
                        </label>

                        <textarea
                            id="body"
                            name="body"
                            class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                            rows="4"
                        >{{ old('body') ?: $text->body }}</textarea>
                        @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('texts.show', ['text' => $text]) }}">
                            キャンセル
                        </a>
                        <button type="submit" class="btn btn-primary">
                            更新する
                        </button>
                    </div>

                </fieldset>
            </form>
            
        </div>
    </div>
@endsection