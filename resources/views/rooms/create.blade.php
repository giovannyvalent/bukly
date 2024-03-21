@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('rooms')}}">Quartos</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Registrar</li>
                </ol>
              </nav>
            <div class="card card-default-white">
                <div class="card-header card-hearder-default">
                    <h1><i class="fa fa-tag"></i> Registrar Quarto</h1>
                </div>
                <form action="{{route('room.store')}}" method="post" class="form-control">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="" class="">Quarto</label>
                          <input type="text" class="form-control" placeholder="Referência do quarto" name="name">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <div class="">
                                <label for="" class=""><strong>Hotel (vincule um hotel para o quarto)</strong></label>
                                @if($hotels->count() == 0)
                                    <p class="text warning">Registre um hotel para prosseguir!</p>   
                                    <a href="{{route('hotels')}}"> Registrar um hotel novo <i class="fa fa-link"></i> </a>
                                @endif
                                <select class="form-control" name="hotel_id" id="hotel_id">
                                    @foreach ($hotels as $hotel)
                                    <option value="{{$hotel->id}}">{{$hotel->name}}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <label for="">Descrição</label>
                        <div class="col">
                            <textarea name="description" id="description" cols="100" rows="10">  </textarea>
                          </div>
                    </div>

                    <div class="mt-4 mb-4">
                        <button class="btn btn-default col-3" type="submit">Registrar <i class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection