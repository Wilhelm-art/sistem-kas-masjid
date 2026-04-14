-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2025 pada 01.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_masjid_attijaniyah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cashbooks`
--

CREATE TABLE `cashbooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `starting_balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cashbooks`
--

INSERT INTO `cashbooks` (`id`, `name`, `description`, `starting_balance`, `created_at`, `updated_at`) VALUES
(8, 'Kas Utama Masjid', 'Dana operasional utama dan infak umum dari jemaah', 5000000.00, '2025-08-11 19:19:37', '2025-08-11 19:19:37'),
(9, 'Kas Zakat & Sosial', 'Dana khusus untuk penerimaan dan penyaluran Zakat, Infak, dan Sedekah (ZIS)', 2500000.00, '2025-08-11 19:19:53', '2025-08-11 19:19:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cashbook_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('pemasukan','pengeluaran') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `cashbook_id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(17, 8, 'Kotak Amal Jumat', 'pemasukan', '2025-08-11 19:20:29', '2025-08-11 19:20:29'),
(18, 8, 'Sumbangan Pembangunan', 'pemasukan', '2025-08-11 19:20:41', '2025-08-11 19:20:41'),
(19, 8, 'Biaya Listrik & Air', 'pengeluaran', '2025-08-11 19:20:59', '2025-08-11 19:20:59'),
(20, 8, 'Biaya Kebersihan', 'pengeluaran', '2025-08-11 19:21:11', '2025-08-11 19:21:11'),
(21, 8, 'Honor Penceramah', 'pengeluaran', '2025-08-11 19:21:22', '2025-08-11 19:21:22'),
(22, 9, 'Penerimaan Zakat Maal', 'pemasukan', '2025-08-11 19:21:37', '2025-08-11 19:21:37'),
(23, 9, 'Penyaluran Fakir Miskin', 'pengeluaran', '2025-08-11 19:21:47', '2025-08-11 19:21:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donor_name` varchar(255) NOT NULL DEFAULT 'Hamba Allah',
  `amount` decimal(15,2) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'non-tunai',
  `note` text DEFAULT NULL,
  `proof` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `donations`
--

INSERT INTO `donations` (`id`, `donor_name`, `amount`, `type`, `note`, `proof`, `date`, `created_at`, `updated_at`) VALUES
(4, 'Hamba Allah', 250000.00, 'tunai', 'Untuk Pembangunan TPA', 'proofs/RrpDAYHjgYHmIN98Cr35xVSGEogjugyDRgyIRcCi.jpg', '2025-08-12', '2025-08-11 19:24:29', '2025-08-29 07:36:56'),
(6, 'Hamba Allah', 5000.00, 'non-tunai', NULL, NULL, '2025-09-02', '2025-09-01 05:06:33', '2025-09-01 05:06:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_14_031653_create_cashbooks_table', 1),
(6, '2025_07_14_031708_create_categories_table', 1),
(7, '2025_07_14_031735_create_transactions_table', 1),
(8, '2025_07_14_031747_create_schedules_table', 1),
(9, '2025_07_15_052117_create_donations_table', 2),
(10, '2025_08_29_114133_add_type_and_proof_to_donations_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `speaker_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `type` enum('khatib_jumat','pengajian_rutin') NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schedules`
--

INSERT INTO `schedules` (`id`, `title`, `speaker_name`, `date`, `time`, `type`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Jumatan', 'AA Gym', '2025-08-29', '12:00:00', 'khatib_jumat', NULL, '2025-08-27 01:04:05', '2025-08-27 01:04:05'),
(8, 'Idul Fitri', 'AA Gym', '2025-09-17', '07:00:00', 'khatib_jumat', 'Teladan nabi muhammad', '2025-09-01 05:04:40', '2025-09-01 05:04:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cashbook_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `type` enum('pemasukan','pengeluaran') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `cashbook_id`, `category_id`, `date`, `description`, `amount`, `type`, `created_at`, `updated_at`) VALUES
(8, 8, 17, '2025-07-08', 'Penerimaan Kotak Amal Jumat Pekan ke-2', 1750000.00, 'pemasukan', '2025-08-11 19:23:03', '2025-08-11 19:23:03'),
(9, 8, 19, '2025-08-05', 'Pembayaran Tagihan Listrik Agustus', 350000.00, 'pengeluaran', '2025-08-11 19:23:37', '2025-08-11 19:23:37'),
(10, 9, 22, '2025-08-10', 'Penerimaan Zakat Maal dari Bapak Abdullah', 2500000.00, 'pemasukan', '2025-08-11 19:24:05', '2025-08-11 19:24:05'),
(12, 8, 17, '2025-09-05', 'hari jumat pekan 1', 100000.00, 'pemasukan', '2025-09-01 05:00:54', '2025-09-01 05:00:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Masjid', 'admin@attijaniyah.com', NULL, '$2y$12$FJLdMyWpRWXOHIDaDkTPUOI6LvMZbU/91GTAzgAqjFki/UlDyFS3y', 'Y7pLyu1DDtc6w2FxW9h3twfZvlidsEHMKZKwbAILAenyZgPSkMTz1btFzXQy', '2025-07-13 20:36:50', '2025-08-29 05:05:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cashbooks`
--
ALTER TABLE `cashbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_cashbook_id_foreign` (`cashbook_id`);

--
-- Indeks untuk tabel `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_cashbook_id_foreign` (`cashbook_id`),
  ADD KEY `transactions_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cashbooks`
--
ALTER TABLE `cashbooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_cashbook_id_foreign` FOREIGN KEY (`cashbook_id`) REFERENCES `cashbooks` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_cashbook_id_foreign` FOREIGN KEY (`cashbook_id`) REFERENCES `cashbooks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
