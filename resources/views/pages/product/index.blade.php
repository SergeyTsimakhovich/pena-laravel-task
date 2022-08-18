@extends('layouts.main')

@section('content')
    <div class="col-md-10">
        <div class="table-responsive w-3x">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Артикул</th>
                    <th>Название</th>
                    <th>Статус</th>
                    <th>Атрибуты</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->article }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <span>Цвет: {{ $product->data['color'] ?? '' }}</span>
                            <br>
                            <span>Размер: {{ $product->data['size'] ?? '' }}</span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('products.show', ['id' => $product->id]) }}">Перейти</a>

                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('products.edit', ['id' => $product->id]) }}">Изменить</a>

                            <form action="{{ route('products.destroy') }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-sm btn-outline-secondary">Удалить</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-2">
        <div>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0 ">
            <div class="btn-group mr-2">
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
            </div>
        </div>
    </div>
@endsection
