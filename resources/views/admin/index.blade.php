@extends('templates.system')
@section('title', 'Администратор')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Администратор беті</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Басты бет</a></li>
                        <li class="breadcrumb-item active">Администратор беті</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center mb-2">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('images/def_user.png')}}"
                                     alt="User profile picture">
                            </div>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Логин</b> <a class="float-right">{{Auth::user()->login}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Жөні</b> <a class="float-right">{{Auth::user()->lastname}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Аты</b> <a class="float-right">{{Auth::user()->firstname}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Тегі</b> <a class="float-right">{{Auth::user()->patronymic}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Телефон</b> <a class="float-right">{{Auth::user()->tel}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Туған күні</b> <a class="float-right">{{Auth::user()->birthdate}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>ЖСН</b> <a class="float-right">{{Auth::user()->iin}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Тұрақты тұрғылықты мекенжайы</b> <a
                                        class="float-right">{{Auth::user()->registration_address}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Уақытша тіркеу мекенжайы</b> <a
                                        class="float-right">{{Auth::user()->residential_address}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Жынысы</b> <a class="float-right">{{Auth::user()->gender->name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ұлты</b> <a class="float-right">{{Auth::user()->nationality->name}}</a>
                                </li>

                            </ul>


{{--                            <a href="#" type="button" data-toggle="modal" data-target="#modal_edit"--}}
{{--                               class="btn btn-primary btn-block"><b>Редактировать</b></a>--}}

{{--                            <a href="#" type="button" data-toggle="modal" data-target="#reset_password_modal"--}}
{{--                               class="btn btn-primary btn-block"><b>Сбросить пароль</b></a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
         id="modal_edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="p-4">
{{--                        <form action="{{route('auth.changeinfo')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input type="number" class="form-control" name="id" hidden value="{{Auth::user()->id}}">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="">Email</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" placeholder="m.uatbayev@edu.iitu.kz">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <div class="input-group-text">--}}
{{--                                            <span class="fas fa-user"></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @if($errors->has('email'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="">Логин</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" name="login" value="{{ Auth::user()->login }}" class="form-control {{ $errors->has('login') ? 'is-invalid':'' }}" placeholder="m.uatbayev">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <div class="input-group-text">--}}
{{--                                            <span class="fas fa-user"></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @if($errors->has('login'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('login') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div class="form-group">--}}
{{--                                <label for="">Фамилия</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" name="lastname" value="{{ Auth::user()->lastname }}" class="form-control {{ $errors->has('lastname') ? 'is-invalid':'' }}">--}}
{{--                                    @if($errors->has('lastname'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('lastname') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="">Имя</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" name="firstname" value="{{ Auth::user()->firstname }}" class="form-control {{ $errors->has('firstname') ? 'is-invalid':'' }}">--}}
{{--                                    @if($errors->has('firstname'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('firstname') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="">Отчество</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" name="patronymic" value="{{ Auth::user()->patronymic }}" class="form-control {{ $errors->has('patronymic') ? 'is-invalid':'' }}">--}}
{{--                                    @if($errors->has('patronymic'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('patronymic') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div class="form-group">--}}
{{--                                <label for="phone">Телефон</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" id="phone" name="tel" value="{{ Auth::user()->tel }}"  class="form-control {{ $errors->has('tel') ? 'is-invalid':'' }}">--}}
{{--                                    @if($errors->has('tel'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('tel') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}



{{--                            <div class="form-group">--}}
{{--                                <label for="birthdate">Дата рождения</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="date" id="birthdate" name="birthdate" value="{{ Auth::user()->birthdate }}"  class="form-control {{ $errors->has('birthdate') ? 'is-invalid':'' }}">--}}
{{--                                    @if($errors->has('birthdate'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('birthdate') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div class="form-group">--}}
{{--                                <label for="iin">ИИН</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" id="iin" name="iin" value="{{ Auth::user()->iin }}"  class="form-control {{ $errors->has('iin') ? 'is-invalid':'' }}">--}}
{{--                                    @if($errors->has('iin'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('iin') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div class="form-group">--}}
{{--                                <label for="registration_address">Адрес постоянной прописки</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" id="registration_address" name="registration_address" value="{{ Auth::user()->registration_address }}"  class="form-control {{ $errors->has('registration_address') ? 'is-invalid':'' }}">--}}
{{--                                    @if($errors->has('registration_address'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('registration_address') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="residential_address">Адрес временной регистрации</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" id="residential_address" name="residential_address" value="{{ Auth::user()->residential_address }}"  class="form-control {{ $errors->has('residential_address') ? 'is-invalid':'' }}">--}}
{{--                                    @if($errors->has('residential_address'))--}}
{{--                                        <span class="error invalid-feedback">{{ $errors->first('residential_address') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div class="form-group">--}}
{{--                                <label>Пол</label>--}}
{{--                                <select name="gender_id" class="form-control {{ $errors->has('gender_id') ? 'is-invalid':'' }}">--}}
{{--                                    <option value="0">Выберите пол</option>--}}
{{--                                    @foreach($genders as $gender)--}}
{{--                                        <option value="{{ $gender->id }}" {{ Auth::user()->gender_id==$gender->id ? 'selected':'' }}>{{ $gender->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                @if ($errors->has('gender_id'))--}}
{{--                                    <span class="error invalid-feedback">{{ $errors->first('gender_id') }}</span>--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label>Национальность</label>--}}
{{--                                <select name="nationality_id" class="form-control {{ $errors->has('nationality_id') ? 'is-invalid':'' }}">--}}
{{--                                    <option value="0">Выберите национальнальность</option>--}}
{{--                                    @foreach($nationalities as $nationality)--}}
{{--                                        <option value="{{ $nationality->id }}" {{ Auth::user()->nationality_id==$nationality->id ? 'selected':'' }}>{{ $nationality->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                @if ($errors->has('nationality_id'))--}}
{{--                                    <span class="error invalid-feedback">{{ $errors->first('nationality_id') }}</span>--}}
{{--                                @endif--}}
{{--                            </div>--}}


{{--                            <div class="row">--}}
{{--                                <div class="col-4">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-block">Изменить</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
