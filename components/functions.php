<?php

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

function saveMessage()
{
    // get browser info
    $ua=getBrowser();
    $user_browser= $ua['name'] . " " . $ua['version'];   

    $pdoStatement = $db->prepare("INSERT INTO messages (username, email, text, homepage, user_ip, user_agent) "
                                 . "VALUES (:username, :email, :text, :homepage, :user_ip, :user_agent)");
    $pdoStatement->execute(array(':username' => $_POST['username'], ':email' => $_POST['email'],
                                  ':text' => $_POST['text'], ':homepage' => $_POST['homepage'],
                                  ':user_ip' => $_SERVER['REMOTE_ADDR'], ':user_agent' => $user_browser));
}

function checkUsername($username) 
{
    if (empty($username))
    {
        return "Field required!";
    }
    if (preg_match('/[^A-Za-z0-9]/', $username)) 
    {
        return "Incorrect user name format!";
    }

    return "";
}

function checkEmail($email)
{
    if (empty($email))
    {
        return "Field required!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return "Incorrect e-mail format!";
    }

    return "";
}

function checkHomepage($homepage)
{
    if (!empty($homepage)) {
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$homepage))
        {
            return "Incorrect URL format!";
        }     
    }

    return "";
}

function checkText($text)
{
    if (empty($text))
    {
        return "Field required!";
    }
    return "";
}
?>