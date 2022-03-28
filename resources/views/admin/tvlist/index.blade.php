@extends('templates.system')
@section('title', 'Каналдар тізімі')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Каналдар тізімі</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Басты бет</a></li>
                        <li class="breadcrumb-item active">Каналдар тізімі</li>
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
                            <a href="{{ route('tvlist.create') }}" class="btn btn-primary">Қосу</a>
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
                                    <th>Аты</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tvlists as $k=>$tvlist)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $tvlist->name }}</td>
                                        <td>
{{--                                            <a href="{{ route('tvlist.show', $tvlist) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>--}}
                                            <a href="{{ route('tvlist.edit', $tvlist) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('tvlist.destroy', $tvlist) }}" method="post" style="display: contents">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
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
