<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $user = filter_input(INPUT_GET, "user", FILTER_SANITIZE_STRING);
            $conversation = filter_input(INPUT_GET, "conversation", FILTER_SANITIZE_STRING);
            
        ?>
    </body>
</html>
