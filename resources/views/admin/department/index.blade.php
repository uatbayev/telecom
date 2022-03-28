@extends('templates.system')
@section('title', 'Департаменты')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Департаменты</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Департаменты</li>
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
                            <a href="{{ route('departments.create') }}" class="btn btn-primary">Добавить</a>
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
                                    <th>Вид департамента</th>
                                    <th>Название</th>
                                    <th>Короткое название</th>
                                    <th>Родитель</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $k=>$department)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $department->department_type->description }}</td>
                                        <td>{{ $department->title }}</td>
                                        <td>{{ $department->title_short }}</td>
                                        @if($department->parent_id==null)
                                            <td>{{ 'Нет родителей' }}</td>
                                        @else
                                            <td>{{ $department->parent->title }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('departments.show', $department) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('departments.edit', $department) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('departments.destroy', $department) }}" method="post" style="display: contents">
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
