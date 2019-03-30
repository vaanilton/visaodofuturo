<?php
use yii\helpers\Html;
?>

<?php function shortdata($string, $len) {
    $string = strip_tags($string);
    $i = $len;
    while ($i < strlen($string)) {
        if ($string[$i] == ' ') {
            $string = substr($string, 0, $i) . "...";
            return $string;
        }
        $i++;
    }
    return $string;
 } ?>

<div class="row">

</div>
