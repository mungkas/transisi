@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Data Employees</h2>
            	</div>

                <div class="panel-body">
                    <p>Name :{{ $employees->name }}</p>
                    <p>Email :{{ $employees->email }}</p>
                    <p>Compay :{{ $employees->companies->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection