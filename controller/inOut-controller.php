<?php
include('../models/db.class.php'); // call db.class.php
$db = new db(); // create a new object, class db()
?>
<?php


// Rendre votre modèle accessible
include '../models/split-model.php';
// Création d'une instance
$oSplit = new LstSplitModel($db,$_GET['id_tbljob']);
$split=$oSplit->getSplit();


// Rendre votre modèle accessible
include '../models/workflow.class.php';
// Création d'une instance
$oWorkflow = new WORKFLOW($db,$_GET['id_tbljob']);
$splits=$oWorkflow->getAllSplit();
$eprouvettes=$oWorkflow->getAllEprouvettes();
  //var_dump($eprouvettes);
for($i=0;$i < count($eprouvettes);$i++)  {
  $epA[$eprouvettes[$i]['id_eprouvette']]=$eprouvettes[$i];
  //on ajoute a $ep la liste des id_tbljobs où cette ep est présente
  $ep[$eprouvettes[$i]['id_master_eprouvette']][$eprouvettes[$i]['id_tbljob']]=$eprouvettes[$i]['id_eprouvette'];
  //On ajoute les données de l'ep sur ce array
  foreach ($eprouvettes[$i] as $key=>$val){
    $ep[$eprouvettes[$i]['id_master_eprouvette']][$key]=$val;
  }
}



// Affichage du résultat
include '../views/inOut-view.php';
