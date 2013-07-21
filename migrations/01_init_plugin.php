<?php
/*
 *  Copyright (c) 2013  Rasmus Fuhse <fuhse@data-quest.de>
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License as
 *  published by the Free Software Foundation; either version 2 of
 *  the License, or (at your option) any later version.
 */

class InitPlugin extends DBMigration
{
    function up() {
        DBManager::get()->exec("
            CREATE TABLE IF NOT EXISTS `stabkommunikation_message` (
                `message_id` varchar(32) NOT NULL,
                `absender` text NOT NULL,
                `adressat` text NOT NULL,
                `transporter` varchar(64) NOT NULL,
                `message` text COLLATE latin1_general_ci NOT NULL,
                `mkdate` bigint(20) NOT NULL,
                `chdate` bigint(20) NOT NULL,
                PRIMARY KEY (`message_id`)
            ) ENGINE=MyISAM
        ");
        DBManager::get()->prepare("
            CREATE TABLE IF NOT EXISTS `stabkommunikation_message_relation` (
                `message_id` varchar(32) NOT NULL,
                `statusgruppe_id` varchar(32) NOT NULL,
                `done` tinyint(4) NOT NULL DEFAULT '0',
                `chdate` int(11) NOT NULL,
                KEY `message_id` (`message_id`),
                KEY `statusgruppe_id` (`statusgruppe_id`)
            ) ENGINE=MyISAM
        ");
    }
    
    function down() {
        DBManager::get()->exec("DROP TABLE IF EXISTS `stabkommunikation_message` ");
        DBManager::get()->exec("DROP TABLE IF EXISTS `stabkommunikation_message_relation` ");
    }
    
    
}