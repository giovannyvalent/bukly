@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default-white">
                <div class="card-header card-hearder-default">
                <h1>Dashboard <i class="fa fa-bar-chart icon-default"></i></h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="card card-default">
                            <div class="card-body">
                              <h1 class="card-title">{{$hotels}}</h1>
                              <h1 class="card-title">Hotéis</h1>
                              <p class="card-text">Total de hotéis registrados no Bukly</p>
                              <a href="{{route('hotels')}}" class="btn btn-primary btn-default">Detalhar <i class="fa fa-external-link"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card card-default">
                            <div class="card-body">
                              <h1 class="card-title">{{$rooms}}</h1>
                              <h1 class="card-title">Quartos</h1>
                              <p class="card-text">Total de quartos registrados no Bukly</p>
                              <a href="{{route('rooms')}}" class="btn btn-primary btn-default">Detalhar <i class="fa fa-external-link"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
