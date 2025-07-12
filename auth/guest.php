<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  $guestId = rand(1000, 9999); 
  $_SESSION['user_id'] = "guest_$guestId"; 
  $_SESSION['username'] = "Guest $guestId"; 
  $_SESSION['is_guest'] = true; 
} 
header('Location: /home'); 
exit;