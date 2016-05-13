<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Basic Messenger</title>
        <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
            include '../vendor/autoload.php';
            use FNVi\Messaging\Messenger;
            
            if($_POST){
                $args = [
                    "from"=>FILTER_SANITIZE_STRING,
                    "to"=>FILTER_SANITIZE_STRING,
                    "message"=>FILTER_SANITIZE_STRING
                ];
                $post_vars = filter_input_array(INPUT_POST, $args);
                
                $to = str_getcsv($post_vars["to"]);
                
                $messenger = new Messenger($post_vars["user"]);
                
                $messenger->sendMessage($post_vars["message"], null,$to);
            }
            
        ?>
        <nav class="navbar navbar-default">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="sendMessage.php">New Conversation</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="container">
            <div class="row">
                <div class="col-xs-12">
                    <form method="post">
                        <div class="form-group">
                            <label for="from">
                                From:
                            </label>
                            <input class="form-control" type="text" id="from" name="from" value="Tony Stark"> 
                        </div>
                        <div class="form-group">
                            <label for="to">
                                To:
                            </label>
                            <input class="form-control" type="text" id="to" name="to" value="Steve Rogers, Bruce Banner, Thor, Nick Fury"> 
                        </div>
                        <div class="form-group">
                            <label for="message">
                                Message:
                            </label>
                            <textarea class="form-control" id="message" name="message" rows="4">Come at me bro's!</textarea>
                        </div>
                        <button class="btn btn-success">Send</button>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
