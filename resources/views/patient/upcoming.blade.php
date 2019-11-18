
@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Phone</th>
            <th scope="col">Start Date</th>
            <th scope="col">Deadline</th>
            <th scope="col">Expired Date </th>
            <th scope="col">Remaining Day </th>
        </tr>
        </thead>
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <th scope="row"> {{ $patient->id }} </th>
                <td> {{ $patient->name }} </td>
                <td> {{ $patient->age }} </td>
                <td> {{ $patient->phone }} </td>
                <td> {{ date('m-d-Y', strtotime($patient->start_date)) }} </td>
                <td> {{ $deadline =  date('m-d-Y', strtotime($patient->deadline)) }} </td>
                <td> {{ $expiredDate = date('m-d-Y', strtotime(' + 30 days')) }} </td>
                <td> {{ $patient->remaining }}  </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
