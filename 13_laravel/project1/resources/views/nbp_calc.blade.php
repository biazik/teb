<h1>Kalkulator walut</h1>
<form action="" method="GET">
    Mam:
    <input type="number" name="how_many" placeholder="podaj ile masz waluty"/>
    <select name="have_currency">
        @foreach ($api[0]['rates'] as $key => $item)
                <option value="{{$key}}">{{$item['code']}}</option>
        @endforeach
    </select>
    Chcę kupić:
    <select name="want_currency">
        @foreach ($api[0]['rates'] as $key => $item)
                <option value='{{$key}}'>{{$item['code']}}</option>
                {{-- <option value="{{$item['bid']}}">{{$item['code']}}</option> --}}
        @endforeach
    </select>

    <input type="submit" name="count" value="Policz"/>
</form>
<?php 
    if (isset($_GET['count'])) {
        if (is_numeric($_GET['how_many'])) {
            $howMany = $_GET['how_many']*$api[0]['rates'][$_GET['have_currency']]['bid'];
            $canGet = $howMany/$api[0]['rates'][$_GET['want_currency']]['ask'];
            $canGet = round($canGet, 2);
            $have_currency=$api[0]['rates'][$_GET['have_currency']]['code'];
            $want_currency=$api[0]['rates'][$_GET['want_currency']]['code'];
            echo "Za $_GET[how_many]$have_currency możesz kupić $canGet$want_currency";
        }
        else {
            echo "Wystąpił błąd";
        }
    }
?>