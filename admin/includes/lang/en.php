<?php

function lang($phrase)
{
    static $lang = array(

        // NAVBAR  lINKS
        'HOME_ADMIN' => 'Admin Area',
        'CATEGORIES' => 'Categories',
        'ITEMS' => 'Items',
        'MEMBERS' => 'Members',
        'STATISTICS' => 'Statistics',
        'LOGS' => 'Logs'
        // Homepage

        //Setting
    );

    return $lang[$phrase];
}