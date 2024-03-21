@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('hotels')}}">Hotéis</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Registrar</li>
                </ol>
              </nav>
            <div class="card card-default-white">
                <div class="card-header card-hearder-default">
                    <h1>Registrar Hotel</h1>
                </div>
                <form action="{{route('hotel.store')}}" method="post" class="form-control">
                    @csrf
                    <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Nome" name="name">
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
                                    value="{{ old('postl_code') }}"
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
                            <input required type="text" class="form-control" value="{{ old('address') }}" id="address" name="address" aria-describedby="emailHelp" />
                        </div>
                        <div class="col">
                            <div class="">
                                <label for="" class="">Número</label>
                                <input id="number" required type="text" class="form-control" value="{{ old('number') }}" id="number" name="number" aria-describedby="emailHelp" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="" class="">Bairro</label>
                            <input required type="text" class="form-control" value="{{ old('neighborhood') }}" id="neighborhood" name="neighborhood" aria-describedby="emailHelp" />
                        </div>
                        <div class="col">
                            <div class="">
                                <label for="" class="">Cidade</label>
                                <input required type="text" class="form-control" value="{{ old('city') }}" id="city" name="city" aria-describedby="emailHelp" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="">
                                <label for="" class="">Estado</label>
                                <select class="form-control" name="state" id="state"
                                    aria-describedby="emailHelp" style="margin-left: 1px;">
                                    <option value="AM">AM</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Website" name="website">
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