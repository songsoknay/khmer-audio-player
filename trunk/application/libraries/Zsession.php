<?php
class Zsession {
	const SESSION_KEY = "Z_FRONT_END"; 
	const SESSION_USER_KEY = "Z_USER_KEY";
	const SESSION_DATA_KEY = "Z_DATA_KEY";
	
	static function setUserToSession($user) {
        $_SESSION[Zsession::SESSION_KEY][Zsession::SESSION_USER_KEY] = $user; 
    }
    
    static function setDataToSession($key, $data) {
        $_SESSION[Zsession::SESSION_KEY][Zsession::SESSION_DATA_KEY][$key] = $data;
    }
    
    static function removeDataFromSession($key) {
        unset($_SESSION[Zsession::SESSION_KEY][Zsession::SESSION_DATA_KEY][$key]);
    }
    
    static function destroySession() {
    	unset($_SESSION[Zsession::SESSION_KEY][Zsession::SESSION_DATA_KEY]);
    	unset($_SESSION[Zsession::SESSION_KEY]);
    } 
    
    static function getUserFromSession() {
       if (!isset($_SESSION[Zsession::SESSION_KEY][Zsession::SESSION_USER_KEY])) {
           return null;
       }
       return $_SESSION[Zsession::SESSION_KEY][Zsession::SESSION_USER_KEY];
    }
}