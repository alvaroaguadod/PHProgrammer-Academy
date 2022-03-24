<?php
if (!isset($_SESSION["nivel"]) OR $_SESSION["nivel"]<3){echo "<h1>No se puede acceder directamente o no tiene nivel para acceder";exit;};