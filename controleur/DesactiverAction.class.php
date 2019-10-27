<?php
class DesactiverAction implements Action
{
    public function execute()
    {
        if (!ISSET($_SESSION)) session_start();
        if (ISSET($_SESSION["connected"])) {
            return "desactiver";
        }
        else
            return "connecter";
    }
}