<?php
/**
 * Convert a postgres date to php date
 * @param $mysql_date
 */
function postgres_to_date($postgres_date) {
	if ($postgres_date == NULL || $postgres_date == "") {
		return NULL;
	}
	
	$arr = explode("-", $postgres_date);
	return mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]);
}

/**
 * Convert PHP date to string with a specific format
 * @param $php_date
 * @param $format
 */
function date_to_date_format($php_date, $format) {
	$formats = array("Y-M-D", 
	                 "M/D/Y",
	                 "D/M/Y"
	           );
	$format = strtoupper($format);
	if ($php_date == NULL || !in_array($format, $formats)) {
		return NULL;
	}
	
    if ($format == "Y-M-D") {
    	return date("Y-m-d", $php_date);
    } else if ($format == "D/M/Y") {
    	return date("d/m/Y", $php_date);
    } else if ($format == "M/D/Y") {
    	return date("m/d/Y", $php_date);
    } else {
    	return NULL;
    }
}

/**
 * Convert postgres date to html date
 * @param $postgres_date
 * @param $format
 */
function date_postgres_to_html($postg_date, $format=Z_DATE_FORMAT) {
	$arr = explode(" ", $postg_date);
	$postgres_date = $arr[0];
	$php_date = postgres_to_date($postgres_date);
	return date_to_date_format($php_date, $format);
}


function datetime_postgres_to_html($postgres_datetime, $format=Z_DATE_FORMAT) {
	$arr = explode(" ", $postgres_datetime);
	$postgres_date = $arr[0];
	$datetime_arr = explode(".", $arr[1]);
	$datetime = $datetime_arr[0]; 
	$php_date = postgres_to_date($postgres_date);
	return date_to_date_format($php_date, $format)." ".$datetime;
}



function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 
