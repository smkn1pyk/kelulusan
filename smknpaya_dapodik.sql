-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2023 at 02:32 PM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smknpaya_dapodik`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_rombel`
--

CREATE TABLE `anggota_rombel` (
  `id` int(11) NOT NULL,
  `rombongan_belajar_id` varchar(255) NOT NULL,
  `anggota_rombel_id` varchar(255) DEFAULT NULL,
  `peserta_didik_id` varchar(255) DEFAULT NULL,
  `jenis_pendaftaran_id` varchar(255) DEFAULT NULL,
  `jenis_pendaftaran_id_str` varchar(255) DEFAULT NULL,
  `semester_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_lulusan`
--

CREATE TABLE `data_lulusan` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `peserta_didik_id` varchar(255) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `getgtk`
--

CREATE TABLE `getgtk` (
  `id` int(11) NOT NULL,
  `tahun_ajaran_id` varchar(255) DEFAULT NULL,
  `ptk_terdaftar_id` varchar(255) DEFAULT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `ptk_induk` varchar(255) DEFAULT NULL,
  `tanggal_surat_tugas` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `agama_id` varchar(255) DEFAULT NULL,
  `agama_id_str` varchar(255) DEFAULT NULL,
  `nuptk` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `jenis_ptk_id` varchar(255) DEFAULT NULL,
  `jenis_ptk_id_str` varchar(255) DEFAULT NULL,
  `status_kepegawaian_id` varchar(255) DEFAULT NULL,
  `status_kepegawaian_id_str` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) DEFAULT NULL,
  `bidang_studi_terakhir` varchar(255) DEFAULT NULL,
  `pangkat_golongan_terakhir` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `getpengguna`
--

CREATE TABLE `getpengguna` (
  `id` int(11) NOT NULL,
  `pengguna_id` varchar(255) NOT NULL,
  `sekolah_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `peran_id_str` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `peserta_didik_id` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `getpesertadidik`
--

CREATE TABLE `getpesertadidik` (
  `id` int(11) NOT NULL,
  `registrasi_id` text DEFAULT NULL,
  `jenis_pendaftaran_id` text DEFAULT NULL,
  `jenis_pendaftaran_id_str` text DEFAULT NULL,
  `nipd` text DEFAULT NULL,
  `tanggal_masuk_sekolah` text DEFAULT NULL,
  `sekolah_asal` text DEFAULT NULL,
  `peserta_didik_id` text DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `nisn` text DEFAULT NULL,
  `jenis_kelamin` text DEFAULT NULL,
  `nik` text DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` text DEFAULT NULL,
  `agama_id` text DEFAULT NULL,
  `agama_id_str` text DEFAULT NULL,
  `alamat_jalan` text DEFAULT NULL,
  `nomor_telepon_rumah` text DEFAULT NULL,
  `nomor_telepon_seluler` text DEFAULT NULL,
  `nama_ayah` text DEFAULT NULL,
  `pekerjaan_ayah_id` text DEFAULT NULL,
  `pekerjaan_ayah_id_str` text DEFAULT NULL,
  `nama_ibu` text DEFAULT NULL,
  `pekerjaan_ibu_id` text DEFAULT NULL,
  `pekerjaan_ibu_id_str` text DEFAULT NULL,
  `nama_wali` text DEFAULT NULL,
  `pekerjaan_wali_id` text DEFAULT NULL,
  `pekerjaan_wali_id_str` text DEFAULT NULL,
  `tinggi_badan` text DEFAULT NULL,
  `berat_badan` text DEFAULT NULL,
  `semester_id` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `anggota_rombel_id` text DEFAULT NULL,
  `rombongan_belajar_id` text DEFAULT NULL,
  `tingkat_pendidikan_id` text DEFAULT NULL,
  `nama_rombel` text DEFAULT NULL,
  `kurikulum_id` text DEFAULT NULL,
  `kurikulum_id_str` text DEFAULT NULL,
  `anak_keberapa` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `Alamat` text NOT NULL,
  `Dusun` text NOT NULL,
  `RW` text NOT NULL,
  `RT` text NOT NULL,
  `Kelurahan` text NOT NULL,
  `Kecamatan` text NOT NULL,
  `Kode_Pos` text NOT NULL,
  `Jenis_Tinggal` text NOT NULL,
  `Alat_Transportasi` text NOT NULL,
  `SKHUN` text NOT NULL,
  `Penerima_KPS` text NOT NULL,
  `No_KPS` text NOT NULL,
  `Tahun_Lahir_Ayah` text NOT NULL,
  `Jenjang_Pendidikan_Ayah` text NOT NULL,
  `Penghasilan_Ayah` text NOT NULL,
  `NIK_Ayah` text NOT NULL,
  `Tahun_Lahir_Ibu` text NOT NULL,
  `Jenjang_Pendidikan_Ibu` text NOT NULL,
  `Penghasilan_Ibu` text NOT NULL,
  `NIK_Ibu` text NOT NULL,
  `Tahun_Lahir_Wali` text NOT NULL,
  `Jenjang_Pendidikan_Wali` text NOT NULL,
  `Penghasilan_Wali` text NOT NULL,
  `NIK_Wali` text NOT NULL,
  `No_Peserta_Ujian_Nasional` text NOT NULL,
  `No_Seri_Ijazah` text NOT NULL,
  `Penerima_KIP` text NOT NULL,
  `Nomor_KIP` text NOT NULL,
  `Nama_di_KIP` text NOT NULL,
  `Nomor_KKS` text NOT NULL,
  `No_Registrasi_Akta_Lahir` text NOT NULL,
  `Bank` text NOT NULL,
  `Nomor_Rekening_Bank` text NOT NULL,
  `Rekening_Atas_Nama` text NOT NULL,
  `Layak_PIP_usulan_dari_sekolah` text NOT NULL,
  `Alasan_Layak_PIP` text NOT NULL,
  `Kebutuhan_Khusus` text NOT NULL,
  `lintang` text NOT NULL,
  `bujur` text NOT NULL,
  `no_kk` text NOT NULL,
  `lingkar_kepala` text NOT NULL,
  `jml_saudara` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `getrombonganbelajar`
--

CREATE TABLE `getrombonganbelajar` (
  `id` int(11) NOT NULL,
  `rombongan_belajar_id` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tingkat_pendidikan_id` varchar(255) DEFAULT NULL,
  `semester_id` varchar(255) DEFAULT NULL,
  `jenis_rombel` varchar(255) DEFAULT NULL,
  `kurikulum_id` varchar(255) DEFAULT NULL,
  `kurikulum_id_str` varchar(255) DEFAULT NULL,
  `id_ruang` varchar(255) DEFAULT NULL,
  `id_ruang_str` varchar(255) DEFAULT NULL,
  `moving_class` varchar(255) DEFAULT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `ptk_id_str` varchar(255) DEFAULT NULL,
  `jenis_rombel_str` varchar(255) DEFAULT NULL,
  `jurusan_id` varchar(255) DEFAULT NULL,
  `jurusan_id_str` varchar(255) DEFAULT NULL,
  `npsn` varchar(255) DEFAULT NULL,
  `tingkat_pendidikan_id_str` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `getsekolah`
--

CREATE TABLE `getsekolah` (
  `id` int(11) NOT NULL,
  `sekolah_id` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nss` varchar(255) DEFAULT NULL,
  `npsn` varchar(255) DEFAULT NULL,
  `bentuk_pendidikan_id` varchar(255) DEFAULT NULL,
  `bentuk_pendidikan_id_str` varchar(255) DEFAULT NULL,
  `status_sekolah` varchar(255) DEFAULT NULL,
  `status_sekolah_str` varchar(255) DEFAULT NULL,
  `alamat_jalan` varchar(255) DEFAULT NULL,
  `rt` varchar(255) DEFAULT NULL,
  `rw` varchar(255) DEFAULT NULL,
  `kode_wilayah` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `nomor_fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `is_sks` varchar(255) DEFAULT NULL,
  `lintang` varchar(255) DEFAULT NULL,
  `bujur` varchar(255) DEFAULT NULL,
  `dusun` varchar(255) DEFAULT NULL,
  `desa_kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten_kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lulusan`
--

CREATE TABLE `lulusan` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `nomor_surat_keputusan` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_keputusan` date NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelajaran`
--

CREATE TABLE `pembelajaran` (
  `id` int(11) NOT NULL,
  `rombongan_belajar_id` varchar(255) DEFAULT NULL,
  `pembelajaran_id` varchar(255) DEFAULT NULL,
  `mata_pelajaran_id` varchar(255) DEFAULT NULL,
  `mata_pelajaran_id_str` varchar(255) DEFAULT NULL,
  `ptk_terdaftar_id` varchar(255) DEFAULT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `nama_mata_pelajaran` varchar(255) DEFAULT NULL,
  `induk_pembelajaran_id` varchar(255) DEFAULT NULL,
  `jam_mengajar_per_minggu` varchar(255) DEFAULT NULL,
  `status_di_kurikulum` varchar(255) DEFAULT NULL,
  `status_di_kurikulum_str` varchar(255) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rwy_kepangkatan`
--

CREATE TABLE `rwy_kepangkatan` (
  `id` int(11) NOT NULL,
  `ptk_id` varchar(255) NOT NULL,
  `riwayat_kepangkatan_id` varchar(255) NOT NULL,
  `nomor_sk` varchar(255) NOT NULL,
  `tanggal_sk` varchar(255) NOT NULL,
  `tmt_pangkat` varchar(255) NOT NULL,
  `masa_kerja_gol_tahun` varchar(255) NOT NULL,
  `masa_kerja_gol_bulan` varchar(255) NOT NULL,
  `pangkat_golongan_id_str` varchar(255) NOT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rwy_pend_formal`
--

CREATE TABLE `rwy_pend_formal` (
  `id` int(11) NOT NULL,
  `ptk_id` varchar(255) DEFAULT NULL,
  `riwayat_pendidikan_formal_id` varchar(255) DEFAULT NULL,
  `satuan_pendidikan_formal` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `kependidikan` varchar(255) DEFAULT NULL,
  `tahun_masuk` varchar(255) DEFAULT NULL,
  `tahun_lulus` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `status_kuliah` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `ipk` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `id_reg_pd` varchar(255) DEFAULT NULL,
  `bidang_studi_id_str` varchar(255) DEFAULT NULL,
  `jenjang_pendidikan_id_str` varchar(255) DEFAULT NULL,
  `gelar_akademik_id_str` varchar(255) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verval_alamat`
--

CREATE TABLE `verval_alamat` (
  `id` int(11) NOT NULL,
  `uniq` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota_kabupaten` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `desa_kelurahan` varchar(255) NOT NULL,
  `peserta_didik_id` varchar(255) NOT NULL,
  `tgl_update` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_rombel`
--
ALTER TABLE `anggota_rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_lulusan`
--
ALTER TABLE `data_lulusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getgtk`
--
ALTER TABLE `getgtk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getpengguna`
--
ALTER TABLE `getpengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getpesertadidik`
--
ALTER TABLE `getpesertadidik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getrombonganbelajar`
--
ALTER TABLE `getrombonganbelajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getsekolah`
--
ALTER TABLE `getsekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lulusan`
--
ALTER TABLE `lulusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rwy_kepangkatan`
--
ALTER TABLE `rwy_kepangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rwy_pend_formal`
--
ALTER TABLE `rwy_pend_formal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verval_alamat`
--
ALTER TABLE `verval_alamat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_rombel`
--
ALTER TABLE `anggota_rombel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_lulusan`
--
ALTER TABLE `data_lulusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `getgtk`
--
ALTER TABLE `getgtk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `getpengguna`
--
ALTER TABLE `getpengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `getpesertadidik`
--
ALTER TABLE `getpesertadidik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `getrombonganbelajar`
--
ALTER TABLE `getrombonganbelajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `getsekolah`
--
ALTER TABLE `getsekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lulusan`
--
ALTER TABLE `lulusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelajaran`
--
ALTER TABLE `pembelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rwy_kepangkatan`
--
ALTER TABLE `rwy_kepangkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rwy_pend_formal`
--
ALTER TABLE `rwy_pend_formal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verval_alamat`
--
ALTER TABLE `verval_alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
