<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guest Book</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="container">
            <div id="messages">
                <div id="message">
                    <p>asdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                </div>
            </div>
            <div id="input">
                <h3>Leave a message!</h3>
                <form action="saveMessage.php" method="post">
                    <label>User Name<span class="red-star">*</span>: </label>
                    <input type="text" name="username"><br />
                    <label>E-Mail<span class="red-star">*</span>: </label>
                    <input type="text" name="email"><br />
                    <label>Homepage: </label> 
                    <input type="text" name="homepage"><br />
                    <!-- CAPTCHA -->
                    <label class="align-top">Message<span class="red-star">*</span>: </label> 
                    <textarea name="text" rows="5" cols="40"></textarea><br />
                    <input id="submit-button" type="submit" name="sendMessage" value="Submit!">
                </form>               
                
            </div>
        </div>
    </body>
</html>
