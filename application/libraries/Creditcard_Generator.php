<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
PHP credit card number generator
Copyright (C) 2006 Graham King graham@darkcoding.net
Copyright (C) 2013 Alex Goretoy alex@goretoy.com
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
class Creditcard_Generator{
    public static $visaPrefixList = array("4539","4556","4916","4532","4929","40240071","4485","4716","4");
    public static $mastercardPrefixList = array("51","52","53","54", "55");
    public static $amexPrefixList = array("34", "37");
    public static $discoverPrefixList = array("6011");
    public static $dinersPrefixList = array("300","301","302","303","36","38");
    public static $enRoutePrefixList = array("2014","2149");
    public static $jcbPrefixList = array("35");
    public static $voyagerPrefixList = array("8699");
    public static $unionpayPrefixList = array("62");
    /*
    'prefix' is the start of the CC number as a string, any number of digits.
    'length' is the length of the CC number to generate. Typically 13 or 16
    */
    public function completed_number($prefix, $length,$isfull) {
        $ccnumber = $prefix;
        # generate digits
        while ( strlen($ccnumber) < ($length - 1) ) {
            $ccnumber .= rand(0,9);
        }
        # Calculate sum
        $sum = 0;
        $pos = 0;
        $reversedCCnumber = strrev( $ccnumber );
        while ( $pos < $length - 1 ) {
            $odd = $reversedCCnumber[ $pos ] * 2;
            if ( $odd > 9 ) {
                $odd -= 9;
            }
            $sum += $odd;
            if ( $pos != ($length - 2) ) {
                $sum += $reversedCCnumber[ $pos +1 ];
            }
            $pos += 2;
        }
        # Calculate check digit
        $checkdigit = (( floor($sum/10) + 1) * 10 - $sum) % 10;
        $ccnumber .= $checkdigit;
        if($isfull){
            $ccnumber .= ','.$this->get_exp_year().'/'.$this->get_exp_month().','.$this->get_CVV();
        }
        return $ccnumber;
    }


    public function credit_card_number($prefixList, $length, $howMany,$isfull) {
        for ($i = 0; $i < $howMany; $i++) {
            $ccnumber = $prefixList[ array_rand($prefixList) ];
            $result[] = $this->completed_number($ccnumber, $length,$isfull);
        }
       /** if($howMany == 1){
            return array_pop($result);
        }else{
            return $result;
        }**/
        return $result;
    }

    public function get_mastercard($count = 1,$isfull){
        return $this->credit_card_number(self::$mastercardPrefixList, 16, $count,$isfull);
    }

    public function get_visa16($count = 1,$isfull){
        return $this->credit_card_number(self::$visaPrefixList, 16, $count,$isfull);
    }

    public function get_visa13($count = 1,$isfull){
        return $this->credit_card_number(self::$visaPrefixList, 13, $count,$isfull);
    }

    public function get_amex($count = 1,$isfull){
        return $this->credit_card_number(self::$amexPrefixList, 15, $count,$isfull);
    }

    public function get_unionpay($count = 1,$isfull){
        return $this->credit_card_number(self::$unionpayPrefixList, 16, $count,$isfull);
    }

    public function get_diners($count = 1,$isfull){
        return $this->credit_card_number(self::$dinersPrefixList, 16, $count,$isfull);
    }

    public function get_discover($count = 1,$isfull){
        return $this->credit_card_number(self::$discoverPrefixList, 16, $count,$isfull);
    }

    public function get_voyager($count = 1,$isfull){
         return $this->credit_card_number(self::$voyagerPrefixList, 16, $count,$isfull);
    }

    public function get_jcb($count = 1,$isfull){
         return $this->credit_card_number(self::$jcbPrefixList, 16, $count,$isfull);
    }

    public function get_enroute($count = 1,$isfull){
         return $this->credit_card_number(self::$enRoutePrefixList, 16, $count,$isfull);
    }





    public function get_CVV(){
        return rand(0, 9).rand(0, 9).rand(0, 9);
    }

    public function get_exp_year(){
        return date("Y") + rand(3, 7);
    }

    public function get_exp_month(){
        return rand(1, 12);
    }




}