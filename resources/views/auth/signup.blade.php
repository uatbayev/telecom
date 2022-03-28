@extends('templates.front')
@section('title', 'Nur IT Telecom')
@section('content')

    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="register-box col-md-6">
                    <div class="register-logo">
                        <a href="{{route('home')}}"><b>Тіркелу</b></a>
                    </div>
                    @if(Session::has('info'))
                        <div class="alert alert-primary" role="alert">
                            {{ Session::get('info') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body register-card-body">

                            <form action="{{route('auth.signup')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <div class="input-group">
                                        <input type="text" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" placeholder="m.nurymbetov@auezov.edu.kz">
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
                                    <label for="">Құпия сөз</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" placeholder="">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @if($errors->has('password'))
                                            <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="">Құпия сөзді қайталаңыз</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid':'' }}" placeholder="">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        @if($errors->has('password_confirmation'))
                                            <span class="error invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="">Логин</label>
                                    <div class="input-group">
                                        <input type="text" name="login" value="{{ old('login') }}" class="form-control {{ $errors->has('login') ? 'is-invalid':'' }}" placeholder="m.nurymbetov">
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
                                        <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control {{ $errors->has('lastname') ? 'is-invalid':'' }}">
                                        @if($errors->has('lastname'))
                                            <span class="error invalid-feedback">{{ $errors->first('lastname') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Аты</label>
                                    <div class="input-group">
                                        <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control {{ $errors->has('firstname') ? 'is-invalid':'' }}">
                                        @if($errors->has('firstname'))
                                            <span class="error invalid-feedback">{{ $errors->first('firstname') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Тегі</label>
                                    <div class="input-group">
                                        <input type="text" name="patronymic" value="{{ old('patronymic') }}" class="form-control {{ $errors->has('patronymic') ? 'is-invalid':'' }}">
                                        @if($errors->has('patronymic'))
                                            <span class="error invalid-feedback">{{ $errors->first('patronymic') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <div class="input-group">
                                        <input type="text" id="phone" name="tel" value="{{ old('tel') }}"  class="form-control {{ $errors->has('tel') ? 'is-invalid':'' }}">
                                        @if($errors->has('tel'))
                                            <span class="error invalid-feedback">{{ $errors->first('tel') }}</span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="birthdate">Туған күні</label>
                                    <div class="input-group">
                                        <input type="date" id="birthdate" name="birthdate" value="{{ old('birthdate') }}"  class="form-control {{ $errors->has('birthdate') ? 'is-invalid':'' }}">
                                        @if($errors->has('birthdate'))
                                            <span class="error invalid-feedback">{{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="iin">ЖСН</label>
                                    <div class="input-group">
                                        <input type="text" id="iin" name="iin" value="{{ old('iin') }}"  class="form-control {{ $errors->has('iin') ? 'is-invalid':'' }}">
                                        @if($errors->has('iin'))
                                            <span class="error invalid-feedback">{{ $errors->first('iin') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="registration_address">Тұрақты тұрғылықты мекенжайы</label>
                                    <div class="input-group">
                                        <input type="text" id="registration_address" name="registration_address" value="{{ old('registration_address') }}"  class="form-control {{ $errors->has('registration_address') ? 'is-invalid':'' }}">
                                        @if($errors->has('registration_address'))
                                            <span class="error invalid-feedback">{{ $errors->first('registration_address') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="residential_address">Уақытша тіркеу мекенжайы</label>
                                    <div class="input-group">
                                        <input type="text" id="residential_address" name="residential_address" value="{{ old('residential_address') }}"  class="form-control {{ $errors->has('residential_address') ? 'is-invalid':'' }}">
                                        @if($errors->has('residential_address'))
                                            <span class="error invalid-feedback">{{ $errors->first('residential_address') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Жынысы</label>
                                    <select name="gender_id" class="form-control {{ $errors->has('gender_id') ? 'is-invalid':'' }}">
                                        <option value="0">Таңдаңыз</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}" {{ old('gender_id')==$gender->id ? 'selected':'' }}>{{ $gender->name }}</option>
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
                                            <option value="{{ $nationality->id }}" {{ old('nationality_id')==$nationality->id ? 'selected':'' }}>{{ $nationality->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('nationality_id'))
                                        <span class="error invalid-feedback">{{ $errors->first('nationality_id') }}</span>
                                    @endif
                                </div>


                                <div class="row">
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Қосу</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
