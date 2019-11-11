@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-left">
        <div class="col-md-auto">
            <a href="{{ route('lista_editarimagem') }}" class="btn_back btn btn-xs btn-info pull-right">
                Voltar atrás
            </a>
        </div>
    </div>
    <form action="{{ route('insert-editarimagem') }}" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">File</label>

            <div class="col-md-6">
                <input onchange="readURL(this);" id="ficheiro_image" type="file" class="form-control @error('ficheiro_image') is-invalid @enderror" name="ficheiro_image" value="{{ old('ficheiro_image') }}" autocomplete="ficheiro_image">

                @error('ficheiro_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Escolher o Jornal</label>
                <div class="col-md-6">
                    <select name="jornal_id">

                        @foreach($jornals as $jornal)
                        <option selected value="{{ $jornal->id }}" select>
                            {{ $jornal->name_jornal }}
                        </option>
                        @endforeach
                    </select>

                    @error('jornal_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!-- <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Visualizar</label>
                <div class="col-md-6">
                    <img id="imagepreview" src="#" alt="aguardando por imagem" />

                </div>
            </div> -->
            <div id="effects" class="form-group row">
                <img id="imagepreview" src="#" alt="aguardando por imagem" />
                <div class="row justify-content-md-center">
                    <div class="colunachooseeffect col-sm">
                        <input class="inputradio_effect" type="radio" onclick="checkRadio('imagepreviewnone')" name="effectvalue" value="none">
                        <span class="checkmark"></span>
                        <img class="imageprevieweffect" id="imagepreviewnone" src="#" alt="aguardando por imagem" />
                        <p>Sem efeito</p>
                    </div>
                    <div class="colunachooseeffect col-sm">
                        <input class="inputradio_effect" type="radio" onclick="checkRadio('grey')" name="effectvalue" value="grey">
                        <span class="checkmark"></span>
                        <img class="imageprevieweffect" id="imagepreviewsat" src="#" alt="aguardando por imagem" />
                        <p>Preto e Branco</p>
                    </div>
                    <div class="colunachooseeffect col-sm">
                        <input class="inputradio_effect" type="radio" onclick="checkRadio('greybrightness')" name="effectvalue" value="greybrightness20">
                        <span class="checkmark"></span>
                        <img class="imageprevieweffect" id="imagepreviewgreybrightness" src="#" alt="aguardando por imagem" />
                        <p>Preto e Branco com brilho</p>
                    </div>
                    <div class="colunachooseeffect col-sm">
                        <input class="inputradio_effect" type="radio" onclick="checkRadio('contrast')" name="effectvalue" value="contrast200">
                        <span class="checkmark"></span>
                        <img class="imageprevieweffect" id="imagepreviewcontrast" src="#" alt="aguardando por imagem" />
                        <p>Contraste</p>
                    </div>
                    <div class="colunachooseeffect col-sm">
                        <input class="inputradio_effect" type="radio" onclick="checkRadio('brightness')" name="effectvalue" value="briho130">
                        <span class="checkmark"></span>
                        <img class="imageprevieweffect" id="imagepreviewbrightness" src="#" alt="aguardando por imagem" />
                        <p>Brilho</p>
                    </div>
                    <div class="colunachooseeffect col-sm">
                        <input class="inputradio_effect" type="radio" onclick="checkRadio('brightness2')" name="effectvalue" value="briho80">
                        <span class="checkmark"></span>
                        <img class="imageprevieweffect" id="imagepreviewbrightness2" src="#" alt="aguardando por imagem" />
                        <p>Sem Brilho</p>
                    </div>




                </div>
            </div>
        </div>
        {{ csrf_field() }}
        <div class="form-group row mb-0">
            <div class="coluna_btn col-md-6 offset-md-4">
                <button type="submit" class="btnsubmeterseccao btn btn-primary">
                    Adiconar
                </button>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function checkRadio(name) {
            if (name === 'grey') {
                document.getElementById('imagepreview').style.filter = "grayscale(100%)";
            } else if (name === 'contrast') {
                document.getElementById('imagepreview').style.filter = "contrast(200%)";
            } else if (name === 'brightness') {
                document.getElementById('imagepreview').style.filter = "brightness(130%)";
            } else if (name === 'brightness2') {
                document.getElementById('imagepreview').style.filter = "brightness(80%)";
            } else if (name === 'greybrightness') {
                document.getElementById('imagepreview').style.filter = "brightness(150%)" + "grayscale(100%)";
            }else if (name === 'imagepreviewnone') {
                document.getElementById('imagepreview').style.filter = "none";
            }
        }

        function readURL(input) {
            document.getElementById('effects').style.display = "block";
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagepreview')
                        .height(400)
                        .attr('src', e.target.result)
                    $('#imagepreviewnone')
                        .attr('src', e.target.result)
                        .addClass('filternone');
                    $('#imagepreviewsat')
                        .attr('src', e.target.result)
                        .addClass('grayscale');
                    $('#imagepreviewcontrast')
                        .attr('src', e.target.result)
                        .addClass('constrast');
                    $('#imagepreviewbrightness')
                        .attr('src', e.target.result)
                        .addClass('brightness');
                    $('#imagepreviewbrightness2')
                        .attr('src', e.target.result)
                        .addClass('brightness2');
                    $('#imagepreviewgreybrightness')
                        .attr('src', e.target.result)
                        .addClass('greybrightness');
                };

                reader.readAsDataURL(input.files[0]);
            }


        }
    </script>
    @endsection