<?php
/*
Categories => [ Manage| Edit | Update | Add | Insert | Delete | Stats ]
*/

$action = isset($_GET['action']) ? $_GET['action'] : 'Manage';

// If The Page Is main Page

if ($action == 'Manage') {
    echo 'Welcome You Are In Manage Category Page';
    echo '<a href="page.php?action=Add">Add New Category +</a>';
} elseif ($action == 'Add') {

    echo 'Welcome You Are In Add Page';
} elseif ($action == 'Delete') {

    echo 'Welcome You Are In Delet Page';
} else {
    echo 'Error There\'s No page With This Name';
}