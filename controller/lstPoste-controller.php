<?php
include_once('../models/db.class.php'); // call db.class.php
$db = new db(); // create a new object, class db()
?>
<?php

// Rendre votre modèle accessible
include '../models/lstPoste-model.php';

// Création d'une instance
$lstPoste = new LstPosteModel($db);

// Affichage du résultat
include '../views/lstPosteSplit-view.php';
