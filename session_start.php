<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Démarre la session si elle n'a pas encore été démarrée
}
?>