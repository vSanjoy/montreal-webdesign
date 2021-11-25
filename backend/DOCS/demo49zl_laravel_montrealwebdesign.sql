-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2021 at 10:40 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo49zl_laravel_montrealwebdesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `mwd_cms`
--

CREATE TABLE `mwd_cms` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_name` text COLLATE utf8mb4_unicode_ci,
  `title` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` text COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `description2` longtext COLLATE utf8mb4_unicode_ci,
  `other_description` longtext COLLATE utf8mb4_unicode_ci,
  `banner_title` text COLLATE utf8mb4_unicode_ci,
  `banner_short_title` text COLLATE utf8mb4_unicode_ci,
  `banner_short_description` text COLLATE utf8mb4_unicode_ci,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_cms`
--

INSERT INTO `mwd_cms` (`id`, `page_name`, `title`, `slug`, `short_title`, `short_description`, `description`, `description2`, `other_description`, `banner_title`, `banner_short_title`, `banner_short_description`, `banner_image`, `featured_image`, `other_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"en\":\"Home\",\"fr\":\"Domicile\"}', '{\"en\":\"Home Page\",\"fr\":\"Page d\'accueil\"}', 'home', '{\"en\":\"<span>Portfolio<\\/span>  Our latest projects\",\"fr\":\"<span>Portefeuille<\\/span>  Nos derniers projets\"}', '{\"fr\":null}', '{\"en\":\"<h2>Based out of Montreal, and serving clients across Canada,<br \\/>\\r\\nMONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians who are<br \\/>\\r\\nready to handle all your web and computer needs, on any budget.<\\/h2>\\r\\n\\r\\n<h3>Our approach<\\/h3>\",\"fr\":\"<h2>Bas&eacute; &agrave; Montr&eacute;al et servant des clients &agrave; travers le Canada,<br \\/>\\r\\nMONTR&Eacute;AL WEB DESIGN s&#39;appuie sur une &eacute;quipe de graphistes cr&eacute;atifs et de techniciens Web qui sont<br \\/>\\r\\npr&ecirc;t &agrave; r&eacute;pondre &agrave; tous vos besoins Web et informatiques, quel que soit votre budget.<\\/h2>\\r\\n\\r\\n<h3>Notre approche<\\/h3>\"}', NULL, '{\"en\":\"<h3>So What&rsquo;s Next?<\\/h3>\\r\\n\\r\\n<h2>Are you ready? Let&rsquo;s go!<\\/h2>\",\"fr\":\"<h3>Alors, quelle est la prochaine &eacute;tape&nbsp;?<\\/h3>\\r\\n\\r\\n<h2>Es-tu pr&ecirc;t? Allons-y!<\\/h2>\"}', '{\"fr\":null}', '{\"fr\":null}', '{\"en\":\"Montreal Web Design, specializing in the design and implementation of websites at <span>affordable prices<\\/span>\",\"fr\":\"Montreal Web Design, sp\\u00e9cialis\\u00e9 dans la conception et la mise en \\u0153uvre de sites Web \\u00e0 <span>prix abordables<\\/span>\"}', 'banner_1625650316.jpg', NULL, NULL, '1', '2021-06-02 02:47:53', '2021-07-12 06:03:11', NULL),
(2, '{\"en\":\"About Us\",\"fr\":\"\\u00c0 propos de nous\"}', '{\"en\":\"About Us\",\"fr\":\"\\u00c0 propos de nous\"}', 'about-us', '{\"fr\":null}', '{\"fr\":null}', '{\"en\":\"<p>Montreal Web Design.COM has been offering <strong>one-stop web development and design<\\/strong> to its customers since 2004.<\\/p>\\r\\n\\r\\n<p>Our vast experience includes Web Design and Maintenance, Hosting, Domain Registration, Computer Repair\\/Troubleshooting, Home Office setup, SEO and Digital Marketing services for small and medium businesses.<\\/p>\",\"fr\":\"<p>Montreal Web Design.COM offre <strong>le d&eacute;veloppement et la conception Web &agrave; guichet unique<\\/strong> &agrave; ses clients depuis 2004.<\\/p>\\r\\n\\r\\n<p>Notre vaste exp&eacute;rience comprend la conception et la maintenance de sites Web, l&#39;h&eacute;bergement, l&#39;enregistrement de domaine, la r&eacute;paration\\/le d&eacute;pannage d&#39;ordinateurs, la configuration du bureau &agrave; domicile, les services de r&eacute;f&eacute;rencement et de marketing num&eacute;rique pour les petites et moyennes entreprises.<\\/p>\"}', NULL, '{\"en\":\"<p>Montreal Web Design.COM has been offering <strong>one-stop web development and design<\\/strong> to its customers since 2004.<\\/p>\\r\\n\\r\\n<p>Our vast experience includes Web Design and Maintenance, Hosting, Domain Registration, Computer Repair\\/Troubleshooting, Home Office setup, SEO and Digital Marketing services for small and medium businesses.<\\/p>\",\"fr\":\"<p>Montreal Web Design.COM offre <strong>le d&eacute;veloppement et la conception Web &agrave; guichet unique<\\/strong> &agrave; ses clients depuis 2004.<\\/p>\\r\\n\\r\\n<p>Notre vaste exp&eacute;rience comprend la conception et la maintenance de sites Web, l&#39;h&eacute;bergement, l&#39;enregistrement de domaine, la r&eacute;paration\\/le d&eacute;pannage d&#39;ordinateurs, la configuration du bureau &agrave; domicile, les services de r&eacute;f&eacute;rencement et de marketing num&eacute;rique pour les petites et moyennes entreprises.<\\/p>\"}', '{\"en\":\"About Us\",\"fr\":\"\\u00c0 propos de nous\"}', '{\"fr\":null}', '{\"en\":\"MONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians <br> are ready to handle all your web and computer needs, on any budget.\",\"fr\":\"MONTR\\u00c9AL WEB DESIGN s\'appuie sur une \\u00e9quipe de graphistes cr\\u00e9atifs et de techniciens Web <br> pr\\u00eats \\u00e0 r\\u00e9pondre \\u00e0 tous vos besoins Web et informatiques, quel que soit votre budget.\"}', 'banner_1625650386.jpg', 'featured_image_1625650386.png', NULL, '1', '2021-06-02 03:21:29', '2021-07-07 04:03:06', NULL),
(3, '{\"en\":\"Services\",\"fr\":\"Services\"}', '{\"en\":\"Services\",\"fr\":\"Services\"}', 'services', '{\"fr\":null}', '{\"fr\":null}', '{\"fr\":null}', NULL, '{\"fr\":null}', '{\"en\":\"Services\",\"fr\":\"Services\"}', '{\"fr\":null}', '{\"en\":\"MONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians <br> are ready to handle all your web and computer needs, on any budget.\",\"fr\":\"MONTR\\u00c9AL WEB DESIGN s\'appuie sur une \\u00e9quipe de graphistes cr\\u00e9atifs et de techniciens Web <br> pr\\u00eats \\u00e0 r\\u00e9pondre \\u00e0 tous vos besoins Web et informatiques, quel que soit votre budget.\"}', 'banner_1623219717.jpg', NULL, NULL, '1', '2021-06-02 03:23:04', '2021-06-09 07:48:48', NULL),
(4, '{\"en\":\"Portfolio\",\"fr\":\"Portfolio\"}', '{\"en\":\"Portfolio\",\"fr\":\"Portfolio\"}', 'portfolio', '{\"fr\":null}', '{\"fr\":null}', '{\"fr\":null}', NULL, '{\"fr\":null}', '{\"en\":\"Portfolio\",\"fr\":\"Portfolio\"}', '{\"fr\":null}', '{\"en\":\"MONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians <br> are ready to handle all your web and computer needs, on any budget.\",\"fr\":\"MONTR\\u00c9AL WEB DESIGN s\'appuie sur une \\u00e9quipe de graphistes cr\\u00e9atifs et de techniciens Web <br> pr\\u00eats \\u00e0 r\\u00e9pondre \\u00e0 tous vos besoins Web et informatiques, quel que soit votre budget.\"}', 'banner_1625579833.jpg', NULL, NULL, '1', '2021-06-02 03:23:46', '2021-10-18 07:43:53', NULL),
(5, '{\"en\":\"Testimonials\",\"fr\":\"T\\u00e9moignages\"}', '{\"en\":\"Testimonials\",\"fr\":\"T\\u00e9moignages\"}', 'testimonials', '{\"fr\":null}', '{\"fr\":null}', '{\"fr\":null}', NULL, '{\"fr\":null}', '{\"en\":\"Testimonials\",\"fr\":\"T\\u00e9moignages\"}', '{\"fr\":null}', '{\"en\":\"MONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians <br> are ready to handle all your web and computer needs, on any budget.\",\"fr\":\"MONTR\\u00c9AL WEB DESIGN s\'appuie sur une \\u00e9quipe de graphistes cr\\u00e9atifs et de techniciens Web <br> pr\\u00eats \\u00e0 r\\u00e9pondre \\u00e0 tous vos besoins Web et informatiques, quel que soit votre budget.\"}', 'banner_1625579893.jpg', NULL, NULL, '1', '2021-06-02 03:24:38', '2021-07-12 06:04:13', NULL),
(6, '{\"en\":\"Contact\",\"fr\":\"Contacts\"}', '{\"en\":\"Contacts\",\"fr\":\"Contacts\"}', 'contact', '{\"en\":\"Montreal Web Design.com\",\"fr\":\"Montr\\u00e9al Web Design.com\"}', '{\"fr\":null}', '{\"en\":\"<h2>Office Hours<\\/h2>\\r\\n\\r\\n<p>Monday to Friday<br \\/>\\r\\n8:30 - 16:30 EDT<\\/p>\",\"fr\":\"<h2>HEURES DE BUREAU<\\/h2>\\r\\n\\r\\n<p>lundi au vendredi:<br \\/>\\r\\n8h30 - 16h30 HNE<\\/p>\"}', NULL, '{\"en\":\"<p>Montreal, Quebec, Canada<\\/p>\",\"fr\":\"<p>Montr&eacute;al, Qu&eacute;bec, Canada<\\/p>\"}', '{\"fr\":\"Contacts\",\"en\":\"Contact\"}', '{\"fr\":null}', '{\"fr\":\"MONTR\\u00c9AL WEB DESIGN s\'appuie sur une \\u00e9quipe de graphistes cr\\u00e9atifs et de techniciens Web <br> pr\\u00eats \\u00e0 r\\u00e9pondre \\u00e0 tous vos besoins Web et informatiques, quel que soit votre budget.\",\"en\":\"MONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians <br> are ready to handle all your web and computer needs, on any budget.\"}', 'banner_1625581204.jpg', NULL, NULL, '1', '2021-06-02 03:28:54', '2021-10-18 07:41:00', NULL),
(7, '{\"en\":\"Privacy\",\"fr\":\"Intimit\\u00e9\"}', '{\"en\":\"Privacy\",\"fr\":\"Intimit\\u00e9\"}', 'privacy', '{\"fr\":null}', '{\"fr\":null}', '{\"en\":\"<h2>Fusce faucibus dui sit amet neque ornare<br \\/>\\r\\nDonec at pharetra lacus.<\\/h2>\\r\\n\\r\\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec scelerisque velit. Mauris consectetur elit quis arcu mollis, nec sagittis est eleifend. Vivamus vestibulum aliquam eleifend. Morbi mollis neque metus sit amet pulvinar libero pulvinar id. Donec at pharetra lacus. Nam dapibus sem quis quam mollis sit amet feugiat ante viverra.<\\/p>\\r\\n\\r\\n<p>Phasellus nunc neque, tincidunt nec sem et, iaculis ultrices eros. Curabitur rhoncus urna quis diam ornare, id tristique justo imperdiet. Suspendisse sollicitudin eros quis laoreet faucibus. Sed volutpat a tortor sed luctus. Aenean ultrices leo posuere dictum nulla<\\/p>\",\"fr\":\"<h2>Fusce faucibus dui sit amet neque ornare<br \\/>\\r\\nDonec at pharetra lacus.<\\/h2>\\r\\n\\r\\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec scelerisque velit. Mauris consectetur elit quis arcu mollis, nec sagittis est eleifend. Vivamus vestibulum aliquam eleifend. Morbi mollis neque metus sit amet pulvinar libero pulvinar id. Donec at pharetra lacus. Nam dapibus sem quis quam mollis sit amet feugiat ante viverra.<\\/p>\\r\\n\\r\\n<p>Phasellus nunc neque, tincidunt nec sem et, iaculis ultrices eros. Curabitur rhoncus urna quis diam ornare, id tristique justo imperdiet. Suspendisse sollicitudin eros quis laoreet faucibus. Sed volutpat a tortor sed luctus. Aenean ultrices leo posuere dictum nulla<\\/p>\"}', NULL, '{\"fr\":null}', '{\"en\":\"Privacy\",\"fr\":\"Intimit\\u00e9\"}', '{\"fr\":null}', '{\"en\":\"MONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians <br> are ready to handle all your web and computer needs, on any budget.\",\"fr\":\"MONTR\\u00c9AL WEB DESIGN s\'appuie sur une \\u00e9quipe de graphistes cr\\u00e9atifs et de techniciens Web <br> pr\\u00eats \\u00e0 r\\u00e9pondre \\u00e0 tous vos besoins Web et informatiques, quel que soit votre budget.\"}', 'banner_1626085174.jpg', NULL, NULL, '1', '2021-06-02 03:29:47', '2021-07-12 04:49:34', NULL),
(8, '{\"en\":\"Site Map\",\"fr\":\"Plan du site\"}', '{\"en\":\"Site Map\",\"fr\":\"Plan du site\"}', 'site-map', '{\"fr\":null}', '{\"fr\":null}', '{\"fr\":null}', NULL, '{\"fr\":null}', '{\"en\":\"Site Map\",\"fr\":\"Plan du site\"}', '{\"fr\":null}', '{\"en\":\"MONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians <br> are ready to handle all your web and computer needs, on any budget.\",\"fr\":\"MONTR\\u00c9AL WEB DESIGN s\'appuie sur une \\u00e9quipe de graphistes cr\\u00e9atifs et de techniciens Web <br> pr\\u00eats \\u00e0 r\\u00e9pondre \\u00e0 tous vos besoins Web et informatiques, quel que soit votre budget.\"}', 'banner_1626088712.jpg', NULL, NULL, '1', '2021-06-02 03:30:28', '2021-07-12 05:48:32', NULL),
(9, '{\"en\":\"Get A Quote\",\"fr\":\"Soumission\"}', '{\"en\":\"Get A Quote\",\"fr\":\"Soumission\"}', 'get-a-quote', '{\"fr\":null}', '{\"fr\":null}', '{\"en\":\"<h2>Request A Quote<\\/h2>\\r\\n\\r\\n<p>Please take a moment to complete the form below, so we can assist you better with your proposal.<\\/p>\",\"fr\":\"<h2>Soumission<\\/h2>\\r\\n\\r\\n<p>Pour mieux vous aider avec votre proposition, s&#39;il vous pla&eacute;t prendre un moment pour remplir le formulaire ci-dessous.<\\/p>\"}', NULL, '{\"fr\":null}', '{\"en\":\"Get A Quote\",\"fr\":\"Soumission\"}', '{\"fr\":null}', '{\"en\":\"MONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians <br> are ready to handle all your web and computer needs, on any budget.\",\"fr\":\"MONTR\\u00c9AL WEB DESIGN s\'appuie sur une \\u00e9quipe de graphistes cr\\u00e9atifs et de techniciens Web <br> pr\\u00eats \\u00e0 r\\u00e9pondre \\u00e0 tous vos besoins Web et informatiques, quel que soit votre budget.\"}', 'banner_1625812846.jpg', NULL, NULL, '1', '2021-07-09 01:10:47', '2021-10-18 09:58:43', NULL);
INSERT INTO `mwd_cms` (`id`, `page_name`, `title`, `slug`, `short_title`, `short_description`, `description`, `description2`, `other_description`, `banner_title`, `banner_short_title`, `banner_short_description`, `banner_image`, `featured_image`, `other_image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, '{\"en\":\"Terms of Services\",\"fr\":\"Conditions de services\"}', '{\"en\":\"Terms of Services\",\"fr\":\"Conditions de services\"}', 'terms-of-services', '{\"fr\":null}', '{\"fr\":null}', '{\"en\":\"<p>THIS AGREEMENT is made Between &quot;Montreal Web Design Inc.&quot;<br \\/>\\r\\n(hereinafter referred to as the &quot;Developers&quot;)<\\/p>\\r\\n\\r\\n<p>and<\\/p>\\r\\n\\r\\n<p>&quot;YOU, THE CUSTOMER&quot;<br \\/>\\r\\n(hereinafter referred to as the &quot;Customer&quot;).<\\/p>\\r\\n\\r\\n<p>Recitals<br \\/>\\r\\nWHEREAS, the &quot;Developers&quot; have experience and expertise in the development of web sites; and<br \\/>\\r\\nAND WHEREAS, the &quot;Customer&quot; agrees to have the Developers develop a web site for it; and<br \\/>\\r\\nAND WHEREAS, the &quot;Developers&quot; agrees to develop the Customer&#39;s web site on the terms and conditions set forth herein (the &quot;Web Site&quot;).<br \\/>\\r\\nNOW THEREFORE, in consideration of the mutual promises and covenants hereinafter set out the parties agree as follows:<\\/p>\\r\\n\\r\\n<p>1. INTERPRETATION<\\/p>\\r\\n\\r\\n<p>1.1 Definitions:<br \\/>\\r\\nAs used herein, the following terms shall have the following meanings;<br \\/>\\r\\n(1) &quot;Customer&quot; shall mean [&quot;YOU, CUSTOMER&quot;]<br \\/>\\r\\n(2) &quot;Developers&quot; shall mean [&quot;Montreal Web Design Inc.&quot;]<br \\/>\\r\\n(3) &quot;Web Site&quot; shall mean the web site according to the terms and specifications as set out in the schedules to this contract as agreed and amended by the parties hereto.<br \\/>\\r\\n(4) &quot;Specifications&quot; shall mean for the purpose of each separate contract the specifications as set out and agreed to by the parties, and any amendments thereto, as attached hereto as Schedule &quot;B&quot;.<br \\/>\\r\\n(e) &quot;Dollars&quot; All amounts referenced herein shall mean currency of Canada.<\\/p>\\r\\n\\r\\n<p>1.2 &quot;Schedules&quot; - The following are the Schedules attached hereto and are incorporated by reference into this agreement:<br \\/>\\r\\nSchedule &quot;A&quot; - Terms and other conditions for the development of the &quot;Web Site&quot;.<br \\/>\\r\\nSchedule &quot;B&quot; - Specifications that are applicable to customer&#39;s web site.<\\/p>\\r\\n\\r\\n<p>1.3 Invalidity of Provisions - Save and except for any provisions or covenants contained herein which are fundamental to the subject matter of this Agreement (including without limitation, those that relate to the payment of monies), the invalidity or unenforceability of any provision or covenant hereof or herein contained shall not affect the validity or enforce ability of any other provision or covenant hereof or herein contained and any invalid provision or covenant will be deemed to be severable.<\\/p>\\r\\n\\r\\n<p>1.4 Headings - The insertion of headings is included solely for convenience and reference and is not intended to affect the construction or interpretation of this Agreement nor are the headings intended to be full or accurate descriptions of the contents hereof.<\\/p>\\r\\n\\r\\n<p><strong>2. Term<\\/strong><br \\/>\\r\\nUnless terminated earlier in accordance with the termination and default provisions in the Agreement, the term of this Agreement shall be for the duration of the works to be completed as referenced herein and the Web Site is delivered to the Customer for its use.<\\/p>\\r\\n\\r\\n<p><strong>3. Compensation - Contract Price<\\/strong><br \\/>\\r\\n3.1 Upon the execution of this Agreement the Customer agrees that it shall pay to the Developer the agreed upon sum in cash, bank draft, certified funds, or credit card payment, as applicable, which is agreed and understood to be non- refundable in the event of termination or cancellation, the consideration being the Developers&#39; initial development, proposal and other preparatory works which is agreed to by the parties as necessary to this agreement, of which said amount upon completion of the web site, shall represents a partial payment towards the total contract amount.<\\/p>\\r\\n\\r\\n<p>3.2 Upon the Developers developing and\\/or delivering to the Customer, those items for the Web Site as set out in the specifications and Schedule(s) &quot;A&quot; and &quot;B&quot; to this agreement, the Customer shall pay to the Developers, progress payments in amounts representing a percentage of the total contract price, as specified in Schedule &quot;A&quot;, and thereafter in the same percentage at each milestone as set out in the Schedule &quot;A&quot; to this Agreement.<\\/p>\\r\\n\\r\\n<p>3.3 In the event that the Customer fails to make any of the scheduled payments referenced herein and more specifically as set out in Schedule &quot;A&quot; hereto, by the deadline set forth in Schedule &quot;A&quot;, the Developers reserve the sole and exclusive right, but are not obligated, to retain all monies paid to date without refund, notwithstanding the web site has not been completed and to pursue any and all legal and other remedies at its disposal, including, but not limited to the following:<br \\/>\\r\\n(1) to terminate the Agreement and retain all monies paid to date,<br \\/>\\r\\n(2) to pull, disable, disassemble, block, or otherwise make unusable the Web Site and associated links, without notice to the Customer and to retain full and complete ownership thereof,<br \\/>\\r\\n(3) to transfer the Web Site contents to another Customer for valuable consideration, and<br \\/>\\r\\n(4) to commence legal action for damages and\\/or injunctive relief, and all legal costs, on a solicitor and client basis.<\\/p>\\r\\n\\r\\n<p><strong>4. Terms and Conditions<\\/strong><br \\/>\\r\\n4.1. Development of Web Site<br \\/>\\r\\nThe Developers agree to develop the Web Site according to the terms listed in Schedule &quot;A&quot;, attached hereto.<br \\/>\\r\\n4.2. Specifications<br \\/>\\r\\nThe Developers agree to develop the Web Site pursuant to the specifications set forth in Schedule &quot;B&quot; attached hereto (the &quot;Specifications&quot;).<br \\/>\\r\\n4.3. Delivery of Web Site<br \\/>\\r\\nThe Developers will use its best efforts and reasonable diligence in the development of the Web Site and endeavor to deliver to the Customer an operational Web Site by the date agreed upon. Notwithstanding the aforesaid delivery date, the Customer acknowledges and agrees, that this delivery deadline, and the corresponding progress payments thereto as listed in Schedule &quot;A&quot;, are best effort estimates, and are not time of the essence required delivery dates. Where commercially reasonable, the Customer and the Developer will revise delivery schedules, acknowledged by the parties in writing.<br \\/>\\r\\n4.4. Proprietary Ownership Rights<br \\/>\\r\\n(1) The Customer agrees that the Web Site is and remains the exclusive property of the Developers and that the Developers shall retain title to and hold all rights, and interest in and to all software developed by the Developers and the Web Site and copies thereof, as may be applicable, notwithstanding the granting of any license in respect of the use thereof. The Customer acknowledges that it receives no title or ownership rights in or to any of the intellectual property rights in the software. Specifically, but without limitation, the Customer agrees that the Developers shall hold all right, title, and interest in and to:<br \\/>\\r\\n(a) all text, graphics, animation, audio components, and digital components of the Web Site (the &quot;Content&quot;),<br \\/>\\r\\n(b) all interfaces, navigational devices, menus, menu structures or arrangements, icons, help and other operational instructions, software and all other components of any source or object computer code that comprises the Web Site,<br \\/>\\r\\n(c) all literal and non-literal expressions of ideas that operate, cause, create, direct, manipulate, access, or otherwise affect the Content, and<br \\/>\\r\\n(d) all copyrights, patents, trade secrets, and other intellectual or industrial property rights in the Web Site or any component or characteristic thereof. The Customer further agrees that it shall not do anything that may infringe upon or in any way undermine Developers&#39; right, title, and interest in the Web Site, as described in this paragraph.<br \\/>\\r\\n(2) Customer shall retain all of its intellectual property rights in any text, ..\\/images or other components it owns and transmits to Developers for use in the Web Site. Customer shall hold the copyright for the agreed upon version of the website as delivered, and the Customer&#39;s copyright notice may be displayed in the final version.<br \\/>\\r\\n4.5 Confidentiality<br \\/>\\r\\nWithout limiting the above, the Customer and the Developers acknowledge and agree that the Specifications and all other documents and information related to the development of the Web Site (the &quot;Confidential Information&quot;) will constitute valuable trade secrets of the Developers. The Customer shall keep the Confidential Information in confidence and shall not, at any time during or after the term of this Agreement, without the Developers&#39; prior written consent, disclose or otherwise make available to anyone, either directly or indirectly, all or any part of the Confidential Information. Excluded from the &quot;Confidential Information&quot; definition is anything that can be seen by the public on the Web Site when each page of the Web Site is first accessed.<br \\/>\\r\\nThe performance by the Customer of the foregoing obligations is a condition to the Developer developing the Web Site for the Customer and the use thereof by the Customer.<\\/p>\\r\\n\\r\\n<p><strong>5. Limited Warranty and Limitation on Damages<\\/strong><br \\/>\\r\\nThe Developers warrant the Web Site will conform to the Specifications as set out herein. If the Web Site does not conform to the Specifications, Developers shall be responsible to correct the Web Site without unreasonable delay, at the Developers sole expense and without charge to the Customer, to bring the Web Site into conformance with the Specifications. This warranty shall be the exclusive warranty available to the Customer, regardless of whether any remedy set forth herein fails of its essential purpose or otherwise, and in no event shall the Developers be liable for special, incidental, consequential, punitive or tort damages (including negligence), whether resulting from loss of use, delay of delivery, loss of data, loss of anticipated profits, loss of business, non-operation or increased expense of operation, or otherwise. The Customer waives any other warranty, express or implied, including the implied warranties of merchantability and fitness for a particular purpose. The Customer acknowledges that the Developers do not represent or warrant that the Web Site will work on all platforms, or that the Web Site will be error free, or that the Developers will be able to achieve fixes or workarounds for every problem or error discovered. The Customer acknowledges that Developers are not responsible for the results obtained by the Customer on the Web Site. The Customer hereby waives any claim for damages of any kind, direct or indirect, and agrees that its sole and exclusive remedy for damages (either in contract or tort) is the return of the consideration paid to Developers as set forth in Schedule &quot;A&quot; attached hereto, and in no event shall the Developers total cumulative liability hereunder from all causes of action of any kind, exceed the total amount paid by the Customer to the Developers. The Customer further agrees to indemnify the Developers from and against any loss, claim, liability, damage, cost or expense, including legal fees, payable to any person or entity arising out of the use of the Web Site.<\\/p>\\r\\n\\r\\n<p><strong>6. Independent Contractor<\\/strong><br \\/>\\r\\nThe Developers agree that they are retained as independent contractors and not as employees of the Customer. It is the intention of the parties that the Developers will be fully responsible for payment of all withholding taxes, including, but not limited to; their own provincial and federal income taxes, Canada Pension Plan on all compensation earned and paid under this Agreement. The parties agree that the Customer will not withhold or pay any income tax, social security tax, or any other payroll taxes on the Developers&#39; behalf. The Developers understand and agree that they will not be entitled to any fringe benefits that Customer provides for its employees generally or to any statutory employment benefits, including without limitation, company pension plans, profit sharing plans, worker&#39;s compensation, or employment insurance. The Developers agree to indemnify the Customer for any and all claims made by any lawful government authority for all statutory withholding taxes and deductions not paid by the Developers and claimed against the Customer for monies paid pursuant to this Agreement, and remitted thereto by the Customer to such authority.<\\/p>\\r\\n\\r\\n<p><strong>7. Equipment<\\/strong><br \\/>\\r\\nThe Customer agrees to make available to the Developers, for the Developers&#39; use in performing the services required by this Agreement, such items of hardware and software as the Customer and Developers may agree are reasonably necessary for such purpose.<\\/p>\\r\\n\\r\\n<p><strong>8. General Provisions<\\/strong><br \\/>\\r\\n8.1 Entire Agreement.<br \\/>\\r\\nThis Agreement constitutes the entire agreement between the parties pertaining to the subject matter hereof and supercedes all prior agreements, understandings, negotiations and discussions, whether oral or written of the parties, and there are no warranties, representations or other agreements between the parties in connection with the subject matter except as specifically set out herein. No supplement, modification, amendment, waiver or termination of this agreement will be valid or binding unless executed in writing by the parties.<br \\/>\\r\\n8.2 Proper Law of Contract<br \\/>\\r\\nThis agreement shall be governed by the Laws of the Province of &laquo;State&raquo; and the laws of Canada applicable therein, without regard to choice of law principles. The parties further agree and understand that notwithstanding any regulations, rulings or conventions under any Conflict of Laws in any jurisdiction, that regardless of where the contract is executed and entered into, the parties have agreed that the laws of the province of &quot;&laquo;State&raquo;&quot; and Canada, as applicable, shall govern this contract.<br \\/>\\r\\n8.3 Binding Effect.<br \\/>\\r\\nThis Agreement shall be binding upon customer consent, i.e. checking box marked &quot;I Agree&quot;.<br \\/>\\r\\n8.4 Waiver.<br \\/>\\r\\nThe waiver by either party of any breach or failure to enforce any of the terms and conditions of this Agreement at any time shall not in any way affect, limit, or waive such party&#39;s right thereafter to enforce and compel strict compliance with every term and condition of this Agreement.<br \\/>\\r\\n8.5 Good Faith.<br \\/>\\r\\nEach party represents and warrants to the other that such party has acted in good faith, and agrees to continue to so act, in the negotiation, execution, delivery, performance, and any termination of this Agreement.<br \\/>\\r\\n8.6 Ownership of Photographs.<br \\/>\\r\\nThe Developers&#39; may use some of their own photographs for the Web Site. Developers&#39; maintain ownership of the photographs, and only grant the Customer a non-exclusive right to use those photographs, and only on the Customer&#39;s web site.<br \\/>\\r\\n8.7 No Right to Assign.<br \\/>\\r\\nThe Customer has no right to assign, sell, modify or otherwise alter the Web Site, except upon the express written advance approval of the Developers, which consent can be withheld for any reason.<br \\/>\\r\\n8.8 Right to Remove Web Site.<br \\/>\\r\\nIn the event the Customer fails to make any of the payments set forth on Schedule &quot;A&quot; within the time prescribed in Schedule &quot;A&quot;, Developers have the right to remove the web site until payment in full is paid, plus accrued late charges of 2.5 % per month.<br \\/>\\r\\n8.9 Indemnification.<br \\/>\\r\\nThe Customer warrants that everything it gives the Developers to put on the Web Site is legally owned or licensed to Customer. The Customer agrees to indemnify and hold the Developers harmless from any and all claims brought by any third party relating to any aspect of the Web Site, including, but without limitation, any and all demands, liabilities, losses, costs and claims including attorney&#39;s fees arising out of injury caused by the Customer&#39;s products\\/services, material supplied by the Customer, copyright infringement, and defective products sold via the Web Site.<br \\/>\\r\\n8.10 Use of Web Site for Promotional Purposes.<br \\/>\\r\\nThe Customer grants Developers the right to use the Web Site for promotional purposes and\\/or to cross-link it with other Web Sites developed by Developers.<br \\/>\\r\\n8.11 No Responsibility for Theft.<br \\/>\\r\\nThe Developers shall have no responsibility for any third party accessing, using or taking all or any part of the Web Site.<br \\/>\\r\\n8.12 Right to Make Derivative Works.<br \\/>\\r\\nThe Developers shall have the exclusive rights in making any derivative works of the Web Site.<br \\/>\\r\\n8.13 Legal Fees. In the event any party to this Agreement employs a lawyer to enforce any of the terms of the Agreement, the prevailing party shall be entitled to recover its actual legal fees and costs, including expert witness fees, on a solicitor and client basis.<br \\/>\\r\\n8.14 Identification of Developers.<br \\/>\\r\\nThe Customer agrees that the Developers&#39; logos will be placed on all pages of the Web Site discreetly. Customer also agrees to put on Developers&#39; copyright notices on the Web Site and the relevant content therein when requested to do so.<br \\/>\\r\\n8.15 No responsibility for loss.<br \\/>\\r\\nIn addition to the above, the Developers are not responsible for any down time, lost files, improper links or any other loss that may occur in the operation of the Web Site.<br \\/>\\r\\n8.16 Transfer of Rights.<br \\/>\\r\\nIn the event Developers are unable to continue maintenance of the web site, non-exclusive rights to the web site will be granted to Customer.<br \\/>\\r\\n8.17 Domain Name.<br \\/>\\r\\nAny domain name registered on Customer&#39;s behalf will be made in Customer&#39;s name for both the billing and administrative contacts. The technical contact is generally required to be the hosting ISP. The Developers will register domain names in Developers name. The developers does not own the domain names, as long as the Customer pays yearly. If Customer does not pay, the domain names will expire and Customer will no longer own ownership of the domain names.<br \\/>\\r\\n<strong>Schedule &quot;A&quot;: Payment Terms<\\/strong><br \\/>\\r\\n1. a) Minimum 50% deposit of total price to be paid prior to commencement of website development, 50% Fifteen (30) business days of initial contract signing<br \\/>\\r\\nFinal payment: Net 30 days - Website will go LIVE on final payment.<br \\/>\\r\\n2. a) Customer&#39;s price is locked at that agreed upon total and will not change. All extra services requested by customer will be paid in full prior to their commencement.<br \\/>\\r\\n<strong>Schedule &quot;B&quot;:<\\/strong> Other specifications that are applicable to customer&#39;s web site.<br \\/>\\r\\nClient is responsible for providing content and photos within 30 days of signing.<\\/p>\\r\\n\\r\\n<p>1. a) Montreal Web Design Inc. - logo and\\/ or name with link will always appear discreetly on designed website.<\\/p>\\r\\n\\r\\n<p>I\\/We have read, understand and agree to be bound by Terms of Service.<\\/p>\\r\\n\\r\\n<p><strong>Last revision: January 12, 2012.<\\/strong><\\/p>\",\"fr\":\"<p>CETTE ENTENTE est conclue entre &quot;Montreal Web Design Inc.&quot;<br \\/>\\r\\n(ci-apr&egrave;s d&eacute;nomm&eacute;s les &quot;D&eacute;veloppeurs&quot;)<\\/p>\\r\\n\\r\\n<p>et<\\/p>\\r\\n\\r\\n<p>&quot;VOUS, LE CLIENT&quot;<br \\/>\\r\\n(ci-apr&egrave;s d&eacute;nomm&eacute;s les &quot;Client&quot;).<\\/p>\\r\\n\\r\\n<p>R&eacute;citals<br \\/>\\r\\nWHEREAS, the &quot;D&eacute;veloppeurs&quot; avoir de l&#39;exp&eacute;rience et de l&#39;expertise dans le d&eacute;veloppement de sites Web; et<br \\/>\\r\\nAND WHEREAS, the &quot;Client&quot; accepte que les D&eacute;veloppeurs d&eacute;veloppent un site Web pour celui-ci&nbsp;; et<br \\/>\\r\\nAND WHEREAS, the &quot;D&eacute;veloppeurs&quot; s&#39;engage &agrave; d&eacute;velopper le site Web du Client selon les termes et conditions &eacute;nonc&eacute;s aux pr&eacute;sentes (le &quot;Site Internet&quot;).<br \\/>\\r\\nPAR CONS&Eacute;QUENT, en consid&eacute;ration des promesses et engagements mutuels ci-apr&egrave;s &eacute;nonc&eacute;s, les parties conviennent de ce qui suit&nbsp;:<\\/p>\\r\\n\\r\\n<p>1. INTERPR&Eacute;TATION<\\/p>\\r\\n\\r\\n<p>1.1 D&eacute;finitions:<br \\/>\\r\\nTels qu&#39;utilis&eacute;s ici, les termes suivants auront les significations suivantes&nbsp;;<br \\/>\\r\\n(1) &quot;Client&quot; signifiera [&quot;VOUS, CLIENT&quot;]<br \\/>\\r\\n(2) &quot;D&eacute;veloppeurs&quot; signifiera [&quot;Conception Web Montr&eacute;al Inc.&quot;]<br \\/>\\r\\n(3) &quot;Site Internet&quot; d&eacute;signe le site Web selon les modalit&eacute;s et les sp&eacute;cifications &eacute;nonc&eacute;es dans les annexes du pr&eacute;sent contrat, telles que convenues et modifi&eacute;es par les parties aux pr&eacute;sentes.<br \\/>\\r\\n(4) &quot;Caract&eacute;ristiques&quot; d&eacute;signe, aux fins de chaque contrat distinct, les sp&eacute;cifications telles qu&#39;&eacute;nonc&eacute;es et convenues par les parties, et toute modification y aff&eacute;rente, telles qu&#39;elles sont jointes aux pr&eacute;sentes en tant qu&#39;annexe &quot;B&quot;.<br \\/>\\r\\n(e) &quot;Dollars&quot; Tous les montants mentionn&eacute;s dans le pr&eacute;sent document signifient la devise du Canada.<\\/p>\\r\\n\\r\\n<p>1.2 &quot;Des horaires&quot; - Les annexes ci-dessous sont jointes aux pr&eacute;sentes et sont incorpor&eacute;es par r&eacute;f&eacute;rence dans le pr&eacute;sent accord&nbsp;:<br \\/>\\r\\nHoraire &quot;A&quot; - Termes et autres conditions pour le d&eacute;veloppement de la &quot;Site Internet&quot;.<br \\/>\\r\\nHoraire &quot;B&quot; - Sp&eacute;cifications applicables au site Web du client.<\\/p>\\r\\n\\r\\n<p>1.3 Invalidit&eacute; des dispositions - Sauf et &agrave; l&#39;exception des dispositions ou engagements contenus dans les pr&eacute;sentes qui sont fondamentaux pour l&#39;objet du pr&eacute;sent Contrat (y compris, sans limitation, ceux qui se rapportent au paiement d&#39;argent), l&#39;invalidit&eacute; ou l&#39;inapplicabilit&eacute; de toute disposition ou engagement des pr&eacute;sentes ou contenues dans les pr&eacute;sentes n&#39;affecteront pas la validit&eacute; ou la capacit&eacute; d&#39;ex&eacute;cution de toute autre disposition ou engagement des pr&eacute;sentes ou contenus dans les pr&eacute;sentes et toute disposition ou engagement invalide sera r&eacute;put&eacute; &ecirc;tre divisible.<\\/p>\\r\\n\\r\\n<p>1.4 En-t&ecirc;tes - L&#39;insertion d&#39;en-t&ecirc;tes est incluse uniquement &agrave; des fins de commodit&eacute; et de r&eacute;f&eacute;rence et n&#39;est pas destin&eacute;e &agrave; affecter la construction ou l&#39;interpr&eacute;tation de cet accord et les en-t&ecirc;tes ne sont pas destin&eacute;s &agrave; &ecirc;tre des descriptions compl&egrave;tes ou pr&eacute;cises du contenu des pr&eacute;sentes.<\\/p>\\r\\n\\r\\n<p><strong>2. Terme<\\/strong><br \\/>\\r\\n&Agrave; moins qu&#39;il ne soit r&eacute;sili&eacute; plus t&ocirc;t conform&eacute;ment aux dispositions de r&eacute;siliation et de d&eacute;faut de l&#39;Accord, la dur&eacute;e du pr&eacute;sent Accord sera pour la dur&eacute;e des travaux &agrave; terminer comme indiqu&eacute; dans les pr&eacute;sentes et le site Web est livr&eacute; au client pour son utilisation.<\\/p>\\r\\n\\r\\n<p><strong>3. R&eacute;mun&eacute;ration - Prix du contrat<\\/strong><br \\/>\\r\\n3.1 Lors de l&#39;ex&eacute;cution du pr&eacute;sent Contrat, le Client accepte de payer au D&eacute;veloppeur la somme convenue en esp&egrave;ces, traite bancaire, fonds certifi&eacute;s ou paiement par carte de cr&eacute;dit, selon le cas, qui est convenu et compris comme non remboursable en cas de r&eacute;siliation ou d&#39;annulation, la contrepartie &eacute;tant les d&eacute;veloppeurs d&eacute;veloppement initial, proposition et autres travaux pr&eacute;paratoires convenus par les parties comme n&eacute;cessaires au pr&eacute;sent accord, dont ledit montant &agrave; la fin du site Web, repr&eacute;sente un paiement partiel du montant total du contrat.<\\/p>\\r\\n\\r\\n<p>3.2 D&egrave;s que les d&eacute;veloppeurs d&eacute;veloppent et\\/ou livrent au client, ces &eacute;l&eacute;ments pour le site Web, comme indiqu&eacute; dans les sp&eacute;cifications et le(s) Annexe(s) &laquo;&nbsp;A&nbsp;&raquo; et &quot;B&quot; &agrave; cet accord, le client doit payer aux d&eacute;veloppeurs, des paiements progressifs en montants repr&eacute;sentant un pourcentage du prix total du contrat, comme sp&eacute;cifi&eacute; dans l&#39;annexe &quot;A&quot;, et par la suite dans le m&ecirc;me pourcentage &agrave; chaque &eacute;tape comme indiqu&eacute; dans l&#39;annexe &quot; ;A&quot; au pr&eacute;sent Accord.<\\/p>\\r\\n\\r\\n<p>3.3 Dans le cas o&ugrave; le Client omet d&#39;effectuer l&#39;un des paiements programm&eacute;s mentionn&eacute;s dans le pr&eacute;sent document et plus sp&eacute;cifiquement comme indiqu&eacute; dans l&#39;Annexe &laquo;&nbsp;A&nbsp;&raquo;; aux pr&eacute;sentes, &agrave; la date limite indiqu&eacute;e dans l&#39;annexe &laquo;&nbsp;A&nbsp;&raquo;, les d&eacute;veloppeurs se r&eacute;servent le droit unique et exclusif, mais ne sont pas oblig&eacute;s, de conserver toutes les sommes vers&eacute;es &agrave; ce jour sans remboursement, m&ecirc;me si le site Web n&#39;a pas &eacute;t&eacute; achev&eacute; et de poursuivre tout et tous les recours juridiques et autres &agrave; sa disposition, y compris, mais sans s&#39;y limiter, les suivants&nbsp;:<br \\/>\\r\\n(1) r&eacute;silier le Contrat et conserver toutes les sommes vers&eacute;es &agrave; ce jour,<br \\/>\\r\\n(2) de retirer, d&eacute;sactiver, d&eacute;sassembler, bloquer ou rendre inutilisable le site Web et les liens associ&eacute;s, sans pr&eacute;avis au client et en conserver la propri&eacute;t&eacute; pleine et enti&egrave;re,<br \\/>\\r\\n(3) transf&eacute;rer le contenu du site Web &agrave; un autre client &agrave; titre on&eacute;reux, et<br \\/>\\r\\n(4) engager une action en justice pour des dommages-int&eacute;r&ecirc;ts et\\/ou une injonction, et tous les frais juridiques, sur la base d&#39;un avocat et d&#39;un client.<\\/p>\\r\\n\\r\\n<p><strong>4. Termes et conditions<\\/strong><br \\/>\\r\\n4.1. D&eacute;veloppement de site Internet<br \\/>\\r\\nLes D&eacute;veloppeurs acceptent de d&eacute;velopper le Site Web selon les conditions &eacute;num&eacute;r&eacute;es dans l&#39;Annexe &laquo;&nbsp;A&nbsp;&raquo; ci-jointe.<br \\/>\\r\\n4.2. Caract&eacute;ristiques<br \\/>\\r\\nLes D&eacute;veloppeurs acceptent de d&eacute;velopper le Site Web conform&eacute;ment aux sp&eacute;cifications &eacute;nonc&eacute;es dans l&#39;Annexe &laquo;&nbsp;B&nbsp;&raquo; H&eacute;t&eacute;ro attach&eacute; (le &quot;Caract&eacute;ristiques&quot;).<br \\/>\\r\\n4.3. Livraison du site Web<br \\/>\\r\\nLes D&eacute;veloppeurs d&eacute;ploieront leurs meilleurs efforts et une diligence raisonnable dans le d&eacute;veloppement du Site Web et s&#39;efforceront de fournir au Client un Site Web op&eacute;rationnel &agrave; la date convenue. Nonobstant la date de livraison susmentionn&eacute;e, le Client reconna&icirc;t et accepte que cette date limite de livraison, et les acomptes correspondants y aff&eacute;rents, tels qu&#39;&eacute;num&eacute;r&eacute;s &agrave; l&#39;Annexe &laquo;&nbsp;A&nbsp;&raquo;, sont des estimations au mieux et ne constituent pas des dates de livraison essentielles. Lorsque cela est commercialement raisonnable, le Client et le D&eacute;veloppeur r&eacute;viseront les calendriers de livraison, reconnus par les parties par &eacute;crit.<br \\/>\\r\\n4.4. Droits de propri&eacute;t&eacute; exclusifs<br \\/>\\r\\n(1) Le Client accepte que le Site Web est et reste la propri&eacute;t&eacute; exclusive des D&eacute;veloppeurs et que les D&eacute;veloppeurs conservent le titre et d&eacute;tiennent tous les droits et int&eacute;r&ecirc;ts dans et sur tous les logiciels d&eacute;velopp&eacute;s par les D&eacute;veloppeurs et le Site Web et leurs copies, dans la mesure s&#39;appliquer, nonobstant l&#39;octroi de toute licence relative &agrave; son utilisation. Le Client reconna&icirc;t qu&#39;il ne re&ccedil;oit aucun titre ou droit de propri&eacute;t&eacute; sur ou sur aucun des droits de propri&eacute;t&eacute; intellectuelle sur le logiciel. Plus pr&eacute;cis&eacute;ment, mais sans limitation, le client accepte que les d&eacute;veloppeurs d&eacute;tiennent tous les droits, titres et int&eacute;r&ecirc;ts dans et &agrave;&nbsp;:<br \\/>\\r\\n(a) tous les textes, graphiques, animations, composants audio et composants num&eacute;riques du site Web (le &quot;Contenu&quot;),<br \\/>\\r\\n(b) toutes les interfaces, dispositifs de navigation, menus, structures ou dispositions de menus, ic&ocirc;nes, aide et autres instructions op&eacute;rationnelles, logiciels et tous les autres composants de tout code informatique source ou objet qui comprend le site Web,<br \\/>\\r\\n(c) toutes les expressions litt&eacute;rales et non litt&eacute;rales d&#39;id&eacute;es qui exploitent, provoquent, cr&eacute;ent, dirigent, manipulent, acc&egrave;dent ou affectent autrement le Contenu, et<br \\/>\\r\\n(d) tous les droits d&#39;auteur, brevets, secrets commerciaux et autres droits de propri&eacute;t&eacute; intellectuelle ou industrielle sur le site Web ou tout &eacute;l&eacute;ment ou caract&eacute;ristique de celui-ci. Le client s&#39;engage en outre &agrave; ne rien faire qui puisse porter atteinte ou nuire de quelque mani&egrave;re que ce soit aux d&eacute;veloppeurs. droit, titre et int&eacute;r&ecirc;t dans le site Web, comme d&eacute;crit dans ce paragraphe.<br \\/>\\r\\n(2) Le client conserve tous ses droits de propri&eacute;t&eacute; intellectuelle sur tout texte, ..\\/images ou autres &eacute;l&eacute;ments qu&#39;il poss&egrave;de et transmet aux d&eacute;veloppeurs pour une utilisation sur le site Web. Le client d&eacute;tient les droits d&#39;auteur pour la version convenue du site Web tel que livr&eacute;, et l&#39;avis de droit d&#39;auteur du client peut &ecirc;tre affich&eacute; dans la version finale.<br \\/>\\r\\n4.5 Confidentialit&eacute;<br \\/>\\r\\nSans limiter ce qui pr&eacute;c&egrave;de, le Client et les D&eacute;veloppeurs reconnaissent et acceptent que les Sp&eacute;cifications et tous les autres documents et informations li&eacute;s au d&eacute;veloppement du Site Web (le &quot;Information confidentielle&quot;) constitueront de pr&eacute;cieux secrets commerciaux des D&eacute;veloppeurs. Le client doit garder les informations confidentielles confidentielles et ne doit, &agrave; aucun moment pendant ou apr&egrave;s la dur&eacute;e du pr&eacute;sent accord, sans les d&eacute;veloppeurs&#39; consentement &eacute;crit pr&eacute;alable, divulguer ou mettre &agrave; la disposition de quiconque, directement ou indirectement, tout ou partie des informations confidentielles. Exclus des &quot;Informations Confidentielles&quot; la d&eacute;finition est tout ce qui peut &ecirc;tre vu par le public sur le site Web lorsque chaque page du site Web est consult&eacute;e pour la premi&egrave;re fois.<br \\/>\\r\\nL&#39;ex&eacute;cution par le Client des obligations qui pr&eacute;c&egrave;dent est une condition au D&eacute;veloppeur d&eacute;veloppant le Site Web pour le Client et &agrave; son utilisation par le Client.<\\/p>\\r\\n\\r\\n<p><strong>5. Garantie limit&eacute;e et limitation des dommages<\\/strong><br \\/>\\r\\nLes d&eacute;veloppeurs garantissent que le site Web sera conforme aux sp&eacute;cifications &eacute;nonc&eacute;es dans les pr&eacute;sentes. Si le site Web n&#39;est pas conforme aux sp&eacute;cifications, les d&eacute;veloppeurs seront responsables de corriger le site Web sans d&eacute;lai d&eacute;raisonnable, aux seuls frais des d&eacute;veloppeurs et sans frais pour le client, pour mettre le site Web en conformit&eacute; avec les sp&eacute;cifications. Cette garantie sera la garantie exclusive disponible pour le client, ind&eacute;pendamment du fait qu&#39;un recours &eacute;nonc&eacute; dans les pr&eacute;sentes &eacute;choue ou non &agrave; son objectif essentiel, et en aucun cas les d&eacute;veloppeurs ne seront tenus responsables des dommages sp&eacute;ciaux, accessoires, cons&eacute;cutifs, punitifs ou n&eacute;gligence), qu&#39;elles r&eacute;sultent d&#39;une perte d&#39;utilisation, d&#39;un retard de livraison, d&#39;une perte de donn&eacute;es, d&#39;une perte de b&eacute;n&eacute;fices anticip&eacute;s, d&#39;une perte d&#39;activit&eacute;, d&#39;une non-exploitation ou d&#39;une augmentation des frais d&#39;exploitation, ou autre. Le Client renonce &agrave; toute autre garantie, expresse ou implicite, y compris les garanties implicites de qualit&eacute; marchande et d&#39;ad&eacute;quation &agrave; un usage particulier. Le client reconna&icirc;t que les d&eacute;veloppeurs ne d&eacute;clarent ni ne garantissent que le site Web fonctionnera sur toutes les plateformes, ou que le site Web sera exempt d&#39;erreurs, ou que les d&eacute;veloppeurs seront en mesure de r&eacute;soudre ou de contourner chaque probl&egrave;me ou erreur d&eacute;couvert. Le Client reconna&icirc;t que les D&eacute;veloppeurs ne sont pas responsables des r&eacute;sultats obtenus par le Client sur le Site Web. Le client renonce par la pr&eacute;sente &agrave; toute r&eacute;clamation en dommages-int&eacute;r&ecirc;ts de quelque nature que ce soit, directs ou indirects, et accepte que son seul et unique recours en cas de dommages (contractuels ou d&eacute;lictuels) est le retour de la contrepartie vers&eacute;e aux d&eacute;veloppeurs comme indiqu&eacute; dans l&#39;annexe &quot;A&quot;. ; ci-joint, et en aucun cas la responsabilit&eacute; cumulative totale des D&eacute;veloppeurs en vertu des pr&eacute;sentes pour toutes les causes d&#39;action de quelque nature que ce soit, d&eacute;passera le montant total pay&eacute; par le Client aux D&eacute;veloppeurs. Le client s&#39;engage en outre &agrave; indemniser les d&eacute;veloppeurs de et contre toute perte, r&eacute;clamation, responsabilit&eacute;, dommage, co&ucirc;t ou d&eacute;pense, y compris les frais juridiques, payables &agrave; toute personne ou entit&eacute; r&eacute;sultant de l&#39;utilisation du site Web.<\\/p>\\r\\n\\r\\n<p><strong>6. Entrepreneur ind&eacute;pendant<\\/strong><br \\/>\\r\\nLes D&eacute;veloppeurs conviennent qu&#39;ils sont retenus en tant qu&#39;entrepreneurs ind&eacute;pendants et non en tant qu&#39;employ&eacute;s du Client. Il est de l&#39;intention des parties que les d&eacute;veloppeurs soient enti&egrave;rement responsables du paiement de toutes les retenues &agrave; la source, y compris, mais sans s&#39;y limiter&nbsp;; leurs propres imp&ocirc;ts sur le revenu provincial et f&eacute;d&eacute;ral, le R&eacute;gime de pensions du Canada sur toutes les r&eacute;mun&eacute;rations gagn&eacute;es et vers&eacute;es en vertu de la pr&eacute;sente entente. Les parties conviennent que le client ne retiendra ni ne paiera aucun imp&ocirc;t sur le revenu, taxe de s&eacute;curit&eacute; sociale ou tout autre imp&ocirc;t sur les salaires des d&eacute;veloppeurs. au nom de. Les D&eacute;veloppeurs comprennent et acceptent qu&#39;ils n&#39;auront droit &agrave; aucun avantage en nature que le Client fournit &agrave; ses employ&eacute;s en g&eacute;n&eacute;ral ou &agrave; aucun avantage l&eacute;gal en mati&egrave;re d&#39;emploi, y compris, sans s&#39;y limiter, les r&eacute;gimes de retraite d&#39;entreprise, les r&eacute;gimes de participation aux b&eacute;n&eacute;fices, la r&eacute;mun&eacute;ration des travailleurs ou l&#39;emploi. Assurance. Les D&eacute;veloppeurs acceptent d&#39;indemniser le Client pour toutes les r&eacute;clamations faites par toute autorit&eacute; gouvernementale l&eacute;gale pour toutes les retenues &agrave; la source et d&eacute;ductions l&eacute;gales non pay&eacute;es par les D&eacute;veloppeurs et r&eacute;clam&eacute;es au Client pour les sommes vers&eacute;es en vertu du pr&eacute;sent Contrat, et remises par le Client telle autorit&eacute;.<\\/p>\\r\\n\\r\\n<p><strong>7. &Eacute;quipement<\\/strong><br \\/>\\r\\nLe Client s&#39;engage &agrave; mettre &agrave; disposition des D&eacute;veloppeurs, pour les D&eacute;veloppeurs&#39; utiliser dans l&#39;ex&eacute;cution des services requis par le pr&eacute;sent Contrat, les &eacute;l&eacute;ments mat&eacute;riels et logiciels que le Client et les D&eacute;veloppeurs peuvent convenir sont raisonnablement n&eacute;cessaires &agrave; cette fin.<\\/p>\\r\\n\\r\\n<p><strong>8. Dispositions g&eacute;n&eacute;rales<\\/strong><br \\/>\\r\\n8.1 Accord complet.<br \\/>\\r\\nLe pr&eacute;sent accord constitue l&#39;int&eacute;gralit&eacute; de l&#39;accord entre les parties concernant l&#39;objet des pr&eacute;sentes et remplace tous les accords, ententes, n&eacute;gociations et discussions ant&eacute;rieurs, qu&#39;ils soient oraux ou &eacute;crits des parties, et il n&#39;y a aucune garantie, repr&eacute;sentation ou autre accord entre les parties en rapport avec avec le sujet, sauf indication contraire dans les pr&eacute;sentes. Aucun suppl&eacute;ment, modification, amendement, renonciation ou r&eacute;siliation de cet accord ne sera valide ou contraignant &agrave; moins d&#39;&ecirc;tre ex&eacute;cut&eacute; par &eacute;crit par les parties.<br \\/>\\r\\n8.2 Droit des contrats<br \\/>\\r\\nCet accord sera r&eacute;gi par les lois de la province de &laquo;&Eacute;tat&raquo; et les lois du Canada qui y sont applicables, sans &eacute;gard aux principes de choix de la loi. Les parties conviennent et comprennent en outre que nonobstant tout r&egrave;glement, d&eacute;cision ou convention en vertu de tout conflit de lois dans toute juridiction, quel que soit l&#39;endroit o&ugrave; le contrat est ex&eacute;cut&eacute; et conclu, les parties ont convenu que les lois de la province de &quot;&laquo; &Eacute;tat&raquo;&quot; et le Canada, selon le cas, r&eacute;gira ce contrat.<br \\/>\\r\\n8.3 Effet contraignant.<br \\/>\\r\\nLe pr&eacute;sent accord est contraignant apr&egrave;s accord du client, c&#39;est-&agrave;-dire en cochant la case &laquo;&nbsp;J&#39;accepte&nbsp;&raquo;.<br \\/>\\r\\n8.4 Renoncer.<br \\/>\\r\\nLa renonciation par l&#39;une ou l&#39;autre des parties &agrave; une violation ou &agrave; un manquement &agrave; l&#39;application de l&#39;un des termes et conditions du pr&eacute;sent accord &agrave; tout moment n&#39;affectera, ne limitera ou ne renoncera en aucun cas au droit de cette partie d&#39;appliquer et d&#39;obliger le strict respect des chaque terme et condition de cet accord.<br \\/>\\r\\n8.5 Bonne foi.<br \\/>\\r\\nChaque partie d&eacute;clare et garantit &agrave; l&#39;autre qu&#39;elle a agi de bonne foi, et accepte de continuer &agrave; agir ainsi, dans la n&eacute;gociation, l&#39;ex&eacute;cution, la livraison, l&#39;ex&eacute;cution et toute r&eacute;siliation du pr&eacute;sent Contrat.<br \\/>\\r\\n8.6 Propri&eacute;t&eacute; des photographies.<br \\/>\\r\\nLes d&eacute;veloppeurs&#39; peuvent utiliser certaines de leurs propres photographies pour le site Web. D&eacute;veloppeurs&#39; conserver la propri&eacute;t&eacute; des photographies, et n&#39;accorder au Client qu&#39;un droit non exclusif d&#39;utilisation de ces photographies, et uniquement sur le site Web du Client.<br \\/>\\r\\n8.7 Aucun droit de cession.<br \\/>\\r\\nLe Client n&#39;a pas le droit de c&eacute;der, vendre, modifier ou alt&eacute;rer de quelque mani&egrave;re que ce soit le Site Web, sauf avec l&#39;approbation pr&eacute;alable &eacute;crite expresse des D&eacute;veloppeurs, laquelle consentement peut &ecirc;tre refus&eacute; pour quelque raison que ce soit.<br \\/>\\r\\n8.8 Droit de supprimer le site Web.<br \\/>\\r\\nDans le cas o&ugrave; le Client omet d&#39;effectuer l&#39;un des paiements indiqu&eacute;s &agrave; l&#39;Annexe &laquo;&nbsp;A&nbsp;&raquo; dans le d&eacute;lai prescrit &agrave; l&#39;annexe &laquo;&nbsp;A&nbsp;&raquo;, les d&eacute;veloppeurs ont le droit de supprimer le site Web jusqu&#39;au paiement int&eacute;gral du paiement, plus les frais de retard accumul&eacute;s de 2,5&nbsp;% par mois.<br \\/>\\r\\n8.9 Indemnit&eacute;.<br \\/>\\r\\nLe client garantit que tout ce qu&#39;il donne aux d&eacute;veloppeurs &agrave; mettre sur le site Web est l&eacute;galement d&eacute;tenu ou sous licence au client. Le client s&#39;engage &agrave; indemniser et &agrave; d&eacute;gager les d&eacute;veloppeurs de toute r&eacute;clamation pr&eacute;sent&eacute;e par un tiers concernant tout aspect du site Web, y compris, mais sans s&#39;y limiter, toutes les demandes, responsabilit&eacute;s, pertes, co&ucirc;ts et r&eacute;clamations, y compris l&#39;avocat. Les frais r&eacute;sultant d&#39;un pr&eacute;judice caus&eacute; par les produits\\/services du client, le mat&eacute;riel fourni par le client, la violation du droit d&#39;auteur et les produits d&eacute;fectueux vendus via le site Web.<br \\/>\\r\\n8.10 Utilisation du site Web &agrave; des fins promotionnelles.<br \\/>\\r\\nLe Client accorde aux D&eacute;veloppeurs le droit d&#39;utiliser le Site Web &agrave; des fins promotionnelles et\\/ou de le lier avec d&#39;autres Sites Web d&eacute;velopp&eacute;s par les D&eacute;veloppeurs.<br \\/>\\r\\n8.11 Aucune responsabilit&eacute; en cas de vol.<br \\/>\\r\\nLes D&eacute;veloppeurs n&#39;assument aucune responsabilit&eacute; quant &agrave; l&#39;acc&egrave;s, l&#39;utilisation ou la prise de tout ou partie du Site Web par un tiers.<br \\/>\\r\\n8.12 Droit de faire des &oelig;uvres d&eacute;riv&eacute;es.<br \\/>\\r\\nLes D&eacute;veloppeurs ont les droits exclusifs de cr&eacute;er des &oelig;uvres d&eacute;riv&eacute;es du Site Web.<br \\/>\\r\\n8.13 Frais juridiques. Dans le cas o&ugrave; une partie au pr&eacute;sent accord emploie un avocat pour appliquer l&#39;une des conditions de l&#39;accord, la partie gagnante aura le droit de recouvrer ses frais et co&ucirc;ts juridiques r&eacute;els, y compris les honoraires des t&eacute;moins experts, sur une base avocat-client.<br \\/>\\r\\n8.14 Identification des d&eacute;veloppeurs.<br \\/>\\r\\nLe Client accepte que les D&eacute;veloppeurs les logos seront plac&eacute;s discr&egrave;tement sur toutes les pages du site Web. Le client s&#39;engage &eacute;galement &agrave; mettre sur Developers&#39; avis de droit d&#39;auteur sur le site Web et le contenu pertinent de celui-ci lorsque cela est demand&eacute;.<br \\/>\\r\\n8.15 Aucune responsabilit&eacute; pour la perte.<br \\/>\\r\\nEn plus de ce qui pr&eacute;c&egrave;de, les d&eacute;veloppeurs ne sont pas responsables des temps d&#39;arr&ecirc;t, des fichiers perdus, des liens inappropri&eacute;s ou de toute autre perte pouvant survenir dans le fonctionnement du site Web.<br \\/>\\r\\n8.16 Transfert de droits.<br \\/>\\r\\nDans le cas o&ugrave; les d&eacute;veloppeurs ne seraient pas en mesure de poursuivre la maintenance du site Web, des droits non exclusifs sur le site Web seront accord&eacute;s au client.<br \\/>\\r\\n8.17 Nom de domaine.<br \\/>\\r\\nTout nom de domaine enregistr&eacute; au nom du Client sera cr&eacute;&eacute; au nom du Client pour les contacts de facturation et administratifs. Le contact technique doit g&eacute;n&eacute;ralement &ecirc;tre le FAI h&eacute;bergeur. Les d&eacute;veloppeurs enregistreront les noms de domaine au nom des d&eacute;veloppeurs. Les d&eacute;veloppeurs ne sont pas propri&eacute;taires des noms de domaine, tant que le client paie annuellement. Si le Client ne paie pas, les noms de domaine expireront et le Client ne sera plus propri&eacute;taire des noms de domaine.<br \\/>\\r\\n<strong>Horaire &quot;A&quot;: Modalit&eacute;s de paiement<\\/strong><br \\/>\\r\\n1. a) Acompte minimum de 50 % du prix total &agrave; payer avant le d&eacute;but du d&eacute;veloppement du site Web, 50 % Quinze (30) jours ouvrables apr&egrave;s la signature du contrat initial<br \\/>\\r\\nPaiement final&nbsp;: 30 jours nets - Le site Web sera mis en ligne lors du paiement final.<br \\/>\\r\\n2. a) Le prix du client est bloqu&eacute; au total convenu et ne changera pas. Tous les services suppl&eacute;mentaires demand&eacute;s par le client seront pay&eacute;s en totalit&eacute; avant leur d&eacute;but.<br \\/>\\r\\n<strong>Horaire &quot;B&quot;:<\\/strong> Autres sp&eacute;cifications applicables au site Web du client.<br \\/>\\r\\nLe client est responsable de fournir le contenu et les photos dans les 30 jours suivant la signature.<\\/p>\\r\\n\\r\\n<p>1. a) Montreal Web Design Inc. - le logo et\\/ou le nom avec lien appara&icirc;tront toujours discr&egrave;tement sur le site Web con&ccedil;u.<\\/p>\\r\\n\\r\\n<p>J&#39;ai\\/Nous avons lu, compris et accept&eacute; d&#39;&ecirc;tre li&eacute; par les Conditions d&#39;utilisation.<\\/p>\\r\\n\\r\\n<p><strong>Derni&egrave;re r&eacute;vision : 12 janvier 2012.<\\/strong><\\/p>\"}', NULL, '{\"fr\":null}', '{\"en\":\"Terms of Services\",\"fr\":\"Conditions de services\"}', '{\"fr\":null}', '{\"en\":\"MONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians <br> are ready to handle all your web and computer needs, on any budget.\",\"fr\":\"MONTR\\u00c9AL WEB DESIGN s\'appuie sur une \\u00e9quipe de graphistes cr\\u00e9atifs et de techniciens Web <br> pr\\u00eats \\u00e0 r\\u00e9pondre \\u00e0 tous vos besoins Web et informatiques, quel que soit votre budget.\"}', 'banner_1626087712.jpg', NULL, NULL, '1', '2021-07-12 05:31:52', '2021-07-12 05:32:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_enquiries`
--

CREATE TABLE `mwd_enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_enquiries`
--

INSERT INTO `mwd_enquiries` (`id`, `name`, `phone_number`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dean Morgan', '9876543210', 'deanmorgan@yopmail.com', 'This is a test message.', '1', '2021-07-14 11:10:28', '2021-07-14 11:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `mwd_migrations`
--

CREATE TABLE `mwd_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_migrations`
--

INSERT INTO `mwd_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_09_115709_create_users_table', 1),
(2, '2021_05_09_115906_create_roles_table', 1),
(3, '2021_05_09_115958_create_role_permissions_table', 1),
(4, '2021_05_09_120108_create_user_roles_table', 1),
(5, '2021_05_09_120143_create_role_pages_table', 1),
(6, '2021_05_09_120236_create_website_settings_table', 1),
(7, '2021_05_09_120403_create_cms_table', 1),
(8, '2021_06_02_102341_create_services_table', 2),
(9, '2021_06_07_080200_create_portfolio_categories_table', 3),
(10, '2021_06_07_080846_create_portfolios_table', 4),
(11, '2021_06_07_081329_create_portfolio_category_mappings_table', 5),
(12, '2021_06_08_071958_create_enquiries_table', 6),
(13, '2021_06_11_065713_create_testimonials_table', 7),
(14, '2021_06_16_142431_create_quotes_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_portfolios`
--

CREATE TABLE `mwd_portfolios` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` text COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `is_featured` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_portfolios`
--

INSERT INTO `mwd_portfolios` (`id`, `title`, `slug`, `site_link`, `short_title`, `roles`, `short_description`, `description`, `is_featured`, `image`, `sort`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"en\":\"Bioastra Tech.com\",\"fr\":\"Bioastra Tech.com\"}', 'bioastra-techcom', 'https://www.bioastratech.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Website Maintenance\",\"fr\":\"Web Design, Web Hosting, Website Maintenance\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1623239626.jpg', 0, '1', '2021-06-07 04:51:34', '2021-06-09 06:23:46', NULL),
(2, '{\"en\":\"LaStrada.ca\",\"fr\":\"LaStrada.ca\"}', 'lastradaca', 'https://www.lastrada.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO, Website Maintenance\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO, Website Maintenance\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1623239397.jpg', 1, '1', '2021-06-09 06:19:57', '2021-06-09 06:19:57', NULL),
(3, '{\"en\":\"EMF Electrique.ca\",\"fr\":\"EMF Electrique.ca\"}', 'emf-electriqueca', 'https://www.emfelectrique.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Computer Repair\",\"fr\":\"Web Design, Web Hosting, Computer Repair\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1623239569.jpg', 2, '1', '2021-06-09 06:22:49', '2021-06-09 06:22:49', NULL),
(4, '{\"en\":\"Morival inc.\",\"fr\":\"Morival inc.\"}', 'morival-inc', 'https://www.Morival.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Domain Names\",\"fr\":\"Web Design, Web Hosting, Domain Names\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1623240069.jpg', 3, '1', '2021-06-09 06:31:09', '2021-06-09 06:31:09', NULL),
(5, '{\"en\":\"Mount Stephen Club.com\",\"fr\":\"Mount Stephen Club.com\"}', 'mount-stephen-clubcom', 'https://www.clubmountstephen.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Domain Names\",\"fr\":\"Web Design, Web Hosting, Domain Names\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1625661579.jpg', 4, '1', '2021-07-07 07:09:40', '2021-07-07 07:10:47', NULL),
(6, '{\"en\":\"Axsera.com\",\"fr\":\"Axsera.com\"}', 'axseracom', 'https://www.axsera.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625661994.jpg', 5, '1', '2021-07-07 07:16:34', '2021-07-07 07:16:34', NULL),
(7, '{\"en\":\"Bick Rack.ca\",\"fr\":\"Bick Rack.ca\"}', 'bick-rackca', 'https://www.bikerack.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Domain Names\",\"fr\":\"Web Design, Web Hosting, Domain Names\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625662297.jpg', 6, '1', '2021-07-07 07:21:37', '2021-07-07 07:21:37', NULL),
(8, '{\"en\":\"Lingerie Creations.com\",\"fr\":\"Lingerie Creations.com\"}', 'lingerie-creationscom', 'https://www.lingeriecreations.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1625662425.jpg', 7, '1', '2021-07-07 07:23:45', '2021-07-07 07:23:45', NULL),
(9, '{\"en\":\"The Goodie Bar.com\",\"fr\":\"The Goodie Bar.com\"}', 'the-goodie-barcom', 'https://www.thegoodiebar.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1625662686.jpg', 8, '1', '2021-07-07 07:28:06', '2021-07-07 07:28:06', NULL),
(10, '{\"en\":\"CSA Balloons.com\",\"fr\":\"CSA Balloons.com\"}', 'csa-balloonscom', 'https://www.csaballoons.com', '{\"fr\":null}', '{\"en\":\"Web Design, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625662762.jpg', 9, '1', '2021-07-07 07:29:22', '2021-07-07 07:29:22', NULL),
(11, '{\"en\":\"AV-Pro.ca\",\"fr\":\"AV-Pro.ca\"}', 'av-proca', 'https://www.av-pro.ca', '{\"fr\":null}', '{\"en\":\"Web Hosting, Domain Names\",\"fr\":\"Web Hosting, Domain Names\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625662871.jpg', 10, '1', '2021-07-07 07:31:11', '2021-07-07 07:31:11', NULL),
(12, '{\"en\":\"Midnight Express DJs.ca\",\"fr\":\"Midnight Express DJs.ca\"}', 'midnight-express-djsca', 'https://www.midnightexpressdjs.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO, Home Office Setup\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO, Home Office Setup\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1625662973.jpg', 11, '1', '2021-07-07 07:32:53', '2021-07-07 07:32:53', NULL),
(13, '{\"en\":\"Eventum.ca\",\"fr\":\"Eventum.ca\"}', 'eventumca', 'https://www.eventum.ca', '{\"fr\":null}', '{\"en\":\"Web Hosting, Domain Names\",\"fr\":\"Web Hosting, Domain Names\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1625663048.jpg', 12, '1', '2021-07-07 07:34:08', '2021-07-07 07:34:08', NULL),
(14, '{\"en\":\"L ecole et les arts.ca\",\"fr\":\"L ecole et les arts.ca\"}', 'l-ecole-et-les-artsca', 'https://lecoleetlesarts.ca', '{\"fr\":null}', '{\"en\":\"Web Hosting\",\"fr\":\"Web Hosting\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1625663130.jpg', 13, '1', '2021-07-07 07:35:31', '2021-07-07 07:35:31', NULL),
(15, '{\"en\":\"One Strange Man.com\",\"fr\":\"One Strange Man.com\"}', 'one-strange-mancom', 'https://onestrangeman.com', '{\"fr\":null}', '{\"en\":\"Web Hosting\",\"fr\":\"Web Hosting\"}', '{\"fr\":null}', '{\"fr\":null}', 'Y', 'portfolio_1625663196.jpg', 14, '1', '2021-07-07 07:36:36', '2021-07-07 07:36:36', NULL),
(16, '{\"en\":\"Valori.ca\",\"fr\":\"Valori.ca\"}', 'valorica', 'https://www.Valori.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting\",\"fr\":\"Web Design, Web Hosting\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625663258.jpg', 15, '1', '2021-07-07 07:37:38', '2021-07-07 07:37:38', NULL),
(17, '{\"en\":\"Rino Ferraro.ca\",\"fr\":\"Rino Ferraro.ca\"}', 'rino-ferraroca', 'https://www.rinoferraro.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625663345.jpg', 16, '1', '2021-07-07 07:39:05', '2021-07-07 07:39:05', NULL),
(18, '{\"en\":\"Flex Gym.ca\",\"fr\":\"Flex Gym.ca\"}', 'flex-gymca', 'https://www.flexgym.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625663412.jpg', 17, '1', '2021-07-07 07:40:13', '2021-07-07 07:40:13', NULL),
(19, '{\"en\":\"Kids Butterfly Yoga.com\",\"fr\":\"Kids Butterfly Yoga.com\"}', 'kids-butterfly-yogacom', 'https://www.kidsbutterflyyoga.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO, Home Office Setup\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO, Home Office Setup\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625663475.jpg', 18, '1', '2021-07-07 07:41:15', '2021-07-07 07:41:15', NULL),
(20, '{\"en\":\"Prestige Fitness.ca\",\"fr\":\"Prestige Fitness.ca\"}', 'prestige-fitnessca', 'https://www.prestigefitness.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO, Home Office Setup\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO, Home Office Setup\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625663541.jpg', 19, '1', '2021-07-07 07:42:21', '2021-07-07 07:42:21', NULL),
(21, '{\"en\":\"Dominic Landscaping.com\",\"fr\":\"Dominic Landscaping.com\"}', 'dominic-landscapingcom', 'https://www.dominiclandscaping.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625723816.jpg', 20, '1', '2021-07-08 00:26:57', '2021-07-08 00:26:57', NULL),
(22, '{\"en\":\"Daniel Cooper Lawyer.com\",\"fr\":\"Daniel Cooper Lawyer.com\"}', 'daniel-cooper-lawyercom', 'https://www.danielcooperlawyer.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625724188.jpg', 21, '1', '2021-07-08 00:33:08', '2021-07-08 00:33:08', NULL),
(23, '{\"en\":\"SCM Plus.ca\",\"fr\":\"SCM Plus.ca\"}', 'scm-plusca', 'https://www.danceink.co.uk', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting\",\"fr\":\"Web Design, Web Hosting\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625724555.jpg', 22, '1', '2021-07-08 00:39:15', '2021-07-08 00:39:15', NULL),
(24, '{\"en\":\"Polyroche.com\",\"fr\":\"Polyroche.com\"}', 'polyrochecom', 'https://www.polyroche.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625725094.jpg', 23, '1', '2021-07-08 00:48:14', '2021-07-08 00:48:14', NULL),
(25, '{\"en\":\"Valmust Inc.\",\"fr\":\"Valmust Inc.\"}', 'valmust-inc', 'https://www.agatex.com/valmust/index.php', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting\",\"fr\":\"Web Design, Web Hosting\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625725202.jpg', 24, '1', '2021-07-08 00:50:02', '2021-07-08 00:50:02', NULL),
(26, '{\"en\":\"Agatex\",\"fr\":\"Agatex\"}', 'agatex', 'https://www.agatex.com', '{\"fr\":null}', '{\"en\":\"Web Hosting\",\"fr\":\"Web Hosting\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625725367.jpg', 25, '1', '2021-07-08 00:52:47', '2021-07-08 00:52:47', NULL),
(27, '{\"en\":\"Aust & Hachmann Canada\",\"fr\":\"Aust & Hachmann Canada\"}', 'aust-hachmann-canada', 'https://www.ltfl.co.uk', '{\"fr\":null}', '{\"en\":\"Home Office Setup\",\"fr\":\"Home Office Setup\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625725455.jpg', 26, '1', '2021-07-08 00:54:15', '2021-07-08 00:54:15', NULL),
(28, '{\"en\":\"Acunic.ca\",\"fr\":\"Acunic.ca\"}', 'acunicca', 'https://www.acunic.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625725862.jpg', 27, '1', '2021-07-08 01:01:02', '2021-07-08 01:01:02', NULL),
(29, '{\"en\":\"John Weisnagel md.com\",\"fr\":\"John Weisnagel md.com\"}', 'john-weisnagel-mdcom', 'https://johnweisnagelmd.com', '{\"fr\":null}', '{\"en\":\"Web Hosting, Domain Names\",\"fr\":\"Web Hosting, Domain Names\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625726071.jpg', 28, '1', '2021-07-08 01:04:31', '2021-07-08 01:04:31', NULL),
(30, '{\"en\":\"Cancer Orl.ca\",\"fr\":\"Cancer Orl.ca\"}', 'cancer-orlca', 'https://www.cancerorl.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625726333.jpg', 29, '1', '2021-07-08 01:08:53', '2021-07-08 01:08:53', NULL),
(31, '{\"en\":\"Burovision - Office Furniture\",\"fr\":\"Burovision - Office Furniture\"}', 'burovision-office-furniture', 'https://www.burovision.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625726443.jpg', 30, '1', '2021-07-08 01:10:44', '2021-07-08 01:10:44', NULL),
(32, '{\"en\":\"Photo Grafix Services.ca\",\"fr\":\"Photo Grafix Services.ca\"}', 'photo-grafix-servicesca', 'https://www.photografixservices.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625726538.jpg', 31, '1', '2021-07-08 01:12:18', '2021-07-08 01:12:18', NULL),
(33, '{\"en\":\"Pen My Poem.com\",\"fr\":\"Pen My Poem.com\"}', 'pen-my-poemcom', 'https://penmypoem.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625726931.jpg', 32, '1', '2021-07-08 01:18:51', '2021-07-08 01:18:51', NULL),
(34, '{\"en\":\"Lofts Mtl.com\",\"fr\":\"Lofts Mtl.com\"}', 'lofts-mtlcom', 'https://www.LoftsMtl.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625727025.jpg', 33, '1', '2021-07-08 01:20:25', '2021-07-08 01:20:25', NULL),
(35, '{\"en\":\"Portes Ouvertes Staging.com\",\"fr\":\"Portes Ouvertes Staging.com\"}', 'portes-ouvertes-stagingcom', 'https://portesouvertestaging.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625727215.jpg', 34, '1', '2021-07-08 01:23:35', '2021-07-08 01:23:35', NULL),
(36, '{\"en\":\"Aristocrate.ca\",\"fr\":\"Aristocrate.ca\"}', 'aristocrateca', 'https://www.aristocrate.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Home Office Setup\",\"fr\":\"Web Design, Home Office Setup\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625727513.jpg', 35, '1', '2021-07-08 01:28:34', '2021-07-08 01:28:34', NULL),
(37, '{\"en\":\"Lofts du Main.com\",\"fr\":\"Lofts du Main.com\"}', 'lofts-du-maincom', 'https://www.loftsdumain.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625727736.jpg', 36, '1', '2021-07-08 01:32:16', '2021-07-08 01:32:16', NULL),
(38, '{\"en\":\"Bati-Expert - Inspecteur en batiment\",\"fr\":\"Bati-Expert - Inspecteur en batiment\"}', 'bati-expert-inspecteur-en-batiment', 'https://www.bati-expert.ca', '{\"fr\":null}', '{\"en\":\"Web Hosting\",\"fr\":\"Web Hosting\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625727803.jpg', 37, '1', '2021-07-08 01:33:23', '2021-07-08 01:33:23', NULL),
(39, '{\"en\":\"Print House Montreal.com\",\"fr\":\"Print House Montreal.com\"}', 'print-house-montrealcom', 'https://www.printhousemontreal.com', '{\"fr\":null}', '{\"en\":\"Web Hosting\",\"fr\":\"Web Hosting\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625727886.jpg', 38, '1', '2021-07-08 01:34:46', '2021-07-08 01:34:46', NULL),
(40, '{\"en\":\"Blueberry Invitations.com\",\"fr\":\"Blueberry Invitations.com\"}', 'blueberry-invitationscom', 'https://invitationsmontreal.com', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625727949.jpg', 39, '1', '2021-07-08 01:35:49', '2021-07-08 01:35:49', NULL),
(41, '{\"en\":\"TLP Communications.ca\",\"fr\":\"TLP Communications.ca\"}', 'tlp-communicationsca', 'https://www.tlpcommunications.ca', '{\"fr\":null}', '{\"en\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\",\"fr\":\"Web Design, Web Hosting, Digital Marketing \\/ SEO\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625728017.jpg', 40, '1', '2021-07-08 01:36:57', '2021-07-08 01:36:57', NULL),
(42, '{\"en\":\"Zoom Zoom Logos.com\",\"fr\":\"Zoom Zoom Logos.com\"}', 'zoom-zoom-logoscom', 'https://www.zoomzoomlogos.com', '{\"fr\":null}', '{\"en\":\"Web Design\",\"fr\":\"Web Design\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625728086.jpg', 41, '1', '2021-07-08 01:38:06', '2021-07-08 01:38:06', NULL),
(43, '{\"en\":\"Create Your Own Site\",\"fr\":\"Create Your Own Site\"}', 'create-your-own-site', 'https://www.ZoomZoomWeb.com', '{\"fr\":null}', '{\"en\":\"Web Design\",\"fr\":\"Web Design\"}', '{\"fr\":null}', '{\"fr\":null}', 'N', 'portfolio_1625728369.jpg', 42, '1', '2021-07-08 01:42:49', '2021-07-08 01:42:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_portfolio_categories`
--

CREATE TABLE `mwd_portfolio_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_portfolio_categories`
--

INSERT INTO `mwd_portfolio_categories` (`id`, `title`, `slug`, `sort`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"en\":\"Marketing\",\"fr\":\"Commercialisation\"}', 'marketing', 0, '1', '2021-06-07 02:36:19', '2021-07-12 05:51:40', NULL),
(2, '{\"en\":\"Branding Design\",\"fr\":\"Conception de marque\"}', 'branding-design', 1, '1', '2021-06-07 02:36:59', '2021-07-12 05:56:24', NULL),
(3, '{\"en\":\"Development Design\",\"fr\":\"Conception de d\\u00e9veloppement\"}', 'development-design', 2, '1', '2021-06-07 02:37:08', '2021-07-12 05:56:37', NULL),
(4, '{\"en\":\"Ecommerce Design\",\"fr\":\"Conception de commerce \\u00e9lectronique\"}', 'ecommerce-design', 3, '1', '2021-06-07 02:37:29', '2021-07-12 05:56:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_portfolio_category_mappings`
--

CREATE TABLE `mwd_portfolio_category_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` int(11) DEFAULT NULL COMMENT 'Id from portfolios table',
  `category_id` int(11) DEFAULT NULL COMMENT 'Id from categories table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_portfolio_category_mappings`
--

INSERT INTO `mwd_portfolio_category_mappings` (`id`, `portfolio_id`, `category_id`) VALUES
(15, 2, 4),
(16, 3, 2),
(17, 1, 1),
(18, 1, 3),
(23, 7, 1),
(25, 9, 4),
(26, 10, 1),
(27, 11, 1),
(28, 12, 1),
(29, 13, 1),
(30, 14, 1),
(31, 15, 1),
(32, 16, 3),
(33, 17, 1),
(34, 18, 2),
(35, 19, 2),
(36, 20, 2),
(37, 21, 2),
(38, 4, 1),
(39, 4, 3),
(40, 22, 2),
(41, 8, 1),
(42, 8, 4),
(43, 23, 1),
(44, 24, 4),
(45, 25, 4),
(46, 26, 4),
(47, 27, 1),
(48, 28, 1),
(49, 29, 1),
(50, 30, 1),
(51, 31, 4),
(52, 32, 1),
(53, 33, 1),
(54, 34, 1),
(55, 35, 1),
(56, 36, 3),
(57, 37, 3),
(58, 38, 2),
(59, 5, 3),
(60, 5, 4),
(61, 39, 4),
(62, 40, 1),
(63, 6, 1),
(64, 6, 2),
(65, 41, 2),
(66, 42, 2),
(68, 43, 2),
(69, 43, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_quotes`
--

CREATE TABLE `mwd_quotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_many_employees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hear_about_us` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_description` text COLLATE utf8mb4_unicode_ci,
  `static_website_html_non_flash` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `dynamic_website_flash_website_animated` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `static_website_with_flash_intro` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `logo_creation` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `domain_name_registration` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `website_maintenance` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `website_hosting` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `search_engine_submission` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `english_language_website` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `french_language_website` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `bilingual_language_website` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `number_of_english_pages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_english_graphics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_french_pages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_french_graphics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_quotes`
--

INSERT INTO `mwd_quotes` (`id`, `name`, `business_name`, `how_many_employees`, `phone_number`, `email`, `city`, `hear_about_us`, `website_description`, `static_website_html_non_flash`, `dynamic_website_flash_website_animated`, `static_website_with_flash_intro`, `logo_creation`, `domain_name_registration`, `website_maintenance`, `website_hosting`, `search_engine_submission`, `english_language_website`, `french_language_website`, `bilingual_language_website`, `number_of_english_pages`, `number_of_english_graphics`, `number_of_french_pages`, `number_of_french_graphics`, `day`, `month`, `year`, `budget`, `status`, `created_at`, `updated_at`) VALUES
(2, 'John Hestings', 'Business', '100', '9876543210', 'john@yopmail.com', 'Test', 'Yahoo', 'This is a test message.', 'Y', 'N', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'N', 'Y', '5', '50', '6', '60', '8', '9', '2022', '2,500$ - 5,000$', '1', '2021-07-09 05:00:45', '2021-07-09 05:00:45'),
(3, 'Dino Markham', 'Markham Hardware', '30', '9876543210', 'dinomarkham@yopmail.com', 'Kolu', 'Yahoo', 'This is a test message.', 'Y', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'Y', 'Y', 'Y', '5', '50', '4', '40', '10', '11', '2022', '2,500$ - 5,000$', '1', '2021-07-14 11:17:13', '2021-07-14 11:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `mwd_roles`
--

CREATE TABLE `mwd_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_roles`
--

INSERT INTO `mwd_roles` (`id`, `name`, `slug`, `is_admin`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'super-admin', '1', '1', '2021-06-01 06:10:33', '2021-06-01 06:10:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_role_pages`
--

CREATE TABLE `mwd_role_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `routeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mwd_role_permissions`
--

CREATE TABLE `mwd_role_permissions` (
  `role_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mwd_services`
--

CREATE TABLE `mwd_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `list_page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_featured` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_services`
--

INSERT INTO `mwd_services` (`id`, `title`, `slug`, `short_title`, `list_page_title`, `short_description`, `description`, `is_featured`, `image`, `service_image`, `sort`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"en\":\"Web Design\",\"fr\":\"Cr\\u00e9ation de sites web\"}', 'web-design', '{\"en\":\"Web Design & Development\",\"fr\":\"Design site web et d\\u00e9veloppment\"}', '{\"en\":\"Web Design & Development\",\"fr\":\"Design site web et d\\u00e9veloppment\"}', '{\"en\":\"We offer custom web <br>development services to meet <br>customer requirements.\",\"fr\":\"Nous offrons des services de <br>d\\u00e9veloppment web pour r\\u00e9pondre aux besoins des clients.\"}', '{\"en\":\"<p><strong>We offer custom web development services to meet customer requirements.<\\/strong><\\/p>\\r\\n\\r\\n<p>We place a high emphasis on the user experience. Our web development methodology includes: Information Gathering, Planning, Designing, Development, Testing and Delivery. As a part of website design and development strategy for our clients, we also provide free consultation on search engine optimization or SEO.<\\/p>\",\"fr\":\"<p><strong>Nous offrons des services de d&eacute;veloppment web pour r&eacute;pondre aux besoins des clients.<\\/strong><\\/p>\\r\\n\\r\\n<p>Nous mettons une emphase &eacute;lev&eacute;e sur l&#39;exp&eacute;rience utilisateur. Notre m&eacute;thodologie de d&eacute;veloppement web comprend: la collecte de l&#39;information, la planification, la conception, de d&eacute;veloppement, les tests et la livraison. Dans le cadre de la conception de sites web et de la strat&eacute;gie de d&eacute;veloppement pour nos clients, nous fournissons &eacute;galement des conseils gratuits sur l&#39;optimisation des moteurs de recherche.<\\/p>\"}', 'Y', 'service_1622644882.png', 'services_1622644882.jpg', 0, '1', '2021-06-02 09:11:22', '2021-10-18 10:35:07', NULL),
(2, '{\"en\":\"Web Hosting\",\"fr\":\"H\\u00e9bergement Web\"}', 'web-hosting', '{\"en\":\"Web Hosting\",\"fr\":\"H\\u00e9bergement Web\"}', '{\"en\":\"Web Hosting\",\"fr\":\"H\\u00e9bergement Web\"}', '{\"en\":\"At Montreal Web Design.Com, <br>we offer our clients reliable, <br>affordable and professional web hosting.\",\"fr\":\"Chez Montreal Web Design.Com, <br>nous offrons \\u00e0 nos clients un h\\u00e9bergement Web fiable, abordable et professionnel.\"}', '{\"en\":\"<p><strong>At Montreal Web Design.Com, we offer our clients reliable, affordable and professional web hosting.<\\/strong><\\/p>\\r\\n\\r\\n<p>We guarantee 99.9% up-time on all our accounts and strive to keep all of our customers satisfied. Our state-of-the-art network allows you to purchase and set up your account the same day.<\\/p>\",\"fr\":\"<p><strong>Chez Montreal Web Design.Com, nous offrons &agrave; nos clients un h&eacute;bergement Web fiable, abordable et professionnel.<\\/strong><\\/p>\\r\\n\\r\\n<p>Nous garantissons une disponibilit&eacute; de 99,9% sur tous nos comptes et nous nous effor&ccedil;ons de satisfaire tous nos clients. Notre r&eacute;seau de pointe vous permet d&#39;acheter et de configurer votre compte le jour m&ecirc;me.<\\/p>\"}', 'Y', 'service_1622645405.png', 'services_1622645405.jpg', 1, '1', '2021-06-02 09:20:05', '2021-07-06 08:58:29', NULL),
(3, '{\"en\":\"Domain Names\",\"fr\":\"Noms de domaine\"}', 'domain-names', '{\"en\":\"Web Domains\",\"fr\":\"Noms de domaine\"}', '{\"en\":\"Web Domains\",\"fr\":\"Noms de domaine\"}', '{\"en\":\"A domain name - such as Montreal <br>Web Design.Com - signifies your  own <br>address on the Internet.\",\"fr\":\"Un nom de domaine - tel que Montr\\u00e9al Web Design.Com - <br>signifie votre propre adresse sur Internet.\"}', '{\"en\":\"<p><strong>A domain name - such as Montreal Web Design.Com - signifies your own address on the Internet.<\\/strong><\\/p>\\r\\n\\r\\n<p>As no two parties may ever hold identical domain names, it is truly a unique identifier for you or your company. It is how your customers will remember you and find you among the millions of other websites on the Internet.<\\/p>\",\"fr\":\"<p><strong>Un nom de domaine - comme Montr&eacute;al Web Design.Com - signifie votre propre adresse sur Internet.<\\/strong><\\/p>\\r\\n\\r\\n<p>Comme deux parties ne peuvent jamais d&eacute;tenir des noms de domaine identiques, il s&#39;agit vraiment d&#39;un identifiant unique pour vous ou votre entreprise. C&#39;est ainsi que vos clients se souviendront de vous et vous trouveront parmi les millions d&#39;autres sites Web sur Internet.<\\/p>\"}', 'Y', 'service_1622646210.png', 'services_1622646210.jpg', 2, '1', '2021-06-02 09:33:30', '2021-07-07 06:19:53', NULL),
(4, '{\"en\":\"Digital Marketing \\/ SEO\",\"fr\":\"Marketing num\\u00e9rique \\/ SEO\"}', 'digital-marketing-seo', '{\"en\":\"Digital Marketing \\/<br> SEO\",\"fr\":\"Marketing num\\u00e9rique \\/<br> SEO\"}', '{\"en\":\"Digital Marketing \\/ SEO\",\"fr\":\"Marketing num\\u00e9rique \\/ SEO\"}', '{\"en\":\"Search Engine Optimization or (SEO)<br> in short is the process\\r\\nof making<br> your website visible to search engines and their users.\",\"fr\":\"Search Engine Optimization ou (SEO)<br> en bref est le processus\\r\\nde rendre<br> votre site Web visible pour les moteurs de recherche et leurs utilisateurs.\"}', '{\"en\":\"<p><strong>Search Engine Optimization or (SEO) in short is the process of making your website visible to search engines and their users.<\\/strong><\\/p>\\r\\n\\r\\n<p>SEO is a process of designing and developing a website with the goal of increasing visibility within search engines. The higher a website ranks in search engines, the more traffic is driven to your site.<\\/p>\",\"fr\":\"<p><strong>L&#39;optimisation pour les moteurs de recherche ou (SEO) en bref est le processus consistant &agrave; rendre votre site Web visible pour les moteurs de recherche et leurs utilisateurs.<\\/strong><\\/p>\\r\\n\\r\\n<p>Le r&eacute;f&eacute;rencement est un processus de conception et de d&eacute;veloppement d&#39;un site Web dans le but d&#39;augmenter la visibilit&eacute; dans les moteurs de recherche. Plus un site Web est bien class&eacute; dans les moteurs de recherche, plus le trafic vers votre site est important.<\\/p>\"}', 'Y', 'service_1622646343.png', 'services_1622646343.jpg', 3, '1', '2021-06-02 09:35:43', '2021-07-07 05:41:00', NULL),
(5, '{\"en\":\"Computer Repair\",\"fr\":\"R\\u00e9paration d\'ordinateur\"}', 'computer-repair', '{\"en\":\"Computer Repair\",\"fr\":\"R\\u00e9paration d\'ordinateur\"}', '{\"en\":\"Computer Repair\",\"fr\":\"R\\u00e9paration d\'ordinateur\"}', '{\"en\":\"Having trouble with your <br> computer? Give us a call. Quick and <br>reliable repairs.\",\"fr\":\"Vous rencontrez des probl\\u00e8mes avec votre ordinateur ? Appelez-nous. <br>R\\u00e9parations rapides et fiables.\"}', '{\"en\":\"<p><strong>Having trouble with your computer? Give us a call. Quick and reliable repairs.<\\/strong><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Minor repairs - remote service \\/ Major repairs - pick-up service<\\/li>\\r\\n\\t<li>New PC setup: data transfers, e-mail etc<\\/li>\\r\\n\\t<li>Customized desktop\\/laptop specifications<\\/li>\\r\\n\\t<li>Hardware and software installation and upgrades<\\/li>\\r\\n\\t<li>Wifi setup for home and small businesses (peripherals)<\\/li>\\r\\n\\t<li>Computer troubleshooting and optimization<\\/li>\\r\\n\\t<li>Virus\\/Malware removal and FREE antivirus protection<\\/li>\\r\\n\\t<li>Data recovery<\\/li>\\r\\n\\t<li>Setup automated backup system (Cloud backup)<\\/li>\\r\\n<\\/ul>\",\"fr\":\"<p><strong>Un probl&egrave;me avec votre ordinateur ? Appelez-nous. R&eacute;parations rapides et fiables.<\\/strong><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>R&eacute;parations mineures - service &agrave; distance \\/ R&eacute;parations majeures - service de ramassage<\\/li>\\r\\n\\t<li>Nouvelle configuration du PC&nbsp;: transferts de donn&eacute;es, e-mail, etc.<\\/li>\\r\\n\\t<li>Sp&eacute;cifications personnalis&eacute;es pour ordinateur de bureau\\/ordinateur portable<\\/li>\\r\\n\\t<li>Installation et mises &agrave; jour mat&eacute;rielles et logicielles<\\/li>\\r\\n\\t<li>Configuration Wifi pour la maison et les petites entreprises (p&eacute;riph&eacute;riques)<\\/li>\\r\\n\\t<li>D&eacute;pannage et optimisation informatique<\\/li>\\r\\n\\t<li>Suppression des virus\\/programmes malveillants et protection antivirus GRATUITE<\\/li>\\r\\n\\t<li>R&eacute;cup&eacute;ration de donn&eacute;es<\\/li>\\r\\n\\t<li>Mettre en place un syst&egrave;me de sauvegarde automatis&eacute; (sauvegarde Cloud)<\\/li>\\r\\n<\\/ul>\"}', 'Y', 'service_1622646399.png', 'services_1622646399.jpg', 4, '1', '2021-06-02 09:36:39', '2021-07-07 06:21:05', NULL),
(6, '{\"en\":\"Home Office Setup\",\"fr\":\"Configuration du bureau \\u00e0 domicile\"}', 'home-office-setup', '{\"en\":\"Home Office Setup\",\"fr\":\"Configuration du bureau \\u00e0 domicile\"}', '{\"en\":\"Home Office Setup\",\"fr\":\"Configuration du bureau \\u00e0 domicile\"}', '{\"en\":\"Montreal Web Design can help turn any room in your home into a remote working environment.\",\"fr\":\"Montreal Web Design peut vous aider \\u00e0 transformer n\'importe quelle pi\\u00e8ce de votre maison en un environnement de travail \\u00e0 distance.\"}', '{\"en\":\"<p><strong>Work From Home &ndash; Remote Office<\\/strong><\\/p>\\r\\n\\r\\n<p>Montreal Web Design can help turn any room in your home into a remote working environment. We can help with all the tools and software you need to stay connected, without ever needing to go to work.<\\/p>\",\"fr\":\"<p><strong>Travail &agrave; domicile &ndash; Bureau &agrave; distance<\\/strong><\\/p>\\r\\n\\r\\n<p>Montreal Web Design peut vous aider &agrave; transformer n&#39;importe quelle pi&egrave;ce de votre maison en un environnement de travail &agrave; distance. Nous pouvons vous aider avec tous les outils et logiciels dont vous avez besoin pour rester connect&eacute;, sans jamais avoir besoin d&#39;aller travailler.<\\/p>\"}', 'Y', 'service_1622646456.png', 'services_1622646456.jpg', 5, '1', '2021-06-02 09:37:36', '2021-07-07 06:22:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_testimonials`
--

CREATE TABLE `mwd_testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_testimonials`
--

INSERT INTO `mwd_testimonials` (`id`, `title`, `slug`, `author`, `designation`, `description`, `image`, `logo`, `sort`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"en\":\"https:\\/\\/www.vmgentertainment.com\",\"fr\":\"https:\\/\\/www.vmgentertainment.com\"}', 'httpswwwvmgentertainmentcom', '{\"en\":\"Ralph B.\",\"fr\":\"Ralph B.\"}', '{\"en\":\"Founder\",\"fr\":\"Fondateur\"}', '{\"en\":\"<p>Been a client of Montreal Web Design for several years now and will not be looking anywhere else. Professional work and service and very attentive to what you are requesting.<br \\/>\\r\\nThank you, Domenic!<\\/p>\",\"fr\":\"<p>Je suis un client de Montreal Web Design depuis plusieurs ann&eacute;es maintenant et je ne chercherai pas ailleurs. Travail et service professionnels et tr&egrave;s attentifs &agrave; ce que vous demandez.<br \\/>\\r\\nMerci, Domenic !<\\/p>\"}', 'testimonial_1625580356.png', NULL, 0, '1', '2021-07-06 08:35:57', '2021-07-14 13:18:41', NULL),
(2, '{\"en\":\"http:\\/\\/vartech-mcs.com\",\"fr\":\"http:\\/\\/vartech-mcs.com\"}', 'httpvartech-mcscom', '{\"en\":\"Nicholas P.\",\"fr\":\"Nicholas P.\"}', '{\"en\":\"President\",\"fr\":\"Pr\\u00e9sident\"}', '{\"en\":\"<p>We switched our business to Montreal Web Design years ago. They quickly understood our business and our target customers. They re-designed our logo and created a website that was easy to navigate and covered our services perfectly. They are knowledgeable, efficient, and most importantly, very reliable. We highly recommend them.<\\/p>\",\"fr\":\"<p>Nous avons confi&eacute; notre entreprise &agrave; Montreal Web Design il y a plusieurs ann&eacute;es. Ils ont rapidement compris notre activit&eacute; et notre client&egrave;le cible. Ils ont redessin&eacute; notre logo et cr&eacute;&eacute; un site Web facile &agrave; naviguer et couvrant parfaitement nos services. Ils sont comp&eacute;tents, efficaces et, surtout, tr&egrave;s fiables. Nous les recommandons vivement.<\\/p>\"}', 'testimonial_1625580851.png', NULL, 1, '1', '2021-07-06 08:44:12', '2021-07-14 13:19:55', NULL),
(3, '{\"en\":\"http:\\/\\/www.bikerack.ca\",\"fr\":\"http:\\/\\/www.bikerack.ca\"}', 'httpwwwbikerackca', '{\"en\":\"Joe P.\",\"fr\":\"Joe P.\"}', '{\"en\":\"President\",\"fr\":\"Pr\\u00e9sident\"}', '{\"en\":\"<p>My company is based out of Toronto and we ship our product all over Canada. Domenic from Montreal Web Design has been with us since the beginning.<br \\/>\\r\\nNot only did he build our first website in 2004, but he also continues to maintain it and webhost it to this day.<br \\/>\\r\\nKnowing very little about web marketing or SEO, we leaned on Domenic to handle our rankings.<br \\/>\\r\\nToday, we are proud to say that we rank among the top 10 in our category among Google searches. Thanks, Domenic!<\\/p>\",\"fr\":\"<p>Mon entreprise est bas&eacute;e &agrave; Toronto et nous exp&eacute;dions notre produit dans tout le Canada. Domenic, de Montreal Web Design, est avec nous depuis le d&eacute;but.<br \\/>\\r\\nNon seulement il a construit notre premier site Web en 2004, mais il continue &eacute;galement &agrave; le maintenir et &agrave; l&#39;h&eacute;berger &agrave; ce jour.<br \\/>\\r\\nSachant tr&egrave;s peu de choses sur le marketing web ou le r&eacute;f&eacute;rencement, nous nous sommes appuy&eacute;s sur Domenic pour g&eacute;rer nos classements.<br \\/>\\r\\nAujourd&#39;hui, nous sommes fiers de dire que nous nous classons parmi les 10 premiers de notre cat&eacute;gorie parmi les recherches Google. Merci, Domenic !<\\/p>\"}', 'testimonial_1625580946.png', NULL, 2, '1', '2021-07-06 08:45:46', '2021-07-14 13:21:09', NULL),
(4, '{\"en\":\"http:\\/\\/reftech.ca\",\"fr\":\"http:\\/\\/reftech.ca\"}', 'httpreftechca', '{\"en\":\"Nick F.\",\"fr\":\"Nick F.\"}', '{\"en\":\"Director of Procurement\",\"fr\":\"Directeur des achats\"}', '{\"en\":\"<p>When we launched our company in 2013, we hired Domenic to build our website. Being an industrial company, we had truly little knowledge on how to go about this.<br \\/>\\r\\nHe took the lead and guided us through the process painlessly, creating a very slick and dynamic tool to showcase our business.<br \\/>\\r\\nThrough the process, we got to know Domenic well and learned that he also had IT capabilities. We ended up hiring him as our IT Manager!<\\/p>\",\"fr\":\"<p>Lorsque nous avons lanc&eacute; notre entreprise en 2013, nous avons engag&eacute; Domenic pour construire notre site web. &Eacute;tant une entreprise industrielle, nous avions vraiment peu de connaissances sur la fa&ccedil;on de proc&eacute;der.<br \\/>\\r\\nIl a pris les devants et nous a guid&eacute;s &agrave; travers le processus sans douleur, cr&eacute;ant un outil tr&egrave;s lisse et dynamique pour pr&eacute;senter notre entreprise.<br \\/>\\r\\nGr&acirc;ce &agrave; ce processus, nous avons appris &agrave; bien conna&icirc;tre Domenic et avons appris qu&#39;il avait &eacute;galement des capacit&eacute;s informatiques. Nous avons fini par l&#39;engager comme responsable informatique !<\\/p>\"}', 'testimonial_1625581018.png', NULL, 3, '1', '2021-07-06 08:46:58', '2021-07-14 13:22:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_users`
--

CREATE TABLE `mwd_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` int(11) DEFAULT NULL COMMENT 'Verification code for registration',
  `type` enum('SA','A','U','V') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'U' COMMENT 'SA=>Super Admin, A=>Sub Admin, U=>User, V=>Vendor',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `lastlogintime` int(11) DEFAULT NULL,
  `sample_login_show` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'Y=>Yes, N=>No',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_users`
--

INSERT INTO `mwd_users` (`id`, `nickname`, `title`, `first_name`, `last_name`, `full_name`, `username`, `email`, `phone_no`, `password`, `profile_pic`, `logo`, `role_id`, `remember_token`, `auth_token`, `device_token`, `verification_code`, `type`, `status`, `lastlogintime`, `sample_login_show`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 'Domenic', 'Grippo', 'Domenic Grippo', NULL, 'admin@montreal.com', '9876543210', '$2y$10$RBHBd3DCymGvguAKukUvIuqzvfO6wphFl6UHMpY2O.zADfFzph1sq', '', NULL, 1, NULL, NULL, NULL, NULL, 'SA', '1', 1634542046, 'Y', '2021-06-01 06:10:33', '2021-10-18 07:27:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_user_roles`
--

CREATE TABLE `mwd_user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mwd_website_settings`
--

CREATE TABLE `mwd_website_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_title` text COLLATE utf8mb4_unicode_ci,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rss_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribble_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tumblr_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `map` longtext COLLATE utf8mb4_unicode_ci,
  `footer_address` text COLLATE utf8mb4_unicode_ci,
  `copyright_text` text COLLATE utf8mb4_unicode_ci,
  `tag_line` text COLLATE utf8mb4_unicode_ci,
  `toll_free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_website_settings`
--

INSERT INTO `mwd_website_settings` (`id`, `from_email`, `to_email`, `website_title`, `phone_no`, `fax`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `pinterest_link`, `googleplus_link`, `youtube_link`, `rss_link`, `dribble_link`, `tumblr_link`, `address`, `map`, `footer_address`, `copyright_text`, `tag_line`, `toll_free`, `logo`, `footer_logo`) VALUES
(1, 'info@montrealwebdesign.com', 'info@montrealwebdesign.com', '{\"en\":\"Montreal Web Design.com\",\"fr\":\"Montreal Web Design.com\"}', '(514) 819-1801', NULL, 'https://www.facebook.com/MontrealWebDesign', 'https://twitter.com/montrealweb', NULL, 'https://ca.linkedin.com/in/domenic-grippo-899ba21', NULL, NULL, NULL, NULL, NULL, NULL, '{\"en\":\"<h2>Hire us, or just say hello!<\\/h2>\\r\\n                    <div class=\\\"phone_num_holder\\\">\\r\\n                        <p>Montreal: <a href=\\\"tel:5148191901\\\"> (514) 819-1801<\\/a><\\/p>\\r\\n                        <p>Toll Free: <a href=\\\"tel:18009391077\\\">1 (800) 939-1077<\\/a><\\/p>\\r\\n                    <\\/div>\\r\\n                    <div class=\\\"address_holder\\\">\\r\\n                        <h3>OFFICE HOURS:<\\/h3>\\r\\n                        <p>Monday to Friday<\\/p>\\r\\n                        <p>8:30 - 16:30 EDT<\\/p> \\r\\n                    <\\/div>\",\"fr\":\"<h2>Engagez-nous, ou dites simplement bonjour!<\\/h2>\\r\\n                    <div class=\\\"phone_num_holder\\\">\\r\\n                        <p>Montreal: <a href=\\\"tel:5148191901\\\"> (514) 819-1801<\\/a><\\/p>\\r\\n                        <p>T\\u00e9l: <a href=\\\"tel:18009391077\\\">1 (800) 939-1077<\\/a><\\/p>\\r\\n                    <\\/div>\\r\\n                    <div class=\\\"address_holder\\\">\\r\\n                        <h3>Heures de bureau:<\\/h3>\\r\\n                        <p>Du lundi au vendredi<\\/p>\\r\\n                        <p>8h30 - 16h30 HNE<\\/p> \\r\\n                    <\\/div>\"}', NULL, '{\"fr\":null}', '{\"en\":\"2021 <span>montrealwebdesign.com<\\/span>. All rights reserved.\",\"fr\":\"2021 <span>montrealwebdesign.com<\\/span>. Tous droits r\\u00e9serv\\u00e9s.\"}', '{\"fr\":null}', '1 (800) 939-1077', 'logo_1622722064.png', 'footer_logo_1622722064.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mwd_cms`
--
ALTER TABLE `mwd_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_enquiries`
--
ALTER TABLE `mwd_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_migrations`
--
ALTER TABLE `mwd_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_portfolios`
--
ALTER TABLE `mwd_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_portfolio_categories`
--
ALTER TABLE `mwd_portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_portfolio_category_mappings`
--
ALTER TABLE `mwd_portfolio_category_mappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_quotes`
--
ALTER TABLE `mwd_quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_roles`
--
ALTER TABLE `mwd_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_role_pages`
--
ALTER TABLE `mwd_role_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_services`
--
ALTER TABLE `mwd_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_testimonials`
--
ALTER TABLE `mwd_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_users`
--
ALTER TABLE `mwd_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_website_settings`
--
ALTER TABLE `mwd_website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mwd_cms`
--
ALTER TABLE `mwd_cms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mwd_enquiries`
--
ALTER TABLE `mwd_enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mwd_migrations`
--
ALTER TABLE `mwd_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mwd_portfolios`
--
ALTER TABLE `mwd_portfolios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `mwd_portfolio_categories`
--
ALTER TABLE `mwd_portfolio_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mwd_portfolio_category_mappings`
--
ALTER TABLE `mwd_portfolio_category_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `mwd_quotes`
--
ALTER TABLE `mwd_quotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mwd_roles`
--
ALTER TABLE `mwd_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mwd_role_pages`
--
ALTER TABLE `mwd_role_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mwd_services`
--
ALTER TABLE `mwd_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mwd_testimonials`
--
ALTER TABLE `mwd_testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mwd_users`
--
ALTER TABLE `mwd_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mwd_website_settings`
--
ALTER TABLE `mwd_website_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
