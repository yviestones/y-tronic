<?php

$navigation = [
    "index.php"  => "Home",
    "project.php" => "Projekte",
    "contact.php" => "Kontakt",
    "login.php" => "Login"  
];

$current_page = basename($_SERVER['PHP_SELF']); // Dies ermittelt den Dateinamen der aktuellen Seite

echo "<ul>";
foreach($navigation as $nav => $titel){

  $class = ($current_page == $nav) ? 'class="active"' : ''; // Überprüfen,
  
  echo "<li><a href='$nav' $class>$titel</a></li>\n";

  }
echo "</ul>\n";
?>
