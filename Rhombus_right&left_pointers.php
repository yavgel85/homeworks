<?php
/**
 * Created by PhpStorm.
 * User: Evgeniy
 * Date: 21.04.2016
 * Time: 17:33
 */

////////////////// Ромб /////////////////////////
$count = 6;
for($i=1;$i<=$count;$i++){
    for($i2=$i;$i2<=$count;$i2++){
        echo '&nbsp;';
    }
    for($i1=1;$i1<=$i;$i1++){
        echo '*';
    }
    echo '<br>';
}

for($i=$count-1;$i<=$count && $i>=0;$i--){
    for($i2=$count;$i2>=$i && $i2>0;$i2--){
        echo '&nbsp;';
    }
    for($i1=$i;$i1<=$i && $i1>0;$i1--){
        echo '*';
    }
    echo '<br>';
}
////////////////// Ромб /////////////////////////

///////////////// Стрелка вправо ////////////////
$count = 6;
for($i=1;$i<=$count;$i++){
    for($i1=1;$i1<=$i;$i1++){
        echo '*';
    }
    echo '<br>';
}

for($i=$count-1;$i<=$count && $i>0;$i--){
    for($i1=$i;$i1<=$i && $i1>0;$i1--){
        echo '*';
    }
    echo '<br>';
}
///////////////// Стрелка вправо ////////////////

////////////////// Стрелка влево ////////////////
$count = 6;
for($i=1;$i<=$count;$i++){
    for($i2=$i*2;$i2<=$count*2;$i2++){
        echo '&nbsp;';
    }
    for($i1=$i;$i1<=$i && $i1>0;$i1--){
        echo '*';
    }
    echo '<br>';
}

for($i=$count-1;$i<=$count && $i>=0;$i--){
    for($i2=$count*2;$i2>=$i*2 && $i2>0;$i2--){
        echo '&nbsp;';
    }
    for($i1=$i;$i1<=$i && $i1>0;$i1--){
        echo '*';
    }
    echo '<br>';
}
////////////////// Стрелка влево ////////////////