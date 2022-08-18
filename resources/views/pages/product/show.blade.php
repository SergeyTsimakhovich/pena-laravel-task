@extends('layouts.main')

@section('content')
    <div class="col-md-10">
        <div class="table-responsive w-3x">
            <table class="table table-striped table-sm">
                <thead>
                </thead>
                <tbody>
                <tr>
                    <td>Артикул</td>
                    <td>{{$product->article}}</td>
                </tr>
                <tr>
                    <td>Название</td>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <td>Статус</td>
                    <td>{{$product->status}}</td>
                </tr>
                <tr>
                    <td>Атрибуты</td>
                    <td>
                        <span>Цвет: {{ $product->data['color'] ?? '-' }}</span>
                        <br>
                        <span>Размер: {{ $product->data['size'] ?? '-' }}</span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-2">
        <div>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0 ">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Изменить</button>
            </div>
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Удалить</button>
            </div>
        </div>
    </div>
@endsection
