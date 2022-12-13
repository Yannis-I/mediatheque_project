CREATE DATABASE Mediatheque;

CREATE USER "AppMediatheque"@"localhost" IDENTIFIED BY "azerty";
GRANT ALL PRIVILEGES ON Mediatheque.* TO "AppMediatheque"@"localhost";
FLUSH PRIVILEGES;

USE Mediatheque;

CREATE TABLE Movies (
	id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(128) NOT NULL,
    annee YEAR NOT NULL,
    synopsis TEXT NOT NULL,
    url_affiche VARCHAR(40)
);

CREATE TABLE Films (
	id INT PRIMARY KEY,
    duree TIME NOT NULL,
    FOREIGN KEY (id) REFERENCES Movies(id)
);

CREATE TABLE Series_Saisons (
	id INT NOT NULL,
    numero_saison INT NOT NULL,
    nbr_episodes INT,
    PRIMARY KEY (id, numero_saison),
    FOREIGN KEY (id) REFERENCES Movies(id)
);

CREATE TABLE Acteurs (
	id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(40) NOT NULL,
    prenom VARCHAR(40) NOT NULL,
    url_photo VARCHAR(40)
);

CREATE TABLE Acteurs_Movies (
	id_movie INT,
    id_acteur INT,
    personnage VARCHAR(40) NOT NULL,
    PRIMARY KEY (id_movie, id_acteur),
    FOREIGN KEY (id_movie) REFERENCES Movies(id),
    FOREIGN KEY (id_acteur) REFERENCES Acteurs(id)
);

INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Le Seigneur des anneaux : La Communauté de l'anneau", 2001, "Le jeune et timide Hobbit, Frodon Sacquet, hérite d'un anneau. Bien loin d'être une simple babiole, il s'agit de l'Anneau Unique, un instrument de pouvoir absolu qui permettrait à Sauron, le Seigneur des ténèbres, de régner sur la Terre du Milieu et de réduire en esclavage ses peuples. À moins que Frodon, aidé d'une Compagnie constituée de Hobbits, d'Hommes, d'un Magicien, d'un Nain, et d'un Elfe, ne parvienne à emporter l'Anneau à travers la Terre du Milieu jusqu'à la Crevasse du Destin, lieu où il a été forgé, et à le détruire pour toujours. Un tel périple signifie s'aventurer très loin en Mordor, les terres du Seigneur des ténèbres, où est rassemblée son armée d'Orques maléfiques... La Compagnie doit non seulement combattre les forces extérieures du mal mais aussi les dissensions internes et l'influence corruptrice qu'exerce l'Anneau lui-même.", "lsda1");
SELECT @idFilm1 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm1, '02:59:00');
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Le Seigneur des anneaux : Les Deux Tours", 2002, "Après la mort de Boromir et la disparition de Gandalf, la Communauté s'est scindée en trois. Perdus dans les collines d'Emyn Muil, Frodon et Sam découvrent qu'ils sont suivis par Gollum, une créature versatile corrompue par l'Anneau. Celui-ci promet de conduire les Hobbits jusqu'à la Porte Noire du Mordor. À travers la Terre du Milieu, Aragorn, Legolas et Gimli font route vers le Rohan, le royaume assiégé de Theoden. Cet ancien grand roi, manipulé par l'espion de Saroumane, le sinistre Langue de Serpent, est désormais tombé sous la coupe du malfaisant magicien. Eowyn, la nièce du Roi, reconnaît en Aragorn un meneur d'hommes. Entretemps, les Hobbits Merry et Pippin, prisonniers des Uruk-hai, se sont échappés et ont découvert dans la mystérieuse Forêt de Fangorn un allié inattendu : Sylvebarbe, gardien des arbres, représentant d'un ancien peuple végétal dont Saroumane a décimé la forêt...", "lsda2");
SELECT @idFilm2 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm2, '03:00:00');
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Le Seigneur des anneaux : Le Retour du roi", 2003, "Les armées de Sauron ont attaqué Minas Tirith, la capitale de Gondor. Jamais ce royaume autrefois puissant n'a eu autant besoin de son roi. Mais Aragorn trouvera-t-il en lui la volonté d'accomplir sa destinée ? Tandis que Gandalf tente de soutenir les forces brisées de Gondor, Théoden exhorte les guerriers de Rohan à se joindre au combat. Mais malgré leur courage et leur loyauté, les armées des Hommes ne sont pas de taille à lutter contre les innombrables légions ennemies qui s'abattent sur la Terre du Milieu... Chaque victoire se paye d'immenses sacrifices. Pendant ce temps et malgré ses pertes, la Communauté poursuit sa quête, ses membres faisant tout pour détourner l'attention de Sauron afin de donner à Frodon une chance d'accomplir sa mission. Voyageant à travers les terres ennemies, ce dernier doit s'appuyer sur Sam et Gollum, tandis que l'Anneau continue de le tenter ...", "lsda2");
SELECT @idFilm3 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm3, '03:21:00');
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Matrix", 1999, "Programmeur anonyme dans un service administratif le jour, Thomas Anderson devient Neo la nuit venue. Sous ce pseudonyme, il est l’un des pirates les plus recherchés du cyber‐espace. À cheval entre deux mondes, Neo est assailli par d’étranges songes et des messages cryptés provenant d’un certain Morpheus. Celui‐ci l’exhorte à aller au‐delà des apparences et à trouver la réponse à la question qui hante constamment ses pensées : qu’est‐ce que la Matrice ? Nul ne le sait, et aucun homme n’est encore parvenu à en percer les défenses. Mais Morpheus est persuadé que Neo est l’Élu, le libérateur mythique de l’humanité annoncé selon la prophétie. Ensemble, ils se lancent dans une lutte sans retour contre la Matrice et ses terribles agents…", "matrix1");
SELECT @idFilm4 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm4, '02:15:00');
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Matrix Revolutions", 2003, "a longue quête de liberté des rebelles culmine en une bataille finale explosive. Tandis que l'armée des Machines sème la désolation sur Sion, ses citoyens organisent une défense acharnée. Mais pourront-ils retenir les nuées implacables des Sentinelles en attendant que Neo s'approprie l'ensemble de ses pouvoirs et mette fin à la guerre ? L'agent Smith est quant à lui parvenu à prendre possession de l'esprit de Bane, l'un des membres de l'équipage de l'aéroglisseur. De plus en plus puissant, il est désormais incontrôlable et n'obéit plus aux Machines : il menace de détruire leur empire ainsi que le monde réel et la Matrice...", "matrix3");
SELECT @idFilm5 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm5, '02:08:00');
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Matrix Reloaded", 2003, "Neo apprend à mieux contrôler ses dons naturels, alors même que Sion s'apprête à tomber sous l'assaut de l'Armée des Machines. D'ici quelques heures, 250 000 Sentinelles programmées pour anéantir notre espèce envahiront la dernière enclave humaine de la Terre. Mais Morpheus galvanise les citoyens de Sion en leur rappelant la Parole de l'Oracle : il est encore temps pour l’Élu d'arrêter la guerre contre les Machines. Tous les espoirs se reportent dès lors sur Neo. Au long de sa périlleuse plongée au sein de la Matrix et de sa propre destinée, ce dernier sera confronté à une résistance croissante, une vérité encore plus aveuglante, un choix encore plus douloureux que tout ce qu'il avait jamais imaginé.", "matrix2");
SELECT @idFilm6 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm6, '02:18:00');
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Piège de cristal", 1988, "John McClane, policier new‐yorkais, est venu rejoindre pour les fêtes de Noël sa femme Holly, dont il est séparé depuis plusieurs mois, dans le secret espoir d’une réconciliation. Celle‐ci est cadre dans une multinationale japonaise, la Nakatomi Corporation. Son patron, M. Takagi, donne une soirée en l’honneur de ses employés, à laquelle assiste McClane. Tandis qu’il s’isole pour téléphoner, un commando investit l’immeuble et coupe toutes les communications avec l’extérieur.", "hard1");
SELECT @idFilm7 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm7, '02:12:00');
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("58 minutes pour vivre", 1990, "L’inspecteur de police McClane attend que l’avion de son épouse atterrisse dans un aéroport international proche de Washington. D’étranges allées et venues attirent son attention. Il suit des hommes qui communiquent discrètement entre eux jusqu’au sous‐sol de l’aéroport. Là, des inconnus lui tirent dessus et des mercenaires prennent le contrôle de l’aéroport, coupant toute communication avec l’extérieur. Les passagers des avions prêts à atterrir, dont la femme de McClane, n’ont plus que cinquante‐huit minutes pour vivre!", "hard2");
SELECT @idFilm8 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm8, '02:03:00');
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Une Journée en enfer", 1995, "Décidément, John McLane ne peut jamais avoir la paix! Après avoir libéré un building des mains d’un terroriste, après avoir sauvé sa femme d’un avion en perdition, le voilà aux prises avec un psychopathe qui le fait jouer à un «Jacques a dit» meurtrier. Les règles sont simples, si il ne résout pas les énigmes posées, une bombe explose dans un lieu public.", "hard3");
SELECT @idFilm9 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm9, '02:08:00');
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Die Hard 4 : Retour en enfer", 2007, "Pour sa quatrième aventure, l’inspecteur John McClane se trouve confronté à un nouveau genre de terrorisme. Le réseau informatique national qui contrôle absolument toutes les communications, les transports et l’énergie des États‐Unis, est détruit de façon systématique, plongeant le pays dans le chaos. Le cerveau qui est derrière le complot a tout calculé à la perfection. Ou presque… Il n’avait pas prévu McClane, un flic de la vieille école qui connaît deux ou trois trucs efficaces pour déjouer les attaques terroristes.", "hard4");
SELECT @idFilm10 := last_insert_id();
INSERT INTO Films (id, duree) Values (@idFilm10, '02:08:00');

INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Mr. Robot", 2015, "Elliot est un jeune programmeur anti-social qui souffre d'un trouble du comportement qui le pousse à croire qu'il ne peut rencontrer des gens qu'en les hackant. Il travaille pour une firme spécialisée dans la cyber-sécurité mais un homme connu sous le nom de Mr Robot l'approche un jour pour faire tomber une compagnie surpuissante qui fait partie de celles qu'il doit justement protéger…", "robot");
SELECT @idSerie1 := last_insert_id();
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie1, 1, 10);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie1, 2, 12);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie1, 3, 10);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie1, 4, 13);
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Peaky Blinders", 2013, "En 1919, à Birmingham, soldats, révolutionnaires politiques et criminels combattent pour se faire une place dans le paysage industriel de l'après-Guerre. Le Parlement s'attend à une violente révolte, et Winston Churchill mobilise des forces spéciales pour contenir les menaces. La famille Shelby compte parmi les membres les plus redoutables. Surnommés les \"Peaky Blinders\" par rapport à leur utilisation de lames de rasoir cachées dans leurs casquettes, ils tirent principalement leur argent de paris et de vol. Tommy Shelby, le plus dangereux de tous, va devoir faire face à l'arrivée de Campbell, un impitoyable chef de la police qui a pour mission de nettoyer la ville. Ne doit-il pas se méfier tout autant de la ravissante Grace Burgess ? Fraîchement installée dans le voisinage, celle-ci semble cacher un mystérieux passé et un dangereux secret.", "peaky");
SELECT @idSerie2 := last_insert_id();
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie2, 1, 6);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie2, 2, 6);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie2, 3, 6);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie2, 4, 6);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie2, 5, 6);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie2, 6, 6);
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Breaking Bad", 2008, "Walter White, professeur de chimie dans un lycée d'Albuquerque au Nouveau-Mexique, est atteint d'un cancer pulmonaire en phase terminale. Il s'associe à Jesse Pinkman, un ancien élève, cancre, toxicomane et dealer, afin d'assurer l'avenir financier de sa famille après son décès. L'improbable duo va alors synthétiser et commercialiser la plus pure méthamphétamine en cristaux jamais vue dans les Amériques.", "bad");
SELECT @idSerie3 := last_insert_id();
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie3, 1, 7);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie3, 2, 13);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie3, 3, 13);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie3, 4, 13);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie3, 5, 16);
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Sons of Anarchy", 2008, "L'histoire se déroule à Charming, ville fictive du comté de San Joaquin en Californie. Une lutte de territoires entre dealers et trafiquants d'armes vient perturber les affaires d'un club de bikers (Motorcycle Club, ou MC en anglais). Ce club, nommé , Sons of Anarchy Motorcycle Club Redwood Original couramment abrégé en SAMCRO, fait régner l'ordre dans Charming. Clay Morrow, président de SAMCRO et patron du garage Teller-Morrow, ainsi que Jax Teller, vice-président, mènent le club. Les Sons of Anarchy sont à la fois craints par la population mais également très respectés et admirés pour leur code d’honneur et leur capacité à maintenir l’ordre et rendre justice dans les situations délicates.", "sons");
SELECT @idSerie4 := last_insert_id();
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie4, 1, 13);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie4, 2, 13);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie4, 3, 13);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie4, 4, 14);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie4, 5, 13);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie4, 6, 13);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie4, 7, 13);
INSERT INTO Movies (titre, annee, synopsis, url_affiche) Values ("Kaamelott", 2005, "Vᵉ siècle, île de Bretagne. Alors que l'Empire romain s'effondre et que le christianisme s'impose peu à peu face aux dieux païens, le royaume de Kaamelott s'organise autour de son souverain, le roi Arthur ; entouré de ses fidèles chevaliers, il s'attelle à la mission que les Dieux lui ont confié : rechercher le Saint Graal. Mais cette quête s'annonce plus que difficile, car Arthur est très mal entouré. Ses chevaliers de la Table Ronde sont un faible renfort contre les défis qui se dressent sur la route : peureux, naïfs, stupides ou au contraire violents, archaïques et désordonnés, les troupes de Bretagne ne comprennent pas l'enjeu de la quête du Graal et peinent à se rendre utiles. L'entourage familial du roi n'est guère plus sensé : son quotidien déjà bien chargé est parsemé de conflits avec sa femme Guenièvre ou sa belle-famille.", "kaamelott");
SELECT @idSerie5 := last_insert_id();
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie5, 1, 100);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie5, 2, 100);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie5, 3, 100);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie5, 4, 99);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie5, 5, 50);
INSERT INTO Series_Saisons (id, numero_saison, nbr_episodes) Values (@idSerie5, 6, 9);

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Malek", "Rami", "rami");
SELECT @idActeur16 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie1, @idActeur16, "Elliot Alderson");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Slater", "Christian", "slater");
SELECT @idActeur17 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie1, @idActeur17, "Mr. Robot");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Carly", "Chaikin", "carly");
SELECT @idActeur18 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie1, @idActeur18, "Darlene");

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Murphy", "Cillian", "tommy");
SELECT @idActeur19 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie2, @idActeur19, "Tommy Shelby");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Anderson", "Paul", "paul");
SELECT @idActeur20 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie2, @idActeur20, "Arthur Shelby");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Rundle", "Sophie", "ada");
SELECT @idActeur21 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie2, @idActeur21, "Ada Shelby");

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Cranston", "Bryan", "walter");
SELECT @idActeur22 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie3, @idActeur22, "Walter White");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Paul", "Aaron", "jesse");
SELECT @idActeur23 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie3, @idActeur23, "Jesse Pinkman");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Gunn", "Anna", "anna");
SELECT @idActeur24 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie3, @idActeur24, "Skyler White");

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Hunnam", "Charlie", "jax");
SELECT @idActeur25 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie4, @idActeur25, "Jax Teller");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Sagal", "Katey", "gemma");
SELECT @idActeur26 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie4, @idActeur26, "Gemma Teller Morrow");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Flanagan", "Tommy", "chibs");
SELECT @idActeur27 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie4, @idActeur27, "Filip \"Chibs\" Telford");

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Astier", "Alexandre", "artur");
SELECT @idActeur28 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie5, @idActeur28, "Roi Arthur");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Astier", "Lionnel", "leo");
SELECT @idActeur29 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie5, @idActeur29, "Léodagan");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Pitiot", "Franck", "perce");
SELECT @idActeur30 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idSerie5, @idActeur30, "Perceval");

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Wood", "Elijah", "elijah");
SELECT @idActeur1 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm1, @idActeur1, "Frodo");

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Motensen", "Viggo", "viggo");
SELECT @idActeur2 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm1, @idActeur2, "Aragorn");

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("McKellen", "Ian", "ian");
SELECT @idActeur3 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm1, @idActeur3, "Gandalf");

INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm2, @idActeur1, "Frodo");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm2, @idActeur2, "Aragorn");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm2, @idActeur3, "Gandalf");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm3, @idActeur1, "Frodo");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm3, @idActeur2, "Aragorn");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm3, @idActeur3, "Gandalf");

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Reeves", "Keanu", "keanu");
SELECT @idActeur4 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm4, @idActeur4, "Neo");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Moss", "Carrie-Anne", "moss");
SELECT @idActeur5 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm4, @idActeur5, "Trinity");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Fishburne", "Laurence", "fishburn");
SELECT @idActeur6 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm4, @idActeur6, "Morpheus");

INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm5, @idActeur4, "Neo");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm5, @idActeur5, "Trinity");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm5, @idActeur6, "Morpheus");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm6, @idActeur4, "Neo");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm6, @idActeur5, "Trinity");
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm6, @idActeur6, "Morpheus");

INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Willis", "Bruce", "willis");
SELECT @idActeur7 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm7, @idActeur7, "John McClane");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Rickman", "Alan", "alan");
SELECT @idActeur8 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm7, @idActeur8, "Hans Gruber");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("VelJohnson", "Reginald", "regie");
SELECT @idActeur9 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm7, @idActeur9, "Al Powell");

INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm8, @idActeur7, "John McClane");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Bedelia", "Bonnie", "bonnie");
SELECT @idActeur10 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm8, @idActeur10, "Holly McClane");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Sadler", "William", "willy");
SELECT @idActeur11 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm8, @idActeur11, "Stuart");

INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm9, @idActeur7, "John McClane");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Jackson", "Samuel L.", "zeus");
SELECT @idActeur12 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm9, @idActeur12, "Zeus Carver");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Irons", "Jeremy", "irons");
SELECT @idActeur13 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm9, @idActeur13, "Simon");

INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm10, @idActeur7, "John McClane");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Long", "Justin", "long");
SELECT @idActeur14 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm10, @idActeur14, "Matthew Farrell");
INSERT INTO Acteurs (nom, prenom, url_photo) Values ("Olyphant", "Timothy", "tim");
SELECT @idActeur15 := last_insert_id();
INSERT INTO Acteurs_Movies (id_movie, id_acteur, personnage) Values (@idFilm10, @idActeur15, "Thomas Gabriel");