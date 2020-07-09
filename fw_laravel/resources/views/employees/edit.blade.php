@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-judul">Edit Data</h3>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('employees.update', $employees->id) }}" method="put" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $employees->name }}" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $employees->email }}" placeholder="Masukkan Email">
                            </div>                           
                            <div class="form-group">
                                <label class="form-label">Company</label>
                                <select class="form-control" name="companies_id">
                                    @foreach($companies as $item)
                                        <option value=""></option>
                                        <option value="{{ $item->id }}" {{ isset($employees) ? ($item->id == $employees->id ? 'selected' : '') : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="reset">
                                <button class="btn btn-primary btn-md">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection