@extends('layout')
@section("scriptjs")
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        // Máscara para o CPF com JQuery
        $("#cpf").mask("000.000.000-00");
        $("#cep").mask("00000-000");
    });

</script>
@endsection
@section('conteudo')
    <div class="col-12">
        <h1 class="mb-3">Cadastrar cliente</h1>
    </div>

    <form  action="{{ route('cadastrar_cliente') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                   Nome:
                    <input type="text" class="form-control" name="nome"/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    E-mail:
                    <input type="email" class="form-control" name="email"/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    CPF:
                    <input type="text" id="cpf" class="form-control" name="cpf"/>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Senha:
                    <input type="password" class="form-control" name="password"/>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    Endereço:
                    <input type="text" class="form-control" name="endereco"/>
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    Número:
                    <input type="text" class="form-control" name="numero"/>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    Complemento:
                    <input type="text" class="form-control" name="complemento"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Cidade:
                    <input type="text" class="form-control" name="cidade"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Cep:
                    <input type="text" id="cep" class="form-control" name="cep"/>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Estado:
                    <input type="text" class="form-control" name="estado"/>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success btn-sm" value="Cadastrar"/>
    </form>
@endsection