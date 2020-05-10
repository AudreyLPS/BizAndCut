- npm i
- npm run watch
- composer i


- composer require annotations
- composer require encore
- composer require symfony/twig-bundle

- composer require symfony/form
- composer require validator

Mettre a jour la BBD: 
 - git pull
 - Vider votre base de donnée 'bizcut' via phpMyAdmin
 - Vider le dossier BizAndCut\src\Migration ( si il ne l'ai pas déjà ) 
 - symfony console make:migration
 - symfony console doctrine:migration:migrate -n
 - via phpMyadmin executé la requete suivant : 
INSERT INTO `devis_statut` (`id`, `texte_devis_statut`) VALUES
(1, 'En attente'),
(2, 'Accepté'),
(3, 'Refusé');
 - symfony serve 
