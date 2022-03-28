@extends('templates.front')
@section('title')
    Менің жазбаларым
@endsection
@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Менің жазбаларым</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Басты бет</a></li>
                        <li class="breadcrumb-item active">Менің жазбаларым</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="col-lg-6">
                @if(Session::has('info'))
                    <div class="alert alert-primary" role="alert">
                        {{ Session::get('info') }}
                    </div>
                @endif
            </div>
            <div class="row text-center">

                    <div class="col">
                        <div class="card mb-12rounded-3 shadow-sm">
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Қызмет түрі</th>
                                        <th>Қызмет аты</th>
                                        <th>Бағасы</th>
                                        <th style="width: 40px">Статусы</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user_services as $k=>$user_service)
                                    <tr>
                                        <td>{{$k+1}}.</td>
                                        <td>{{$user_service->sttypename}}</td>
                                        <td>{{$user_service->sname}}</td>
                                        <td>{{$user_service->price}}</td>
                                        <td><span class="badge bg-danger">{{$user_service->stname}}</span></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                {{--                <div class="col">--}}
                {{--                    <div class="card mb-4 rounded-3 shadow-sm">--}}
                {{--                        <div class="card-header py-3">--}}
                {{--                            <h4 class="my-0 fw-normal">Pro</h4>--}}
                {{--                        </div>--}}
                {{--                        <div class="card-body">--}}
                {{--                            <h1 class="card-title pricing-card-title">$15<small class="text-muted fw-light">/mo</small></h1>--}}
                {{--                            <ul class="list-unstyled mt-3 mb-4">--}}
                {{--                                <li>20 users included</li>--}}
                {{--                                <li>10 GB of storage</li>--}}
                {{--                                <li>Priority email support</li>--}}
                {{--                                <li>Help center access</li>--}}
                {{--                            </ul>--}}
                {{--                            <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col">--}}
                {{--                    <div class="card mb-4 rounded-3 shadow-sm border-primary">--}}
                {{--                        <div class="card-header py-3 text-white bg-primary border-primary">--}}
                {{--                            <h4 class="my-0 fw-normal">Enterprise</h4>--}}
                {{--                        </div>--}}
                {{--                        <div class="card-body">--}}
                {{--                            <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>--}}
                {{--                            <ul class="list-unstyled mt-3 mb-4">--}}
                {{--                                <li>30 users included</li>--}}
                {{--                                <li>15 GB of storage</li>--}}
                {{--                                <li>Phone and email support</li>--}}
                {{--                                <li>Help center access</li>--}}
                {{--                            </ul>--}}
                {{--                            <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>

        </div>
    </div>
@endsection
