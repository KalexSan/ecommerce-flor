@extends("layout")
@section("scriptjs")
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function(){
        // Máscara para o CPF com JQuery
        $("#cpf").mask("000.000.000-00");
    });

</script>
@endsection
@section("conteudo")
    
    <div class="col-6">
        <h1 class="mb-3">Login no Sistema</h1>

        <form action="{{ route('logar') }}" method="post">
            @csrf
            <div class="form-group">
                Login:
                <input type="text" id="cpf" class="form-control" name="login">
            </div>

            <div class="form-group">
                Senha:
                <input type="password" class="form-control" name="senha">
            </div>
            
            <input type="submit" class="btn btn-lg btn-primary" value="Logar">

        </form>
    </div>

@endsection