<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href={{ URL("../css/master.css") }}></link>
    <link rel="stylesheet" href={{ URL("../css/pesquisa.css") }}></link>
    <link rel="stylesheet" href={{ URL("../css/app.css") }}></link>
    <link rel="stylesheet" href={{ URL("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css") }}>
</head>

<body>
    <a href={{url("/adiciona")}}>Adicionar dados</a>
    <div class="table-container">
        <form method="get" action="{{ url('filtrar') }}" class="form-container form-organiza">
            <ul class="organiza-display">
                <li style="    border: 1px solid #DDDDDD; margin-bottom: 30px;">
                    <label for="buscaCartucho">Busca</label>
                    <textarea onkeyup="ajusta_texto(this)" name="pesquisa" value="{{$pesquisa}}">{{$pesquisa}}</textarea>
                    <span>Digite o que deseja procurar...</span>
                </li>
                <div class='organiza-filtro'>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <select name="orgCod" class="options">
                        <option value="preco" @if ($orgCod=="preco"){ selected } @endif>Apenas Preços</option>
                        <option value="endereco" @if ($orgCod=="endereco"){ selected } @endif>Apenas Endereços</option>
                    </select>
                    <select name="orgOrd" class="options">
                        @if($orgOrd=="asc")
                        <option value="asc" selected>Crescente</option>
                        <option value="desc">Decrescente</option>
                        @else
                        <option value="asc">Crescente</option>
                        <option value="desc" selected>Decrescente</option>
                        @endif
                    </select>
                    <select name="VouA" class="options">
                        <option value="2" @if ($VouA=="2"){ selected } @endif>Sem marcador de status</option>
                        <option value="1" @if ($VouA=="1"){ selected } @endif>Apenas à venda</option>
                        <option value="0" @if ($VouA=="0"){ selected } @endif>Apenas aluguel</option>
                    </select>
                </div>
            </ul>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 30%;">Endereço</th>
                    <th style="width: 30%;">Preço</th>
                    <th style="width: 30%;">Imobiliaria</th>
                    <th style="width: 30%;">Venda ou Aluguel</th>
                    <th style="width: 10%;" colspan="2"> Botões</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($casas as $casa)
                <tr>
                    <td>{{ $casa->endereco }}</td>
                    <td>{{ $casa->preco }}</td>
                    <td>{{ $casa->imobiliaria }}</td>
                    <td>
                        @if ($casa->VouA == 1)
                            À venda
                        @else
                            Para alugar
                        @endif
                    </td>
                    <td>
                        <form method="get" action="{{ url('modifica/'.$casa->codigo)}}">
                            @csrf
                            <input type="hidden" name="codigo" value="{{ $casa->codigo }}">
                            <input type="hidden" name="pesquisa" value="{{$pesquisa}}">
                            <input type="hidden" name="orgCod" value="{{$orgCod}}">
                            <input type="hidden" name="orgOrd" value="{{$orgOrd}}">
                            <input type="hidden" name="VouA" value="{{$VouA}}">
                            <button type="submit" name="fazer" value="modificar" class="botao-modifica rounded-circle bi bi-pencil-fill"></button>
                        </form>
                    </td>
                    <td>
                        <form method="get" action="{{ url('deletar/'.$casa->codigo)}}">
                            @csrf
                            <input type="hidden" name="busca" value="">
                            <input type="hidden" name="escolhaPesquisa" value="">
                            <input type="hidden" name="filtro" value="">
                            <button type="submit" name="fazer" value="excluir" class="botao-deleta rounded-circle bi bi-trash-fill"></button>
                        </form>
                    </td>
                </tr>
                    @empty
                    <tr>
                        <td colspan="5">Sem casas para mostrar.
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
