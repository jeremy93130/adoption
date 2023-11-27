<?php

namespace App\Controller;

use App\Repository\AnimauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieAnimalController extends AbstractController
{
    #[Route('/categorie/animal', name: 'app_categorie_animal')]
    public function index(): Response
    {
        return $this->render('categorie_animal/categorie.html.twig', [
            'controller_name' => 'CategorieAnimalController',
        ]);
    }


    #[Route('/categorie/animal/{categorie}', name: 'app_categorie')]
    public function categorie(AnimauxRepository $animauxRepository, $categorie): Response
    {
        $espece = $animauxRepository->findByCategorie($categorie);

        $animal = $animauxRepository->findAll();

        $phraseChat = ["50% des chats blancs aux yeux bleus sont sourd !", "Un chat passe 70% de sa vie a dormir", "Les chats miaulent uniquement pour communiquer avec les humains", "Les chats ont été obligatoires à bord des navires pendant plusieurs siècles", "Le maire d'une ville d'Alaska fut un chat pendant 19 ans", "Le génome d’un chat domestique est commun à 95,6% avec celui du tigre et il partage de nombreux comportements avec ses ancêtres de la jungle.", "Les chats ont 18 orteils (cinq orteils sur chaque patte avant ; quatre orteils sur chaque patte arrière).", "Les chats peuvent sauter jusqu’à six fois leur longueur.", "Les griffes des chats se courbent toutes vers le bas, ce qui signifie qu’ils ne peuvent pas descendre des arbres la tête la première et doivent reculer.", "Les chats utilisent leurs moustaches pour « ressentir » le monde qui les entoure afin de déterminer dans quels petits espaces ils peuvent se faufiler. Les moustaches d’un chat ont généralement à peu près la même largeur que leur corps. (C’est pourquoi vous ne devriez jamais, JAMAIS couper leurs moustaches.)", "Les chats marchent comme des chameaux et des girafes : ils bougent d’abord leurs deux pieds droits, puis leurs deux pieds gauches. Aucun autre animal ne marche de cette façon.", "Les chats dorment généralement de 12 à 16 heures par jour.", "Les chats sont crépusculaires, ce qui signifie qu’ils sont plus actifs à l’aube et au crépuscule.", "Le ronronnement des chats peut être un comportement auto-apaisant et cicatrisant, ils peuvent ronronner lorsqu’il sont malades ou en détresse, ainsi que lorsqu’ils sont heureux.", "Les chats refuseront une nourriture désagréable au point de mourir de faim.", "On pense que l’herbe à chat produit un effet similaire au LSD ou à la marijuana chez les chats. Les effets de la népétalactone (le produit chimique contenu dans l’herbe à chat qui peut rendre les chats fous) s’estompent en 15 minutes.", "La stérilisation peut prolonger la vie d’un chat. Les mâles stérilisés vivent en moyenne 62 % plus longtemps que les chats non stérilisés et que les femelles stérilisées vivent en moyenne 39 % plus longtemps que les chattes non stérilisés.", "Un clignement des paupières lent est un “baiser de chat”. Ce mouvement montre le contentement et la confiance.", "Un chat avec une queue en forme de point d’interrogation demande : Tu veux jouer ?", "Les chats peuvent trouver le contact visuel direct menaçant.", "Ils se frottent le visage et le corps contre vous, car ils ont des glandes odorantes dans ces zones vous marque comme ils marquent leur territoire.", "Si les chats se battent, le chat qui siffle est le plus vulnérable.", "Le pétrissage, “patounage” est un signe de contentement et de bonheur. Les chats pétrissent leurs mères lorsqu’elles allaitent pour stimuler la montée du lait.", "Les chats sont très pointilleux sur leurs bols d’eau ; certains préfèrent ignorer complètement leurs bols pour boire au robinet de l’évier préférant toujours l’eau en mouvement plutôt que l’eau stagnante.", "Les chats aiment dormir sur des choses qui sentent l’odeur de leurs propriétaires, comme leurs oreillers et leur linge sale…", "Le style d’apprentissage d’un chat est à peu près le même que celui d’un enfant de 2 à 3 ans.", "Le ronronnement d’un chat vibre à une fréquence de 25 à 150 hertz, qui est la même fréquence à laquelle les muscles et les os se réparent", "Les chats ont contribué à l’extinction de 33 espèces différentes.", "Les chats perçoivent les gens comme de gros chats sans poils", "Les chatons d’une même portée peuvent avoir plusieurs pères. C’est parce que la chatte libère plusieurs ovocytes au cours des quelques jours de ses chaleurs.", "Le chat est l’animal le plus populaire d’internet."];


        $phraseChiens = ["Le chien pivote sur lui-même avant d’aller se coucher", "L’âge d’un chien ne se calcule pas en multipliant son âge “humain” par 7", "Les chiens possèdent une ouïe quatre fois plus développée que celle des hommes", "Le chien est un loup ! il partage 99,9% de son ADN avec lui", "Une étude révèle qu'un homme a 3 fois plus de chance d'obtenir le numéro d'une femme en compagnie d'un chien", "Il existe 13 groupes sanguins chez les chiens", "Quand votre chien vous regarde, il cherche des indices visuels dans vos yeux", "Le chien le plus rapide du monde est le lévrier espagnol", "Des études ont montré que les chiens étaient suffisamment intelligents pour comprendre jusqu'à 250 mots et gestes, les nombres jusqu'à 5 et pour réaliser des calculs mathématiques simples. Le chien moyen est aussi intelligent qu'un enfant de 2 ans.", "La truffe d'un chien est aussi unique que le sont les empreintes digitales d'un humain, il n'y a pas deux pareilles.", "L'oeil d'un chien possède trois paupières : une supérieure, une inférieur et une troisième appelée membrane nictitante. Le rôle de cette dernières de conserver l'humidité de l'oeil et de le protéger des corps étrangers.", "La chanson des Beatles A Day in the Life contient un sifflement extrêmement aigu que seuls les chiens peuvent entendre. Ce sifflement a été enregistré sur ce morceau par Sir Paul McCartney en hommage et pour faire plaisir à son Berger Shetland."];

        $phraseOiseaux = [" L’autruche est l’oiseau qui pond les plus gros œufs?", "En France, il y a plus de 10 000 espèces d’oiseaux.", "Le nom donné par les ornithologues à l’oiseau qui sort de la coquille est « Pullus ».", "Les oiseaux chantent dans leur sommeil", "les oiseaux sont d'excellents insecticides", "L'hirondelle peut consommer  20 000 proies par jour.", "Il existe un oiseau capable de reproduire le cri de 51 espèces différentes ( « le Drongo » )"];


        $phraseRongeurs = ["Les rongeurs peuvent ronger des matériaux tels que l’acier, le ciment et le plastique, y compris les câbles électriques.", "Les rongeurs ont des incisives qui poussent continuellement et qu’ils utilisent pour ronger. Afin de conserver leurs incisives à une longueur gérable, les rongeurs sont obligés de ronger constamment.", "Une rate et sa progéniture peuvent en théorie produire 2 000 rats par an.", "Une souris femelle et sa progéniture peuvent en théorie produire 15 000 souris par an.", "Plus de 20 % des feux de fermes sont causés par les rongeurs ayant rongé des câbles électriques.", "Un rat peut se faufiler à travers un espace de la largeur du pouce d’un adulte (de 25 à 30 mm).", "Le cochon d'Inde est le plus affectueux de tous les rongeurs.", "le lapin n'est PAS un rongeur", ""];

        $phraseReptiles = ["Les serpents peuvent se reconnaître", "Les serpents peuvent grimper n’importe quelle surface, même de grands cylindres lisses", "Les serpents sont incapables de fermer leurs yeux !", "Les serpents à sonnettes sont dotés d’une vision infrarouge", "On trouve des tortues sur tous les continents à l’exception de l’Antarctique", "Les tortues sont presque aussi vieilles que les dinosaures! Le fossile de la plus vieille tortue date de 220 millions d’années, ce qui signifie que la tortue est apparue 23 millions d’années après les dinosaures.", "C’est en général la température du nid qui détermine le sexe des petites tortues. Une température plus fraîche produira des mâles, tandis qu’un nid plus chaud produira des femelles.", "La tortue est ectotherme (ou à sang froid) et ne peut réguler elle-même la température de son corps. Voilà pourquoi elle a besoin d’un bon bain de soleil pour se réchauffer, et doit plonger dans l’eau ou la boue pour se rafraîchir.", "La tortue est le groupe d’espèces le plus menacé sur la planète! Le fait de sauver une seule tortue est donc très important, car la tortue vit longtemps et met de nombreuses années à atteindre la maturité sexuelle."];

        $randomPhraseChats = $phraseChat[array_rand($phraseChat)];
        $randomPhraseChien = $phraseChiens[array_rand($phraseChiens)];
        $randomPhraseOiseau = $phraseOiseaux[array_rand($phraseOiseaux)];
        $randomPhraseRongeur = $phraseRongeurs[array_rand($phraseRongeurs)];
        $randomPhraseReptile = $phraseReptiles[array_rand($phraseReptiles)];

        return $this->render('categorie_animal/categorie.html.twig', [
            'especes' => $espece,
            'categorie' => $categorie,
            'animal' => $animal,
            'saviezVousChats' => $randomPhraseChats,
            'saviezVousChiens' => $randomPhraseChien,
            'saviezVousOiseaux' => $randomPhraseOiseau,
            'saviezVousRongeurs' => $randomPhraseRongeur,
            'saviezVousReptiles' => $randomPhraseReptile
        ]);
    }
}
