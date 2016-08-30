<?php
    require_once 'components/db_connection.php';
    require_once 'components/functions.php';
    require_once 'sort_messages.php';
    
    //display messages
    $messages = getMessages();
    
    //user input validation
    $errors = array (
        "username" => "",
        "email" => "",
        "homepage" => "",
        "text" => ""
    );
    
    //sort messages
    if (isset($_POST['']))
    
    //send message
    if (isset($_POST['sendMessage']))
    {
        $errors['username'] = checkUsername($_POST['username']);
        $errors['email'] = checkEmail($_POST['email']);
        $errors['homepage'] = checkHomepage($_POST['homepage']);
        $errors['text'] = checkText($_POST['text']);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guest Book</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="validation_functions.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="messages">
                <form id="sort-form" action="sort_messages.php" method="POST">
                <table id="main-table">
                    <tr>
                        <th class="filter-buttons">
                            <input type="hidden" id="hiddenDate" value="ASC">
                            <input class="sort-button" type="submit" name="sortButton" value="DateASC" onclick="changeSortingOrder();">
                        </th>
                        <th class="filter-buttons">
                            <input class="sort-button" type="submit" name="sortButton" value="UsernameASC">                      
                        </th>
                        <th class="filter-buttons">
                            <input class="sort-button" type="submit" name="sortButton" value="E-mailASC"> 
                        </th>
                    </tr>
                    <?php  foreach ($messages as $message) { ?>
                        <tr>
                            <td class="table-head"><?php echo $message['date']; ?></td>
                            <td class="table-head"><?php echo $message['username']; ?></td>
                            <td class="table-head"><?php echo $message['email']; ?></td>
                        </tr>
                        <tr>
                            <td class="table-text" colspan="3"><?php echo $message['text']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
                </form>
            </div>
            <div id="input">
                <h3>Leave a message!</h3>
                <form action="" method="post" onsubmit="return validate_input();">
                    <label>User Name<span class="red-star">*</span>: </label>
                    <input type="text" id="username" name="username" value="<?php if (!empty($errors['username'])) echo $_POST['username']; ?>" >
                    <p id="usernameError" class="errorText"><?php echo $errors['username']; ?></p><br />
                    <label>E-Mail<span class="red-star">*</span>: </label>
                    <input type="text" id="email" name="email" value="<?php if (!empty($errors['email'])) echo $_POST['email']; ?>" >
                    <p id="emailError"  class="errorText"><?php echo $errors['email']; ?></p><br />
                    <label>Homepage: </label> 
                    <input type="text" id="homepage" name="homepage" value="<?php if (!empty($errors['homepage'])) echo $_POST['homepage']; ?>" >
                    <p id="homepageError"  class="errorText"><?php echo $errors['homepage']; ?></p><br />
                    <!-- CAPTCHA -->
                    <label class="align-top">Message<span class="red-star">*</span>: </label> 
                    <textarea id="text" name="text" rows="5" cols="40"></textarea>
                    <p id="textError"  class="errorText align-top"><?php echo $errors['text']; ?></p><br />
                    <input id="submit-button" type="submit" name="sendMessage" value="Submit!">
                </form>               
                
            </div>
        </div>
        
    </body>
</html>
