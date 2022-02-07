<?php
// операции с двоичными числами, без использования встроенных бинарных методов PHP

// require_once 'Generators.php';
// function factoring_Number_Terms_Base_Tests()
//{
//
////    $arr = factoring_Number_Terms_Base_10(9052);
////    echo '<pre>';
////    print_r($arr);
////    echo '</pre>';
////
////    $arr = factoring_Number_Terms_Base_2('1101');
////    echo '<pre>';
////    print_r($arr);
////    echo '</pre>';
//
////    print_r(binary_2_10('1101'));
//
//    print_r(decimal_2_binary(4));
//}

function factoring_Number_Terms_Base_10($numb)
{
    // Разложение числа на слагаемые по основанию десять
    // вернуть массив пар цифра-степень

    $arr = [];
    $str_numb = strval($numb);
    $len_numb = strlen($str_numb);

    for ($i = ($len_numb - 1); $i >= 0; $i--) {

        $dig = $str_numb[$i];
        $pow = $len_numb - $i - 1;

        $a2 = array($dig, $pow);

        array_push($arr, $a2);
    }
    return $arr;
}

function factoring_Number_Terms_Base_2($bina)
{
// Разложение числа на слагаемые по основанию 2

    $arr = [];
    $str_numb = strval($bina);
    $len_numb = strlen($str_numb);

    for ($i = ($len_numb - 1); $i >= 0; $i--) {

        $dig = $str_numb[$i];
        $pow = $len_numb - $i - 1;

        $a2 = array($dig, $pow);

        array_push($arr, $a2);
    }
    return $arr;
}

function binary_2_10($bina)
{
    // двоичную в десятичную
    // сложить поразрядно степени двойки

    $res = 0;
    $len_bina = strlen($bina);
    for ($i = 0; $i < $len_bina; $i++) {
        $pow = $len_bina - $i - 1;
        $res = $res + $bina[$i] * pow(2, $pow);
    }
    return $res;
}

function decimal_2_binary_Test()
{
    for ($i = 0; $i < 20; $i++) {
        $bin1 = decbin($i);
        $bin2 = decimal_2_binary($i);
        if ($bin1 != $bin2) {
            print_r($i . ' не совпало' . '<br>');
            print_r($bin1 . ' правильно' . '<br>');
            print_r($bin2 . ' НЕ правильно' . '<br>');
            break;
        } else {
            print_r($i . " = " . $bin2 . '<br>');
        }
    }
}

function decimal_2_binary($decimal)
{
//    десятичное в двоичное

    $deci = $decimal;
    $resu = '';

    do {
        $remi = $deci % 2;
        $resu = strval($remi) . $resu;
        $deci = $deci / 2;
    } while ($deci > 1);

    $remi = $deci % 2;
//    if ($remi > 0) {
    $resu = strval($remi) . $resu;
//    }
    return $resu;
}

//decimal_2_binary_Test();
//factoring_Number_Terms_Base_Tests();

function binary_Summ($bin1, $bin2)
{
    $binMin = '';
    $stop = strlen($bin1) - strlen($bin2);
    for ($i = strlen($bin1); $i >= 0; $i++) {

    }
}

function stringMin_Test()
{
    $str1 = 'zz';
    $str2 = 'zqq';
    $strM = stringMin($str1, $str2);
    echo '<br';
    if ($strM != $str1) {
        echo __FUNCTION__ . ' ожидалось ' . $str1;
    } else {
        echo __FUNCTION__ . ' Ok!';
    }
}

function stringMin($str1, $str2)
//    вернуть строку мин длины
{
    return ($str1 <= $str2) ? $str1 : $str2;
}

function stringMax_Test()
{
    $str1 = 'zzqq';
    $str2 = 'zqq';
    $strM = stringMax($str1, $str2);
    if ($strM != $str1) {
        echo __FUNCTION__ . ' ожидалось ' . $str1;
    } else {
        echo __FUNCTION__ . ' Ok!';
    }
}

function stringMax($str1, $str2)
//    вернуть строку мин длины
{
    return ($str1 >= $str2) ? $str1 : $str2;
}

//stringMin_Test();
//stringMax_Test();

function binarysAdd_Test()
{
    $digi1 = random_int(0, 9);
    $digi2 = random_int(0, 9);
    $sbin1 = decbin($digi1);
    $sbin2 = decbin($digi2);

    $binNew = binarysAdd($sbin1, $sbin2);
    $binOld = decbin($digi1 + $digi2);

    echo __FUNCTION__ . '<br>';
    if ($binNew != $binOld) {
        echo "Ошибка: <br>Числа $digi1, $digi2<br>Моя=" . $binNew . "<br>Пра=" . $binOld;
    } else {
        echo 'Ok!';
    }
}

function binarysAdd($sbin1, $sbin2): string
    // сложить два бинарных числа
{
    $sRetu = '';
    $sUppe = stringMax($sbin1, $sbin2);
    $sDown = stringMin($sbin1, $sbin2);
    $lenUp = strlen($sUppe);
    $trans = 0;
    $posDn = strlen($sDown) - 1;

    for ($posUp = $lenUp - 1; $posUp >= 0; $posUp--) {

        if ($posDn >= 0) {

            $dUppe = $sUppe[$posUp];
            $dDown = $sDown[$posDn];

            $summa = $dUppe + $dDown + $trans;
            $trans = ($summa > 1) ? 1 : 0;
            $summa = ($summa > 1) ? 0 : $summa;

            $sRetu = $summa . $sRetu;

            $posDn--;
        } else {

            $summa = $sUppe[$posUp] + $trans;

            if ($summa > 1) {
                $summa = 1;
                $trans = 1;
            } else {
                $trans = 0;
            }
            $sRetu = $summa . $sRetu;
        }


    }

    if ($trans == 1) {

        $sRetu = $trans . $sRetu;
    }

    return $sRetu;
}

binarysAdd_Test();

