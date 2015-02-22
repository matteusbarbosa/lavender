<?php



$config = [
    10 => 'a',
    20 => 'b',
    30 => 'c',
];

$states = array_keys($config);

$state = 30;

// current state index
$curr = array_search($state, $states);

$next = isset($states[$curr + 1]) ? $states[$curr + 1] : false;

var_dump($next);
die;


// if next index available, set new state
if($next){

    $this->getSession()->set($this->workflow, $next);

} else{

    // end of workflow, remain on last step

}













// source arrays

$source_1 = [
    'abc' => [0 => 'a'],
    'b' => 'c'
];

$source_2 = [
    'abc' => [1 => 'b', 2 => 'c'],
    'b' => 'b'
];


// test 1 - array_merge

$result_1 = array_merge($source_1, $source_2);

var_dump($result_1);


// test 2 - array_merge_recursive

$result_2 = array_merge_recursive($source_1, $source_2);

var_dump($result_2);


// test 3 - recursive_merge

function recursive_merge($arr1, $arr2)
{
    if(!is_array($arr1) || !is_array($arr2)) return $arr2;

    foreach($arr2 as $key => $val2){

        $val1 = isset($arr1[$key]) ? $arr1[$key] : [];

        $arr1[$key] = recursive_merge($val1, $val2);

    }

    return $arr1;
}

$result_3 = recursive_merge($source_1, $source_2);

var_dump($result_3);