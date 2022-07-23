CREATE TABLE `userdata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `technologies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `localisation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',

  `likes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
