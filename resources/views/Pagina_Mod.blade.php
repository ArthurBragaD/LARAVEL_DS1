<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica dados</title>
    <link rel="stylesheet" href={{ URL("../css/master.css") }}>
    {{-- <link rel="stylesheet" href={{ URL("../css/pesquisa.css") }}> --}}
    <link rel="stylesheet" href={{ URL("../css/app.css") }}>
    <link rel="stylesheet" href={{ URL("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css") }}>
</head>

<body>
    <a href={{url("/")}}>Home</a>
    <div class="master-container">
        <form action={{ url("modifica/$casa->codigo") }} method="post" class="form-container" enctype="multipart/form-data">
            @csrf
            <ul>
                <li>
                    <label for="imobiliaria">Nome da empresa</label>
                    <input type="text" name="imobiliaria" value="{{ $casa->imobiliaria }}" required></input>
                    <span>Coloque o novo nome da empresa</span>
                </li>
                <li>
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" value="{{ $casa->endereco }}" required></input>
                    <span>Coloque o novo endereço do imovel</span>
                </li>
                <li>
                    <label for="preco">Preço</label>
                    <input name="preco" type="number" step="0.01" value="{{ $casa->preco }}" required>
                    <span>Coloque o novo preço do imovel</span>
                </li>
                <li>
                    <label for="VouA">Tipo do imovel</label>
                    <select name="VouA" id="" class="VouA">
                        <option value="1" selected>Venda</option>
                        <option value="0">Aluguel</option>
                    </select>
                    <script>
                        select = document.forms[0].VouA;
                        select.value = "{{ $casa->VouA }}";
                    </script>
                    <span>Escolha qual o tipo do imovel</span>
                <li>
                    <button type="submit" class="btn btn-primary" name="enviarcasa">Enviar</button>
                </li>
            </ul>
        </form>

    </div>

</body>

</html>
