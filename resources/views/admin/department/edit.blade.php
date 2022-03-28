@extends('templates.system')
@section('title', 'Редактирование')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование</li>
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
                            <form action="{{ route('departments.update', $department) }}" method="post">

                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="">Вид департаментов</label>
                                    <select name="department_type_id" class="form-control">
                                        <option value="0">Выберите вид департамента</option>
                                        @foreach($department_types as $department_type)
                                            <option value="{{ $department_type->id }}" {{ $department->department_type_id==$department_type->id ? 'selected':'' }}>{{ $department_type->description }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department_type_id'))
                                        <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('department_type_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" value="{{ $department->title }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title">
                                </div>

                                <div class="form-group">
                                    <label for="title_short">Краткое название</label>
                                    <input type="text" name="title_short" value="{{ $department->title_short }}" class="form-control {{ $errors->has('title_short') ? 'is-invalid' : '' }}" id="title">
                                </div>

                                <div class="form-group">
                                    <label for="">Родитель</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">Нет родителей</option>
                                        @foreach($departments as $departmentall)
                                            <option value="{{ $departmentall->id }}" {{ $department->parent_id==$departmentall->id ? 'selected':'' }}>{{ $departmentall->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Отредактировать</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
