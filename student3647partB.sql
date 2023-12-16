-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: webpagesdb.it.auth.gr:3306
-- Χρόνος δημιουργίας: 14 Σεπ 2023 στις 23:12:34
-- Έκδοση διακομιστή: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- Έκδοση PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `student3647partB`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `theme` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `announcements`
--

INSERT INTO `announcements` (`id`, `date`, `theme`, `body`) VALUES
(1, '2008-12-12', 'Έναρξη μαθημάτων', 'Τα μαθήματα αρχίζουν τη Δευτέρα 17/12/2008.'),
(2, '2008-12-15', 'Ανάρτηση εργασίας', 'Η 1η εργασία έχει ανακοινωθεί στην ιστοσελίδα «Εργασίες». Τα μαθήματα αρχίζουν τη Δευτέρα 17/12/2008.'),
(3, '2023-12-17', 'Έναρξη μαθημάτων', 'Τα μαθήματα αρχίζουν από σήμερα.'),
(4, '2023-12-20', 'Αλλαγή ωραρίου μαθημάτων', 'Σας ενημερώνουμε ότι από τη Δευτέρα 10/1/2009 το ωράριο των μαθημάτων θα τροποποιηθεί. Παρακαλούμε να ελέγξετε το νέο ωράριο στο πρόγραμμα.'),
(5, '2023-01-20', 'Εξεταστική περίοδος', 'Σας ενημερώνουμε ότι η εξεταστική περίοδος για το τρέχον εξάμηνο θα διαρκέσει από τις 25/1/2009 έως τις 26/2/2009.'),
(6, '2023-01-16', 'Διαθεσιμότητα διδακτικού προσωπικού', 'Θέλουμε να σας ενημερώσουμε πως το διδακτικό προσωπικό θα είναι διαθέσιμο για ερωτήσεις και διευκρινίσεις κάθε Τρίτη και Πέμπτη, από τις 10:00 π.μ. έως τις 12:00 μ.μ., στο γραφείο του κάθε καθηγητή.'),
(7, '2023-01-16', 'Επιπλέον μαθήματα προετοιμασίας', 'Διοργανώνονται επιπλέον μαθήματα προετοιμασίας για το μάθημα «Αλγόριθμοι και Δομές Δεδομένων» την προσεχή εβδομάδα. Παρακαλούμε να δείτε τις λεπτομέρειες στα mail που σας έχουν σταλεί.'),
(8, '2023-03-02', 'Επιμορφωτικό σεμινάριο', 'Διοργανώνεται επιμορφωτικό σεμινάριο με θέμα \"Εισαγωγή στην Τεχνητή Νοημοσύνη\" που θα πραγματοποιηθεί το ερχόμενο Σάββατο, 15 Μαρτίου, στις 10:00 π.μ. στην αίθουσα του πολυμέσων. Το σεμινάριο απευθύνεται σε φοιτητές όλων των επιπέδων και θα καλύψει θεωρητικές και πρακτικές πτυχές της Τεχνητής Νοημοσύνης. Μην το χάσετε!');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `path` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `documents`
--

