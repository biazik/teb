<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TebSite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});
Route::get('/test', function(){
  return view('test');
});
Route::get('/teb', function(){
  return view('teb', ['name'=>'Janusz', 'surname'=>'Nowak', 'city'=>'Poznań']);
});
Route::get('/pages/{inbox}', function($inbox){
  $arr = [
    'about' => 'Strona TEB',
    'home' => 'Strona Domowa',
    'contact' => 'teb@gmail.com'
  ];
  if (key_exists($inbox,$arr)) {
    echo $arr[$inbox];
  }
  else{
    return abort(404);
  }
});
Route::get('address/{city}/{street?}/{zipCode?}', function(string $city, string $street="", string $zipCode=null){
  if (is_null($zipCode)) {
    $zipCode="Brak";
  }
  else{
    if (strlen($zipCode)>7) {
      $zipCode="Twój kod pocztowy jest za długi!";
    }
    else {
      $zipCode=substr($zipCode, 0, 2).'-'.substr($zipCode, 2, 3);
    }
  }
  echo <<< ADDRESS
    Miasto: $city
    Ulica: $street
    Kod pocztowy: $zipCode
    <hr>
  ADDRESS;
});
Route::redirect('adres/{city}/{street?}/{zipCode?}', '/address/{city}/{street?}/{zipCode?}');

Route::prefix('admin')->group(function(){
  Route::get('home', function(){
    echo "Witaj na stronie administracyjnej";
  });
  Route::get('users', function(){
    echo "Użytkownicy systemu";
  });
});
// Zadanko: Dodać inta wiek i go regexować. Wiek niewymagany.
Route::prefix('user')->group(function(){
  Route::get('home/{name}/{age?}', function(string $name, int $age=null){
    echo "Witaj na stronie $name <br>";
    if (!is_null($age)) {
      echo "Twój wiek to: $age";
    }
  })->where(['name' => '[A-Za-ząęśćźżółĄĘŚĆŹŻÓŁ -]+', 'age' => '^[1-9][0-9]?$']);
  Route::get('users', function(){
    echo "Użytkownicy systemu";
  });
});
Route::get('teb1', function(){
  $array = [
    'name' => 'Janusz',
    'surname' => 'Nowak',
    'city' => 'Poznań'
  ];
  $array['lettercount']=mb_strlen($array['city']);
  return view('teb', $array);
});
Route::get('loop', function(){
  $arr = [
    ['brand' => 'Ferrari', 'model' => 'F430', 'color' => 'red'],
    ['brand' => 'Fiat', 'model' => 'Bravo', 'color' => 'gray'],
    ['brand' => 'Porshe', 'model' => 'Panamera', 'color' => 'white']
  ];
  return view('loop', ['arr'=>$arr]);
});
Route::get('car/{brand?}/{model?}/{color?}/{price?}', function(string $brand=null, string $model="Brak modelu", string $color="Niezdefiniowany", int $cena=null){
  if (is_null($brand)) {
    $arr['error']="Brak danych do wyświetlenia";
  }
  else {
    $arr = [
      ['brand' => $brand, 'model' => $model, 'color' => $color, 'price' => $cena]
    ];
  }
  return view('car', ['arr'=>$arr]);
})->where(['price' => '^[1-9]+[0-9]*$']);
Route::redirect('auto/{brand?}/{model?}/{color?}/{price?}', '/car/{brand?}/{model?}/{color?}/{price?}');
Route::get('blade', function () {
  return view('szablon');
});
Route::get('tebc', [TebSite::class, 'index']);

Route::get('data', [App\Http\Controllers\Data::class, 'test']);

Route::get('kursy', [App\Http\Controllers\NBP::class, 'show']);
Route::get('kalkulatorwalut', [App\Http\Controllers\NBP::class, 'calc']);
Route::get('kalkulatorwalut1', [App\Http\Controllers\NBP::class, 'calc']);

Route::get('json', function(){
  echo "isJson";
})->middleware('IsJson');