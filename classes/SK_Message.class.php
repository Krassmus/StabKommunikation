<?php
/*
 *  Copyright (c) 2013  Rasmus Fuhse <fuhse@data-quest.de>
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License as
 *  published by the Free Software Foundation; either version 2 of
 *  the License, or (at your option) any later version.
 */

class SK_Message extends SimpleORMap {
    
    public function findAll($seminar_id, $limit = null, $offset = 0) {
        if ($limit) {
            return self::findBySQL("seminar_id = ? LIMIT ".(int) $offset.", ".(int) $limit, array($seminar_id));
        } else {
            return self::findBySQL("seminar_id = ?", array($seminar_id));
        }
    }
    
    public function __construct($id = null) {
        $this->db_table = "stabkommunikation_message";
        parent::__construct($id);
    }
}