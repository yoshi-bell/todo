@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

<div class="todo__alert">
    @if(session('message'))
    <div class="todo__alert--success">
        {{ session('message') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="todo__alert--danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="todo__content">
    <div class="create-form__title">
        <h2>新規作成</h2>
    </div>
    <form class="create-form" action="/todos" method="post">
        @csrf
        <div class="create-form__item">
            <input class="create-form__item-input"
             type="text"
             name="content" />
            <input class="create-form__item-input--category" type="text" name="category" placeholder="カテゴリ" />
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>
    <div class="create-form__title">
        <h2>Todo検索</h2>
    </div>
    <form class="create-form" action="/categories" method="post">
        @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="content" />
            <input class="create-form__item-input--category" type="text" name="category" placeholder="カテゴリ" />
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">検索</button>
        </div>
    </form>


    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">Todo</th>
                <th class="todo-table__header">カテゴリ</th>
            </tr>
            <tr class="todo-table__row">
                <form class="update-form" action="/todos/update" method="post">
                    @method('PATCH')
                    @csrf
                    <td class="todo-table__item">
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text" name="content" value="test1" />
                            <input type="hidden" name="id" value="" />
                        </div>
                    </td>
                    <td class="todo-table__item">
                        <div class="update-form__item">
                            <input class="update-form__item-input--category" type="text" name="category" value="category1" />
                            <input type="hidden" name="id" value="" />
                        </div>
                    </td>
                    <td>
                        <div class=" update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </td>
                </form>
                <td class="todo-table__item">
                    <form class="delete-form" action="/todos/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="" />
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection