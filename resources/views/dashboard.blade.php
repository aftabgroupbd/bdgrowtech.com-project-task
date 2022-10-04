@extends('master')
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Currency List </span> <a class="btn btn-primary btn-sm" href="{{route('currency.update')}}">Update Currency</a>
            </div>
            <div class="card-body">
                @if(Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Number Code</th>
                            <th scope="col">Char Code</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">value</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($currencies as $currency)
                                <tr>
                                    <th>{{$currency->id}}</th>
                                    <th>{{$currency->name}}</th>
                                    <th>{{$currency->num_code}}</th>
                                    <th>{{$currency->char_code}}</th>
                                    <th>{{$currency->nominal}}</th>
                                    <th>{{$currency->value}}</th>
                                </tr>
                            @empty
                                
                            @endforelse
                          
                        </tbody>
                      </table>
                      {{ $currencies->links('pagination::bootstrap-4') }}
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection