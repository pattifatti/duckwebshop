<?php
session_start();

function logged_in(){
    return isset($_SESSION['employeeId']);
}

function confirm_logged_in(){
    if(!logged_in()) {
        redirect_to("./backendindex.php?page=loginb");
    }
}