@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Data Companies</h2>
            	</div>

                <div class="panel-body">
                    <p>Name :{{ $companies->name }}</p>
                    <p>Email :{{ $companies->email }}</p>
                    <img src="{{ asset('storage/'.$companies->logo) }}" alt="" title=""  style="width:400px;height:400px;"/>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection