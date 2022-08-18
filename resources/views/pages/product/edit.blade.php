@extends('layouts.main')

@section('content')
    <div class="col-md-10">
        <div class="table-responsive w-3x">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', ['id' => $product->id]) }}" method="POST">
                @method('PUT')
                @csrf

                <table class="table table-striped table-sm">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Артикул</td>
                        <td>
                            <input type="text" name="article" value="{{ old('article', $product->article) }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Статус</td>
                        <td>
                            <select name="status" id="">
                                <option value="available" {{ old('status', $product->status) == 'available' ? 'selected' : '' }}>available</option>
                                <option value="unavailable" {{ old('status', $product->status) == 'unavailable' ? 'selected' : '' }}>unavailable</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Атрибуты</td>
                        <td>
                            <label for="data_color">Цвет</label>
                            <input type="text" id="data_color" name="data[color]" value="{{ old("data", $product->data)['color'] ?? '' }}">

                            <label for="data_size">Размер</label>
                            <input type="text" id="data_size" name="data[size]" value="{{ old("data", $product->data)['size'] ?? '' }}">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <button type="submit" class="btn btn-sm btn-outline-secondary">Сохранить</button>
            </form>
        </div>
    </div>

    <div class="col-md-2">
        <div>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0 ">

        </div>
    </div>
@endsection
