<?php
// Opis działania regex.php pozostawię jednak Hermanowi, nie chciałbym tutaj czegoś namieszać, większość rozumiem, ale drobny błąd w przekazie informacji ode mnie i już nie wiecie co gdzie i jak :/
function stringRegex($string,$type = 'name'){
    //Strona do sprawadzania i tworzenia regexów: http://regex101.com
    $namePattern = "/^[a-zzżźćńółęąśŻŹĆĄŚĘŁÓŃ]{2,12}$/i";
    $emailPattern = "/^\w+@\w+\.[a-z]{2,6}$/i";
    $passwordPattern = "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/"; //min 6 znaków, mala i duża litera i znak specialny
    $surnamePattern = "/^[a-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{2,12}+([-]?+[a-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{2,12})?$/i";
    $numberPattern ="/[+][4][8][ ]\d{3}[-]\d{3}[-]\d{3}$/i";

    switch ($type){
        case 'name':
            $pattern = $namePattern;
            $error = "Błędnie wypełnione imię";
            break;
        case 'surname':
            $pattern = $surnamePattern;
            $error = "Błędnie wypełnione nazwisko";
            break;
        case 'email':
            $pattern = $emailPattern;
            $error = "Błędnie wypełniony adres mailowy";
            break;
        case 'password':
            $pattern = $passwordPattern;
            $error = "Hasło powinno zawierać minimum 6 znaków, małą i dużą literę oraz znak specjalny";
            break;
        case 'number':
            $pattern = $numberPattern;
            $error = "Błędnie wypełniłony numer";
            break;
    }

    if (preg_match($pattern, $string = trim($string))){

        if ($type != 'password'){
            $string = ucfirst(mb_strtolower($string,'UTF-8'));
        }


        //sprawdzamy podwójne nazwisko
        if ($type == 'surname' && preg_match('/-/',$string)){
            $partsurname = explode('-', $string);
            $partsurname[1] = ucfirst($partsurname[1]);
            $string = implode('-',$partsurname);
        }
        return $string;
    } else {
        $_SESSION['error'] = $error;
        return false;
    }

}
