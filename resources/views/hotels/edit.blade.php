@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('hotels')}}">Hotéis</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
              </nav>
            <div class="card card-default-white">
                <div class="card-header card-hearder-default">
                    <h1>Editar Hotel {{ $hotel->name }}</h1>
                </div>
                <form action="{{route('hotel.update')}}" method="post" class="form-control">
                    <input type="hidden" name="id" value="{{$hotel->id}}">
                    @csrf
                    <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Nome" name="name" value="{{$hotel->name}}">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="" class="">CEP</label>
                            <div class="medium-r">
                                <input onblur="verify_cep(this.value)"
                                    required
                                    type="text"
                                    class="form-control"
                                    value="{{ $hotel->zip_code }}"
                                    id="postal_code"
                                    name="zip_code" aria-describedby="emailHelp" data-mask="00000-000"
                                    onblur="verify_cep()"
                                />
                                <a style="font-size: 10pt;margin:5px"
                                    href="https://buscacepinter.correios.com.br/app/endereco/index.php"
                                    target="_blank">Não sei meu CEP
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <label for="" class="">Endereço</label>
                            <input required type="text" class="form-control" value="{{ $hotel->address }}" id="address" name="address" aria-describedby="emailHelp" />
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <div class="">
                                <label for="" class="">Cidade</label>
                                <input required type="text" class="form-control" value="{{ $hotel->city }}" id="city" name="city" aria-describedby="emailHelp" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="">
                                <label for="" class="">Estado</label>
                                <select class="form-control" name="state" id="state"
                                    aria-describedby="emailHelp" style="margin-left: 1px;">
                                    <option value="AM" {{ $hotel->state == 'AM' ? 'selected' : ''}}>AM</option>
                                    <option value="AL" {{ $hotel->state == 'AL' ? 'selected' : ''}}>AL</option>
                                    <option value="AP" {{ $hotel->state == 'AP' ? 'selected' : ''}}>AP</option>
                                    <option value="BA" {{ $hotel->state == 'BA' ? 'selected' : ''}}>BA</option>
                                    <option value="CE" {{ $hotel->state == 'CE' ? 'selected' : ''}}>CE</option>
                                    <option value="DF" {{ $hotel->state == 'DF' ? 'selected' : ''}}>DF</option>
                                    <option value="ES" {{ $hotel->state == 'ES' ? 'selected' : ''}}>ES</option>
                                    <option value="GO" {{ $hotel->state == 'GO' ? 'selected' : ''}}>GO</option>
                                    <option value="MA" {{ $hotel->state == 'MA' ? 'selected' : ''}}>MA</option>
                                    <option value="MT" {{ $hotel->state == 'MT' ? 'selected' : ''}}>MT</option>
                                    <option value="MS" {{ $hotel->state == 'MS' ? 'selected' : ''}}>MS</option>
                                    <option value="MG" {{ $hotel->state == 'MG' ? 'selected' : ''}}>MG</option>
                                    <option value="PA" {{ $hotel->state == "PA" ? 'selected' : ''}}>PA</option>
                                    <option value="PB" {{ $hotel->state == 'PB' ? 'selected' : ''}}>PB</option>
                                    <option value="PR" {{ $hotel->state == 'PR' ? 'selected' : ''}}>PR</option>
                                    <option value="PE" {{ $hotel->state == 'PE' ? 'selected' : ''}}>PE</option>
                                    <option value="PI" {{ $hotel->state == 'PI' ? 'selected' : ''}}>PI</option>
                                    <option value="RJ" {{ $hotel->state == 'RJ' ? 'selected' : ''}}>RJ</option>
                                    <option value="RN" {{ $hotel->state == 'RN' ? 'selected' : ''}}>RN</option>
                                    <option value="RS" {{ $hotel->state == 'RS' ? 'selected' : ''}}>RS</option>
                                    <option value="RO" {{ $hotel->state == 'RO' ? 'selected' : ''}}>RO</option>
                                    <option value="RR" {{ $hotel->state == 'RR' ? 'selected' : ''}}>RR</option>
                                    <option value="SC" {{ $hotel->state == 'SC' ? 'selected' : ''}}>SC</option>
                                    <option value="SP" {{ $hotel->state == 'SP' ? 'selected' : ''}}>SP</option>
                                    <option value="SE" {{ $hotel->state == 'SE' ? 'selected' : ''}}>SE</option>
                                    <option value="TO" {{ $hotel->state == 'TO' ? 'selected' : ''}}>TO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Website" name="website" value="{{$hotel->website}}">
                          </div>
                    </div>

                    <div class="mt-4 mb-4">
                        <button class="btn btn-default col-3" type="submit">Editar <i class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection