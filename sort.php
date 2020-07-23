<?php

// 冒泡排序算法
function maoP($arr){
    for($i=0;$i<count($arr)-1;$i++){

        for($j=0;$j<count($arr)-$i-1;$j++){

            if($arr[$j] > $arr[$j+1]){
                $tmp = $arr[$j];

                $arr[$j] = $arr[$j+1];

                $arr[$j+1] = $tmp;
            }
        }
    }

    return $arr;
}

// 选择排序

function select($arr)
{
    for($i=0;$i<count($arr)-1;$i++){
        $p = $i;

        for($j=$i+1;$j<count($arr);$j++){
            if($arr[$p] > $arr[$j]){
                $p = $j;
            }
        }

        if($p != $i){
            $tmp = $arr[$p];
            $arr[$p] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }

    return $arr;
}

// 快速排序算法

function quickSort($arr){
    if(count($arr) <=1){
        return $arr;
    }

    $middle = $arr[0];

    $leftArr = $rightArr = [];

    for($i=1;$i<count($arr);$i++){
        if($arr[$i]<$middle){
            $leftArr[] = $arr[$i];
        }else{
            $rightArr[] = $arr[$i];
        }
    }

    $leftArr = quickSort($leftArr);


    $rightArr = quickSort($rightArr);


    return array_merge($leftArr,[$middle],$rightArr);
}

//  找猴王的问题    10

function kingOfMonky($n,$m){

    //构建猴子数组  至少要有一只猴子  $i必须从1开始循环 否则结果会报错
    for($i=1;$i<$n+1;$i++){
        $arr[] = $i;
    }

    // 重置数组的指针
    $i = 0;

    while(count($arr) > 1){
        if(($i+1)%$m == 0){
            echo"第".$arr[$i]."只猴子被淘汰了"."<br/>";
            unset($arr[$i]);
        }else{
            array_push($arr,$arr[$i]);

            unset($arr[$i]);
        }

        $i++;
    }

    return $arr;

}

//echo"<pre/>";
//var_dump(kingOfMonky(10,4));  //            4


//斐波那契额数列
//  1 1 2 3 5 8 13 21 34 ..... n


function feibo($n){
    if($n==1 || $n==2){
        return 1;
    }

    return feibo($n-1)+feibo($n-2);
}

echo"<pre/>";
var_dump(feibo(20));