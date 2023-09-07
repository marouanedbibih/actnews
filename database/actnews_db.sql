-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 12:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `actnews_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_published` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `date_published`, `image`, `id_section`) VALUES
(4, 'Optimizing Operational Expenses: Strategies for Success', 'Learn effective strategies for optimizing operational expenses and...', '2023-08-08', '1691690944-article.png', 82),
(7, 'Capital Expenditures: Making Informed Financial Decisions', 'Discover the importance of well-informed financial decisions in managing...', '2023-08-08', '1691690944-article.png', 83),
(10, 'The Vital Role of Secretariat in Office Management', 'The secretariat plays a pivotal role in efficient office management...', NULL, '1691690944-article.png', 81),
(12, 'The Vital Role of Secretariat in Office Management', 'OCP (Office Chérifien des Phosphates) is not merely a company; it is a hub of innovation that shapes industries and transforms lives. Throughout its history, OCP has consistently demonstrated an unwavering dedication to pushing boundaries and redefining what\'s possible.\r\n\r\nInnovation is embedded in OCP\'s DNA. By continually exploring new technologies and approaches, the company has optimized its operations, from mining and extraction to production and distribution. This dedication to innovation has not only enhanced efficiency but also reduced environmental footprints, aligning OCP with a sustainable future.\r\n\r\nOne remarkable facet of OCP\'s innovation journey is its commitment to research and development. The company invests heavily in scientific exploration to uncover novel applications of phosphates, ranging from agricultural solutions to pharmaceuticals and beyond. This commitment has not only expanded OCP\'s product portfolio but also diversified its impact across sectors.\r\n\r\nOCP\'s innovation isn\'t limited to the confines of its facilities. Collaborative partnerships with universities, research institutions, and startups have fostered an ecosystem of creativity. By nurturing these connections, OCP taps into a diverse pool of ideas and perspectives, propelling its innovation engine forward.\r\n\r\nMoreover, OCP\'s innovation isn\'t solely focused on products; it\'s about transformation. The company embraces digitalization and data-driven insights to optimize decision-making processes and enhance customer experiences. By embracing Industry 4.0 principles, OCP ensures it remains at the forefront of technological advancement.\r\n\r\nAs OCP Company continues its innovation journey, it sets an example for others to follow. Its ability to adapt, evolve, and pioneer new solutions positions it as a trailblazer in the global landscape. With each innovative stride, OCP solidifies its role as a transformative force that shapes industries, fosters sustainability, and leaves an indelible mark on the world.', '2023-08-08', '1691690944-article.png', 81),
(14, 'Article 2 Title', 'Pellentesque ut mi id arcu lacinia fringilla sed in sapien. Fusce tincidunt eros ut arcu malesuada, in varius libero tempor. Integer nec nisi quis leo pharetra vehicula. Vivamus nec orci at turpis condimentum pellentesque.', '2023-08-09', '1691690944-article.png', 1),
(15, 'Article 3 Title', 'Vestibulum ullamcorper ex in lectus cursus, a volutpat nunc sagittis. Sed sit amet facilisis purus. Aenean non fringilla massa. In volutpat libero vel justo interdum fringilla. Sed et orci vel tortor ullamcorper congue. Integer venenatis velit sed tortor lacinia, non varius urna faucibus. Nullam nec accumsan nisl.', '2023-08-08', '1691690944-article.png', 1),
(16, 'Article 4 Title', 'Cras vel odio ut felis scelerisque lacinia id in ligula. Fusce convallis est non efficitur semper. Nullam bibendum, libero nec tincidunt commodo, elit nunc interdum enim, in tincidunt eros risus non ante.', '2023-08-07', '1691690944-article.png', 1),
(17, 'Maher Mosley', 'Maher mosly is best film in the world', '2023-08-09', '1691741914-article.jpg', 1),
(22, 'klcsmlc', 'gdhfgjfgjgjghjtgh', '2023-08-10', '1691691570-article.jpg', 2),
(23, 'New Article', 'this the new Article by all the functions', '2023-08-10', '1691691851-article.jpg', 5),
(24, 'Efficiency and Expertise Combined: How \'We Handle Your Business\' Takes the Stress Out of Business Management', 'In the fast-paced and competitive world of business, every entrepreneur and business owner understands the importance of efficiency, precision, and effective management. However, managing a business involves juggling a multitude of tasks, from strategic planning to day-to-day operations, marketing, finances, and more. This is where professional business management services, such as \"We Handle Your Business,\" step in to provide a comprehensive solution that allows businesses to focus on their core strengths and objectives.\r\n\r\nStreamlining Operations for Optimal Performance\r\n\r\nRunning a business involves wearing multiple hats, and sometimes, this can lead to crucial tasks falling through the cracks. \"We Handle Your Business\" recognizes the challenges that businesses face in maintaining smooth operations while also striving for growth. By offering a suite of services tailored to meet diverse business needs, they allow entrepreneurs to delegate responsibilities and free up valuable time.\r\n\r\n1. Expert Financial Management:\r\nManaging finances is a critical aspect of any business. From budgeting and forecasting to managing cash flow and preparing financial statements, \"We Handle Your Business\" takes charge of the financial intricacies, ensuring accuracy and compliance. This expertise helps businesses make informed decisions and stay financially resilient.\r\n\r\n2. Strategic Business Planning:\r\nCrafting a solid business strategy requires a deep understanding of market trends, competitor analysis, and future opportunities. The team at \"We Handle Your Business\" collaborates with businesses to develop comprehensive plans that align with their goals, fostering growth and adaptability in a dynamic marketplace.\r\n\r\n3. Operational Efficiency:\r\nEfficient processes are the backbone of a successful business. By identifying inefficiencies and implementing streamlined workflows, \"We Handle Your Business\" optimizes day-to-day operations, enhancing productivity and reducing operational costs.\r\n\r\n4. Marketing and Branding:\r\nEffective marketing and branding are essential for attracting customers and building a strong market presence. The team helps businesses develop and execute marketing strategies, from online campaigns to social media management, ensuring consistent messaging and engagement with the target audience.\r\n\r\n5. Regulatory Compliance:\r\nNavigating the ever-changing landscape of business regulations and compliance can be daunting. \"We Handle Your Business\" keeps up-to-date with legal requirements, ensuring that businesses adhere to industry-specific regulations and avoid potential pitfalls.\r\n\r\n6. Scalability and Growth:\r\nAs businesses evolve, they need to scale up their operations strategically. With experience in guiding businesses through growth phases, \"We Handle Your Business\" offers insights and solutions to expand operations without compromising quality or efficiency.\r\n\r\n7. Personalized Approach:\r\n\"We Handle Your Business\" understands that every business is unique. Their approach is tailored to the specific needs and goals of each client, offering customized solutions that address their challenges and capitalize on their strengths.\r\n\r\n8. Time for Innovation:\r\nBy delegating essential but time-consuming tasks to \"We Handle Your Business,\" entrepreneurs and business owners can allocate more time and energy toward innovation, creativity, and exploring new avenues for growth.\r\n\r\nIn conclusion, the role of \"We Handle Your Business\" is akin to that of a trusted partner, enabling businesses to thrive in a competitive environment. By taking on the burden of administrative tasks, strategic planning, and operational challenges, they empower entrepreneurs to concentrate on their core competencies and drive innovation. As the business landscape continues to evolve, services like \"We Handle Your Business\" provide a beacon of efficiency, expertise, and support, helping businesses not only survive but also thrive.', '2023-08-11', '1691741726-article.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new`
--

CREATE TABLE `new` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new`
--

INSERT INTO `new` (`id`, `title`, `date_created`, `id_section`) VALUES
(4, 'Open new Sale centre in Ben Guerir', '2023-08-10 12:05:00', 7),
(16, 'New Salle OCP', '2023-08-11 10:39:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `responsable`
--

CREATE TABLE `responsable` (
  `id_section` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id_section` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id_section`, `title`, `description`) VALUES
(1, 'Secrétariat', 'Le secrétariat est un métier de bureau qui consiste à gérer et organiser les tâches administratives et de communication au sein de l\'organisation. Il joue un rôle crucial dans le maintien de la fluidité des opérations et l\'efficacité de la communication interne.'),
(2, 'Budget – OPEX', 'La section Budget – OPEX s\'occupe de formaliser les besoins du service et de gérer les dépenses d\'exploitation. Elle assure également la gestion des ressources financières pour garantir le bon fonctionnement des activités opérationnelles.'),
(3, 'Budget – CAPEX', 'La section Budget – CAPEX est responsable du traitement et du suivi des dossiers d\'investissement en capital. Elle veille à la planification et à l\'allocation optimale des ressources pour les projets visant à améliorer l\'infrastructure et les actifs de l\'organisation.'),
(4, 'Bureau d’ordre', 'Le Bureau d’ordre assure la réception, le tri et l\'envoi du courrier interne et externe. Il joue un rôle essentiel dans la gestion documentaire et la circulation des informations au sein de l\'organisation.'),
(5, 'Economat', 'L\'Economat gère les commandes d\'articles nécessaires à l\'organisation. Il assure également la saisie et le suivi des stocks. Son rôle est vital pour maintenir un approvisionnement efficace des fournitures et équipements nécessaires.'),
(6, 'Contrôle de Matériel', 'La section Contrôle de Matériel est chargée de la surveillance des équipements et des actifs de l\'organisation. Elle garantit le bon état, la disponibilité et la maintenance des matériels essentiels aux opérations.'),
(7, 'Section Animation Sportive', 'La section Animation Sportive contribue à promouvoir un mode de vie sain et actif au sein de l\'organisation. Elle organise des activités sportives et encourage la participation des membres pour renforcer l\'esprit d\'équipe et le bien-être.'),
(8, 'Section Affaires Générales', 'La section Affaires Générales est garante du bon fonctionnement administratif et organisationnel. Elle assure la coordination entre différentes entités, facilite les processus internes et veille à la conformité des activités avec les politiques et procédures.'),
(9, 'Section Logement', 'La section Logement offre un soutien aux membres de l\'organisation en matière de logement. Elle facilite l\'accès à des solutions de logement adaptées et contribue au bien-être des membres en assurant un environnement de vie confortable.'),
(10, 'Section Réservation', 'La section Réservation, gérée par Mr. AAMMAR, est en charge de coordonner et de gérer les réservations pour les événements et les activités de l\'organisation. Elle garantit une planification efficace et une expérience optimale pour les participants.'),
(11, 'Section HSE', 'La section HSE (Hygiène, Sécurité et Environnement) supervise les pratiques de sécurité et de santé au travail. Elle veille à la conformité aux normes de sécurité et à la préservation de l\'environnement dans le cadre des activités de l\'organisation.'),
(12, 'Section Animation Culturelle', 'La section Animation Culturelle favorise l\'épanouissement culturel au sein de l\'organisation. Elle organise des événements artistiques, des expositions et des performances pour enrichir la vie culturelle des membres et stimuler la créativité.'),
(81, 'Secrétariat', 'Le secrétariat est un métier de bureau qui consiste à s\'occuper, pour le compte d\'un autre employé ou agent...'),
(82, 'Budget – OPEX', '- Formalisation des besoins du service.\n- Gestion de l’Appel à Manifestation d\'intérêt\nles taches \ntri'),
(83, 'Budget – CAPEX', '- Traitement et suivi des dossiers CAPEX.\n- Suivi des dossiers des EE (Entreprises extérieures)...'),
(84, 'Bureau d’ordre', '- Réception, tri et envoi du courrier intérieur et extérieur.\n- Accueil et transmission des appels...'),
(85, 'Economat', '• Assure les commandes des articles\n• Saisit et contrôle les bons des sorties\n• Contrôle les livraisons...'),
(86, 'Contrôle de Matériel', 'Cette section est responsable de la surveillance de tout le matériel pour le service sociale, il existe deux types de matériel...'),
(87, 'Section Animation Sportive', 'La section animation sportive est une entité du service social chargé de l\'animation sportive et...'),
(88, 'Section Affaires Générales', 'La section affaires générales : il est garant de la bonne conduite de la gestion du personnel...'),
(89, 'Section Logement', 'La section logement est une entité du service social intervenant au domaine notarial...'),
(90, 'Section Réservation', 'La section réservation gérée par Mr. AAMMAR, ce dernier responsable sur tout les règlements de voyage réserver un hôtel...'),
(91, 'Section HSE', '- Réception, tri et envoi du courrier intérieur et extérieur.\n- Accueil et transmission des appels...'),
(92, 'Section Animation Culturelle', 'La section animation culturelle est une entité du service social chargé de l\'animation culturelle et la gestion de l\'infrastructure associée...');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `job` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `last_name`, `first_name`, `job`, `email`, `phone`, `image`, `id_section`) VALUES
(7, 'Johnson', 'Jane', 'CTO', 'jane@example.com', '+9876543210', '1691692065-team.jpeg', 2),
(8, 'Williams', 'Michael', 'Developer', 'michael@example.com', '+5555555555', '1691620547-team.png', 1),
(9, 'Davis', 'Emily', 'Designer', 'emily@example.com', '+1111111111', '4-team.jpg', 2),
(10, 'Brown', 'David', 'Marketing', 'david@example.com', '+9999999999', '5-team.jpg', 1),
(13, 'Dbibih', 'Dbibih', 'Full Stack Web Devoloper', 'marouane.dbibih@gmail.com', '0615554445', NULL, 1),
(14, 'Dbibih', 'Dbibih', 'Full Stack Web Devoloper', 'marouane.dbibih@gmail.com', '0615554445', NULL, 1),
(15, 'Dbibih', 'Dbibih', 'Full Stack Web Devoloper', 'marouane.dbibih@gmail.com', '0615554445', '1691693630-team.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `last_name`, `first_name`, `email`, `phone`, `password`, `role`, `birthday`, `image`) VALUES
(74, 'Dbibih', 'Marouane', 'marouane@gmail.com', '+212 615554445', 'Marouane@2001', 'admin', '2023-08-24', '74-profile.jpg'),
(75, 'Rida', 'Bouchra', 'bouchra@gmail.com', '+212 12121212', 'Bouchra', 'admin', '2023-08-09', '75-profile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_section` (`id_section`);

--
-- Indexes for table `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_section` (`id_section`);

--
-- Indexes for table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id_user`,`id_section`),
  ADD KEY `id_section` (`id_section`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id_section`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_section` (`id_section`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `new`
--
ALTER TABLE `new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id_section` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `section` (`id_section`) ON DELETE CASCADE;

--
-- Constraints for table `new`
--
ALTER TABLE `new`
  ADD CONSTRAINT `new_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `section` (`id_section`) ON DELETE CASCADE;

--
-- Constraints for table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `responsable_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `section` (`id_section`) ON DELETE CASCADE,
  ADD CONSTRAINT `responsable_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `section` (`id_section`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
