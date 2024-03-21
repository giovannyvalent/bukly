@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h1>Hotéis</h1>
                <hr class="mt-2 line">
            </div>                
            <div class="row mt-4 col-3">
                <a class="btn btn-default-orange" href="{{route('hotel.create')}}"><i class="fa fa-plus"></i> Registrar hotel</a>
            </div>
            <div class="row mt-4 card-default">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Site</th>
                        <th scope="col">Quartos</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>

                    {{-- Condition verify exists row --}}
                    @if(isset($hotels) and count($hotels)) 
                    <tbody class="table-group-divider">
                        @foreach ($hotels as $hotel)
                        <tr>
                            <th scope="row">{{$hotel->id}}</th>
                            <td>{{$hotel->name}}</td>
                            <td>{{$hotel->address}}</td>
                            <td>{{$hotel->city ." - ". $hotel->state}}</td>
                            <td>{{$hotel->website}}</td>
                            <td>
                                <a href="{{route('rooms')}}">
                                    {{$hotel->rooms->count()}} <i class="fa fa-external-link"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-default" href="{{route('hotel.edit', ['id' => $hotel->id])}}">
                                    <i class="fa fa-eye"></i> Editar
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-default" href="{{route('hotel.destroy', ['id' => $hotel->id])}}">
                                    <i class="fa fa-trash"></i> Deletar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                  </table>

                  {{-- Condition verify exists row --}}
                  @if (count($hotels) < 1)
                    <div class="row mt-2">
                        <center>
                            <p>Não há dados</p>
                        </center>
                    </div>
                  @endif
            </div>
        </div>
    </div>
</div>
@endsection