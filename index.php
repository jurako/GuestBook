<?php
    session_start();
    require_once 'components/db_connection.php';
    require_once 'components/functions.php';
    require_once 'sort_messages.php';
    
    //display messages
    if (isset($_POST['sortDate'])) {
        $messages = sortMessages("date");
    } elseif (isset($_POST['sortUsername'])) {
        $messages = sortMessages("username");
    } elseif (isset($_POST['sortEmail'])) {
        $messages = sortMessages("email");
    } else {
        $messages = getMessages();
    }
    
    //user input validation
    $errors = array (
        "username" => "",
        "email" => "",
        "homepage" => "",
        "text" => ""
    );
    
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
        <script type="text/javascript" src="sorting_functions.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="messages">   
                <form id="sort-form" action="" method="POST">
                <table id="main-table">
                    <tr>
                        <!---------------------------- SORTING ---------------------------------->
                        <th class="filter-buttons">
                            <div class="sort-button" id="sortByDate" onclick="submitButton('sortDate');">Date 
                            <!-- sort icon -->
                            <?php $date = $_SESSION["sortOrders"]["date"];
                                  if(empty($date)) { 
                                    echo "<img class='sort-icon' style='display: none'  src='sort_desc.png' alt='sort descending'>";
                                } elseif ($date == "ASC") { 
                                    echo "<img class='sort-icon' style='display: inline-block'  src='sort_asc.png' alt='sort ascending'>";
                                } elseif ($date == "DESC") { 
                                    echo "<img class='sort-icon' style='display: inline-block'  src='sort_desc.png' alt='sort descending'>";
                                } ?>
                            </div>    
                            <input type="submit" name="sortDate" id="sortDate" style="display: none;">
                        </th>
                        <th class="filter-buttons">
                            <div class="sort-button" id="sortByUsername" onclick="submitButton('sortUsername');">Username 
                            <!-- sort icon -->
                            <?php $username = $_SESSION["sortOrders"]["username"];
                                  if(empty($username)) { 
                                    echo "<img class='sort-icon' style='display: none'  src='sort_desc.png' alt='sort descending'>";
                                } elseif ($username == "ASC") { 
                                    echo "<img class='sort-icon' style='display: inline-block'  src='sort_asc.png' alt='sort ascending'>";
                                } elseif ($username == "DESC") { 
                                    echo "<img class='sort-icon' style='display: inline-block'  src='sort_desc.png' alt='sort descending'>";
                                } ?>
                            </div>    
                            <input type="submit" name="sortUsername" id="sortUsername" style="display: none;">
                        </th>
                        <th class="filter-buttons">
                            <div class="sort-button" id="sortByEmail" onclick="submitButton('sortEmail');">E-mail 
                            <!-- sort icon -->
                            <?php $email = $_SESSION["sortOrders"]["email"];
                                  if(empty($email)) { 
                                    echo "<img class='sort-icon' style='display: none'  src='sort_desc.png' alt='sort descending'>";
                                } elseif ($email == "ASC") { 
                                    echo "<img class='sort-icon' style='display: inline-block'  src='sort_asc.png' alt='sort ascending'>";
                                } elseif ($email == "DESC") { 
                                    echo "<img class='sort-icon' style='display: inline-block'  src='sort_desc.png' alt='sort descending'>";
                                } ?>
                            </div>    
                            <input type="submit" name="sortEmail" id="sortEmail" style="display: none;">
                        </th>
                        <!-----------------------------END SORTING------------------------------------->
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
