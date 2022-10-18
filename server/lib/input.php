<?php
    function inp($str) {
        return trim(htmlspecialchars($str));
    }

    function hashing($password) {
        return md5($password);
    }