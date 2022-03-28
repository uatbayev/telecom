@extends('templates.system')
@section('title', 'Қосу')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Қосу</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Басты бет</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Қызмет</a></li>
                        <li class="breadcrumb-item active">Қосу</li>
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
                    <a href="{{ route('service.index') }}"><button type="button" class="btn btn-primary">Артқа</button></a>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="{{ route('service.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Қызмет түрлері</label>
                                    <select name="servicetype_id" class="form-control {{ $errors->has('servicetype_id') ? 'is-invalid':'' }}">
                                        <option value="0">Таңдаңыз</option>
                                        @foreach($servicetypes as $servicetype)
                                            <option value="{{ $servicetype->id }}" {{ old('servicetype_id')==$servicetype->id  ? 'selected':'' }}>{{ $servicetype->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('servicetype_id'))
                                        <span class="error invalid-feedback">{{ $errors->first('servicetype_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Аты</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                    @if($errors->has('name'))
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Сипаттамасы</label>
                                    <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="3" placeholder="">{{ old('description') }}</textarea>
                                    @if($errors->has('description'))
                                        <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Бағасы</label>
                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}">
                                    @if ($errors->has('price'))
                                        <span class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Қосу</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
