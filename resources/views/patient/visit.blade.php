@extends('layouts.app')

@section('content')
    <form action="/visit" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label> Patient ID </label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="form-group col-md-2">
                <label> Visit Date </label>
                <input type="text" class="form-control" id="datepicker" name="visit_date">
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Submit</button>
    </form>
@endsection