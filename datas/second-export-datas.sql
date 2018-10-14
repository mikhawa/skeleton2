-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 14 oct. 2018 à 10:55
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `skeleton2`
--

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idarticles`, `thetitle`, `theslug`, `thedescription`, `thedate`, `users_idusers`) VALUES
(1, 'Bcrypt', 'bcrypt', 'bcrypt est une fonction de hachage créée par Niels Provos et David Mazières. Elle est basée sur l\'algorithme de chiffrement Blowfish et a été présentée lors de USENIX en 19991. En plus de l\'utilisation d\'un sel pour se protéger des attaques par table arc-en-ciel (rainbow table), bcrypt est une fonction adaptative, c\'est-à-dire que l\'on peut augmenter le nombre d\'itérations pour la rendre plus lente. Ainsi elle continue à être résistante aux attaques par force brute malgré l\'augmentation de la puissance de calcul.\r\n\r\nBlowfish est un algorithme de chiffrement par bloc notable pour sa phase d\'établissement de clef relativement coûteuse. bcrypt utilise cette propriété et va plus loin. Provos et Mazières ont conçu un nouvel algorithme d\'établissement des clefs nommé Eksblowfish (pour Expensive Key Schedule Blowfish). Dans cet algorithme, une première phase consiste à créer les sous-clefs grâce à la clef et au sel. Ensuite un certain nombre de tours de l\'algorithme standard blowfish sont appliqués avec alternativement le sel et la clef. Chaque tour commence avec l\'état des sous-clefs du tour précédent. Cela ne rend pas l\'algorithme plus puissant que la version standard de blowfish, mais on peut choisir le nombre d\'itérations ce qui le rend arbitrairement lent et contribue à dissuader les attaques par table arc-en-ciel et par force brute.\r\n\r\nLe nombre d\'itérations doit être une puissance de deux, c\'est un paramètre de l\'algorithme et ce nombre est codé dans le résultat final.\r\n\r\nAprès la première implémentation dans OpenBSD, cet algorithme s\'est généralisé et est maintenant disponible dans un grand nombre de langages (Java, Python, C#, Ruby, Perl, PHP 5.3+, etc.).', '2018-10-12 14:06:17', 1),
(2, 'Secure Hash Algorithm', 'secure-hash-algorithm', 'Le préfixe SHA (acronyme de Secure Hash Algorithm) est associé à plusieurs fonctions de hachage cryptographiques publiées par le NIST en tant que Federal Information Processing Standard (FIPS).\r\n\r\nLes fonctions SHA-0, SHA-1 et SHA-2 ont été conçues par la NSA ; leurs spécifications sont décrites par les publications FIPS-180, dont la dernière version (fin 2012) est le FIPS-180-41.\r\n\r\nSHA-0\r\nSHA-0 s\'appelait originellement SHA, et ses spécifications ont été publiées en 1993. Elle est inspirée des fonctions MD4 et MD5 de Ron Rivest. Le NIST recommande formellement de ne pas l\'utiliser depuis 1996, pour des questions de sécurité. Elle est cependant restée un objet d\'étude pour la communauté académique, en tant que prototype de SHA-1.\r\nSHA-1\r\nSHA-1 est une version légèrement modifiée de SHA-0 publiée en 1995, qui produit comme celle-ci un haché de 160 bits. Il existe des attaques théoriques pour la recherche de collisions, de complexité nettement moindre que l’attaque générique des anniversaires. Elle a été très utilisée dans les protocoles et applications de sécurité, mais, à cause de l\'existence de ces attaques, tend à être remplacée par SHA-256.\r\nSHA-2\r\nSHA-2 est une famille de fonctions de hachage cryptographiques publiée en 2001 qui regroupe à l\'origine SHA-224, SHA-256, SHA-384 et SHA-512. Ces fonctions produisent des hachés de taille différente (désignée par le suffixe, en bits). Le standard FIPS-180-4 (mars 2012) est augmenté de deux versions tronquées de SHA-512, SHA-512/256 (haché de 256 bits) et SHA-512/224 (haché de 224 bits). Elles utilisent des algorithmes très similaires, eux-mêmes largement inspirés de celui de SHA-1. L\'un est à base de mots de 32 bits (et d\'un découpage en blocs de 512 bits) pour SHA-256 et sa version tronquée SHA-224. L\'autre est à base de mots de 64 bits (et d\'un découpage en blocs de 1024 bits) pour SHA-512 et ses versions tronquées SHA-384, SHA-512/256 et SHA-512/224. Les attaques connues sur SHA-1 n\'ont pu être transposées à SHA-2, même si la construction est proche.\r\nSHA-3\r\nSHA-3, originellement Keccak, est une nouvelle fonction de hachage cryptographique décrite en août 2015 par la publication FIPS-2022. Elle a été sélectionnée en octobre 2012 par le NIST à la suite d\'un concours public lancé en 2007, ceci car les faiblesses découvertes sur MD-5 et SHA-1 laissent craindre une fragilité de SHA-2 qui est construite sur le même schéma3. Elle possède des variantes qui peuvent produire des hachés de 224, 256, 384 et 512 bits. Elle est construite sur un principe tout à fait différent de celui des fonctions MD5, SHA-1 et SHA-2.', '2018-10-13 12:39:13', 2);

--
-- Déchargement des données de la table `articles_has_rubriques`
--

INSERT INTO `articles_has_rubriques` (`articles_idarticles`, `rubriques_idrubriques`) VALUES
(1, 4),
(2, 4),
(1, 5),
(2, 5);

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idroles`, `thename`, `thevalue`) VALUES
(1, 'Administrateur', 'ROLE_ADMIN'),
(2, 'Utilisateur', 'ROLE_USER');

--
-- Déchargement des données de la table `rubriques`
--

INSERT INTO `rubriques` (`idrubriques`, `thertitle`) VALUES
(1, 'Sport'),
(2, 'Politique'),
(3, 'Loisir'),
(4, 'Science'),
(5, 'Informatique');

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idusers`, `thelogin`, `thepwd`, `themail`, `roles_idroles`) VALUES
(1, 'mikhawa', '$2y$10$oMIV78FbOr4/l9fKEN1/MeKSWt4fmMT/hbjAU45q94M1aXH4sVuP6', 'michael.j.pitz@gmail.com', 1),
(2, 'fred', '$2y$10$RY9m/vjRITn6MM6yYyiF/u/gCtqmkNSsPqIPZ6akh4mRhIhznRuAW', 'michael.pitz@cf2m.be', 2);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
