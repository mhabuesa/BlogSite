@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Subscribers List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($subscribers as $sl=> $sub )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$sub->created_at->format('d-M-y')}}</td>
                                <td>{{$sub->email}}</td>
                                <td>
                                    <a href="{{route('subscribers.reply', $sub->id)}}" class="btn btn-{{$sub->status == 0?'dark':'primary'}}">{{$sub->status == 0?'Reply':'Replied'}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection