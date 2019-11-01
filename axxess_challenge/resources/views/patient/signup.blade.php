
@extends('layouts.app')

@section('content')
    <form action="/signup" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label> Name </label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group col-md-2">
                <label> Age </label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="form-group col-md-4">
                <label> Phone </label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Sign up</button>
    </form>
@endsection