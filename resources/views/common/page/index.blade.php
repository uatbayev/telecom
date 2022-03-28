@extends('templates.front')
@section('title')
    {{$service_type->name}}
@endsection
@section('content')
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> {{$service_type->name}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Басты бет</a></li>
                        <li class="breadcrumb-item active">{{$service_type->name}}</li>
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
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                @foreach($services as $service)
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">{{$service->name}}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">Бағасы: {{ $service->price }}</h1>
                            <br>
                            {!! $service->description !!}
                            @if($service->servicetype_id==1 || $service->servicetype_id==3)
                            <button type="button" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#modal-xl">
                                Каналдар тізімі
                            </button>
                            @endif
                            @if(Auth::check())
                            @if(Auth::user()->isUser() || Auth::user()->isAdmin())
                                <a href="{{route('add_service', [Auth::user()->id, $service->id])}}" type="button" class="w-100 btn btn-lg btn-outline-primary">Қосу</a>
                            @endif
                            @endif

                        </div>
                    </div>
                </div>
                @endforeach
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
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Каналдар тізімі</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($tvlists as $tvlist)
                    <p>{{ $tvlist->name }}</p>
                    @endforeach
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Жабу</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
