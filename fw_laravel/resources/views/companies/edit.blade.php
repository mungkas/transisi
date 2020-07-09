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

                        <form action="{{ route('companies.update', $companies->id) }}" method="put" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $companies->name }}" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $companies->email }}" placeholder="Masukkan Email">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('storage/'.$companies->logo) }}" alt="" title=""  style="width:200px;height:200px;"/>
                                <input type="file" name="logo" class="form-control" value="{{ $companies->logo }}" placeholder="Masukkan File Logo">
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