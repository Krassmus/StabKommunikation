<?php

require_once dirname(__file__)."/application.php";

class MessagesController extends ApplicationController {
    
    public function before_filter($action, $args) {
        if (!$GLOBALS['perm']->have_perm("autor")) {
            throw new AccessDeniedException("Forbidden planet");
        }
        parent::before_filter($action, $args);
        if (Navigation::hasItem("/course/stabkommunikation")) {
            Navigation::getItem("/course/stabkommunikation")->setImage(Assets::image_path("icons/16/black/log.png"), array('title' => _("StabKommunikation")));
        }
    }
    
    public function my_action() {
        if (SK_Rechte::isLDF()) {
            $this->messages = SK_Message::findAll($_SESSION['SessionSeminar']);
        } else {
            
        }
    }
    
    public function new_action() {
        
    }
}