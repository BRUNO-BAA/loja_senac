<?php
    define("SERVER", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("BD", "loja_senac");
    define("PORT", 3388);

    function getConnection()
    {
        $link = mysqli_connect(SERVER, USER, PASS, BD, PORT);
        mysqli_set_charset($link, "utf8");

        return $link;
    }

