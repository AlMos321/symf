<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15.12.14
 * Time: 23:20
 */

namespace FormBundle;




class Mailer {
    public function SendMail(){

        if (mail("spice-oleg@mail.ru", "the subject", "Example message",
            "From: webmaster@example.com \r\n")) {
            echo "messege acepted for delivery";
        } else {
            echo "some error happen";
        }


    }
} 