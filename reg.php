<?php
$str = "12";
$pattern = '\d([,]5$)?$';
echo preg_match($pattern, $str);
?>
