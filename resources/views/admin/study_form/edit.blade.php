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
                    <a href="{{ route('study_forms.index') }}"><button type="button" class="btn btn-primary">Назад</button></a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="{{ route('study_forms.update', $study_form) }}" method="post">

                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="description">Название</label>
                                    <input type="text" name="description" value="{{ $study_form->description }}" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="title">
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