INSERT INTO `documents` (`id`, `title`, `description`, `path`) VALUES
(1, 'Πρόγραμμα Μαθήματος', 'Τo πρόγραμμα μαθήματος περιλαμβάνει λεπτομέρειες σχετικά με τα θέματα που θα καλυφθούν, τις αξιολογήσεις, τις ημερομηνίες και τα ωρολόγια μαθήματος.', 'uploads/documents/file1.doc'),
(2, 'Διαφάνειες Μαθήματος', 'Οι διαφάνειες του μαθήματος είναι διαθέσιμες για λήψη και περιέχουν τις κύριες πληροφορίες που παρουσιάζονται στο μάθημα.', 'uploads/documents/file2.doc'),
(3, 'Βιβλιογραφία', 'Η βιβλιογραφία περιέχει τις συνιστάμενες αναγνώσεις και τα επιπρόσθετα υλικά που μπορούν να χρησιμοποιηθούν για την εμβάθυνση στα θέματα του μαθήματος.', 'uploads/documents/file3.doc'),
(4, 'Εργασίες και Αξιολογήσεις', 'Σε αυτό το έγγραφο περιγράφονται οι εργασίες που πρέπει να υποβληθούν κατά τη διάρκεια του μαθήματος και οι αξιολογήσεις που θα πραγματοποιηθούν.', 'uploads/documents/file4.doc'),
(5, 'Πόροι και Υλικά', 'Σε αυτό το έγγραφο περιλαμβάνονται πόροι και υλικά που μπορούν να χρησιμοποιηθούν για την υποστήριξη της μάθησης, όπως εκπαιδευτικά βίντεο, άρθρα και ιστοσελίδες.', 'uploads/documents/file5.doc'),
(6, 'Συμπληρωματικό Υλικό', 'Συμπληρωματικό υλικό για το μάθημα, όπως επιπλέον βιβλιογραφία, ερευνητικά άρθρα, άρθρα από περιοδικά, ιστοσελίδες κ.λπ. που μπορούν να εμπλουτίσουν την κατανόηση του θέματος.', 'uploads/documents/file6.doc'),
(7, 'Έρευνα και Εργασίες Φοιτητών', 'Πληροφορίες σχετικά με τις έρευνες και τις εργασίες που πρέπει να πραγματοποιήσουν οι φοιτητές στο πλαίσιο του μαθήματος. Συμπεριλαμβάνονται οδηγίες, κριτήρια αξιολόγησης και πιθανά θέματα.', 'uploads/documents/file7.doc'),
(8, 'Σημειώσεις Διαλέξεων', 'Συλλογή από σημειώσεις διαλέξεων που καλύπτουν τα βασικά θέματα και τις έννοιες που παρουσιάζονται στο μάθημα.', 'uploads/documents/file8.doc');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `goals`
--

CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `goal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `goals`
--

INSERT INTO `goals` (`id`, `homework_id`, `goal`) VALUES
(25, 1, 'Σχεδίαση της δομής και του σχεδιασμού μιας ιστοσελίδας με έμφαση στη χρηστικότητα και την αισθητική'),
(26, 1, 'Υλοποίηση της ιστοσελίδας με χρήση HTML, CSS και JavaScript για διαδραστικότητα'),
(27, 2, 'Συλλογή δεδομένων από μια πραγματική πηγή'),
(28, 2, 'Ανάλυση των δεδομένων και εξαγωγή συμπερασμάτων με τη χρήση αλγορίθμων και τεχνικών μηχανικής μάθησης'),
(29, 3, 'Κατασκευή μιας εφαρμογής που δέχεται κείμενο από τον χρήστη και καταμετρά τον αριθμό των λέξεων'),
(30, 3, 'Υλοποίηση δυνατότητας για ανάλυση της συχνότητας εμφάνισης των λέξεων'),
(31, 4, 'Σχεδίαση και ανάπτυξη μιας διαδραστικής εφαρμογής παιχνιδιού Sudoku'),
(32, 4, 'Κατανόηση του αλγορίθμου και των κανόνων που διέπουν το παιχνίδι');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `path` mediumtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `homework`
--

INSERT INTO `homework` (`id`, `title`, `path`, `date`) VALUES
(1, 'Σχεδιασμός και Υλοποίηση Ιστοσελίδας', 'uploads/homework/ergasia1.doc', '2022-11-15'),
(2, 'Ανάλυση Δεδομένων και Εξαγωγή Συμπερασμάτων', 'uploads/homework/ergasia2.doc', '2022-12-20'),
(3, 'Κατασκευή Εφαρμογής για Καταμέτρηση Λέξεων', 'uploads/homework/ergasia3.doc', '2023-04-10'),
(4, 'Ανάπτυξη Εφαρμογής Παιχνιδιού Sudoku', 'uploads/homework/ergasia4.doc', '2023-05-25');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `requirements`
--

CREATE TABLE `requirements` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `requirement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `requirements`
--

