<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PokemonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $pokemons = [
            [
                'nom' => 'Bulbizarre',
                'description' => "Bulbizarre est un petit quadrupède vert avec une tête large. Il porte un bulbe sur son dos, servant d'organe de stockage. Il peut survivre plusieurs jours sans manger grâce à l'énergie accumulée. Son bulbe grandit en absorbant les rayons du soleil. Il utilise souvent Vampigraine et Fouet Lianes.",
                'attaque' => 49,
                'defense' => 49,
                'est_capture' => false,
            ],
            [
                'nom' => 'Salamèche',
                'description' => "Salamèche est un Pokémon bipède orange. Sa flamme indique sa santé et son humeur. Elle s’éteint s’il meurt. Il vit dans les montagnes chaudes et vit en groupe. Ses bras et jambes sont courts, et il a une queue fine terminée par une flamme.",
                'attaque' => 52,
                'defense' => 43,
                'est_capture' => false,
            ],
            [
                'nom' => 'Carapuce',
                'description' => "Carapuce est une petite tortue bleue avec une carapace brune. Sa carapace durcit avec le temps et l’aide à se protéger. Elle améliore aussi son hydrodynamisme pour ses attaques d’eau. Il a une queue en spirale et de grands yeux violets.",
                'attaque' => 48,
                'defense' => 65,
                'est_capture' => false,
            ],
            [
                'nom' => 'Chenipan',
                'description' => "Chenipan est une chenille verte avec une antenne rouge. Il utilise une odeur repoussante pour se défendre. Ses pattes ventouses lui permettent d’escalader facilement. Il se nourrit de grandes feuilles et vit dans les forêts.",
                'attaque' => 30,
                'defense' => 35,
                'est_capture' => false,
            ],
            [
                'nom' => 'Roucool',
                'description' => "Roucool est un petit oiseau marron à la crête bicolore. Il a un bon sens de l’orientation et préfère fuir que combattre. Il utilise ses ailes pour soulever la poussière et créer des tourbillons défensifs.",
                'attaque' => 45,
                'defense' => 40,
                'est_capture' => false,
            ],
            [
                'nom' => 'Rattata',
                'description' => "Rattata est un rongeur violet à quatre pattes. Il a deux grandes dents qui repoussent sans cesse. Il est rapide, grâce à ses moustaches, et possède une queue recourbée. Son ouïe est très développée.",
                'attaque' => 56,
                'defense' => 35,
                'est_capture' => false,
            ],
            [
                'nom' => 'Piafabec',
                'description' => "Piafabec est un petit oiseau agressif au plumage brun et rouge. Il vit en groupe de trente individus. Il attaque les Pokémon et les Dresseurs sur son territoire. Il est peureux et vit en clan.",
                'attaque' => 60,
                'defense' => 30,
                'est_capture' => false,
            ],
            [
                'nom' => 'Pikachu',
                'description' => "Pikachu est un rongeur jaune avec des poches électriques rouges sur les joues. Sa queue est en forme d’éclair. Il est capable de marcher debout. Il stocke de l’électricité dans ses joues, comme un écureuil.",
                'attaque' => 55,
                'defense' => 40,
                'est_capture' => false,
            ],
            [
                'nom' => 'Psykokwak',
                'description' => "Psykokwak ressemble à un canard jaune. Il souffre souvent de migraines, ce qui déclenche ses pouvoirs psychiques. Il a un bec aplati et des pattes palmées. Il n’est pourtant pas de type Psy.",
                'attaque' => 52,
                'defense' => 48,
                'est_capture' => false,
            ],
            [
                'nom' => 'Férosinge',
                'description' => "Férosinge est un singe crème à l’air furieux. Il est très colérique. Il a un groin de cochon, des membres puissants et une queue longue. Ses yeux rouges le rendent très expressif.",
                'attaque' => 80,
                'defense' => 35,
                'est_capture' => false,
            ],
            [
                'nom' => 'Arcanin',
                'description' => "Arcanin est un grand chien à la fourrure orange et noire. Il est majestueux et puissant. Sa crinière est épaisse et beige. Ses touffes de poils lui donnent un air royal. Il possède une queue hirsute.",
                'attaque' => 110,
                'defense' => 80,
                'est_capture' => false,
            ],
            [
                'nom' => 'Abra',
                'description' => "Abra est une créature jaune, à la tête féline. Il dort souvent et utilise la téléportation pour fuir. Il a une queue épaisse et ses bras/jambes sont protégés par une armure marron. Ses yeux sont presque toujours fermés.",
                'attaque' => 20,
                'defense' => 15,
                'est_capture' => false,
            ]
        ];


        foreach ($pokemons as $data) {

            $nom = $data['nom'];
            $imagePath = 'img/pokemon/' . $nom . '.png';

            $pokemon = new Pokemon();
            $pokemon->setNom($data['nom']);
            $pokemon->setDescription($data['description']);
            $pokemon->setAttaque($data['attaque']);
            $pokemon->setDefense($data['defense']);
            $pokemon->setEstCapture($data['est_capture']);
            $pokemon->setImage($imagePath);

            $manager->persist($pokemon);
        }

        $manager->flush();
    }
}
