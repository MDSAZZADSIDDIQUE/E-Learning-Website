<?php
function validateName($name) {
    if (preg_match('~[0-9]+~', $name)) {
        return true;
    } else {
        return false;
    }
}

function validatePassword($password) {
    if(strlen($password) < 6) {
        return false;
    }else{
        return true;
    }
}