<?php
/*
 *  Copyright (c) 2013  Rasmus Fuhse <fuhse@data-quest.de>
 *
 *  This program is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU General Public License as
 *  published by the Free Software Foundation; either version 2 of
 *  the License, or (at your option) any later version.
 */
require_once dirname(__file__)."/classes/SK_Rechte.class.php";
require_once dirname(__file__)."/classes/SK_Message.class.php";

class StabKommunikation extends StudIPPlugin implements StandardPlugin {
    
    public function getNotificationObjects($course_id, $since, $user_id) {
        return null;
    }
    
    public function getTabNavigation($course_id) {
        $nav = new AutoNavigation(_("StabKommunikation"), PluginEngine::getURL($this, array(), SK_Rechte::isFunker() ? "messages/new" : "messages/my"));
        $nav->setImage(Assets::image_path("icons/16/white/log.png"));
        return array('stabkommunikation' => $nav);
    }
    
    public function getInfoTemplate($course_id) {
        return null;
    }
    
    public function getIconNavigation($course_id, $last_visit, $user_id) {
        $nav = new Navigation(_("StabKommunikation"), PluginEngine::getURL($this, array(), SK_Rechte::isFunker() ? "messages/new" : "messages/my"));
        $nav->setImage(Assets::image_path("icons/16/grey/log.png"), array('title' => _("StabKommunikation")));
        return $nav;
    }
    
    /**
    * This method dispatches and displays all actions. It uses the template
    * method design pattern, so you may want to implement the methods #route
    * and/or #display to adapt to your needs.
    *
    * @param  string  the part of the dispatch path, that were not consumed yet
    *
    * @return void
    */
    public function perform($unconsumed_path) {
        if(!$unconsumed_path) {
            header("Location: " . PluginEngine::getUrl($this), 302);
            return false;
        }
        $trails_root = $this->getPluginPath();
        $dispatcher = new Trails_Dispatcher($trails_root, null, 'show');
        $dispatcher->current_plugin = $this;
        $dispatcher->dispatch($unconsumed_path);
    }
}
