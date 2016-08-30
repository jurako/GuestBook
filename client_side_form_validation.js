function validate_input()
{
    var validInput = true; //flag
    
    if (!checkUsername()) //if username invalid
    {
        validInput = false; // flag = false
    }
    
    if (!checkEmail()) //if email invalid
    {
        validInput = false; //flag = false
    }
    
    if (!checkHomepage()) //if homepage URL is invalid
    {
        validInput = false; //flag = false
    }

    if (validInput) {
        return true;
    } else {
        return false;
    }

}

function checkUsername()
{
    var username = document.getElementById('username').value;

    if (username === "") {
        document.getElementById('usernameError').innerHTML = "Required field!";
        $('#username').addClass('red-border');
        return false;
    } else {
        document.getElementById('usernameError').innerHTML = "";
        $('#username').removeClass('red-border');      
    }
    
    if (username.match(/^[a-z0-9]+$/i) === null) {
        document.getElementById('usernameError').innerHTML = "Only alphanumeric characters are allowed!";
        $('#username').addClass('red-border');
        return false;
    } else {
        document.getElementById('usernameError').innerHTML = "";
        $('#username').removeClass('red-border');       
    }

    //if no mistakes - submit form
    return true;
}

function checkEmail()
{
    var email = document.getElementById('email').value;
    
    if (email === "") {
        document.getElementById('emailError').innerHTML = "Required field!";
        $('#email').addClass('red-border');
        return false;
    } else {
        document.getElementById('emailError').innerHTML = "";
        $('#email').removeClass('red-border');          
    }
    
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    if(email.match(regex) === null) {
        document.getElementById('emailError').innerHTML = "Incorrect email format!";
        $('#email').addClass('red-border');
        return false;
    } else {
        document.getElementById('emailError').innerHTML = "";
        $('#email').removeClass('red-border');        
    }      
    
    //if no mistakes - submit form
    return true;
}

function checkHomepage() 
{
    var homepage = document.getElementById('homepage').value;
    
    if(homepage) {  //if homepage value is not empty
            var strRegex = "^((https|http|ftp|rtsp|mms)?://)"
            + "?(([0-9a-z_!~*'().&=+$%-]+: )?[0-9a-z_!~*'().&=+$%-]+@)?" //ftp的user@
            + "(([0-9]{1,3}\.){3}[0-9]{1,3}" // IP形式的URL- 199.194.52.184
            + "|" // 允许IP和DOMAIN（域名）
            + "([0-9a-z_!~*'()-]+\.)*" // 域名- www.
            + "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\." // 二级域名
            + "[a-z]{2,6})" // first level domain- .com or .museum
            + "(:[0-9]{1,4})?" // 端口- :80
            + "((/?)|" // a slash isn't required if there is no file name
            + "(/[0-9a-z_!~*'().;?:@&=+$,%#-]+)+/?)$";

        var re=new RegExp(strRegex);

        if(!re.test(homepage)) {
            document.getElementById('homepageError').innerHTML = "Incorrect URL format!";
            $('#homepage').addClass('red-border');
            return false;
        } else {
            document.getElementById('homepageError').innerHTML = "";
            $('#homepage').removeClass('red-border'); 
        }

        //if no mistakes - submit form
        return true;    
    } else
        return true;
}