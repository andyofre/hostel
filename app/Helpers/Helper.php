<?php
    namespace  App\Helpers;

    class Helper {

        static function RegistrationNumber(){

            $registerNumber = random_int(100000, 999999);

            $year = date('y/m');
            // $time = time('h,m,s');
            $prefix = 'HST';
            $pin =  $prefix. '/'. $year. '/'. $registerNumber;

            return $pin;
        }


        static function InvoiceNumber(){

        }
    }

?>