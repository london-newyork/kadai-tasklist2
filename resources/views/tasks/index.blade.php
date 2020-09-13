@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{-- <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                         <!--h3 class="card-title">{{ Auth::user()->name }}</h3-->
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </aside>
        </div> --}}
        
        <h1>タスク一覧</h1>
    
        @if (count($tasks) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>ステータス</th>
                        <th>メッセージ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        {{-- タスク詳細ページへのリンク --}}
                        <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->content }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-sm-8">
                    {{-- 投稿フォーム --}}
                    {{-- @include('tasks.form')  --}}
                    {{-- 投稿一覧 --}}
                    @include('tasks.tasks')
            </div>
           @endif
        {{-- タスク作成ページへのリンク --}}
        {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Tasklist</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif        
@endsection