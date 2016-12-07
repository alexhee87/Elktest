<?php

$persons = array(
    array(
        'name' => 'John',
        'age' => '18',
        'gender' => 'male',
        'contact_no' => '0168888888'
    ),
    array(
        'name' => 'Mary',
        'age' => '15',
        'gender' => 'female',
    ),
    array(
        'name' => 'Oats',
        'age' => '19',
        'gender' => 'male',
        'contact_no' => '0168855555'
    ),
    array(
        'name' => 'Jane',
        'age' => '28',
        'gender' => 'female',
    ),
    array(
        'name' => 'Tarzan',
        'age' => '17',
        'gender' => 'male',
        'contact_no' => '01688833345'
    ),
    array(
        'name' => 'Joanne',
        'age' => '39',
        'gender' => 'female',
        'contact_no' => '0160980989'
    ),
    array(
        'name' => 'Adrian',
        'age' => '50',
        'gender' => 'male',
        'contact_no' => '0160980989'
    ),
    array(
        'name' => 'Jessica',
        'age' => '13',
        'gender' => 'female',
        'contact_no' => '0160980989'
    ),
    array(
        'name' => 'Paul',
        'age' => '21',
        'gender' => 'male',
        'contact_no' => '0160980989'
    ),
    array(
        'name' => 'Jacky',
        'age' => '34',
        'gender' => 'male',
        'contact_no' => '0160980989'
    )
);

function dd($info = array()){
    echo '<pre>';
    print_r($info);
    echo '</pre>';
//    die;
}