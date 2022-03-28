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
                        <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">Группы</a></li>
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
                    <a href="{{ route('groups.index') }}"><button type="button" class="btn btn-primary">Назад</button></a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('groups.update', $group) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label for="">Кафедра</label>
                                    <select name="department_id" class="form-control">
                                        <option value="0">Выберите кафедру</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ $group->department_id==$department->id ? 'selected':'' }}>{{ $department->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department_id'))
                                        <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $errors->first('department_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Название группы</label>
                                    <input type="text" name="name" value="{{ $group->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name">
                                </div>
                                <button type="submit" class="btn btn-primary">Изменить</button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
