<?php

/*
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