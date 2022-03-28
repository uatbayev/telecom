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
                    <a href="{{ route('departments.index') }}"><button type="button" class="btn btn-primary">Назад</button></a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="{{ route('departments.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="department_type">Вид департамента</label>
                                    <select name="department_type_id" id="department_type" class="form-control">
                                        <option value="0">Выберите вид департамента</option>
                                        @foreach($department_types as $department_type)
                                            <option value="{{ $department_type->id }}" {{ old('department_type_id')==$department_type->id ? 'selected':'' }}>{{ $department_type->description }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department_type_id'))
                                        <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('department_type_id') }}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title">
                                </div>
                                <div class="form-group">
                                    <label for="title_short">Короткое название</label>
                                    <input type="text" name="title_short" value="{{ old('title_short') }}" class="form-control {{ $errors->has('title_short') ? 'is-invalid' : '' }}" id="title_short">
                                </div>

                                <div class="form-group">
                                    <label for="parent">Родитель</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">Нет родителя</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('parent_id')==$department->id  ? 'selected':'' }}>{{ $department->title }}</option>
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
