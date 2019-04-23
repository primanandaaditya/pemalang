-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2019 at 03:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bapen`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `nama`) VALUES
(1, 'Buddha'),
(2, 'Hindu'),
(3, 'Islam'),
(4, 'Katolik'),
(5, 'Kristen'),
(6, 'Kong Hucu'),
(40, 'Yeyeye');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_bap`
--

CREATE TABLE `formulir_bap` (
  `id` int(11) NOT NULL,
  `id_proses_bap` int(11) NOT NULL,
  `nomor` varchar(50) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulir_bap`
--

INSERT INTO `formulir_bap` (`id`, `id_proses_bap`, `nomor`, `keterangan`, `created_date`) VALUES
(1, 18, 'uui', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td width=\"20%\">\r\n			<div style=\"text-align:center\"><img height=\"100\" src=\"http://www.baktiku.xyz/image/simbol/kumham.png\" width=\"100\" /></div>\r\n			</td>\r\n			<td colspan=\"3\">\r\n			<div style=\"text-align:center\">KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA RI<br />\r\n			KANTOR WILAYAH JAWA TENGAH<br />\r\n			<strong>KANTOR IMIGRASI KELAS II PEMALANG</strong><br />\r\n			Jalan Perintis Kemerdekaan No. 110, Pemalang<br />\r\n			Telepon (0284) 325010 Faksimili (0284) 324219</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">\r\n			<p><strong>BERITA ACARA PEMERIKSAAN</strong></p>\r\n			</div>\r\n\r\n			<div style=\"text-align:center\">\r\n			<p><strong>Nomor..................</strong></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">--------Pada hari ini, Senin Tanggal Delapan Bulan April Tahun Dua Ribu Sembilan Belas, Saya:</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">--------<b>KAKU</b>--------</div>\r\n\r\n			<div style=\"text-align:center\">&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">Pangkat/Golongan: Penata Muda Tk. I (III/b); NIP: kaku; Jabatan: Toshi pada Seksi Pengawasan dan Penindakan Kantor Imigrasi Kelas II Pemalang, telah melakukan pemeriksaan terhadap seseorang yang belum pernah saya kenal sebelumnya, mengaku bernama:-----------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">---------<b>MINAMI</b>----------</div>\r\n\r\n			<div style=\"text-align:center\">&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">---------Kewarganegaraan: Afghanistan; Tempat dan Tanggal Lahir: ACEH BARAT, 09 April 2019; Jenis Kelamin: Perempuan; Pekerjaan: Lainnya; Agama: Buddha; Status Perkawinan: Cerai; Alamat Tempat Tinggal di Indonesia: 8889</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">-----Yang bersangkutan dimintai keterangan sehubungan dengan peristiwa hilangnya dokumen negara berupa Paspor RI miliknya atas nama MINAMI dengan Nomor === yang diterbitkan Kantor Imigrasi Pemalang pada tanggal 13 April 2019 berlaku sampai dengan 24 April 2019, sesuai Surat Keterangan Tanda Laporan Kehilangan Nomor : 00 , yang diterbitkan 00 tanggal 01 April 2019.---------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">------------------- Selanjutnya atas pertanyaan Pemeriksa yang bersangkutan menjawab dan memberi keterangan sebagai berikut : ---------------------------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\"><b>PERTANYAAN / JAWABAN</b></div>\r\n\r\n			<p>1.&nbsp;Apakah Anda sehat jasmani?<br />\r\n			------------ 1. Ya, saya dalam keadaan sehat jasmani dan rohani.------------------</p>\r\n\r\n			<p>2.Apakah Saudara mengetahui mengapa Saudara dihadirkan dan diperiksa di sini?-<br />\r\n			------------ 2. Ya, karena paspor saya hilang.---------------------------------------------</p>\r\n\r\n			<p>3. Bersediakah Saudara untuk dimintai keterangan dan sanggup memberikan keterangan dengan benar dan jujur sehubungan dengan hilangnya Paspor RI atas nama Saudara yang pernah diperoleh sebelumnya?----------------------------------------<br />\r\n			------------ 3. Ya, saya bersedia dan sanggup memberikan keterangan dengan benar dan jujur.------------------------------------------------------------------</p>\r\n\r\n			<p>4. Bersediakah Saudara menceritakan riwayat hidup yang dimiliki?------------------------<br />\r\n			------------ 4. Ya, nama saya ------dilahirkan di Batang pada tanggal --------. Pendidikan terakhir ------. Menikah pada tahun ----dengan perempuan bernama -----dan dikaruniai -orang anak. Anak Ke-----dari -----bersaudara. Dari orang tua ------dan -----. Saat ini bertempat tinggal di -----------------------------------------------------------------------.Nomor HP : 08--------.-------------------</p>\r\n\r\n			<p>5. Apakah Saudara pernah dalam mengajukan permohonan Paspor RI baru atau penggantian Paspor RI di Kantor Imigrasi manapun dengan dikenakan sanksi dibatalkan dan/atau ditangguhkan?--------------------------------------------------------------<br />\r\n			------------ 5. Tidak pernah.---------------------------------------------------------------------</p>\r\n\r\n			<p>5.1. Apakah Saudara pernah dalam mengajukan permohonan Paspor RI baru atau penggantian Paspor RI di Kantor Imigrasi manapun dengan dikenakan sanksi dibatalkan dan/atau ditangguhkan?-----------------------------<br />\r\n			------------ 5.1. Pernah.----------------------------------------------------------------------------</p>\r\n\r\n			<p>5.2 Di Kantor Imigrasi mana Saudara mengajukan permohonan tersebut?------<br />\r\n			------------ 5.2 Kantor Imigrasi Semarang.-------------------------------------------------</p>\r\n\r\n			<p>5.3 Kapan Saudara mengajukan permohonan tersebut?------------------------------<br />\r\n			------------ 5.3 Tanggal -----------.-------------------------------------------------</p>\r\n\r\n			<p>5.4 Kenapa permohonan Saudara dikenakan sanksi ditangguhkan dan / atau dibatalkan?------------------------------------------------------------------------------<br />\r\n			------------ 5.4 Karena persyaratan yang saya lampirkan tidak sah/ valid.------</p>\r\n\r\n			<p>6. Berapa kali Saudara pernah memperoleh dokumen Paspor RI?-------------------------<br />\r\n			------------- 6. Saya pernah memiliki 1 (satu) kali pada tahun ----yang diterbitkan oleh Kantor Imigrasi ------.------------------------------</p>\r\n\r\n			<p>7. Apakah Saudara pernah menggunakan Paspor RI yang pernah Saudara peroleh untuk melakukan perjalanan ke luar negeri?--------------------------------------------------<br />\r\n			-------------7. Saya pernah ------------------------------------------</p>\r\n\r\n			<p>7.1 Apakah Saudara pernah menggunakan Paspor RI yang pernah Saudara peroleh untuk melakukan perjalanan ke luar negeri?------------------------------<br />\r\n			------------- 7.1 Belum pernah.------------------------------------------</p>\r\n\r\n			<p>7.2 Mengapa Saudara belum pernah menggunakan Paspor RI yang pernah Saudara peroleh untuk melakukan perjalanan ke luar negeri?------------------<br />\r\n			---------------- 7.2 Karena ....--------------------------</p>\r\n\r\n			<p>8. Melalu penyalur tenaga kerja mana Saudara bekerja di luar negeri?--------------------<br />\r\n			---------------- 8. Saya .................................---------------------------------------------------</p>\r\n\r\n			<p>9. Kapan Saudara terakhir kali pulang ke Indonesia?-------------------------------------------<br />\r\n			---------------- 9. Pada tahun .....---------------------------------------------------</p>\r\n\r\n			<p>10. Melalui Tempat Pemeriksaan Imigrasi mana Saudara ?-----------------------------------<br />\r\n			---------------- 10. Melalui TPI Entikong.---------------------------------------------------</p>\r\n\r\n			<p>11. Apa pekerjaan Saudara saat ini?------------------------------------------------------------------<br />\r\n			---------------- 11. Saya seorang ......---------------------------------------------------</p>\r\n\r\n			<p>12. Diketahui saat ini Saudara sedang mengajukan permohonan penggantian Paspor RI karena hilang di Kantor Imigrasi Kelas II Pemalang, kapan permohonan tersebut Saudara ajukan?---------------------------------------------------------------------------<br />\r\n			---------------- 12. Pada tanggal ..............-------------------------------------------------</p>\r\n\r\n			<p>13. Mengertikah Saudara bahwa dokumen Paspor RI yang pernah Saudara peroleh adalah dokumen milik negara, bagi setiap pemegang diwajibkan dapat menjaga dan menyimpannya dengan baik agar tidak rusak atau hilang ?-------------------------<br />\r\n			---------------- 13. Maaf, Saya tidak mengetahui hal tersebut sebelumnya.-------------</p>\r\n\r\n			<p>13.1 Mengertikah Saudara bahwa dokumen Paspor RI yang pernah Saudara peroleh adalah dokumen milik negara, bagi setiap pemegang diwajibkan dapat menjaga dan menyimpannya dengan baik agar tidak rusak atau hilang ?-------------------------<br />\r\n			---------------- 13.1 Ya, Saya mengetahui hal tersebut sebelumnya.-------------</p>\r\n\r\n			<p>14. Dokumen apa saja yang sudah Saudara serahkan guna melengkapi persyaratan formal permohonan penggantian Paspor RI karena hilang di Kantor Imigrasi Kelas II Pemalang pada tanggal 03 April 2018?-------------------------------------------------------<br />\r\n			---------------- 14. Saya menyerahkan ......... ..........................................</p>\r\n\r\n			<p>15. Apakah semua dokumen identitas diri yang tertera pada persyaratan formil atas nama Saudara diterbitkan oleh instansi yang berwenang?-------------------------------- ----------------<br />\r\n			--------------15. Ya. Semua dokumen tersebut diterbitkan oleh instansi yang berwenang.-----------------------------------------------------------------------</p>\r\n\r\n			<p>16. Apakah Saudara mengetahui bahwa dalam mengajukan permohonan penggantian Paspor RI karena hilang/rusak memiliki konsekuensi dapat dikenakan sanksi ditolak serta ditangguhkan?-------------------------------------------------<br />\r\n			---------------- 16. Tidak, Saya tidak mengetahui konsekuensi tersebut.-----------------</p>\r\n\r\n			<p>17. Kapan kejadian hilangnya Paspor RI atas nama Saudara yang diperoleh sebelumnya terjadi?----------------------------------------------------------------------------------<br />\r\n			---------------- 17. Seingat saya sewaktu ............................-------------------------------------------------------------------------------</p>\r\n\r\n			<p>18. Kapan Saudara mengetahui jika Paspor RI milik Saudara telah hilang?---------------<br />\r\n			---------------- 18. Saya baru mengetahuinya ketika ............................-------------------------------------------------------</p>\r\n\r\n			<p>19. Apakah yang Saudara lakukan setelah mengetahui paspor milik Saudara hilang?--<br />\r\n			----------------- 19. Saya menanyakan .........................-----------------------------------</p>\r\n\r\n			<p>20. Apakah atas kehilangan tersebut telah Saudara laporkan ke pihak berwajib?--------<br />\r\n			----------------- 20. Saat itu saya............................----------------------</p>\r\n\r\n			<p>21. Coba ceritakan kembali kejadian hilangnya Paspor RI atas nama Saudara?--------- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br />\r\n			----------------- 21.........-------------------------------</p>\r\n\r\n			<p>22. Apakah dalam waktu dekat Saudara akan melakukan perjalanan ke luar negeri?&mdash;<br />\r\n			--------------- 22. Ya, saya ................................................--------</p>\r\n\r\n			<p>23. Apabila Saudara diperkenankan untuk memperoleh paspor pengganti, apakah Saudara bersedia untuk menjaga dan menyimpan dokumen paspor dengan baik agar tidak hilang kembali di kemudian hari? ---------------------------------------------------<br />\r\n			--------------- 23. Ya, apabila diperkenankan untuk memperoleh Paspor pengganti, saya akan menjaganya lebih baik agar tidak hilang kembali.-------</p>\r\n\r\n			<p>24. Apakah Saudara merasa tertekan dan/atau mendapat paksaan dalam pemeriksaan saat ini baik dari pemeriksa maupun pihak lain?----------------------------<br />\r\n			---------------- 24. Saya tidak merasa mendapatkan tekanan ataupun paksaan dari pihak manapun dalam pemeriksaan saat ini.---------------------------</p>\r\n\r\n			<p>25. Apakah semua keterangan yang Saudara berikan tersebut benar?---------------------<br />\r\n			---------------- 25. Ya, semua keterangan yang saya berikan adalah benar.------------</p>\r\n\r\n			<p>26. Apakah Saudara bersedia untuk diproses sesuai dengan peraturan yang berlaku apabila keterangan yang telah Saudara berikan tidak benar?----------------------------- ---------------- -----------&nbsp; 26. Ya, saya bersedia.-------------------------------------------------------------</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">--------------Setelah Berita Acara Pemeriksaan ini selesai dibuat kemudian dibacakan kembali dihadapan yang diperiksa dan yang diperiksa menyatakan setuju dan membenarkan semua keterangannya yang telah diberikan. Kemudian untuk menguatkan semua keterangannya tersebut yang bersangkutan membubuhkan tanda tangannya sebagaimana tertera dibawah ini.----------------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<p style=\"text-align:center\">Yang diperiksa,</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><strong>MINAMI</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div align=\"justify\">-------------Demikian Berita Acara Pemeriksaan ini dibuat dengan sesungguhnya diatas kekuatan sumpah jabatan, kemudian ditutup dan ditanda tangani pada hari, tanggal, bulan serta tahun tersebut diatas di Pemalang.---------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<p style=\"text-align:center\">Yang memeriksa,</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><strong>KAKU</strong></p>\r\n\r\n			<p style=\"text-align:center\"><strong>NIP. kaku</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2019-04-08 04:35:49'),
(2, 17, 'jkjkj  jkj', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td width=\"20%\">\r\n			<div style=\"text-align:center\"><img height=\"100\" src=\"http://www.baktiku.xyz/image/simbol/kumham.png\" width=\"100\" /></div>\r\n			</td>\r\n			<td colspan=\"3\">\r\n			<div style=\"text-align:center\">KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA RI<br />\r\n			KANTOR WILAYAH JAWA TENGAH<br />\r\n			<strong>KANTOR IMIGRASI KELAS II PEMALANG</strong><br />\r\n			Jalan Perintis Kemerdekaan No. 110, Pemalang<br />\r\n			Telepon (0284) 325010 Faksimili (0284) 324219</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">\r\n			<p><strong>BERITA ACARA PEMERIKSAAN</strong></p>\r\n			</div>\r\n\r\n			<div style=\"text-align:center\">\r\n			<p><strong>Nomor..................</strong></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">--------Pada hari ini, Rabu Tanggal Sepuluh Bulan April Tahun Dua Ribu Sembilan Belas, Saya:</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">--------<b>JUNAEDI, S.PD</b>--------</div>\r\n\r\n			<div style=\"text-align:center\">&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">Pangkat/Golongan: Penata Muda Tk. I (III/b); NIP: 1256; Jabatan: - pada Seksi Pengawasan dan Penindakan Kantor Imigrasi Kelas II Pemalang, telah melakukan pemeriksaan terhadap seseorang yang belum pernah saya kenal sebelumnya, mengaku bernama:-----------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">---------<b>KOTARO</b>----------</div>\r\n\r\n			<div style=\"text-align:center\">&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">---------Kewarganegaraan: Japan; Tempat dan Tanggal Lahir: BOVEN DIGOEL, 14 Maret 2019; Jenis Kelamin: Perempuan; Pekerjaan: Swasta; Agama: Buddha; Status Perkawinan: Kawin; Alamat Tempat Tinggal di Indonesia: Jerman</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">-----Yang bersangkutan dimintai keterangan sehubungan dengan perbedaan data Paspor RI miliknya atas nama KOTARO dengan Nomor 888888 yang diterbitkan Kantor Imigrasi Pemalang pada tanggal 01 Maret 2019 berlaku sampai dengan 31 Maret 2019</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">------------------- Selanjutnya atas pertanyaan Pemeriksa yang bersangkutan menjawab dan memberi keterangan sebagai berikut : ---------------------------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\"><b>PERTANYAAN / JAWABAN</b></div>\r\n\r\n			<p>1. Apakah Saudari dalam keadaan sehat jasmani dan rohani ?-----------------------------<br />\r\n			----------------- 1. Ya, saya dalam keadaan sehat jasmani dan rohani.------------------</p>\r\n\r\n			<p>2. Apakah Saudara mengetahui mengapa Saudara dihadirkan dan diperiksa di sini?-<br />\r\n			----------------- 2. Ya, karena data ..........&nbsp;pada paspor saya berbeda dengan data pada ........saya.---------------------------------------------</p>\r\n\r\n			<p>2a. Apakah Saudara mengetahui mengapa Saudara dihadirkan dan diperiksa di sini?----------------------------------------------------------------------------------------------<br />\r\n			----------------- 2a. Tidak tahu.-----------------------------------------------------------------------<br />\r\n			Saudara dihadirkan di sini dalam rangka pemeriksaan terkait .....................&nbsp;atas nama Saudara.----------------------------------------------------------------------</p>\r\n\r\n			<p>3. Bersediakah Saudara&nbsp;untuk dimintai keterangan dan sanggup memberikan keterangan dengan benar dan jujur sehubungan dengan perbedaan data&nbsp;Paspor RI atas nama Saudara&nbsp;yang pernah diperoleh sebelumnya?------------------------------------------------------<br />\r\n			----------------- 3. ----- Ya, saya bersedia dan sanggup memberikan keterangan dengan benar dan jujur.------------------------------------------------------------------</p>\r\n\r\n			<p>4. Bersediakah Saudari menceritakan riwayat hidup yang dimiliki?------------------------------------------------------------------------------<br />\r\n			----------------- 4. ------------------------ Ya, nama saya .....................&nbsp;dilahirkan di ........&nbsp;pada tanggal ..................... Pendidikan terakhir ............. Menikah pada tahun ....&nbsp;dengan ............................. dan dikaruniai .....&nbsp;orang anak. Anak ......&nbsp;dari ....&nbsp;bersudara. Dari orang tua ......&nbsp;dan ..... Saat ini bertempat tinggal di ................., Kecamatan ........Kabupaten ........, Propinsi .........Nomor HP : 08........-------------------</p>\r\n\r\n			<p>5. Apakah Saudara&nbsp;pernah dalam mengajukan permohonan Paspor RI baru atau penggantian Paspor RI di Kantor Imigrasi manapun dengan dikenakan sanksi dibatalkan dan/atau ditangguhkan?--------------------------------------------------------------<br />\r\n			----------------- 5. Tidak Pernah.--------------------------------------------------------------------</p>\r\n\r\n			<p>6. Berapa kali Saudara&nbsp;pernah memperoleh dokumen Paspor RI?------------------------- -----------------<br />\r\n			--------------- 6. ----- Satu kali, yaitu tahun ......&nbsp;diterbitkan Kantor Imigrasi .......------------------------------------------------------------------------</p>\r\n\r\n			<p>7. Apakah Saudari pernah menggunakan Paspor RI milik Saudara untuk ke luar negeri?--------------------------------------------------------------------------------------------------- -------------------------------- 7. ----- Saya menggunakannya untuk ......... di .........&nbsp;dari tahun .......hingga...........-------------------------------------------------------------</p>\r\n\r\n			<p>8. Bekerja sebagai apakah Saudara&nbsp;di ..........?------------------------------------------------<br />\r\n			------------&nbsp;8. ---- Saya bekerja di ..............................................................-------------------------</p>\r\n\r\n			<p>9. Melalui perusahaan penyalur tenaga kerja manakah Saudara&nbsp;bekerja di luar negeri pada tahun .....?------------------------------------------------------------------------------------- -----------------------------------<br />\r\n			------------- 9. ---------- Saya bekerja melalui perusahaan .......................&nbsp;yang berada di ....... .-------------------------------------------------------------</p>\r\n\r\n			<p>10. Setelah kembali ke Indonesia pada tahun ....&nbsp;apa yang Saudara&nbsp;kerjakan?-------- ----------------------------<br />\r\n			-------------------- 10. ---------- Saya bekerja di ...............................................................................-------------------------------------------------------------------------------</p>\r\n\r\n			<p>11. Apakah Saudara bekerja sampai kontrak selesai??---------------------------------------------------------------------------- --------------------------------<br />\r\n			---------------- 11. ---------- Ya, .....................-----------------------------------------------------------------------</p>\r\n\r\n			<p>12. Diketahui saat ini Saudara&nbsp;sedang mengajukan permohonan perubahan data serta penggantian Paspor RI di Kantor Imigrasi Kelas II Pemalang, kapan permohonan tersebut Saudara&nbsp;ajukan?---------------------------------------------------------<br />\r\n			---------------- 12. Pada tanggal .........................--------------------------------------------</p>\r\n\r\n			<p>13. Berdasarkan dokumen persyaratan, Saudara melampirkan SPLP dalam permohonan penggantian Paspor RI di Kantor Imigrasi Kelas II Pemalang. Jelaskan!---------------------- -<br />\r\n			------------------------------- 13. ----- Saya ................. --------------------------</p>\r\n\r\n			<p>14. Saudara gunakan untuk apa SPLP atas nama Saudara tersebut?------------------------------------------------<br />\r\n			-------------------------------- 14. ---- Saya gunakan untuk .............-----------------------------------------------------------------------------</p>\r\n\r\n			<p>15. Dokumen apa saja yang sudah Saudara&nbsp;serahkan guna melengkapi persyaratan formal permohonan penggantian Paspor RI dan perbedaan data di Kantor Imigrasi Kelas II Pemalang pada tanggal .........?----------------------------------------- ------------------------------------------------------------<br />\r\n			-------------------- 15. -------------------- Saya menyerahkan dokumen asli dan fotokopi diantaranya berupa Paspor RI, KTP, Kartu Keluarga, Akte Lahir, ...............................---------------------------------------------------------------</p>\r\n\r\n			<p>16. Apakah semua dokumen identitas diri yang tertera pada persyaratan formil atas nama Saudara&nbsp;diterbitkan oleh instansi yang berwenang?--------------------------------<br />\r\n			-------------------------------- 16. ----- Ya. Semua dokumen tersebut diterbitkan oleh instansi yang berwenang.-----------------------------------------------------------------------</p>\r\n\r\n			<p>17. Jelaskan Kronologis diterbitkannya SPLP atas nama Saudara?--------------------------------------------------------------------------- -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br />\r\n			----------- 17. --------------------Pada tahun ......&nbsp;...........................-----------------</p>\r\n\r\n			<p>18. Yang manakah data diri Saudara&nbsp;yang sebenarnya?---------------------------------------- -------------<br />\r\n			------------------- 18. ----- Nama saya adalah ......................... sesuai dengan ..............-------------</p>\r\n\r\n			<p>19. Apa yang Saudari lakukan ketika mengetahui bahwa data kelahiran pada Paspor RI milik Saudari berbeda dengan data&nbsp;Saudara&nbsp;yang sebenarnya?------- ------------------------------------------------ 19. ---------- Saya mengajukan penetapan pengadilan di Pengadilan Negeri ..........&nbsp;untuk menetapkan data&nbsp;saya yang sebenarnya.----------------------------------------------------------------------</p>\r\n\r\n			<p>20. Apakah dalam waktu dekat Saudara&nbsp;akan melakukan perjalanan ke luar negeri?&mdash; --------------------------------<br />\r\n			20. ----- Ya/Tidak...................................-------------------------------------------</p>\r\n\r\n			<p>21. Apakah Saudara&nbsp;merasa tertekan dan/atau mendapat paksaan dalam pemeriksaan saat ini baik dari pemeriksa maupun pihak lain?---------------------------- ----------------<br />\r\n			---------------- 21. ---- Saya tidak merasa mendapatkan tekanan ataupun paksaan dari pihak manapun dalam pemeriksaan saat ini.---------------------------</p>\r\n\r\n			<p>22. Apakah semua keterangan yang Saudara&nbsp;berikan tersebut benar?---------------------<br />\r\n			---------------- 22. Ya, semua keterangan yang saya berikan adalah benar.------------</p>\r\n\r\n			<p>24. Apakah Saudara&nbsp;bersedia untuk diproses sesuai dengan peraturan yang berlaku apabila keterangan yang telah Saudara&nbsp;berikan tidak benar?-----------------------------<br />\r\n			---------------- 24. Ya, saya bersedia.-------------------------------------------------------------</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">--------------Setelah Berita Acara Pemeriksaan ini selesai dibuat kemudian dibacakan kembali dihadapan yang diperiksa dan yang diperiksa menyatakan setuju dan membenarkan semua keterangannya yang telah diberikan. Kemudian untuk menguatkan semua keterangannya tersebut yang bersangkutan membubuhkan tanda tangannya sebagaimana tertera dibawah ini.----------------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<p style=\"text-align:center\">Yang diperiksa,</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><strong>KOTARO</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div align=\"justify\">-------------Demikian Berita Acara Pemeriksaan ini dibuat dengan sesungguhnya diatas kekuatan sumpah jabatan, kemudian ditutup dan ditanda tangani pada hari, tanggal, bulan serta tahun tersebut diatas di Pemalang.---------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<p style=\"text-align:center\">Yang memeriksa,</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><strong>JUNAEDI, S.PD</strong></p>\r\n\r\n			<p style=\"text-align:center\"><strong>NIP. 1256</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '2019-04-10 07:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_bapen`
--

CREATE TABLE `formulir_bapen` (
  `id` int(11) NOT NULL,
  `id_proses_bap` int(11) NOT NULL,
  `nomor` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` longtext NOT NULL,
  `pendapat` char(1) NOT NULL,
  `alasan` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulir_bapen`
--

INSERT INTO `formulir_bapen` (`id`, `id_proses_bap`, `nomor`, `tanggal`, `keterangan`, `pendapat`, `alasan`, `created_date`) VALUES
(18, 17, '999', '2019-04-03', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td width=\"20%\">\r\n			<div style=\"text-align:center\"><img height=\"100\" src=\"http://www.baktiku.xyz/image/simbol/kumham.png\" width=\"100\" /></div>\r\n			</td>\r\n			<td colspan=\"3\">\r\n			<div style=\"text-align:center\">KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA RI<br />\r\n			KANTOR WILAYAH JAWA TENGAH<br />\r\n			<strong>KANTOR IMIGRASI KELAS II PEMALANG</strong><br />\r\n			Jalan Perintis Kemerdekaan No. 110, Pemalang<br />\r\n			Telepon (0284) 325010 Faksimili (0284) 324219</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">\r\n			<p><strong>BERITA ACARA PENDAPAT</strong></p>\r\n			</div>\r\n\r\n			<div style=\"text-align:center\">\r\n			<p><strong>Nomor..................</strong></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">--------Pada hari ini, Minggu Tanggal Tujuh Bulan April Tahun Dua Ribu Sembilan Belas, Saya:</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">--------<b>JUNAEDI, S.PD</b>--------</div>\r\n\r\n			<div style=\"text-align:center\">&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">Pangkat/Golongan: Penata Muda Tk. I (III/b); NIP: 1256; Jabatan: - pada Seksi Pengawasan dan Penindakan Kantor Imigrasi Kelas II Pemalang, telah melakukan pemeriksaan terhadap seseorang yang belum pernah saya kenal sebelumnya, mengaku bernama:-----------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">---------<b>KOTARO</b>----------</div>\r\n\r\n			<div style=\"text-align:center\">&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">---------Kewarganegaraan: Japan; Tempat dan Tanggal Lahir: BOVEN DIGOEL, 14 Maret 2019; Jenis Kelamin: Perempuan; Pekerjaan: Swasta; Agama: Buddha; Status Perkawinan: Kawin; Alamat Tempat Tinggal di Indonesia: Jerman</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">-----Yang bersangkutan dimintai keterangan sehubungan dengan diterbitkannya dokumen negara berupa SPLP Nomor 888888 yang diterbitkan Pemalang pada tanggal 01 Maret 2019 berlaku sampai dengan 31 Maret 2019.---------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">-----Setelah meneliti dan mempelajari Berita Acara Pemeriksaan, selanjutnya dalam Berita Acara Pendapat ini saya uraikan fakta sebagai berikut:-------------------------------- ---------------------------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<p>1.&nbsp;Benar bahwa.............................</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">-------------Demikian Berita Acara Pendapat ini dibuat dengan sebenarnya, kemudian ditutup dan ditandatangani pada hari, tanggal, bulan serta tahun tersebut di atas di Pemalang.---------------------------------------------------------------------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<p style=\"text-align:center\">Pejabat Imigrasi,</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><strong>....................</strong></p>\r\n\r\n			<p style=\"text-align:center\"><strong>NIP. ..................</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:50%;\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">Persetujuan Kakanim</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Setuju</td>\r\n			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tidak setuju</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'S', 'kkl', '2019-04-07 09:15:12'),
(19, 18, 'jkkk', '2019-04-02', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td width=\"20%\">\r\n			<div style=\"text-align:center\"><img height=\"100\" src=\"http://www.baktiku.xyz/image/simbol/kumham.png\" width=\"100\" /></div>\r\n			</td>\r\n			<td colspan=\"3\">\r\n			<div style=\"text-align:center\">KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA RI<br />\r\n			KANTOR WILAYAH JAWA TENGAH<br />\r\n			<strong>KANTOR IMIGRASI KELAS II PEMALANG</strong><br />\r\n			Jalan Perintis Kemerdekaan No. 110, Pemalang<br />\r\n			Telepon (0284) 325010 Faksimili (0284) 324219</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">\r\n			<p><strong>BERITA ACARA PENDAPAT</strong></p>\r\n			</div>\r\n\r\n			<div style=\"text-align:center\">\r\n			<p><strong>Nomor..................</strong></p>\r\n			</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">--------Pada hari ini, Selasa Tanggal Sembilan Bulan April Tahun Dua Ribu Sembilan Belas, Saya:</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">--------<b>KAKU</b>--------</div>\r\n\r\n			<div style=\"text-align:center\">&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">Pangkat/Golongan: Penata Muda Tk. I (III/b); NIP: kaku; Jabatan: Toshi pada Seksi Pengawasan dan Penindakan Kantor Imigrasi Kelas II Pemalang, telah melakukan pemeriksaan terhadap seseorang yang belum pernah saya kenal sebelumnya, mengaku bernama:-----------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:center\">---------<b>MINAMI</b>----------</div>\r\n\r\n			<div style=\"text-align:center\">&nbsp;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">---------Kewarganegaraan: Afghanistan; Tempat dan Tanggal Lahir: ACEH BARAT, 09 April 2019; Jenis Kelamin: Perempuan; Pekerjaan: Lainnya; Agama: Buddha; Status Perkawinan: Cerai; Alamat Tempat Tinggal di Indonesia: 8889</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">-----Yang bersangkutan dimintai keterangan sehubungan dengan peristiwa hilangnya dokumen negara berupa Paspor RI miliknya atas nama MINAMI dengan Nomor === yang diterbitkan === pada tanggal 13 April 2019 berlaku sampai dengan 24 April 2019, sesuai Surat Keterangan Tanda Laporan Kehilangan Nomor : 00 , yang diterbitkan 00 tanggal 01 April 2019.---------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">-----Setelah meneliti dan mempelajari Berita Acara Pemeriksaan, selanjutnya dalam Berita Acara Pendapat ini saya uraikan fakta sebagai berikut:-------------------------------- ---------------------------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<p>1.&nbsp;Benar bahwa.............................</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<div style=\"text-align:justify\">-------------Demikian Berita Acara Pendapat ini dibuat dengan sebenarnya, kemudian ditutup dan ditandatangani pada hari, tanggal, bulan serta tahun tersebut di atas di Pemalang.---------------------------------------------------------------------------------------------------</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<p style=\"text-align:center\">Pejabat Imigrasi,</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><strong>....................</strong></p>\r\n\r\n			<p style=\"text-align:center\"><strong>NIP. ..................</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:50%;\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">Persetujuan Kakanim</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Setuju</td>\r\n			<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tidak setuju</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'T', '  tik', '2019-04-09 06:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_sk`
--

CREATE TABLE `formulir_sk` (
  `id` int(11) NOT NULL,
  `id_proses_bap` int(11) NOT NULL,
  `nomor` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` longtext NOT NULL,
  `pendapat` char(1) NOT NULL,
  `alasan` longtext NOT NULL,
  `id_jenis_sk` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulir_sk`
--

INSERT INTO `formulir_sk` (`id`, `id_proses_bap`, `nomor`, `tanggal`, `keterangan`, `pendapat`, `alasan`, `id_jenis_sk`, `created_date`) VALUES
(2, 17, 'SK 76', '2019-04-17', '<table align=\"center\" border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"5\">\r\n			<p align=\"center\"><img height=\"100\" src=\"http://www.baktiku.xyz/image/simbol/kumham.png\" width=\"100\" /></p>\r\n\r\n			<p align=\"center\">KEMENTERIAN HUKUM DAN HAK ASASI MANUSIA RI<br />\r\n			KANTOR WILAYAH JAWA TENGAH<br />\r\n			<strong>KANTOR IMIGRASI KELAS II PEMALANG</strong></p>\r\n\r\n			<p align=\"center\">KEPUTUSAN KEPALA KANTOR IMIGRASI KELAS II PEMALANG<br />\r\n			NOMOR: _____________ &nbsp;TAHUN 2019</p>\r\n\r\n			<p align=\"center\">TENTANG<br />\r\n			PENANGGUHAN / PERSETUJUAN PENGGANTIAN PASPOR RI KARENA HILANG (SPLP) BAGI WARGA NEGARA INDONESIA<br />\r\n			ATAS NAMA KOTARO</p>\r\n\r\n			<p align=\"center\">KEPALA KANTOR IMIGRASI KELAS II PEMALANG,</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\" width=\"180\">Menimbang</td>\r\n			<td valign=\"top\" width=\"14\">:</td>\r\n			<td valign=\"top\" width=\"32\">a.</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">Berita Acara Pemeriksaan Nomor: jkjkj jkj tanggal 01 April 2019 dan Berita Acara Pendapat Nomor: 999 tanggal 03 April 2019 atas nama KOTARO;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td valign=\"top\">&nbsp;</td>\r\n			<td valign=\"top\">b.</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">Surat Perjalanan Laksana Paspor Nomor -, dikeluarkan di Okinawa pada 01 Maret 2019 berlaku sampai dengan 31 Maret 2019 atas nama Kotaro;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>c.</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">Bahwa berdasarkan hal sebagaimana dimaksud pada huruf a dan b, kepada yang bersangkutan dapat diberikan penggantian Paspor RI karena hilang (SPLP) sesuai dengan peraturan perundang-undangan yang berlaku;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mengingat</td>\r\n			<td>:</td>\r\n			<td>1.</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">Undang-Undang Nomor 6 Tahun 2011 tentang Keimigrasian (Lembaran Negara Republik Indonesia Tahun 2011 Nomor 52, Tambahan Lembaran Negara Republik Indonesia Nomor 5216);</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>2.</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">Peraturan Pemerintah Nomor 31 Tahun 2013 tentang Peraturan Pelaksanaan Undang-Undang Nomor 6 Tahun 2011 tentang Keimigrasian (Lembaran Negara Republik Indonesia Tahun 2013 Nomor 68, Tambahan Lembaran Negara Republik Indonesia Nomor 5409);</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>3.</td>\r\n			<td colspan=\"2\">\r\n			<div align=\"justify\">Peraturan Menteri Hukum dan Hak Asasi Manusia Republik Indonesia Nomor 8 Tahun 2014 tentang Paspor Biasa dan Surat Perjalanan Laksana Paspor;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"5\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"5\">\r\n			<div align=\"center\">MEMUTUSKAN:</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\">Menetapkan</td>\r\n			<td valign=\"top\">:</td>\r\n			<td>&nbsp;</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">KEPUTUSAN KEPALA KANTOR IMIGRASI KELAS II PEMALANG TENTANG PENANGGUHAN / PERSETUJUAN PENGGANTIAN PASPOR RI KARENA HILANG (SPLP) BAGI WARGA NEGARA INDONESIA ATAS NAMA Kotaro;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\">KESATU</td>\r\n			<td valign=\"top\">:</td>\r\n			<td>&nbsp;</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">Menyatakan bahwa nama: KOTARO; Kewarganegaraan: Japan; Jenis Kelamin: Perempuan; Tempat dan Tanggal Lahir: BOVEN DIGOEL, 14 Maret 2019; Pekerjaan: Swasta; Agama: Buddha; Status Perkawinan: Kawin; NIK: 889; Alamat Tempat Tinggal: Jerman, disetujui diberikan penggantian Paspor RI karena hilang habis berlaku <strong><em>(/ diberikan penangguhan selama 6 (enam) bulan )</em></strong> sesuai dengan peraturan perundang-undangan yang berlaku;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\">KEDUA</td>\r\n			<td valign=\"top\">:</td>\r\n			<td>&nbsp;</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">Membatalkan SPLP atas nama KOTARO dengan Nomor 888888 yang dikeluarkan Pemalang pada tanggal 01 Maret 2019 berlaku sampai dengan 31 Maret 2019;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\">KETIGA</td>\r\n			<td valign=\"top\">:</td>\r\n			<td>&nbsp;</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">Mewajibkan kepada yang bersangkutan untuk menjaga Paspor RI pengganti dengan baik agar dokumen negara tersebut tidak rusak/hilang;</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\">KEEMPAT</td>\r\n			<td valign=\"top\">:</td>\r\n			<td>&nbsp;</td>\r\n			<td colspan=\"2\" valign=\"top\">\r\n			<div align=\"justify\">Keputusan ini mulai berlaku sejak tanggal ditetapkan, dengan ketentuan apabila dikemudian hari terdapat kekeliruan akan diadakan perbaikan sebagaimana mestinya.</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td width=\"619\">&nbsp;</td>\r\n			<td width=\"395\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>\r\n			<p align=\"center\">Ditetapkan di Pemalang<br />\r\n			pada tanggal 16 April 2019<br />\r\n			Plh. Kepala Kantor,</p>\r\n\r\n			<p align=\"center\">&nbsp;</p>\r\n\r\n			<p align=\"center\">&nbsp;</p>\r\n\r\n			<p align=\"center\">&nbsp;</p>\r\n\r\n			<p align=\"center\">-----------------------------------<br />\r\n			NIP. ---------------------</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"4\">\r\n			<p><strong>Tembusan kepada Yth.</strong>:</p>\r\n\r\n			<ol>\r\n				<li>Direktur Pengawasan dan Penindakan Keimigrasian;</li>\r\n				<li>Direktur Intelijen Keimigrasian;</li>\r\n				<li>Kepala Kantor Wilayah Kementerian Hukum dan Ham Jawa Tengah u.p. Kepala Divisi Keimigrasian;</li>\r\n				<li>Yang bersangkutan.</li>\r\n			</ol>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 3, '2019-04-19 08:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `foto_bap`
--

CREATE TABLE `foto_bap` (
  `id` int(11) NOT NULL,
  `id_proses_bap` int(11) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_bap`
--

INSERT INTO `foto_bap` (`id`, `id_proses_bap`, `nama_file`, `created_date`) VALUES
(28, 7, '1538478471.jpg', '2018-10-02 11:07:51'),
(29, 7, '1542358249.jpg', '2018-11-16 08:50:49'),
(30, 1, '1551239009.jpg', '2019-02-27 03:43:28'),
(31, 12, '1551831435.jpg', '2019-03-06 00:17:15'),
(32, 13, '1552696778.jpg', '2019-03-16 00:39:37'),
(34, 17, '1554627419.jpg', '2019-04-07 08:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_bap`
--

CREATE TABLE `jadwal_bap` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pemohon` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_bap`
--

INSERT INTO `jadwal_bap` (`id`, `tanggal`, `id_pemohon`, `id_petugas`, `keterangan`, `created_date`) VALUES
(3, '2019-04-01', 20, 3, '', '2019-04-06 09:24:18'),
(6, '2019-04-09', 17, 4, '', '2019-04-06 09:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bap`
--

CREATE TABLE `jenis_bap` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bap`
--

INSERT INTO `jenis_bap` (`id`, `nama`) VALUES
(1, 'Hilang'),
(2, 'Rusak'),
(3, 'Perbedaan Data'),
(4, 'SPLP (Hilang di Luar Negeri/Deportasi)');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sk`
--

CREATE TABLE `jenis_sk` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_sk`
--

INSERT INTO `jenis_sk` (`id`, `nama`, `keterangan`) VALUES
(1, 'Persetujuan', ''),
(2, 'Penangguhan', ''),
(3, 'Penolakan', '');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(1, 'SIMEULUE'),
(2, 'ACEH SINGKIL'),
(3, 'ACEH SELATAN'),
(4, 'ACEH TENGGARA'),
(5, 'ACEH TIMUR'),
(6, 'ACEH TENGAH'),
(7, 'ACEH BARAT'),
(8, 'ACEH BESAR'),
(9, 'PIDIE'),
(10, 'BIREUEN'),
(11, 'ACEH UTARA'),
(12, 'ACEH BARAT DAYA'),
(13, 'GAYO LUES'),
(14, 'ACEH TAMIANG'),
(15, 'NAGAN RAYA'),
(16, 'ACEH JAYA'),
(17, 'BENER MERIAH'),
(18, 'PIDIE JAYA'),
(19, 'BANDA ACEH'),
(20, 'SABANG'),
(21, 'LANGSA'),
(22, 'LHOKSEUMAWE'),
(23, 'SUBULUSSALAM'),
(24, 'NIAS'),
(25, 'MANDAILING NATAL'),
(26, 'TAPANULI SELATAN'),
(27, 'TAPANULI TENGAH'),
(28, 'TAPANULI UTARA'),
(29, 'TOBA SAMOSIR'),
(30, 'LABUHAN BATU'),
(31, 'ASAHAN'),
(32, 'SIMALUNGUN'),
(33, 'DAIRI'),
(34, 'KARO'),
(35, 'DELI SERDANG'),
(36, 'LANGKAT'),
(37, 'NIAS SELATAN'),
(38, 'HUMBANG HASUNDUTAN'),
(39, 'PAKPAK BHARAT'),
(40, 'SAMOSIR'),
(41, 'SERDANG BEDAGAI'),
(42, 'BATU BARA'),
(43, 'PADANG LAWAS UTARA'),
(44, 'PADANG LAWAS'),
(45, 'LABUHAN BATU SELATAN'),
(46, 'LABUHAN BATU UTARA'),
(47, 'NIAS UTARA'),
(48, 'NIAS BARAT'),
(49, 'SIBOLGA'),
(50, 'TANJUNG BALAI'),
(51, 'PEMATANG SIANTAR'),
(52, 'TEBING TINGGI'),
(53, 'MEDAN'),
(54, 'BINJAI'),
(55, 'PADANGSIDIMPUAN'),
(56, 'GUNUNGSITOLI'),
(57, 'KEPULAUAN MENTAWAI'),
(58, 'PESISIR SELATAN'),
(59, 'SOLOK'),
(60, 'SIJUNJUNG'),
(61, 'TANAH DATAR'),
(62, 'PADANG PARIAMAN'),
(63, 'AGAM'),
(64, 'LIMA PULUH KOTA'),
(65, 'PASAMAN'),
(66, 'SOLOK SELATAN'),
(67, 'DHARMASRAYA'),
(68, 'PASAMAN BARAT'),
(69, 'PADANG'),
(70, 'SOLOK'),
(71, 'SAWAH LUNTO'),
(72, 'PADANG PANJANG'),
(73, 'BUKITTINGGI'),
(74, 'PAYAKUMBUH'),
(75, 'PARIAMAN'),
(76, 'KUANTAN SINGINGI'),
(77, 'INDRAGIRI HULU'),
(78, 'INDRAGIRI HILIR'),
(79, 'PELALAWAN'),
(80, 'S I A K'),
(81, 'KAMPAR'),
(82, 'ROKAN HULU'),
(83, 'BENGKALIS'),
(84, 'ROKAN HILIR'),
(85, 'KEPULAUAN MERANTI'),
(86, 'PEKANBARU'),
(87, 'D U M A I'),
(88, 'KERINCI'),
(89, 'MERANGIN'),
(90, 'SAROLANGUN'),
(91, 'BATANG HARI'),
(92, 'MUARO JAMBI'),
(93, 'TANJUNG JABUNG TIMUR'),
(94, 'TANJUNG JABUNG BARAT'),
(95, 'TEBO'),
(96, 'BUNGO'),
(97, 'JAMBI'),
(98, 'SUNGAI PENUH'),
(99, 'OGAN KOMERING ULU'),
(100, 'OGAN KOMERING ILIR'),
(101, 'MUARA ENIM'),
(102, 'LAHAT'),
(103, 'MUSI RAWAS'),
(104, 'MUSI BANYUASIN'),
(105, 'BANYU ASIN'),
(106, 'OGAN KOMERING ULU SELATAN'),
(107, 'OGAN KOMERING ULU TIMUR'),
(108, 'OGAN ILIR'),
(109, 'EMPAT LAWANG'),
(110, 'PENUKAL ABAB LEMATANG ILIR'),
(111, 'MUSI RAWAS UTARA'),
(112, 'PALEMBANG'),
(113, 'PRABUMULIH'),
(114, 'PAGAR ALAM'),
(115, 'LUBUKLINGGAU'),
(116, 'BENGKULU SELATAN'),
(117, 'REJANG LEBONG'),
(118, 'BENGKULU UTARA'),
(119, 'KAUR'),
(120, 'SELUMA'),
(121, 'MUKOMUKO'),
(122, 'LEBONG'),
(123, 'KEPAHIANG'),
(124, 'BENGKULU TENGAH'),
(125, 'BENGKULU'),
(126, 'LAMPUNG BARAT'),
(127, 'TANGGAMUS'),
(128, 'LAMPUNG SELATAN'),
(129, 'LAMPUNG TIMUR'),
(130, 'LAMPUNG TENGAH'),
(131, 'LAMPUNG UTARA'),
(132, 'WAY KANAN'),
(133, 'TULANGBAWANG'),
(134, 'PESAWARAN'),
(135, 'PRINGSEWU'),
(136, 'MESUJI'),
(137, 'TULANG BAWANG BARAT'),
(138, 'PESISIR BARAT'),
(139, 'BANDAR LAMPUNG'),
(140, 'METRO'),
(141, 'BANGKA'),
(142, 'BELITUNG'),
(143, 'BANGKA BARAT'),
(144, 'BANGKA TENGAH'),
(145, 'BANGKA SELATAN'),
(146, 'BELITUNG TIMUR'),
(147, 'PANGKAL PINANG'),
(148, 'KARIMUN'),
(149, 'BINTAN'),
(150, 'NATUNA'),
(151, 'LINGGA'),
(152, 'KEPULAUAN ANAMBAS'),
(153, 'B A T A M'),
(154, 'TANJUNG PINANG'),
(155, 'KEPULAUAN SERIBU'),
(156, 'JAKARTA SELATAN'),
(157, 'JAKARTA TIMUR'),
(158, 'JAKARTA PUSAT'),
(159, 'JAKARTA BARAT'),
(160, 'JAKARTA UTARA'),
(161, 'BOGOR'),
(162, 'SUKABUMI'),
(163, 'CIANJUR'),
(164, 'BANDUNG'),
(165, 'GARUT'),
(166, 'TASIKMALAYA'),
(167, 'CIAMIS'),
(168, 'KUNINGAN'),
(169, 'CIREBON'),
(170, 'MAJALENGKA'),
(171, 'SUMEDANG'),
(172, 'INDRAMAYU'),
(173, 'SUBANG'),
(174, 'PURWAKARTA'),
(175, 'KARAWANG'),
(176, 'BEKASI'),
(177, 'BANDUNG BARAT'),
(178, 'PANGANDARAN'),
(179, 'BOGOR'),
(180, 'SUKABUMI'),
(181, 'BANDUNG'),
(182, 'CIREBON'),
(183, 'BEKASI'),
(184, 'DEPOK'),
(185, 'CIMAHI'),
(186, 'TASIKMALAYA'),
(187, 'BANJAR'),
(188, 'CILACAP'),
(189, 'BANYUMAS'),
(190, 'PURBALINGGA'),
(191, 'BANJARNEGARA'),
(192, 'KEBUMEN'),
(193, 'PURWOREJO'),
(194, 'WONOSOBO'),
(195, 'MAGELANG'),
(196, 'BOYOLALI'),
(197, 'KLATEN'),
(198, 'SUKOHARJO'),
(199, 'WONOGIRI'),
(200, 'KARANGANYAR'),
(201, 'SRAGEN'),
(202, 'GROBOGAN'),
(203, 'BLORA'),
(204, 'REMBANG'),
(205, 'PATI'),
(206, 'KUDUS'),
(207, 'JEPARA'),
(208, 'DEMAK'),
(209, 'SEMARANG'),
(210, 'TEMANGGUNG'),
(211, 'KENDAL'),
(212, 'BATANG'),
(213, 'PEKALONGAN'),
(214, 'PEMALANG'),
(215, 'TEGAL'),
(216, 'BREBES'),
(217, 'MAGELANG'),
(218, 'SURAKARTA'),
(219, 'SALATIGA'),
(220, 'SEMARANG'),
(221, 'PEKALONGAN'),
(222, 'TEGAL'),
(223, 'KULON PROGO'),
(224, 'BANTUL'),
(225, 'GUNUNG KIDUL'),
(226, 'SLEMAN'),
(227, 'YOGYAKARTA'),
(228, 'PACITAN'),
(229, 'PONOROGO'),
(230, 'TRENGGALEK'),
(231, 'TULUNGAGUNG'),
(232, 'BLITAR'),
(233, 'KEDIRI'),
(234, 'MALANG'),
(235, 'LUMAJANG'),
(236, 'JEMBER'),
(237, 'BANYUWANGI'),
(238, 'BONDOWOSO'),
(239, 'SITUBONDO'),
(240, 'PROBOLINGGO'),
(241, 'PASURUAN'),
(242, 'SIDOARJO'),
(243, 'MOJOKERTO'),
(244, 'JOMBANG'),
(245, 'NGANJUK'),
(246, 'MADIUN'),
(247, 'MAGETAN'),
(248, 'NGAWI'),
(249, 'BOJONEGORO'),
(250, 'TUBAN'),
(251, 'LAMONGAN'),
(252, 'GRESIK'),
(253, 'BANGKALAN'),
(254, 'SAMPANG'),
(255, 'PAMEKASAN'),
(256, 'SUMENEP'),
(257, 'KEDIRI'),
(258, 'BLITAR'),
(259, 'MALANG'),
(260, 'PROBOLINGGO'),
(261, 'PASURUAN'),
(262, 'MOJOKERTO'),
(263, 'MADIUN'),
(264, 'SURABAYA'),
(265, 'BATU'),
(266, 'PANDEGLANG'),
(267, 'LEBAK'),
(268, 'TANGERANG'),
(269, 'SERANG'),
(270, 'TANGERANG'),
(271, 'CILEGON'),
(272, 'SERANG'),
(273, 'TANGERANG SELATAN'),
(274, 'JEMBRANA'),
(275, 'TABANAN'),
(276, 'BADUNG'),
(277, 'GIANYAR'),
(278, 'KLUNGKUNG'),
(279, 'BANGLI'),
(280, 'KARANG ASEM'),
(281, 'BULELENG'),
(282, 'DENPASAR'),
(283, 'LOMBOK BARAT'),
(284, 'LOMBOK TENGAH'),
(285, 'LOMBOK TIMUR'),
(286, 'SUMBAWA'),
(287, 'DOMPU'),
(288, 'BIMA'),
(289, 'SUMBAWA BARAT'),
(290, 'LOMBOK UTARA'),
(291, 'MATARAM'),
(292, 'BIMA'),
(293, 'SUMBA BARAT'),
(294, 'SUMBA TIMUR'),
(295, 'KUPANG'),
(296, 'TIMOR TENGAH SELATAN'),
(297, 'TIMOR TENGAH UTARA'),
(298, 'BELU'),
(299, 'ALOR'),
(300, 'LEMBATA'),
(301, 'FLORES TIMUR'),
(302, 'SIKKA'),
(303, 'ENDE'),
(304, 'NGADA'),
(305, 'MANGGARAI'),
(306, 'ROTE NDAO'),
(307, 'MANGGARAI BARAT'),
(308, 'SUMBA TENGAH'),
(309, 'SUMBA BARAT DAYA'),
(310, 'NAGEKEO'),
(311, 'MANGGARAI TIMUR'),
(312, 'SABU RAIJUA'),
(313, 'MALAKA'),
(314, 'KUPANG'),
(315, 'SAMBAS'),
(316, 'BENGKAYANG'),
(317, 'LANDAK'),
(318, 'MEMPAWAH'),
(319, 'SANGGAU'),
(320, 'KETAPANG'),
(321, 'SINTANG'),
(322, 'KAPUAS HULU'),
(323, 'SEKADAU'),
(324, 'MELAWI'),
(325, 'KAYONG UTARA'),
(326, 'KUBU RAYA'),
(327, 'PONTIANAK'),
(328, 'SINGKAWANG'),
(329, 'KOTAWARINGIN BARAT'),
(330, 'KOTAWARINGIN TIMUR'),
(331, 'KAPUAS'),
(332, 'BARITO SELATAN'),
(333, 'BARITO UTARA'),
(334, 'SUKAMARA'),
(335, 'LAMANDAU'),
(336, 'SERUYAN'),
(337, 'KATINGAN'),
(338, 'PULANG PISAU'),
(339, 'GUNUNG MAS'),
(340, 'BARITO TIMUR'),
(341, 'MURUNG RAYA'),
(342, 'PALANGKA RAYA'),
(343, 'TANAH LAUT'),
(344, 'BARU'),
(345, 'BANJAR'),
(346, 'BARITO KUALA'),
(347, 'TAPIN'),
(348, 'HULU SUNGAI SELATAN'),
(349, 'HULU SUNGAI TENGAH'),
(350, 'HULU SUNGAI UTARA'),
(351, 'TABALONG'),
(352, 'TANAH BUMBU'),
(353, 'BALANGAN'),
(354, 'BANJARMASIN'),
(355, 'BANJAR BARU'),
(356, 'PASER'),
(357, 'KUTAI BARAT'),
(358, 'KUTAI KARTANEGARA'),
(359, 'KUTAI TIMUR'),
(360, 'BERAU'),
(361, 'PENAJAM PASER UTARA'),
(362, 'MAHAKAM HULU'),
(363, 'BALIKPAPAN'),
(364, 'SAMARINDA'),
(365, 'BONTANG'),
(366, 'MALINAU'),
(367, 'BULUNGAN'),
(368, 'TANA TIDUNG'),
(369, 'NUNUKAN'),
(370, 'TARAKAN'),
(371, 'BOLAANG MONGONDOW'),
(372, 'MINAHASA'),
(373, 'KEPULAUAN SANGIHE'),
(374, 'KEPULAUAN TALAUD'),
(375, 'MINAHASA SELATAN'),
(376, 'MINAHASA UTARA'),
(377, 'BOLAANG MONGONDOW UTARA'),
(378, 'SIAU TAGULANDANG BIARO'),
(379, 'MINAHASA TENGGARA'),
(380, 'BOLAANG MONGONDOW SELATAN'),
(381, 'BOLAANG MONGONDOW TIMUR'),
(382, 'MANADO'),
(383, 'BITUNG'),
(384, 'TOMOHON'),
(385, 'KOTAMOBAGU'),
(386, 'BANGGAI KEPULAUAN'),
(387, 'BANGGAI'),
(388, 'MOROWALI'),
(389, 'POSO'),
(390, 'DONGGALA'),
(391, 'TOLI-TOLI'),
(392, 'BUOL'),
(393, 'PARIGI MOUTONG'),
(394, 'TOJO UNA-UNA'),
(395, 'SIGI'),
(396, 'BANGGAI LAUT'),
(397, 'MOROWALI UTARA'),
(398, 'PALU'),
(399, 'KEPULAUAN SELAYAR'),
(400, 'BULUKUMBA'),
(401, 'BANTAENG'),
(402, 'JENEPONTO'),
(403, 'TAKALAR'),
(404, 'GOWA'),
(405, 'SINJAI'),
(406, 'MAROS'),
(407, 'PANGKAJENE DAN KEPULAUAN'),
(408, 'BARRU'),
(409, 'BONE'),
(410, 'SOPPENG'),
(411, 'WAJO'),
(412, 'SIDENRENG RAPPANG'),
(413, 'PINRANG'),
(414, 'ENREKANG'),
(415, 'LUWU'),
(416, 'TANA TORAJA'),
(417, 'LUWU UTARA'),
(418, 'LUWU TIMUR'),
(419, 'TORAJA UTARA'),
(420, 'MAKASSAR'),
(421, 'PAREPARE'),
(422, 'PALOPO'),
(423, 'BUTON'),
(424, 'MUNA'),
(425, 'KONAWE'),
(426, 'KOLAKA'),
(427, 'KONAWE SELATAN'),
(428, 'BOMBANA'),
(429, 'WAKATOBI'),
(430, 'KOLAKA UTARA'),
(431, 'BUTON UTARA'),
(432, 'KONAWE UTARA'),
(433, 'KOLAKA TIMUR'),
(434, 'KONAWE KEPULAUAN'),
(435, 'MUNA BARAT'),
(436, 'BUTON TENGAH'),
(437, 'BUTON SELATAN'),
(438, 'KENDARI'),
(439, 'BAUBAU'),
(440, 'BOALEMO'),
(441, 'GORONTALO'),
(442, 'POHUWATO'),
(443, 'BONE BOLANGO'),
(444, 'GORONTALO UTARA'),
(445, 'GORONTALO'),
(446, 'MAJENE'),
(447, 'POLEWALI MANDAR'),
(448, 'MAMASA'),
(449, 'MAMUJU'),
(450, 'MAMUJU UTARA'),
(451, 'MAMUJU TENGAH'),
(452, 'MALUKU TENGGARA BARAT'),
(453, 'MALUKU TENGGARA'),
(454, 'MALUKU TENGAH'),
(455, 'BURU'),
(456, 'KEPULAUAN ARU'),
(457, 'SERAM BAGIAN BARAT'),
(458, 'SERAM BAGIAN TIMUR'),
(459, 'MALUKU BARAT DAYA'),
(460, 'BURU SELATAN'),
(461, 'AMBON'),
(462, 'TUAL'),
(463, 'HALMAHERA BARAT'),
(464, 'HALMAHERA TENGAH'),
(465, 'KEPULAUAN SULA'),
(466, 'HALMAHERA SELATAN'),
(467, 'HALMAHERA UTARA'),
(468, 'HALMAHERA TIMUR'),
(469, 'PULAU MOROTAI'),
(470, 'PULAU TALIABU'),
(471, 'TERNATE'),
(472, 'TIDORE KEPULAUAN'),
(473, 'FAKFAK'),
(474, 'KAIMANA'),
(475, 'TELUK WONDAMA'),
(476, 'TELUK BINTUNI'),
(477, 'MANOKWARI'),
(478, 'SORONG SELATAN'),
(479, 'SORONG'),
(480, 'RAJA AMPAT'),
(481, 'TAMBRAUW'),
(482, 'MAYBRAT'),
(483, 'MANOKWARI SELATAN'),
(484, 'PEGUNUNGAN ARFAK'),
(485, 'SORONG'),
(486, 'MERAUKE'),
(487, 'JAYAWIJAYA'),
(488, 'JAYAPURA'),
(489, 'NABIRE'),
(490, 'KEPULAUAN YAPEN'),
(491, 'BIAK NUMFOR'),
(492, 'PANIAI'),
(493, 'PUNCAK JAYA'),
(494, 'MIMIKA'),
(495, 'BOVEN DIGOEL'),
(496, 'MAPPI'),
(497, 'ASMAT'),
(498, 'YAHUKIMO'),
(499, 'PEGUNUNGAN BINTANG'),
(500, 'TOLIKARA'),
(501, 'SARMI'),
(502, 'KEEROM'),
(503, 'WAROPEN'),
(504, 'SUPIORI'),
(505, 'MAMBERAMO RAYA'),
(506, 'NDUGA'),
(507, 'LANNY JAYA'),
(508, 'MAMBERAMO TENGAH'),
(509, 'YALIMO'),
(510, 'PUNCAK'),
(511, 'DOGIYAI'),
(512, 'INTAN JAYA'),
(513, 'DEIYAI'),
(514, 'JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `id_user`, `tanggal`) VALUES
(1, 1, '2018-08-29 08:46:34'),
(2, 28, '2018-08-29 08:58:58'),
(3, 28, '2018-08-29 09:16:43'),
(4, 28, '2018-08-29 09:35:12'),
(5, 28, '2018-08-29 09:58:45'),
(6, 28, '2018-08-30 06:39:14'),
(7, 3, '2018-08-30 09:53:17'),
(8, 3, '2018-08-30 09:53:33'),
(9, 4, '2018-08-30 10:03:35'),
(10, 4, '2018-08-30 10:32:18'),
(11, 4, '2018-08-30 23:54:23'),
(12, 4, '2018-08-31 06:25:07'),
(13, 4, '2018-08-31 06:26:08'),
(14, 4, '2018-08-31 06:28:04'),
(15, 4, '2018-08-31 06:28:20'),
(16, 4, '2018-08-31 06:30:24'),
(17, 4, '2018-08-31 06:32:34'),
(18, 4, '2018-08-31 06:35:09'),
(19, 4, '2018-08-31 06:37:51'),
(20, 4, '2018-08-31 07:04:58'),
(21, 4, '2018-08-31 07:08:07'),
(22, 4, '2018-08-31 07:21:51'),
(23, 4, '2018-08-31 07:24:41'),
(24, 4, '2018-08-31 07:31:45'),
(25, 4, '2018-08-31 07:36:45'),
(26, 4, '2018-08-31 07:37:48'),
(27, 4, '2018-08-31 07:38:09'),
(28, 4, '2018-08-31 07:39:10'),
(29, 4, '2018-08-31 07:39:44'),
(30, 4, '2018-08-31 07:40:56'),
(31, 4, '2018-08-31 07:42:40'),
(32, 4, '2018-08-31 07:45:29'),
(33, 4, '2018-08-31 07:52:47'),
(34, 4, '2018-08-31 08:30:08'),
(35, 5, '2018-08-31 08:55:20'),
(36, 5, '2018-08-31 08:56:13'),
(37, 4, '2018-08-31 09:10:45'),
(38, 4, '2018-08-31 09:17:05'),
(39, 4, '2018-08-31 09:20:12'),
(40, 4, '2018-08-31 09:52:31'),
(41, 4, '2018-08-31 09:55:43'),
(42, 4, '2018-08-31 10:18:10'),
(43, 4, '2018-08-31 10:18:38'),
(44, 4, '2018-08-31 21:36:11'),
(45, 4, '2018-09-01 08:27:07'),
(46, 4, '2018-09-01 08:31:56'),
(47, 4, '2018-09-01 08:41:55'),
(48, 4, '2018-09-01 08:55:08'),
(49, 4, '2018-09-01 10:44:57'),
(50, 4, '2018-09-01 10:52:36'),
(51, 4, '2018-09-01 11:13:00'),
(52, 4, '2018-09-01 11:15:32'),
(53, 4, '2018-09-02 05:47:11'),
(54, 4, '2018-09-02 06:08:01'),
(55, 4, '2018-09-02 06:11:47'),
(56, 4, '2018-09-02 06:23:55'),
(57, 4, '2018-09-02 19:33:23'),
(58, 4, '2018-09-02 20:59:28'),
(59, 4, '2018-09-02 21:46:48'),
(60, 4, '2018-09-04 02:13:27'),
(61, 4, '2018-09-04 02:13:44'),
(62, 4, '2018-09-04 02:13:58'),
(63, 4, '2018-09-04 02:23:53'),
(64, 5, '2018-09-04 02:36:01'),
(65, 4, '2018-09-04 02:48:51'),
(66, 5, '2018-09-04 04:28:56'),
(67, 4, '2018-09-04 08:22:50'),
(68, 4, '2018-09-05 09:24:43'),
(69, 4, '2018-09-05 09:27:11'),
(70, 8, '2018-09-05 09:28:01'),
(71, 8, '2018-09-05 09:35:11'),
(72, 4, '2018-09-05 09:54:52'),
(73, 4, '2018-09-05 10:28:36'),
(74, 4, '2018-09-05 10:30:05'),
(75, 4, '2018-09-05 18:55:06'),
(76, 4, '2018-09-05 19:13:43'),
(77, 4, '2018-09-06 10:06:54'),
(78, 4, '2018-09-06 10:10:00'),
(79, 4, '2018-09-06 10:10:36'),
(80, 4, '2018-09-06 10:12:08'),
(81, 4, '2018-09-06 10:12:55'),
(82, 4, '2018-09-06 21:02:37'),
(83, 4, '2018-09-07 00:33:42'),
(84, 4, '2018-09-07 00:35:33'),
(85, 4, '2018-09-07 00:48:42'),
(86, 4, '2018-09-07 01:03:25'),
(87, 4, '2018-09-07 01:04:06'),
(88, 4, '2018-09-07 06:04:17'),
(89, 4, '2018-09-07 07:18:12'),
(90, 4, '2018-09-07 08:51:32'),
(91, 4, '2018-09-07 09:16:14'),
(92, 4, '2018-09-07 10:00:50'),
(93, 4, '2018-09-07 21:26:27'),
(94, 4, '2018-09-07 21:32:47'),
(95, 4, '2018-09-08 00:19:30'),
(96, 4, '2018-09-08 00:30:06'),
(97, 4, '2018-09-09 08:31:51'),
(98, 4, '2018-09-11 04:09:49'),
(99, 4, '2018-09-11 04:21:37'),
(100, 4, '2018-09-11 21:02:01'),
(101, 4, '2018-09-11 21:58:04'),
(102, 4, '2018-09-12 00:54:23'),
(103, 4, '2018-09-12 04:25:58'),
(104, 4, '2018-09-12 08:57:10'),
(105, 4, '2018-09-13 01:29:08'),
(106, 4, '2018-09-13 02:07:46'),
(107, 4, '2018-09-13 02:13:56'),
(108, 4, '2018-09-13 05:19:18'),
(109, 4, '2018-09-13 10:57:44'),
(110, 4, '2018-09-13 20:52:37'),
(111, 4, '2018-09-13 23:06:41'),
(112, 4, '2018-09-14 10:04:29'),
(113, 4, '2018-09-15 00:22:25'),
(114, 4, '2018-09-15 00:55:32'),
(115, 4, '2018-09-15 07:05:33'),
(116, 4, '2018-09-15 07:26:30'),
(117, 4, '2018-09-15 10:05:46'),
(118, 4, '2018-09-16 00:18:38'),
(119, 4, '2018-09-16 00:19:45'),
(120, 10, '2018-09-16 00:23:45'),
(121, 11, '2018-09-16 00:25:35'),
(122, 4, '2018-09-16 02:02:20'),
(123, 4, '2018-09-16 04:23:08'),
(124, 4, '2018-09-16 06:12:56'),
(125, 4, '2018-09-16 08:12:42'),
(126, 4, '2018-09-16 08:32:46'),
(127, 4, '2018-09-16 08:37:49'),
(128, 4, '2018-09-16 22:12:06'),
(129, 4, '2018-09-17 01:27:20'),
(130, 4, '2018-09-17 06:06:38'),
(131, 11, '2018-09-18 10:07:55'),
(132, 4, '2018-09-19 09:48:00'),
(133, 11, '2018-09-20 08:07:35'),
(134, 11, '2018-09-20 09:26:43'),
(135, 11, '2018-09-20 09:28:32'),
(136, 4, '2018-09-20 09:29:25'),
(137, 4, '2018-09-20 11:03:30'),
(138, 4, '2018-09-20 11:11:23'),
(139, 4, '2018-09-20 20:30:30'),
(140, 4, '2018-09-21 06:46:11'),
(141, 4, '2018-09-28 07:58:07'),
(142, 11, '2018-09-30 00:48:17'),
(143, 11, '2018-09-30 03:01:51'),
(144, 4, '2018-09-30 05:34:36'),
(145, 4, '2018-09-30 08:26:35'),
(146, 4, '2018-09-30 12:41:36'),
(147, 4, '2018-10-01 01:19:22'),
(148, 11, '2018-10-02 05:47:28'),
(149, 11, '2018-10-02 11:06:40'),
(150, 11, '2018-10-02 11:07:19'),
(151, 11, '2018-10-02 11:14:31'),
(152, 11, '2018-10-02 11:16:03'),
(153, 11, '2018-10-05 19:03:26'),
(154, 11, '2018-10-06 16:09:31'),
(155, 11, '2018-10-06 16:22:45'),
(156, 11, '2018-10-19 03:12:27'),
(157, 11, '2018-10-19 16:43:29'),
(158, 11, '2018-10-25 03:31:28'),
(159, 11, '2018-10-25 03:51:14'),
(160, 11, '2018-11-08 00:33:01'),
(161, 11, '2018-11-08 00:44:00'),
(162, 11, '2018-11-08 21:12:09'),
(163, 11, '2018-11-09 11:19:02'),
(164, 11, '2018-11-09 12:25:30'),
(165, 11, '2018-11-10 01:19:38'),
(166, 11, '2018-11-15 15:56:21'),
(167, 11, '2018-11-15 22:34:08'),
(168, 11, '2018-11-16 13:10:02'),
(169, 11, '2018-11-17 17:18:31'),
(170, 11, '2018-11-17 21:42:35'),
(171, 11, '2018-11-19 13:04:24'),
(172, 11, '2018-11-19 20:28:24'),
(173, 11, '2018-11-20 19:03:44'),
(174, 11, '2018-11-20 21:10:12'),
(175, 11, '2018-11-21 08:48:03'),
(176, 11, '2018-11-21 10:20:12'),
(177, 11, '2018-11-22 16:31:01'),
(178, 11, '2018-12-18 21:39:05'),
(179, 11, '2018-12-19 14:54:14'),
(180, 11, '2018-12-20 11:54:09'),
(181, 11, '2019-02-13 21:24:49'),
(182, 11, '2019-02-14 09:57:14'),
(183, 11, '2019-02-14 15:12:40'),
(184, 11, '2019-02-19 21:51:21'),
(185, 11, '2019-02-26 16:44:03'),
(186, 11, '2019-02-26 19:42:45'),
(187, 11, '2019-03-01 12:47:07'),
(188, 11, '2019-03-03 16:34:54'),
(189, 11, '2019-03-04 15:36:44'),
(190, 11, '2019-03-05 00:02:30'),
(191, 11, '2019-03-05 10:40:32'),
(192, 11, '2019-03-05 10:42:30'),
(193, 11, '2019-03-05 11:08:23'),
(194, 11, '2019-03-05 14:47:47'),
(195, 11, '2019-03-05 15:10:52'),
(196, 11, '2019-03-05 20:12:19'),
(197, 11, '2019-03-06 11:03:36'),
(198, 11, '2019-03-06 12:17:10'),
(199, 11, '2019-03-07 20:20:04'),
(200, 11, '2019-03-08 01:00:06'),
(201, 11, '2019-03-08 11:28:17'),
(202, 11, '2019-03-08 21:40:24'),
(203, 11, '2019-03-11 08:21:52'),
(204, 11, '2019-03-11 13:42:57'),
(205, 11, '2019-03-12 18:11:31'),
(206, 11, '2019-03-13 19:09:52'),
(207, 11, '2019-03-13 21:27:41'),
(208, 11, '2019-03-15 16:24:56'),
(209, 11, '2019-03-15 16:31:06'),
(210, 11, '2019-03-15 22:37:17'),
(211, 11, '2019-03-16 01:04:36'),
(212, 11, '2019-03-16 01:05:09'),
(213, 11, '2019-03-16 01:10:21'),
(214, 11, '2019-03-16 01:10:23'),
(215, 11, '2019-03-16 01:10:24'),
(216, 11, '2019-03-16 01:10:54'),
(217, 11, '2019-03-16 01:28:22'),
(218, 11, '2019-03-16 13:34:52'),
(219, 11, '2019-03-16 14:12:38'),
(220, 11, '2019-03-16 14:40:47'),
(221, 11, '2019-03-16 15:11:34'),
(222, 11, '2019-03-16 17:17:59'),
(223, 11, '2019-03-16 17:53:55'),
(224, 11, '2019-03-16 18:01:28'),
(225, 11, '2019-03-16 19:03:00'),
(226, 11, '2019-03-17 17:23:14'),
(227, 11, '2019-03-18 21:00:39'),
(228, 11, '2019-03-19 09:26:34'),
(229, 11, '2019-03-19 19:43:31'),
(230, 11, '2019-03-20 07:50:28'),
(231, 11, '2019-03-20 09:11:19'),
(232, 11, '2019-03-20 20:25:07'),
(233, 11, '2019-03-21 20:12:47'),
(234, 11, '2019-03-22 12:07:33'),
(235, 11, '2019-04-05 03:31:08'),
(236, 11, '2019-04-05 03:58:01'),
(237, 11, '2019-04-05 04:36:50'),
(238, 11, '2019-04-05 06:36:14'),
(239, 11, '2019-04-05 12:13:02'),
(240, 11, '2019-04-06 01:31:01'),
(241, 11, '2019-04-06 05:03:02'),
(242, 11, '2019-04-06 05:25:17'),
(243, 11, '2019-04-07 02:01:17'),
(244, 11, '2019-04-07 21:21:43'),
(245, 11, '2019-04-07 23:39:07'),
(246, 11, '2019-04-08 06:02:37'),
(247, 11, '2019-04-08 06:49:13'),
(248, 11, '2019-04-08 09:36:40'),
(249, 11, '2019-04-09 01:57:52'),
(250, 11, '2019-04-09 20:18:43'),
(251, 11, '2019-04-10 01:48:06'),
(252, 11, '2019-04-10 13:56:17'),
(253, 11, '2019-04-11 15:45:32'),
(254, 11, '2019-04-12 00:35:41'),
(255, 11, '2019-04-12 03:54:09'),
(256, 11, '2019-04-13 04:24:37'),
(257, 11, '2019-04-14 18:58:42'),
(258, 11, '2019-04-14 21:10:18'),
(259, 11, '2019-04-15 00:45:46'),
(260, 11, '2019-04-15 23:36:31'),
(261, 11, '2019-04-16 00:20:30'),
(262, 11, '2019-04-16 03:34:37'),
(263, 11, '2019-04-17 23:52:08'),
(264, 11, '2019-04-18 22:35:33'),
(265, 11, '2019-04-19 04:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id`, `kode`, `nama`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `nikah`
--

CREATE TABLE `nikah` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nikah`
--

INSERT INTO `nikah` (`id`, `nama`) VALUES
(1, 'Kawin'),
(2, 'Tidak kawin'),
(3, 'Cerai');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `nama`) VALUES
(1, 'PNS'),
(2, 'Swasta'),
(3, 'Petani'),
(4, 'Nelayan'),
(5, 'Peternak'),
(6, 'Wiraswasta'),
(7, 'Siswa/Mahasiswa'),
(8, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `id` int(11) NOT NULL,
  `nomor` varchar(45) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `id_nikah` int(11) DEFAULT NULL,
  `id_pekerjaan` int(11) DEFAULT NULL,
  `id_negara` int(11) DEFAULT NULL,
  `nomor_splp` varchar(200) DEFAULT NULL,
  `keluaran_splp` varchar(200) DEFAULT NULL,
  `tgl_terbit_splp` date DEFAULT NULL,
  `tgl_habis_splp` date DEFAULT NULL,
  `id_jenis_bap` int(11) NOT NULL,
  `nomor_surat` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `tgl_penetapan` date DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`id`, `nomor`, `nama`, `nik`, `jk`, `id_kota`, `tanggal_lahir`, `alamat`, `id_agama`, `id_nikah`, `id_pekerjaan`, `id_negara`, `nomor_splp`, `keluaran_splp`, `tgl_terbit_splp`, `tgl_habis_splp`, `id_jenis_bap`, `nomor_surat`, `keterangan`, `tgl_penetapan`, `created_date`) VALUES
(17, NULL, 'Sheira Amarta Putri', 'NIK 1', 'L', 225, '2018-09-07', 'Alamat 1', 3, 3, 8, 101, 'splp 1', 'keluaran 1', '2018-09-07', '2018-09-07', 1, 'nomor 1', 'laporan kehilangan 1', '2018-09-07', '2018-09-07 21:54:48'),
(18, NULL, 'Nella Pipinda', 'nik 2', 'P', 73, '2018-09-01', 'alamat 2', 2, 1, 4, 96, 'splp 2', 'keluaran 2', '2018-09-02', '2018-09-02', 1, 'nomor 22', 'penetapan 22', '2018-09-27', '2018-09-08 00:21:01'),
(19, NULL, 'Devara Putri', 'gokong', 'L', 125, '2018-09-04', 'goking', 1, 3, 8, 1, '', '', '2018-11-22', '0000-00-00', 1, '', '', '0000-00-00', '2018-09-13 11:59:00'),
(20, NULL, 'Kotaro', '889', 'P', 495, '2019-03-14', 'Jerman', 1, 1, 2, 110, '888888', 'Pemalang', '2019-03-01', '2019-03-31', 4, '-', 'Okinawa', '2019-03-04', '2019-03-15 16:33:11'),
(21, NULL, 'Minami', 'mmm', 'L', 7, '2019-04-09', '8889', 1, 3, 8, 1, '===', '===', '2019-04-13', '2019-04-24', 1, '00', '00', '2019-04-01', '2019-04-06 02:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `golongan` varchar(100) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `nip`, `jabatan`, `pangkat`, `golongan`, `created_date`) VALUES
(2, 'Via Vallentino', '0000', '-', '-', NULL, '2018-09-07 09:29:51'),
(3, 'Junaedi, S.Pd', '1256', '-', '-', NULL, '2018-09-07 09:55:34'),
(4, 'Kaku', 'kaku', 'Toshi', 'toshi', NULL, '2018-09-07 11:40:41'),
(5, 'Red Racer', '0011', '888', '888', '777', '2018-10-25 10:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `proses_bap`
--

CREATE TABLE `proses_bap` (
  `id` int(11) NOT NULL,
  `tanggal_proses_bap` date NOT NULL,
  `id_jadwal_bap` int(11) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proses_bap`
--

INSERT INTO `proses_bap` (`id`, `tanggal_proses_bap`, `id_jadwal_bap`, `keterangan`, `created_date`) VALUES
(17, '2019-04-01', 3, 'jkkj ', '2019-04-07 08:56:46'),
(18, '2001-09-08', 6, '', '2019-04-08 04:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `proses_bapen`
--

CREATE TABLE `proses_bapen` (
  `id` int(11) NOT NULL,
  `id_proses_bap` int(11) NOT NULL,
  `flag` char(1) NOT NULL,
  `alasan` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nama`, `foto`, `created_date`) VALUES
(1, 'prima', 'parmi24@gmail.com', '652001043', 'prima', '', '2018-08-30 08:58:30'),
(2, 'Nella', 'nella@gmail.com', '111', 'pipinda', '', '2018-08-30 09:05:08'),
(3, 'ryu', 'ryu@gmail.com', '111', 'ryu', '', '2018-08-30 09:20:19'),
(4, 'lin', 'lin@gmail.com', '$2y$10$WxSQec4xMdxffR71kwgZv.aBcv1XMEeKitOFN1D/NF3FRUZse.sIm', 'Lin Shekai', '', '2018-08-30 10:02:55'),
(5, 'lon', 'lok@gmail.com', '$2y$10$LFznZTuZHV8oxJtDhrUUgOCrc2IxABGswIfQO3xSrsR9p6RdQegQ6', 'Shen Lon', '', '2018-09-04 02:35:42'),
(8, 'dai', 'dai@gh.com', '$2y$10$CNJ7PrgBHc7IYM8nDj41QulTUX0mK1prSdGOwTue8VwoCAEoO.4AG', 'Dairanger', '', '2018-09-05 09:27:49'),
(9, 'Yo Ayo', 'delonteguh@gmail.com', '', 'Yo Ayo', '', '2018-09-05 12:16:14'),
(11, 'test', 'tes@tes.com', '$2y$10$TbVFWA3qhG/INfLBtAolROPLmZbE8ElfbOhyQ/wpXbt/gJxgmiCpu', 'Tes Aplikasi', '', '2018-09-16 00:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `video_bap`
--

CREATE TABLE `video_bap` (
  `id` int(11) NOT NULL,
  `id_proses_bap` int(11) NOT NULL,
  `nama_file` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_bap`
--

INSERT INTO `video_bap` (`id`, `id_proses_bap`, `nama_file`, `created_date`) VALUES
(18, 7, 'Live201892-8yqu1jedp38m1tfn76n.webm', '2018-10-02 11:08:24'),
(19, 13, '1552696914.MP4', '2019-03-16 00:41:53'),
(20, 17, '1554627435.mp4', '2019-04-07 08:57:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulir_bap`
--
ALTER TABLE `formulir_bap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_form_id_proses` (`id_proses_bap`);

--
-- Indexes for table `formulir_bapen`
--
ALTER TABLE `formulir_bapen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulir_sk`
--
ALTER TABLE `formulir_sk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_bap`
--
ALTER TABLE `foto_bap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proses_bap` (`id_proses_bap`);

--
-- Indexes for table `jadwal_bap`
--
ALTER TABLE `jadwal_bap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pemohon` (`id_pemohon`),
  ADD KEY `fk_id_petugas` (`id_petugas`);

--
-- Indexes for table `jenis_bap`
--
ALTER TABLE `jenis_bap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_sk`
--
ALTER TABLE `jenis_sk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nikah`
--
ALTER TABLE `nikah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_agama` (`id_agama`),
  ADD KEY `fk_nikah` (`id_nikah`),
  ADD KEY `fk_pekerjaan` (`id_pekerjaan`),
  ADD KEY `fk_negara` (`id_negara`),
  ADD KEY `fk_kota` (`id_kota`),
  ADD KEY `fk_jenis_bap` (`id_jenis_bap`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proses_bap`
--
ALTER TABLE `proses_bap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_jadwal_bap` (`id_jadwal_bap`);

--
-- Indexes for table `proses_bapen`
--
ALTER TABLE `proses_bapen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_bap`
--
ALTER TABLE `video_bap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_proses_bap` (`id_proses_bap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `formulir_bap`
--
ALTER TABLE `formulir_bap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formulir_bapen`
--
ALTER TABLE `formulir_bapen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `formulir_sk`
--
ALTER TABLE `formulir_sk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foto_bap`
--
ALTER TABLE `foto_bap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jadwal_bap`
--
ALTER TABLE `jadwal_bap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_bap`
--
ALTER TABLE `jenis_bap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_sk`
--
ALTER TABLE `jenis_sk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `nikah`
--
ALTER TABLE `nikah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proses_bap`
--
ALTER TABLE `proses_bap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proses_bapen`
--
ALTER TABLE `proses_bapen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `video_bap`
--
ALTER TABLE `video_bap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formulir_bap`
--
ALTER TABLE `formulir_bap`
  ADD CONSTRAINT `fk_form_id_proses` FOREIGN KEY (`id_proses_bap`) REFERENCES `proses_bap` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `foto_bap`
--
ALTER TABLE `foto_bap`
  ADD CONSTRAINT `fk_proses_bap` FOREIGN KEY (`id_proses_bap`) REFERENCES `proses_bap` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_bap`
--
ALTER TABLE `jadwal_bap`
  ADD CONSTRAINT `fk_id_pemohon` FOREIGN KEY (`id_pemohon`) REFERENCES `pemohon` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD CONSTRAINT `fk_agama` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jenis_bap` FOREIGN KEY (`id_jenis_bap`) REFERENCES `jenis_bap` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kota` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_negara` FOREIGN KEY (`id_negara`) REFERENCES `negara` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nikah` FOREIGN KEY (`id_nikah`) REFERENCES `nikah` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pekerjaan` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `proses_bap`
--
ALTER TABLE `proses_bap`
  ADD CONSTRAINT `fk_id_jadwal_bap` FOREIGN KEY (`id_jadwal_bap`) REFERENCES `jadwal_bap` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `video_bap`
--
ALTER TABLE `video_bap`
  ADD CONSTRAINT `fk_id_proses_bap` FOREIGN KEY (`id_proses_bap`) REFERENCES `proses_bap` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
