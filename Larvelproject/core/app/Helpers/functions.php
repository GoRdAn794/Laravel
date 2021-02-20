<?php

namespace App\Helpers;

class UserHelper
{
    use message;
    function splitname($name)
    {
        $name = trim($name);
        $namearray = explode(" ", $name);
        $first_name = $namearray[0];
        $last_name = $namearray[1];
        return array($first_name, $last_name);
    }
}
trait message
{
    public function show()
    {
        echo "This is trait Message";
    }
}
