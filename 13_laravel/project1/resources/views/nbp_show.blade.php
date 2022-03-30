<h1>Tabela walut</h1>
<table>
<tr>
    <th>Waluta</th>
    <th>Symbol</th>
    <th>Skup</th>
    <th>Sprzedaż</th>
</tr>
@foreach ($api[0]['rates'] as $key => $item)
    @if ($item['code'] == "USD" OR $item['code'] == "EUR" OR $item['code'] == "CHF")
     <tr>
        <td>{{$item['currency']}}</td>
        <td>{{$item['code']}}</td>
        <td>{{$item['ask']}}</td>
        <td>{{$item['bid']}}</td>
    </tr>
    @endif
@endforeach
</table>