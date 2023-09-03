<?php

function showSession()
{
    echo "<div style=\"margin-left:  150px\">";
    foreach ($_SESSION as $k => $v) {
        echo $k . ':' . $v . "<br>";
    }
    echo "</div>";
}