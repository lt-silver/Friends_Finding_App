<?php
class Welcome_model extends CI_Model {
    public function getName()
    {
        $appName = "FriendFinder";
        return $appName;
    }
}
