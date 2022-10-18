<?php
    function db_connect($db_name) {
        return mysqli_connect("localhost", "root", "", $db_name);
    }