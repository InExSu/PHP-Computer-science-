<?php
// генераторы

function gArray1DBinary_Test()
{
    echo __FUNCTION__.'<br>';
    echo '<pre>';
    print_r(gArray1DBinary(random_int() (0, 9)));
    echo '</pre>';
}

function gArray1DBinary($len): array
    // генератор двоичных чисел
{
    $rand0_1 = static function () {
        return rand(0, 1);
    };
    $a1 = range(0, $len - 1);
    // по взрослому не работает
    // return array_map(rand(0,1), range(0,9));
    return array_map($rand0_1, $a1);
}

// gArray1DBinary_Test();

