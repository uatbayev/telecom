@extends('templates.system')
@section('title', 'Қызмет')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Қызмет</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Басты бет</a></li>
                        <li class="breadcrumb-item active">Қызмет</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('service.create') }}" class="btn btn-primary">Қосу</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(Session::has('info'))
                                <div class="alert alert-primary" role="alert">
                                    {{ Session::get('info') }}
                                </div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Қызмет түрі</th>
                                    <th>Аты</th>
                                    <th>Бағасы</th>
                                    <th>Қолданушы</th>
                                    <th>Уақыты</th>
                                    <th>Статусы</th>
                                    <th>Фукция</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user_services as $k=>$user_service)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $user_service->sttypename }}</td>
                                        <td>{{ $user_service->sttypename }}</td>
                                        <td>{{ $user_service->price }}</td>
                                        <td>{{ $user_service->user_name }} {{ $user_service->user_surname }} {{ $user_service->user_middlename }}
                                            <br>ЖСН: {{ $user_service->iin }}
                                        </td>
                                        <td><span class="badge bg-warning">{{ $user_service->sdate }}</span></td>
                                        <td><span class="badge bg-danger">{{ $user_service->stname }}</span></td>

                                        <td>
{{--                                        <a href="{{ route('tvlist.show', $tvlist) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>--}}
                                            <a href="{{ route('service_edit', $user_service->id) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
{{--                                            <form action="{{ route('service.destroy', $service) }}" method="post" style="display: contents">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
