@extends('templates.front')
@section('title', 'Nur IT Telecom')
@section('content')

    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="register-box col-md-6">
                    <div class="register-logo">
                        <a href="{{route('home')}}"><b>Кіру</b></a>
                    </div>
                    @if(Session::has('info'))
                        <div class="alert alert-primary" role="alert">
                            {{ Session::get('info') }}
                        </div>
                    @endif
                    @if(Session::has('info-danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('info-danger') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body register-card-body">

                            <form action="{{route('auth.signin')}}" method="post">
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
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Мені есте сақтау</label>
                                </div>



                                <div class="row">
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Кіру</button>
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
