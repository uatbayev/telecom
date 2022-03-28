@extends('templates.system')
@section('title', 'Просмотр')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Просмотр</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Просмотр</li>
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
                    <a href="{{ route('users.index') }}"><button type="button" class="btn btn-primary">Назад</button></a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p><strong>Фамилия: </strong> {{ $user->lastname }}</p>
                            <p><strong>Имя: </strong> {{ $user->firstname }}</p>
                            <p><strong>Отчество: </strong> {{ $user->patronymic }}</p>
                            <p><strong>Email: </strong> {{ $user->email }}</p>
                            <p><strong>Логин: </strong> {{ $user->login }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Телефон: </strong> {{ $user->tel }}</p>
                            <p><strong>Дата рождения: </strong> {{ $user->birthdate }}</p>
                            <p><strong>ИИН: </strong> {{ $user->iin }}</p>
                            <p><strong>Адрес постоянной прописки: </strong> {{ $user->registration_address }}</p>
                            <p><strong>Адрес временной регистрации: </strong> {{ $user->residential_address }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Пол: </strong> {{ $user->gender->name }}</p>
                            <p><strong>Национальность: </strong> {{ $user->nationality->name }}</p>
                            <p><strong>Роль: </strong> @foreach ($user->roles as $role)
                                    {{ $role->description }}
                                @endforeach</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>
@endsection
