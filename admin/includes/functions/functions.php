<?php

/*
** Title Function V1.0
** Title Fumction The Echo the page Title In case The page
** Has The Varibale  $pageTitle And Echo Defult Title For Other Page
*/

function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo 'Default';
    }
}

/*
 ** Home Redirect Function v 2.0
 ** [ This Function Parameters ]
 ** theMsg = Echo The Error Messgae [ Errror, Message]
 ** URL = The Link You Want To edirecting
 ** $Second = Seconds Before Redirecting
 */

function redirectHome($theMsg, $url = null, $seconds = 3){

    if($url === null){

        $url = 'index.php';

        $link = 'Homepage';
    }else{

        if(isset($_SERVER['HTTP_PEFERER']) &&$_SERVER['HTTP_PEFERER'] !== ''){

            $url = $_SERVER['HTTP_PEFERER'];

            $link = 'Previoud Page';

        }else{

            $url = 'index.php';

            $link = 'Homepage';
        }


    }

    echo $theMsg;

    echo "<div class='alert alert-info'>You Will Be Redicted to $link After $seconds .Seconds </div>";

    header("refresh:$seconds;url=$url");

    exit();
}

/*
 ** Check Item Function V 1.0
 ** Function To Check Item In Database [ Function Accept Parameters]
 ** $select =The Item To Select [ Example : user, item, category]
 ** $from = the table To Select From [ Example : user, item, category]
 ** $value = the Value of Select  [ Example : user, item, category]
 */

function checkItem($select, $from, $value){

    global $con;
    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

    $statement->execute(array($value));

    $count = $statement->rowCount();

    return $count;

}