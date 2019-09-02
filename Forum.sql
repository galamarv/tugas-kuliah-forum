-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2014 at 02:59 
-- Server version: 5.6.12
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Forum`
--
CREATE DATABASE IF NOT EXISTS `Forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Forum`;

-- --------------------------------------------------------

--
-- Table structure for table `badword`
--

CREATE TABLE IF NOT EXISTS `badword` (
  `bad` varchar(50) NOT NULL,
  `replace` varchar(50) NOT NULL,
  PRIMARY KEY (`bad`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badword`
--

INSERT INTO `badword` (`bad`, `replace`) VALUES
('asu', 'a*u'),
('fuck', 'f*ck'),
('jancuk', 'ja***k'),
('roma', 'r*oma');

-- --------------------------------------------------------

--
-- Table structure for table `emot`
--

CREATE TABLE IF NOT EXISTS `emot` (
  `id_emot` varchar(20) NOT NULL,
  `emot` varchar(100) NOT NULL,
  PRIMARY KEY (`id_emot`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emot`
--

INSERT INTO `emot` (`id_emot`, `emot`) VALUES
(':cendol', 'emoticon/s_big_cendol.gif'),
(':indonesia', 'emoticon/I-Luv-Indonesia.gif'),
(':ngacir', 'emoticon/ngacir2.gif'),
(':ngakak', 'emoticon/ngakak.gif'),
(':bayi', 'emoticon/babyboy.gif'),
(':berduka', 'emoticon/berduka.gif'),
(':bingung', 'emoticon/bingung.gif'),
(':aduh', 'emoticon/capede.gif'),
(':cewek', 'emoticon/cewek.gif'),
(':hoax', 'emoticon/hoax.gif'),
(':jempol', 'emoticon/jempol2.gif'),
(':malu', 'emoticon/malu.gif'),
(':marah', 'emoticon/marah.gif'),
(':najis', 'emoticon/najis.gif'),
(':nosara', 'emoticon/nosara.gif'),
(':bata', 'emoticon/s_big_batamerah.gif'),
(':maho', 'emoticon/s_sm_maho.gif'),
(':repost', 'emoticon/s_sm_repost1.gif'),
(':sundulgan', 'emoticon/sundul.gif'),
(':serem', 'emoticon/takut.gif');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `content`) VALUES
(1, 'All About Lazio Indonesia'),
(2, 'Sejarah Lazio'),
(3, 'News, Transfer & Rumour Lazio'),
(4, 'Lazio Match'),
(5, ' Lazio Skuad'),
(7, ' Chant & Song Lazio');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_post`, `username`, `content`, `date`) VALUES
(47, 54, 'galamarv', 'roma asu :maho', '2014-05-18 20:17:19'),
(45, 50, 'admin', ':cendol', '2014-05-18 18:29:05'),
(44, 50, 'admin', 'aaadasfas', '2014-05-18 18:28:42'),
(49, 56, 'galamarv', 'Lazio dikabarkan tengah bersaing dengan beberapa klub untuk mendapatkan pemain muda bertalenta, Chidera Ezeh. Selain Lazio, pemain 16 tahun yang tergabung dalam skuad timnas Nigeria U17 tersebut juga menarik perhatian Roma, Sampdoria, dan beberapa klub Eropa lainnya. Situs tuttomercatoweb menyebutkan, klub-klub Eropa tersebut adalah Arsenal dan beberapa klub asal Portugal yang diidentifikasi sebagai Benfica dan Porto. Ezeh adalah salah satu pilar timnas Nigerian yang memenangkan Piala Dunia U17 yang digelar di Uni Emirat Arab tahun lalu. Dalam turnamen tersebut, Ezeh yang tampil dalam enam laga, mencetak satu gol dan tiga assists.', '2014-05-18 20:20:06'),
(50, 56, 'galamarv', '\r\nMiroslav Klose memastikan bertahan di Lazio untuk setahun lagi setelah menandatangani kontrak baru.\r\n\r\nPenyerang veteran Jerman itu menandatangani kontrak baru dengan Lazio, yang membuatnya bertahan di Olimpico hingga Juni 2015.\r\n\r\nDalam kontrak barunya, juga ada opsi bagi Lazio menambah durasi kontraknya untuk 12 bulan lagi di musim panas berikutnya.\r\n\r\n"Saya sangat senang berada di sini," ungkap Klose di laman resmi Lazio.\r\n\r\n"Saya memiliki peran penting untuk dimainkan dalam proyek klub ini," tandasnya.\r\n\r\nSejauh ini Klose sudah 26 kali membela Lazio di musim ini, di mana 22 di antaranya tampil di Serie A, mencetak tujuh gol dan lima assists.\r\n\r\n\r\nsource: goal.com ', '2014-05-18 20:20:23'),
(51, 56, 'galamarv', 'Milan akan segera menuntaskan transfer Federico Marchetti dari Lazio, demikian diklaim Il Corriere dello Sport.\r\n\r\nLaporan media Italia itu menyebutkan sudah ada kesepakatan transfer senilai 13 juta euro untuk kiper 31 tahun itu. Yang tertinggal hanya kontrak personal antara klub dan pemain.\r\n\r\nMarchetti akan diplot sebagai pengganti Christian Abbiati yang mulai dimakan usia, meski kualitas penampilannya tak banyak berkurang.\r\n\r\nMantan kiper timnas Italia itu juga sudah kehilangan tempatnya di skuat utama Lazio di musim ini dan kemungkinan besar tak akan tampil di Brasil pada Piala Dunia 2014.\r\n\r\n\r\nsource: goal.com', '2014-05-18 20:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `content` varchar(114) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `sender`, `receiver`, `content`, `date`) VALUES
(26, 'admin', 'galamarv', ':cendol', '2014-05-18 20:37:24'),
(27, 'galamarv', 'admin', ':bata', '2014-05-18 20:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `date` datetime NOT NULL,
  `kategori` int(11) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `user`, `judul`, `content`, `date`, `kategori`) VALUES
(51, 'admin', 'Sejarah Lazio Indonesia ', 'Berawal dari kesamaan hoby dan kecintaan terhadap sebuah klub sepakbola asal Italia, SS.LAZIO, pada tanggal 4 Juni 1999, Rommy, Maurid & Felix memprakarsai berdirinya sebuah Fun Club SS.LAZIO dengan nama LAZIO INDONESIA. Kenapa Fun Club? Karena memang pada awal berdirinya perkumpulan ini lebih ditekankan untuk mencari kesenangan. Seiring berjalannya waktu, melalui mediasi internet (milis, website & Facebook) perkumpulan ini mulai berkembang menjadi sebuah Fans Club yang beranggotakan para penggemar LAZIO dari seluruh pelosok tanah air. Kegiatan yang diadakanpun lebih be-ragam, mulai dari futsal hingga nonton bareng pertandingan Lazio. Hingga tahun 2011 ini, jumlah anggota yang terdata telah mencapai ribuan orang dan terus bertambah, dan sampai saat ini telah terbentuk pula beberapa region yang aktif antara lain Jakarta, Bekasi, Depok, Bogor, Banten, Karawang, Bandung, Purwokerto, Jogjakarta, Semarang, Surabaya, Malang, Aceh, Medan, Padang, Pekanbaru, Lampung, Palembang Makasar, Manado Kalimantan Selatan & Kalimantan Timur.\r\n', '2014-05-18 20:09:08', 1),
(52, 'admin', 'Sejarah SS Lazio ', 'Società Sportiva Lazio atau yang lebih dikenal dengan nama Lazio adalah sebuah perkumpulan olahraga profesional Italia yang berbasis di Roma, ibu kota Italia, yang terkenal karena cabang sepak bolanya. Perkumpulan yang didirikan pada 1900 itu bermain di Serie A dan menghabiskan sebagian besar sejarah mereka di level tertinggi. Lazio telah dua kali menjadi juara Italia, lima Piala Italia, tiga Piala Super Italia, dan masing-masing satu trofi Piala Winners UEFA dan Piala Super UEFA. \r\n\r\n\r\nKesuksesan pertama klub ini adalah pada tahun 1958, memenangi Piala Italia. Pada 1974, mereka menjuarai gelar Serie A pertama mereka. Lima belas tahun terakhir telah menjadi periode tersukses dalam sejarah mereka, antara lain menjuara Piala Winners pada 1999, scudetto pada 2000, beberapa trofi domestik dan mencapai final Piala UEFA pertama mereka pada 1998.', '2014-05-18 20:10:43', 2),
(53, 'galamarv', 'Suporter / Fans', 'Lazio adalah klub sepak bola dengan suporter pendukung terbanyak keenam di seluruh Italia dengan persentase 2% pendukung di seluruh Italia (berdasarkan penelitian dari la Repubblica pada Agustus 2008). Para pendukung utama Lazio terutama berdomisili di utara kota Roma.\r\nIrriducibili Lazio yang didirikan pada tahun 1987 adalah sebuah wadah untuk suporter fanatik dari klub Lazio yang terbesar dan terbanyak anggotanya di Italia, tapi selama musim 2009-10, Banda Noantri mengambil alih kepemimpinan atas Curva Nord. Pada setiap pertandingan, ultras Lazio menampilkan gaya mendukung dari pendukung Inggris dengan mengadopsi setiap cara mendukungnya. Khusus untuk Derby della Capitale, ultras Lazio menampilkan gaya tradisional pendukung ultras Italia.', '2014-05-18 20:11:52', 2),
(54, 'galamarv', 'Rivalitas', 'Lazio memiliki rivalitas dengan tim sekota yakni A.S. Roma. Lazio dan A.S. Roma menjalani partai derby yang disebut dengan Derby della Capitale ("derbi antara tim ibukota"). Pertandingan dengan A.S. Roma dalam Derby Della Capitalle selalu penuh gengsi dan menghadirkan sebuah partai yang seru, untuk membuktikan tim terkuat yang ada di ibukota Italia, Roma serta sebagai salah satu derby sepak bola terbesar di dunia.\r\nSelain dengan AS Roma, Lazio memiliki rivalitas dengan klub Italia lainnya, yaitu Livorno yang disebabkan oleh perbedaan pandangan politik dari pendukung dan pemimpin klub masing-masing. Selain itu, Lazio juga memiliki rival lain, yaitu dengan Napoli.\r\n\r\nPendukung Lazio, selain memiliki rival juga memiliki teman dan kedekatan dengan pendukung tim lain, yaitu dengan Inter Milan, Triestina, dan Hellas Verona. Selain memiliki teman dan kedekatan dengan pendukung tim lain di Italia, Lazio juga memilikinya di Eropa, yaitu dengan suporter Real Madrid, Espanyol, Levski Sofia, Norwich City dan Chelsea.', '2014-05-18 20:12:32', 1),
(55, 'galamarv', ' Statistik dan rekor.', 'Giuseppe Favalli memegang rekor penampilan resmi bersama Lazio dengan 401 penampilan dalam 12 tahun tampil bersama Lazio dari tahun 1992 hingga 2004. Rekor untuk kiper Luca Marchegiani, dengan 229 penampilan, sementara rekor untuk penampilan liga dipegang oleh Aldo Puccinelli dengan 339 penampilan.\r\n\r\nSilvio Piola menjadi pencetak gol terbanyak dengan 148 gol. Piola telah bermain bersama Pro Vercelli, Torino, Juventus dan Novara, juga sebagai pencetak gol terbanyak dalam sejarah Serie A dengan 274 gol. Simone Inzaghi pencetak gol terbanyak Lazio di kompetisi Eropa dengan 20 gol. Ia juga salah satu dari lima pesepak bola yang dapat mencetak empat gol dalam satu partai di Liga Champions UEFA. Tommaso Rocchi saat ini menjadi pencetak gol terbanyak untuk Lazio.\r\n\r\nPartai Lazio melawan Foggia pada 12 Mei 1974 menjadi partai dengan penonton terbanyak dengan 80.000 penonton, partai ini adalah partai penganugerahan Scudetto pertama Lazio. Partai ini juga menjadi rekor penonton terbanyak untuk Stadion Olimpico, termasuk dengan partai A.S. Roma dan tim nasional sepak bola Italia. ', '2014-05-18 20:16:31', 1),
(56, 'galamarv', 'MERCATO LAZIO 2013/2014 ', 'Disini tempat untuk membahas semua berita-berita tentang transfer Lazio baik itu rumor atau resmi. Harap untuk update setiap mercato disini saja selama musim 2013/2014 agar lebih rapi.', '2014-05-18 20:19:01', 3),
(57, 'galamarv', '[Serie-A 13/14] Inter Milan vs Lazio ', 'FC Internazionale memantapkan posisi di zona Liga Europa, sekaligus memberi kado perpisahan yang manis kepada Javier Zanetti, usai membantai Lazio dengan skor 4-1 dalam laga lanjutan Serie A Italia di Giuseppe Meazza dini hari ini (11/5).\r\n\r\nSempat tertinggal gol cepat Giuseppe Biava di menit kedua, Inter langsung bangkit dengan mencetak empat gol di sisa waktu pertandingan. Rodrigo Palacio menyumbang dua gol sementara dua gol lainnya dicetak oleh Mauro Icardi dan Hernanes.', '2014-05-18 20:21:53', 4),
(58, 'galamarv', 'Jadwal lengkap Serie A 2013/2014 ', 'Jadwal lengkap Serie A 2013/2014, yang dapat kalian download (format .PDF).\r\nhttp://t.co/mgwkwC0LbK', '2014-05-18 20:23:08', 4),
(59, 'galamarv', 'Squad SS.Lazio 2012/2013 ', 'Daftar Pemain SS.Lazio 2012/2013.\r\n\r\nNo. Pos | Nama (WN)\r\n1 GK | Albano Bizzarri (ARG)\r\n2 DF | Michaël Ciani (FRA)\r\n3 DF | André Dias (BRA)\r\n5 DF | Lionel Scaloni (ARG)\r\n6 MF | Stefano Mauri (ITA)\r\n7 MF | Ederson (BRA)\r\n8 MF | Hernanes (BRA)\r\n9 FW | Tommaso Rocchi (ITA)\r\n10 FW | Mauro Zárate (ARG)\r\n11 FW | Miroslav Klose (GER)\r\n15 MF | Álvaro González (URU)\r\n17 FW | Bruno Pereirinha (POR)\r\n18 FW | Libor Kozák (CZE)\r\n19 MF | Senad Luli&#263; (BIH)\r\n20 DF | Giuseppe Biava (ITA)\r\n21 DF | Modibo Diakité (FRA)\r\n22 GK | Federico Marchetti (ITA)\r\n23 MF | Ogenyi Onazi (NGA)\r\n24 MF | Cristian Ledesma (ITA)\r\n25 FW | Antonio Rozzi (ITA)\r\n26 DF | Stefan Radu (ROU)\r\n27 MF | Lorik Cana (ALB)\r\n28 FW | Louis Saha (FRA)\r\n29 DF | Abdoulay Konko (FRA)\r\n30 FW | Emiliano Alfaro (URU)\r\n32 MF | Cristian Brocchi (ITA)\r\n33 DF | Marius Stankevi&#269;ius (LTU)\r\n39 DF | Luis Pedro Cavanda (BEL)\r\n77 FW | Giuseppe Sculli (ITA)\r\n78 DF | Luciano Zauri (ITA)\r\n80 MF | Matuzalém (BRA)\r\n84 GK | Juan Pablo Carrizo (ARG)\r\n87 MF | Antonio Candreva (ITA)\r\n95 GK | Thomas Strakosha (ALB)\r\n99 FW | Sergio Floccari (ITA)\r\n\r\nPelatih : Vladimir Petkovi&#263; (BIH)\r\n\r\nTransfer Masuk :\r\nEderson (Lyon, bebas transfer); Antonio Candreva (Udinese, pinjam)\r\n\r\nTransfer Keluar :\r\nSimone Del Nero, Stephen Makinwa, Ivan Artipoli (bebas transfer); Alessandro Tuia (Salernitana, rahasia); Javier Garrido (Norwich City, pinjam); Guglielmo Stendardo (Atalanta, rahasia)', '2014-05-18 20:24:29', 5),
(60, 'galamarv', 'SEMPLICE DI TOGNI ', 'Che ne sai di come mi sento\r\ncon la Lazio li in mezzo al campo\r\nla più antica della capitale\r\nfatta solo di gente che vale\r\nquando il cielo è biancoceleste\r\nil tuo volo tiene su le teste\r\nguardo in alto un’ aquila che plana\r\nla mia storia è la storia di Roma\r\n\r\nsemplice...Pensare a un volo lungo un secolo\r\ndi padre in figlio ed un miracolo\r\nattendo sempre quello sguardo che possiede con la palla che va in rete', '2014-05-18 20:27:43', 7),
(61, 'galamarv', ' LAZIO PRAYER', 'questo è tempo di vincere con te\r\ngireremo tutto il mondo insieme a te\r\ne piu forte grideremo\r\nLazio alè, Lazio alè Lazio alè\r\n', '2014-05-18 20:29:52', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `biodata` varchar(100) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `biodata`, `avatar`) VALUES
('galamarv', 'Fattah', '1a1dc91c907325c69271ddf0c944bc72', 'Forza Lazio', 'image/lazialengalamborder.jpg'),
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Forza Admin', 'image/limr.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
