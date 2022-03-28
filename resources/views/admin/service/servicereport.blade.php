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
                        <!-- /.card-header -->
                        <form action="">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Статус</label>
                                <select name="servicetype_id" class="form-control">
                                    <option value="">Барлығы</option>
                                    @foreach($servicetypes as $servicetype)
                                        <option value="{{ $servicetype->id }}" {{ old('servicetype_id',$servicetype_id)==$servicetype->id  ? 'selected':'' }}>{{ $servicetype->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Іздеу</button>
                        </div>
                        </form>
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
                                </tr>
                                </thead>
                                <tbody>
                                @php $sum=0; @endphp

                                @foreach($user_services as $k=>$user_service)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $user_service->sttypename }}</td>
                                        <td>{{ $user_service->sttypename }}</td>
                                        <td>{{ $user_service->price }} т.</td>
                                        <td>{{ $user_service->user_name }} {{ $user_service->user_surname }} {{ $user_service->user_middlename }}
                                            <br>ЖСН: {{ $user_service->iin }}
                                        </td>
                                        <td><span class="badge bg-warning">{{ $user_service->sdate }}</span></td>
                                        <td><span class="badge bg-danger">{{ $user_service->stname }}</span></td>
                                    </tr>
                                    @php $sum=$sum+($user_service->price) @endphp
                                @endforeach
                                <tr>
                                    <td colspan="3"><p class="text-primary text-center text-bold">ЖИЫН (пайда)</p></td>
                                    <td><span class="badge bg-primary">@php echo $sum; @endphp т.</span></td>
                                    <td colspan="3"></td>
                                </tr>
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
