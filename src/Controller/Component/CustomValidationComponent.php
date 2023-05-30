<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * CustomValidation component
 */
class CustomValidationComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     *
     * @param unknown $field
     * @return number
     */
    public function isEmpty($field = null)
    {
        if ($field == '' || empty($field)) {
            return " is Required.";
        } else {
            return 0;
        }
    }

    /**
     *
     * @param unknown $nameField
     * @return number
     */
    public function isNameField($nameField = null)
    {
        if ($nameField == '' || empty($nameField)) {                          // When value is empty
            return " is Required.";//1;
        } else if (!empty($nameField)) {
            if ((strlen($nameField) < 3) || (strlen($nameField) > 50)) {     // When length is less than 3 and greater than 50
                return " Length should be at least 3 char minimum and 50 char maximun.";//2;
            } else if (!preg_match('/^[\p{L} ]+$/u', $nameField)) {           // When name is not character
                return " can only be character.";//3;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /**
     *
     * @param unknown $field
     * @return number
     */
    public function isMobile($field = null)
    {
//        echo $field;
//        echo "<br />";
        $firstDigit = (string)$field;
        if ($field == '' || empty($field)) {                  // When value is empty
            return "Mobile is Required.";
        } else if (!empty($field)) {
            if (strlen($field) != 10) {                       // When mobile length is not 10
                return "Mobile Length must be 10 digit only.";
            } else if ($firstDigit[0] <= 5) {                 // When first digit is less than or equals to 5
                return "Mobile number must not start with 0/1/2/3/4/5 .";
            } else if (!preg_match('/^[0-9]+$/', $field)) {    // When mobile is not digit value
                return "Mobile must be only digit value.";
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /**
     *
     * @param type string
     * @return type integer
     */
    public function isEmailField($email = null)
    {
        if ($email == '' || empty($email)) {                          // When value is empty
            return " is Required.";//1;
        } else if (!empty($email)) {
            if ((strlen($email) < 3)) {     // When length is less than 3 and greater than 50
                return " Length should be at least 3 char minimum and 50 char maximun.";//2;
            } else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {  // When email is not valid
                return " is Invallid.";//3;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /**
     *
     * @param type string
     * @return type integer
     */
    public function isRegistrationNo($reggNo = null)
    {
        if ($reggNo == '' || empty($reggNo)) { // When value is empty
            return " is Required.";//1;
        } else if (!empty($reggNo)) {
            if ((strlen($reggNo) != 10)) {     // When length is less than 3 and greater than 50
                return " Length should be at least 10 char minimum and 10 char maximun.";//2;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /**
     *
     * @param type string
     * @return type integer
     */
    public function isDate($date = null)
    {
        $dteStr = strchr($date, '-');
        if ($date == '' || empty($date)) {
            return 0;
        } else if (!empty($date)) {
            $dateLength = strlen($dteStr);
            if ($dateLength > 5) {
                return " is required";
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }

    /**
     *
     * @param unknown $field
     * @param unknown $accLength
     * @return number
     */
    public function isBankAccountNum($field = null, $accLength = null)
    {
        if (($field == '' || empty($field))) {  // When bankId or fieldi is empty
            return "Account Number is Required.";
        } else if (($accLength == '' || empty($accLength))) {
            return "Account Number should be " . $accLength . " digit long.";
        } else if (!empty($field)) {
            if (strlen($field) != $accLength) {               // When account length is not valid
                return "Invalid Account Number Length.";
            } else if (!preg_match('/^[0-9]+$/', $field)) {    // When account is not digit value
                return "Account Number can only be digit value.";
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /**
     *
     * @param unknown $uid
     * @return number
     */
    public function validateUID($uid = null)
    {
        if (is_numeric($uid) && !empty($uid) && (strlen($uid) == 12) && (substr($uid, 0, 1) != 0) && (substr($uid, 0, 1) != 1)) {
            $verhoffCheck = $this->uidVerhoffCheck($uid);
            $verhoffCheck2 = $this->uidVerhoff($uid);
            if (($verhoffCheck !== 0) || ($verhoffCheck2 == 1)) {
                return "Invalid UID.";
            } else {
                return 0;
            }
        } else if ((substr($uid, 0, 1) == 0) || (substr($uid, 0, 1) == 1)) {
            return "Invalid UID.";
        } else {
            return 0;
        }
    }

    /**
     *
     * @param type $uid
     * @return type
     */
    public function uidVerhoff($uid = null)
    {
        $uidLen = strlen($uid);
        $initial = 0;
        $final = 2;
        for ($i = 0; $i < $uidLen; $i++) {
            $choppedUid = substr($uid, $initial, 3);
            for ($x = 2; $x <= 9; $x++) {
                if ((substr($choppedUid, 0, 1) == $x) && (substr($choppedUid, 1, 1) == $x) && (substr($choppedUid, 2, 1) == $x)) {
                    return 1;
                }
            }
            $initial += 1;
            $final += 1;
        }
    }

    /**
     *
     * @param type $j
     * @param type $k
     * @return array
     */
    public function uidVerhoffData($j, $k)
    {
        $table = array(
            array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 2, 3, 4, 0, 6, 7, 8, 9, 5),
            array(2, 3, 4, 0, 1, 7, 8, 9, 5, 6),
            array(3, 4, 0, 1, 2, 8, 9, 5, 6, 7),
            array(4, 0, 1, 2, 3, 9, 5, 6, 7, 8),
            array(5, 9, 8, 7, 6, 0, 4, 3, 2, 1),
            array(6, 5, 9, 8, 7, 1, 0, 4, 3, 2),
            array(7, 6, 5, 9, 8, 2, 1, 0, 4, 3),
            array(8, 7, 6, 5, 9, 3, 2, 1, 0, 4),
            array(9, 8, 7, 6, 5, 4, 3, 2, 1, 0),
        );
        return $table[$j][$k];
    }

    /**
     *
     * @param type $pos
     * @param type $num
     * @return array
     */
    public function uidVerhoffPosition($pos, $num)
    {
        $table = array(
            array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
            array(1, 5, 7, 6, 2, 8, 3, 0, 9, 4),
            array(5, 8, 0, 3, 7, 9, 6, 1, 4, 2),
            array(8, 9, 1, 6, 0, 4, 3, 5, 2, 7),
            array(9, 4, 5, 3, 1, 2, 6, 8, 7, 0),
            array(4, 2, 8, 6, 5, 7, 3, 9, 0, 1),
            array(2, 7, 9, 3, 8, 0, 6, 4, 1, 5),
            array(7, 0, 4, 6, 9, 1, 3, 2, 5, 8),
        );
        return $table[$pos % 8][$num];
    }

    /**
     *
     * @param type $number
     * @return type
     */
    public function uidVerhoffCheck($number)
    {
        $c = 0;
        $n = strrev($number);
        $len = strlen($n);
        for ($i = 0; $i < $len; $i++) {
            $c = $this->uidVerhoffData($c, $this->uidVerhoffPosition($i, $n[$i]));
        }
        return $c;
    }
}
