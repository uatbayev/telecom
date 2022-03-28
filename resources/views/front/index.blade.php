@extends('templates.front')
@section('title', 'Nur IT Telecom')
@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Nur IT Telecom </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Басты бет</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @if(Session::has('info'))
                        <div class="alert alert-primary" role="alert">
                            {{ Session::get('info') }}
                        </div>
                    @endif
                </div>
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">ЕҢ ЖЫЛДАМ ИНТЕРНЕТ</h2>
                        <p class="lead">Үйіңізге ең жылдам, сенімді, тиімді интернет орнатқыңыз келе ме? Осы интернет ULTRA қызметтер топтамасында қамтылған. Онымен көлемді файлдар, сүйікті ойындар лезде жүктеледі. Тіпті 4К видеоны онлайн үзбей көруге болады. 500 Мбит/с жылдамдық бүкіл отбасыңызға жетеді – WI-FI арқылы үйдегі бар кісі қосылса да, желі тұрақты болып қала бермек.</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('images/internet.jpg') }}" width="500" height="500" alt="">


                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading">БАРЫНША АЛУАН ТҮРЛІ ТЕЛЕВИДЕНИЕ</h2>
                        <p class="lead">Шытырманға толы фильмдер, ішек-сілең қататын комедиялар, ұйып көретін шоулар, балалардың ең сүйікті мультфильмдері… ULTRA қызметтер топтамасындағы 160 арнадан қалаған адамның талғамына сай контент табылады. Отбасымен күні бойы немесе сүйіктіңмен кешкісін көретін дүниелер міндетті түрде табылады</p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img src="{{ asset('images/tv.jpg') }}" width="450" height="500" alt="">

                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">ИНТЕРНЕТ+ТВ</h2>
                        <p class="lead">«Nur IT Telecom» ТВ+ тарифтік жоспарлары бойынша телевидение қызметтерін әдепкі қосу техникалық жағынан мүмкін болған жағдайда, телевидение топтамасына акциямен алпыс күнтізбелік күнге тегін негізде "tv+" фильмдер топтамасы және "АМЕДИАТЕКА"сериалдар топтамасы қосылады. Акциялық кезең аяқталғаннан кейін көрсетілген сервистерді тарифтеу ақылы негізде жүзеге асырылады. </p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('images/internet-tv.jpg') }}" width="500" height="500" alt="">

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
