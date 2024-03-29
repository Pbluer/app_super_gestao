@extends('site.layout.basico')
@extends('site.layout._partials.topo')

@section('titulo', 'Inicio')

@section('conteudo')
    <div class="conteudo-destaque">

        <div class="esquerda">
            <div class="informacoes">
                <h1>Sistema Super Gestão</h1>
                <p>Software para gestão empresarial ideal para sua empresa.
                <p>
                <div class="chamada">
                    <img src="{{ asset('/img/check.png') }}">
                    <span class="texto-branco">Gestão completa e descomplicada</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Sua empresa na nuvem</span>
                </div>
            </div>

            <div class="video">
                <img src="{{ asset('img/player_video.jpg') }}">
            </div>
        </div>
        <div class="direita">
            <div class="contato">
                <h1>Contato</h1>
                <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.
                <p>
                <form>
                    <input type="text" placeholder="Nome" class="borda-branca">
                    <br>
                    <input type="text" placeholder="Telefone" class="borda-branca">
                    <br>
                    <input type="text" placeholder="E-mail" class="borda-branca">
                    <br>
                    <select class="borda-branca">
                        <option value="">Qual o motivo do contato?</option>                       
                        @foreach ($motivo_contato as $key => $value )
                            <option value="{{ $value->id }}" {{ old('motivo_contatos_id') == $key ? 'selected' : '' }} > {{ $value->motivo_contato }} </option>            
                        @endforeach
                    </select>
                    <br>
                    <textarea class="borda-branca">Preencha aqui a sua mensagem</textarea>
                    <br>
                    <button type="submit" class="borda-branca">ENVIAR</button>
                </form>
            </div>
        </div>
    </div>
@endsection
