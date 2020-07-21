<?php



$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);

if ($pos == false) {
    echo "The string '$findme' was not found in the string '$mystring'";
} else {
    echo "The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos";
}


exit;
// $user = array(
//     'a' => array(100, 'a1'),
//     'b' => array(101, 'a2'),
//     'c' => array(102, 'a3'),
//     'd' => array(103, 'a4'),
//     'e' => array(104, 'a5'),
// );

//  function1   array_reduce
//$result = array_reduce($user,function($result,$value){
//    return array_merge($result,array_values($value));
//},[]);

// function2   array_walk_recursive  引用传递
//$result = [];
//array_walk_recursive($user,function($value) use(&$result){
//   return array_push($result,$value);
//});
//
//print_r($result);

// function3   array_map
// $result = [];
// array_map(function($value) use(&$result){
//     $result = array_merge($result,array_values($value));
// },$user);

// print_r($result);


//  10.1.82.9290;
function cutString($string)
{
  $arr = explode('.',$string);
    if(count($arr)>3)
    {
        for($i=3;$i<=count($arr);$i++){
            unset($arr[$i]);
        }
    }
    return implode('.',$arr);

}

$string = cutString('90.44.36.20.363');

//var_dump($string);
//exit;


filter_list();

$search_html = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

$search_url = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_ENCODED);

if (filter_has_var(INPUT_GET, 'email')) {
    echo "Email Found";
} else {
    echo "Email Not Found";
}

filter_var("bob@example.com", FILTER_VALIDATE_EMAIL);

filter_var('http://example.com', FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);








