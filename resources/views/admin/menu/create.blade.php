@extends('templates.system')
@section('title', 'Добавление')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Добавление</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <a href="{{ route('menu.index') }}"><button type="button" class="btn btn-primary">Назад</button></a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('menu.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title">
                                </div>
                                <div class="form-group">
                                    <label>Контент</label>
                                    <textarea name="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" rows="3" placeholder="">{{ old('content') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="parent">Родитель</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="0">Нет родителя</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ old('parent_id')==$menu->id  ? 'selected':'' }}>{{ $menu->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
