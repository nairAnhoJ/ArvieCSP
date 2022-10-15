<?php
$req = 5000;
for ($x = 1; $x <= $req; $x++) {
    $Strings='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code_type = "DI";
    $get_month = date('mm', strtotime("now"));
    $rand6 = substr(str_shuffle($Strings), 0, 6);
    $rand6_check = substr(str_shuffle($Strings), 0, 6);
    $generated = "$code_type-$get_month$rand6";

    if ($rand6 != $rand6_check) {
        echo "$x $generated <br>";
    }
  }
?>