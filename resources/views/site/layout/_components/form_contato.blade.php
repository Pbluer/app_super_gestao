{{ $slot }}
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    <br>
    <select class="borda-preta" name="motivo_contatos_id">
        <option selected hidden>Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $key => $value )
            <option value="{{ $value->id }}" {{ old('motivo_contatos_id') == $key ? 'selected' : '' }} > {{ $value->motivo_contato }} </option>            
        @endforeach
    </select>
    <br>
    <textarea class="borda-preta" name="mensagem">
        {{ old('mensagem') != '' ? old('mensagem') : ' Preencha aqui a sua mensagem' }}        
    </textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>  
</form>

@if($erros->any())
<div style="position: absolute;top:0px;left:0px;width:100%;background-color:red;">
    @foreach( $erros->all() as $erro )
        {{ $erro }}
    @endforeach
</div>
@endif