INSERT INTO `autheurs` (`id_autheurs(11)`, `nom`) VALUES
(1, 'de Philippe Rigaux'),
(2, 'Eric Daspet, Cyril P'),
(3, 'Janet Valade, '),
(4, 'Coldplay'),
(5, 'Kenny Rogers'),
(6, 'Robbie Williams');
COMMIT;


INSERT INTO `produit` (`id_produit`, `titre`, `description`, `prix`, `type`, `autheurs_id_autheurs`) VALUES
(1, 'Pratique de MySQL et PHP', 'L\'efficacite du tandem MySQL/PHP dans la mise en oeuvre de sites Web est plus evidente que jamais. Ces deux fleurons du Logiciel Libre permettent de realiser des sites a la fois robustes et ultra-reactifs, aussi bien sous MS-Windows que sous Unix, Linux ou MacOS X. Dans cette troisieme edition, entierement revue et adaptee aux dernieres moutures de PHP 5 et de MySQL, les qualites pedagogiques de l\'auteur continuent de faire merveille, notamment dans les tout nouveaux chapitres abordant la programmation orientee objet ou la gestion des erreurs. Ce livre, concu de maniere progressive, convient aussi bien au debutant desireux de creer son propre site Web et de s\'initier a la programmation cte serveur, qu\'au professionnel qui doit gerer, a travers une interface Web, de nombreuses requetes simultanees vers ses bases de donnees.', 33.25, 'livres', 1),
(2, 'PHP 5 avance', 'PHP 5, plate-forme de reference pour les applications web. Les evolutions majeures de PHP 5 en font plus que jamais la plate-forme incontournable pour le developpement d\'applications web professionnelles : programmation objet, services web, couche d\'abstraction de base de donnees native PDO, simplification des developpements XML avec SimpleXML, refonte du moteur sous-jacent pour d\'importants gains de performances... Une bible magistrale avec de nombreux cas pratiques et retours d\'experience. S\'appuyant sur de nombreux retours d\'experience et cas pratiques, cet ouvrage donne toutes les cles necessaires pour maitriser PHP 5. Gestion de flux, conception de sites et d\'applications web, cookies et sessions, programmation objet, utilisation de XML et SimpleXML, services web, integration aux bases de donnees en passant par MySQL 4 et 5, PostgreSQL, PHP Data Object, strategies d\'optimisation et de securite, gestion des images et des caches... ce livre aidera le developpeur a evoluer avec aisance dans le riche univers de PHP 5.', 39.90, 'livres', 2),
(3, 'PHP et MySQL pour les Nuls', 'Un nouveau materiel ou un nouveau logiciel vient de debarquer dans votre vie et vous n\'avez pas de temps a perdre pour en apprendre l\'utilisation. Deux solutions s\'offrent a vous, attendre un miracle, solution peu probable, ou faire confiance a votre Megapoche qui vous donnera toutes les informations essentielles pour demarrer un apprentissage efficace dans la joie et la bonne humeur! Ce livre va vous donner tous les outils qui vous permettront de developper des sites Web a base de PHPVous apprendrez a manipuler tous les outils de gestion de sessions, les cookies, gerer le code XML et Java Script, mettre en place des systemes de securite, et bien d\'autres choses encore. Une partie complete intitulee PHP au quotidien vous proposera des applications pretes a l\'emploi qui vous eviteront des heures de developpement inutiles.', 16.06, 'livres', 3),
(4, 'Viva la Vida', 'Cette chanson entretient un lien explicite avec deux révolutions en France.\r\nD\'une part, la pochette de l\'album Viva la Vida or Death and All His Friends est basée sur la peinture La Liberté guidant le peuple de l\'artiste français Eugène Delacroix, inspirée de la Révolution de Juillet, les « Trois Glorieuses »', 40.50, 'cd', 4),
(5, 'For the Good Times', '\" For the Good Times \" est une chanson écrite par Kris Kristofferson , enregistrée pour la première fois par le chanteur Bill Nash en 1968 avant d\'apparaître sur le premier album de Kristofferson en avril 1970. Après un enregistrement de Ray Price, il devint un hit numéro un en juin. année, la chanson a établi Kristofferson comme l\'un des meilleurs auteurs-compositeurs de musique country et populaire tout en donnant à Price sa première chanson country et western en 11 ans.', 28.99, 'cd', 5),
(6, 'Angels', 'Angels est le quatrième simple du chanteur britannique Robbie Williams, extrait de son premier album Life Thru a Lens, sorti le 1er décembre 19971. Le titre a été écrit par Robbie Williams et Guy Chambers', 42.50, 'cd', 6);
