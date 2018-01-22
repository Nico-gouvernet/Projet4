-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 15 jan. 2018 à 19:44
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_creation` datetime NOT NULL,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `date_creation`, `titre`, `contenu`) VALUES
(39, '2018-01-12 15:59:21', 'Chapitre 4 - Souvenirs', 'Hac ita persuasione reducti intra moenia bellatores obseratis undique portarum aditibus, propugnaculis insistebant et pinnis, congesta undique saxa telaque habentes in promptu, ut si quis se proripuisset interius, multitudine missilium sterneretur et lapidum.\r\n\r\nHaec subinde Constantius audiens et quaedam referente Thalassio doctus, quem eum odisse iam conpererat lege communi, scribens ad Caesarem blandius adiumenta paulatim illi subtraxit, sollicitari se simulans ne, uti est militare otium fere tumultuosum, in eius perniciem conspiraret, solisque scholis iussit esse contentum palatinis et protectorum cum Scutariis et Gentilibus, et mandabat Domitiano, ex comite largitionum, praefecto ut cum in Syriam venerit, Gallum, quem crebro acciverat, ad Italiam properare blande hortaretur et verecunde.'),
(38, '2018-01-12 15:59:12', 'Chapitre 3 - Terre inconnue', 'Nec sane haec sola pernicies orientem diversis cladibus adfligebat. Namque et Isauri, quibus est usitatum saepe pacari saepeque inopinis excursibus cuncta miscere, ex latrociniis occultis et raris, alente inpunitate adulescentem in peius audaciam ad bella gravia proruperunt, diu quidem perduelles spiritus inrequietis motibus erigentes, hac tamen indignitate perciti vehementer, ut iactitabant, quod eorum capiti quidam consortes apud Iconium Pisidiae oppidum in amphitheatrali spectaculo feris praedatricibus obiecti sunt praeter morem.\r\n\r\nIllud tamen clausos vehementer angebat quod captis navigiis, quae frumenta vehebant per flumen, Isauri quidem alimentorum copiis adfluebant, ipsi vero solitarum rerum cibos iam consumendo inediae propinquantis aerumnas exitialis horrebant.'),
(37, '2018-01-12 15:59:04', 'Chapitre 2 - Exploration', 'Sed fruatur sane hoc solacio atque hanc insignem ignominiam, quoniam uni praeter se inusta sit, putet esse leviorem, dum modo, cuius exemplo se consolatur, eius exitum expectet, praesertim cum in Albucio nec Pisonis libidines nec audacia Gabini fuerit ac tamen hac una plaga conciderit, ignominia senatus.\r\n\r\nAccedat huc suavitas quaedam oportet sermonum atque morum, haudquaquam mediocre condimentum amicitiae. Tristitia autem et in omni re severitas habet illa quidem gravitatem, sed amicitia remissior esse debet et liberior et dulcior et ad omnem comitatem facilitatemque proclivior.'),
(23, '2018-01-12 15:11:23', 'Prologue', 'Et prima post Osdroenam quam, ut dictum est, ab hac descriptione discrevimus, Commagena, nunc Euphratensis, clementer adsurgit, Hierapoli, vetere Nino et Samosata civitatibus amplis inlustris.\r\n\r\nHarum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare, tum acerbius in aliquem invehi insectarique vehementius, quae in nostris rebus non satis honeste, in amicorum fiunt honestissime; multaeque res sunt in quibus de suis commodis viri boni multa detrahunt detrahique patiuntur, ut iis amici potius quam ipsi fruantur.\r\n\r\n'),
(24, '2018-01-12 15:15:24', 'Chapitre 1 - Carnet de Bord', 'Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?\r\n\r\nHorum adventum praedocti speculationibus fidis rectores militum tessera data sollemni armatos omnes celeri eduxere procursu et agiliter praeterito Calycadni fluminis ponte, cuius undarum magnitudo murorum adluit turres, in speciem locavere pugnandi. neque tamen exiluit quisquam nec permissus est congredi. formidabatur enim flagrans vesania manus et superior numero et ruitura sine respectu salutis in ferrum.');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `affichage` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `affichage`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(71, 23, 2, 'Hugo', 'Bonjour super le site !!! ', '2018-01-15 15:42:39'),
(70, 23, 2, 'Lucie', 'Oui super', '2018-01-15 15:42:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
