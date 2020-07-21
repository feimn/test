<?php

function quickSort($arr)
{
    if(count($arr)<=1)
    {
        return $arr;
    }

    $middle = $arr[0];

    $leftArr = $rightArr = [];

    for($i=1;$i<count($arr);$i++)
    {
        if($arr[$i] < $middle){
            $leftArr[] = $arr[$i];
        }else{
            $rightArr[] = $arr[$i];
        }
    }

    $leftArr = quickSort($leftArr);

    $rightArr = quickSort($rightArr);

    return array_merge($leftArr,[$middle],$rightArr);

}
//var_dump(quickSort([100,1212,454646,33,65,0,1,4,7,85,22658422,4564122]));
//   有n只猴子  从1开始数数  数到M的时候  第M只就被淘汰掉了 重新开始数  一直数到只剩下最后一只猴子  它就是猴王
function findKingOfMonkey($n,$m)
{
    for($i=1;$i<$n+1;$i++)
    {
        $arr[] = $i;
    }

    $i = 0; //  数组指针

    while(count($arr)>1){
        if(($i+1) % $m == 0){
            unset($arr[$i]);   //     5
        }else{
             array_push($arr,$arr[$i]);
            unset($arr[$i]);
        }

        $i++;
    }

    return $arr;

}
//$monkey = findKingOfMonkey(10,4);


// 斐波那契额数列

//   1 1 2 3 5 8 13 21 34 ...... n

function feiBo($n)
{
    if($n == 1 || $n == 2){
        return 1;
    }

    return feibo($n-1) + feiBo($n-2);
}






