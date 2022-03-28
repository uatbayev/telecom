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
                        <li class="breadcrumb-item"><a href="{{ route('tvlist.index') }}">Каналдар тізімі</a></li>
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
                    <a href="{{ route('tvlist.index') }}"><button type="button" class="btn btn-primary">Артқа</button></a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="{{ route('tvlist.update', $tvlist) }}" method="post">

                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Аты</label>
                                    <input type="text" name="name" value="{{ $tvlist->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="title">
                                </div>
                                <button type="submit" class="btn btn-primary">Өзгерту</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
