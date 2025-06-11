<body style="background-color: #999999">
<h1>voitures</h1>

<?php require 'Voiture.php';

/**/

$v1 = new Voiture("Peugeot", "408", 5);
$v2 = new Voiture("Citroën", "C4", 3);

echo $v1->demarrer();
echo $v1->accelerer(50);
echo $v2->demarrer();
echo $v2->stopper();
echo $v2->accelerer(20);
echo $v1->getVitesse()."<br>";
echo $v2->getVitesse()."<br>";
echo $v1->setMarque("Pontiac");
echo $v1->setModele("LeMans");

echo $v1->ficheInfo();
echo $v2->ficheInfo();
echo ".........test ralentir.....<br>";
echo $v1->ralentir(40);
echo $v1->ralentir(30);
echo $v2->ralentir(10);
echo ".........test __toString().....<br>";
echo $v1; // test __toString

