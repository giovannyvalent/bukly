@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h1>Quartos</h1>
                <hr class="mt-2 line">
            </div>
            <div class="row mt-4 col-3">
                <a class="btn btn-default-orange" href="{{route('room.create')}}"><i class="fa fa-plus"></i> Registrar quarto</a>
            </div>
            <div class="row mt-4 card-default">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Quarto</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>

                    {{-- Condition verify exists row --}}
                    @if(isset($rooms) and count($rooms)) 
                    <tbody class="table-group-divider">
                        @foreach ($rooms as $room)
                        <tr>
                            <th scope="row">{{$room->id}}</th>
                            <td>{{$room->name}}</td>
                            <td>
                                <a href="{{route('hotel.edit', ['id' => $room->hotel->id])}}">
                                    <i class="fa fa-external-link"></i> {{$room->hotel->name}}
                                </a>
                            </td>
                            <td><i class="fa fa-location-arrow"></i> {{$room->hotel->city ." - ". $room->hotel->state}}</td>
                            <td>{{Str::limit($room->description, 30)}}</td>
                            <td>
                                <a class="btn btn-default" href="{{route('room.edit', ['id' => $room->id])}}">
                                    <i class="fa fa-eye"></i> Detalhes
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-default" href="{{route('room.destroy', ['id' => $room->id])}}">
                                    <i class="fa fa-trash"></i> Deletar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                  </table>

                  {{-- Condition verify exists row --}}
                  @if (count($rooms) < 1)
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