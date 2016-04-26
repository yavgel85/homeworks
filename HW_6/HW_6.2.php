<?php

$array = 
array(
    'bob'       =>  'Bob - men',
    'google'    => array(
                        'somekey'   =>  'somevalue',
                        'bob'       =>  'big man'),
                        'martin'    => array(
                                            'bob'   =>  array(
                                                                'friend'    =>  true,
                                                                'age'       =>  105
                                                            ),
                                            'cat'   =>  'animal',
                                            'sad'   =>    array(
                                                                'rkg'   =>  'lol',
                                                                'bob'   =>  'nono')
                        )
);

/**
 * Рекурсивный разбор массива с дополнительным включением ключа массива при выводе
 *
 * Пример вывода при 'включенном' $include_keys: key, value, key, value, key, value
 *
 * @access  public
 * @param   array   $array         многомерный массив для рекурсивного разбора
 * @param   string  $glue          значение, которое объединяет элементы вместе
 * @param   bool    $include_keys  выводит ключи массива, перед его значениями
 * @param   bool    $trim_all      обрезает все пробелы из строки
 * @return  string  разобранный массив
 */
function recursive_implode(array $array, $glue = ',', $include_keys = false, $trim_all = true) {
    $glued_string = '';
    // Рекурсивный итерация массива и добавление ключ/значение для объединения строки
    array_walk_recursive($array, function($value, $key) use ($glue, $include_keys, &$glued_string) {
        $include_keys and $glued_string .= $key.$glue;
        $glued_string .= $value.$glue;
    });
    // Удаление последнего элемента $glue из строки
    strlen($glue) > 0 and $glued_string = substr($glued_string, 0, -strlen($glue));
    // Удаление всех пробелов
    $trim_all and $glued_string = preg_replace("/(\s)/ixsm", '', $glued_string);
    return (string) $glued_string;
}

echo recursive_implode($array, ', ', false, false);