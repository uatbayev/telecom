@extends('templates.system')
@section('title', 'Өзгерту')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Өзгерту</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Басты бет</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Пайдаланушылар</a></li>
                        <li class="breadcrumb-item active">Өзгерту</li>
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
                    <a href="{{ route('users.index') }}"><button type="button" class="btn btn-primary">Артқа</button></a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <div class="input-group">
                                        <input type="text" name="email" value="{{ $user->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" placeholder="m.uatbayev@edu.iitu.kz">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @if($errors->has('email'))
                                            <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Логин</label>
                                    <div class="input-group">
                                        <input type="text" name="login" value="{{ $user->login }}" class="form-control {{ $errors->has('login') ? 'is-invalid':'' }}" placeholder="m.uatbayev">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        @if($errors->has('login'))
                                            <span class="error invalid-feedback">{{ $errors->first('login') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Жөні</label>
                                    <div class="input-group">
                                        <input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control {{ $errors->has('lastname') ? 'is-invalid':'' }}">
                                        @if($errors->has('lastname'))
                                            <span class="error invalid-feedback">{{ $errors->first('lastname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Аты</label>
                                    <div class="input-group">
                                        <input type="text" name="firstname" value="{{ $user->firstname }}" class="form-control {{ $errors->has('firstname') ? 'is-invalid':'' }}">
                                        @if($errors->has('firstname'))
                                            <span class="error invalid-feedback">{{ $errors->first('firstname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Тегі</label>
                                    <div class="input-group">
                                        <input type="text" name="patronymic" value="{{ $user->patronymic }}" class="form-control {{ $errors->has('patronymic') ? 'is-invalid':'' }}">
                                        @if($errors->has('patronymic'))
                                            <span class="error invalid-feedback">{{ $errors->first('patronymic') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <div class="input-group">
                                        <input type="text" id="phone" name="tel" value="{{ $user->tel }}"  class="form-control {{ $errors->has('tel') ? 'is-invalid':'' }}">
                                        @if($errors->has('tel'))
                                            <span class="error invalid-feedback">{{ $errors->first('tel') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birthdate">Туған күні</label>
                                    <div class="input-group">
                                        <input type="date" id="birthdate" name="birthdate" value="{{ $user->birthdate }}"  class="form-control {{ $errors->has('birthdate') ? 'is-invalid':'' }}">
                                        @if($errors->has('birthdate'))
                                            <span class="error invalid-feedback">{{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="iin">ЖСН</label>
                                    <div class="input-group">
                                        <input type="text" id="iin" name="iin" value="{{ $user->iin }}"  class="form-control {{ $errors->has('iin') ? 'is-invalid':'' }}">
                                        @if($errors->has('iin'))
                                            <span class="error invalid-feedback">{{ $errors->first('iin') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="registration_address">Тұрақты тұрғылықты мекенжайы</label>
                                    <div class="input-group">
                                        <input type="text" id="registration_address" name="registration_address" value="{{ $user->registration_address }}"  class="form-control {{ $errors->has('registration_address') ? 'is-invalid':'' }}">
                                        @if($errors->has('registration_address'))
                                            <span class="error invalid-feedback">{{ $errors->first('registration_address') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="residential_address">Уақытша тіркеу мекенжайы</label>
                                    <div class="input-group">
                                        <input type="text" id="residential_address" name="residential_address" value="{{ $user->residential_address }}"  class="form-control {{ $errors->has('residential_address') ? 'is-invalid':'' }}">
                                        @if($errors->has('residential_address'))
                                            <span class="error invalid-feedback">{{ $errors->first('residential_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Жынысы</label>
                                    <select name="gender_id" class="form-control {{ $errors->has('gender_id') ? 'is-invalid':'' }}">
                                        <option value="0">Таңдаңыз</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}" {{ $user->gender_id==$gender->id ? 'selected':'' }}>{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('gender_id'))
                                        <span class="error invalid-feedback">{{ $errors->first('gender_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Ұлты</label>
                                    <select name="nationality_id" class="form-control {{ $errors->has('nationality_id') ? 'is-invalid':'' }}">
                                        <option value="0">Таңдаңыз</option>
                                        @foreach($nationalities as $nationality)
                                            <option value="{{ $nationality->id }}" {{ $user->nationality_id==$nationality->id ? 'selected':'' }}>{{ $nationality->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('nationality_id'))
                                        <span class="error invalid-feedback">{{ $errors->first('nationality_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Рөлі</label>
                                    <select name="role_id" class="form-control {{ $errors->has('role_id') ? 'is-invalid':'' }}">

                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"
                                            @foreach ($user->roles as $roleuser)
                                                {{ $roleuser->id==$role->id ? 'selected' : '' }}
                                                @endforeach
                                            >{{ $role->description }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role_id'))
                                        <span class="error invalid-feedback">{{ $errors->first('role_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Өзгерту</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
