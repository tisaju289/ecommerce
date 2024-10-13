<?php

if (!function_exists('setToastMessage')) {
    function setToastMessage($message, $type = 'success')
    {
        session()->flash($type, $message);
    }
}