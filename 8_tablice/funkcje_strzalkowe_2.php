<?php
function childName(){
  return "Franek";
}

var_dump(childName());
echo "<br>";
print_r(childName());
echo "<br>";
$childs = [
  ['id' => '1', 'name' => 'Franek'],
  ['id' => '2', 'name' => 'Jagoda'],
];

$validateChildName = array_map(function($child){
  return $child;
}, $childs);

echo "<pre>";
print_r($validateChildName);
echo "</pre><hr>";

//

$name = function(){
  return 'Franek';
};

var_dump($name());


echo "<br>";
//

$name = fn() =>'Franek';

var_dump($name());

//

$multi = fn($a, $b) => $a*$b;

echo "<br>";
var_dump($multi(4, 5));
echo "<br>";
var_dump($multi(4.5, 4));
echo "<br>";

//

$fruits = [
  ['name' => 'apple', 'price' => 6],
  ['name' => 'lemon', 'price' => 10.5],
];

$sale = array_map(function($fruit){
  return $fruit['name'];

}, $fruits);

print_r($sale);
echo "<br>";
//

$fruits = [
  ['name' => 'apple', 'price' => 6],
  ['name' => 'lemon', 'price' => 10.5],
];

$sale = array_map(fn($fruit)=>$fruit['name'], $fruits);

print_r($sale);

//

echo "<br>";
$name='anastazja';
$split = str_split($name);

// $result=array_map(function($char, $count){
//     return [
//       'char' => $char,
//       'occurs' => $count
//     ];
// }, array_unique($split), array_count_values($split));

$result=array_map(fn($char, $count) => ['char' => $char,'occurs' => $count], array_unique($split), array_count_values($split));
echo "<pre>";
print_r($result);
echo "<pre>";
echo "<br>";

//

// $user=null;
$user = ['name' => 'Franek'];

// $result=function() use ($user){
//   if(!$user){
//     return 'Brak danych';
//   }
//     return 'Witaj '.$user['name'];
// };
$result=fn() => trim($user ? "Witaj ".$user['name'] : 'Brak danych');

print_r($result());

//
 ?>
