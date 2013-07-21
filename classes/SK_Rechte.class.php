<?php
/*
 *  Copyright (c) 2013  Rasmus Fuhse <fuhse@data-quest.de>
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License as
 *  published by the Free Software Foundation; either version 2 of
 *  the License, or (at your option) any later version.
 */

class SK_Rechte {
    
    static protected $funker = "Funker";
    static protected $LdF = "LdF";
    
    static public function isFunker($user_id = null, $seminar_id = null) {
        $user_id OR $user_id = $GLOBALS['user']->id;
        $seminar_id OR $seminar_id = $_SESSION['SessionSeminar'];
        return self::isGroupmember($user_id, $seminar_id, self::$funker);
    }
    
    static public function isLDF($user_id = null, $seminar_id = null) {
        $user_id OR $user_id = $GLOBALS['user']->id;
        $seminar_id OR $seminar_id = $_SESSION['SessionSeminar'];
        if ($GLOBALS['perm']->have_perm("root", $user_id)) {
            return true;
        } else {
            return self::isGroupmember($user_id, $seminar_id, self::$LdF);
        }
    }
    
    static protected function isGroupmember($user_id, $seminar_id, $groupname) {
        $statement = DBManager::get()->prepare(
            "SELECT 1 " .
            "FROM statusgruppe_user " .
                "INNER JOIN statusgruppen ON (statusgruppe_user.statusgruppe_id = statusgruppen.statusgruppe_id) " .
            "WHERE statusgruppen.name = :name " .
                "AND statusgruppen.range_id = :seminar_id " .
                "AND statusgruppe_user.user_id = :user_id " .
        "");
        $statement->execute(array(
            'name' => $groupname,
            'seminar_id' => $seminar_id,
            'user_id' => $user_id
        ));
        return (bool) $statement->fetch(PDO::FETCH_COLUMN, 0);
    }
    
}