INSERT INTO `requirements` (`id`, `homework_id`, `requirement`) VALUES
(1, 1, 'Σχεδιασμένο και λειτουργικό πρωτότυπο της ιστοσελίδας'),
(2, 1, 'Αναφορά που περιγράφει τον σχεδιασμό και την υλοποίηση της ιστοσελίδας'),
(3, 2, 'Αναφορά που περιλαμβάνει τα δεδομένα που συλλέξατε, τις αναλύσεις που πραγματοποιήσατε και τα συμπεράσματα που βγάλατε'),
(4, 2, 'Πρόγραμμα ή σενάρια που χρησιμοποιήσατε για την ανάλυση των δεδομένων'),
(5, 3, 'Λειτουργική εφαρμογή που καταμετρά τις λέξεις και παρουσιάζει τα αποτελέσματα στον χρήστη'),
(6, 3, 'Τεχνική αναφορά που περιγράφει τον κώδικα και τη λειτουργία της εφαρμογής'),
(7, 4, 'Λειτουργική εφαρμογή που επιτρέπει στον χρήστη να παίξει παιχνίδι Sudoku με διαφορετικά επίπεδα δυσκολίας'),
(8, 4, 'Τεχνική αναφορά που περιγράφει τον κώδικα, τον αλγόριθμο που χρησιμοποιήθηκε και τον τρόπο λειτουργίας της εφαρμογής');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `loginname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` set('Tutor','Student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `loginname`, `password`, `role`) VALUES
(1, 'Αλέξανδρος', 'Νικολάου', 'alexnikolaou@csd.auth.test.gr', 'studentpass2', 'Student'),
(2, 'Αναστασία', 'Παπαδοπούλου', 'anastasia_pap@csd.auth.test.gr', 'tutorpass2', 'Tutor'),
(3, 'Ελένη', 'Δημητρίου', 'eleni_dim@csd.auth.test.gr', 'studentpass3', 'Student'),
(4, 'Γιώργος', 'Παπανδρέου', 'george_pap@csd.auth.test.gr', 'studentpass4', 'Student'),
(5, 'Κωνσταντίνος', 'Κωνσταντίνου', 'konstantinos_kon@csd.auth.test.gr', 'tutorpass1', 'Tutor'),
(6, 'Μαρία', 'Παπαδοπούλου', 'mariapap@csd.auth.test.gr', 'studentpass1', 'Student'),
(7, 'Όλγα', 'Πουλοπούλου', 'olgapoulou@csd.auth.test.gr', '1234', 'Student'),
(8, 'Βαγγέλης', 'Ταχματζίδης', 'vagytach@csd.auth.test.gr', '5678', 'Student'),
(9, 'Ανδρέας', 'Καμπάκης', 'akabakis@csd.auth.test.gr', 'pass4', 'Tutor'),
(10, 'Ιωάννα', 'Τσίρα', 'ioannatsira@csd.auth.test.gr', 'pass789', 'Student'),
(11, 'Δέσποινα', 'Ταρταράκη', 'dtartaraki@csd.auth.test.gr', '2010', 'Student'),
(12, 'Παναγιώτης', 'Καλαϊδόπουλος', 'pankal@csd.auth.test.gr', '963258', 'Student'),
(13, 'Αναστάσης', 'Αγγίσταλης', 'tasosag@csd.auth.test.gr', 'paok1234', 'Tutor');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homework_id` (`homework_id`);

--
-- Ευρετήρια για πίνακα `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homework_id` (`homework_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT για πίνακα `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `goals`
--
ALTER TABLE `goals`
  ADD CONSTRAINT `goals_ibfk_1` FOREIGN KEY (`homework_id`) REFERENCES `homework` (`id`);

--
-- Περιορισμοί για πίνακα `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_ibfk_1` FOREIGN KEY (`homework_id`) REFERENCES `homework` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
