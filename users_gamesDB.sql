-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-07-24 21:41:29
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `games`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite_game`
--

CREATE TABLE `favorite_game` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `favorite_game`
--

INSERT INTO `favorite_game` (`id`, `game_id`, `user_id`) VALUES
(6, 45, 6),
(16, 45, 13),
(19, 44, 6),
(23, 44, 4),
(30, 48, 4),
(31, 50, 4),
(32, 49, 4),
(33, 46, 4),
(34, 60, 4),
(35, 45, 4);

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite_user`
--

CREATE TABLE `favorite_user` (
  `id` int(11) NOT NULL,
  `made_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `favorite_user`
--

INSERT INTO `favorite_user` (`id`, `made_name`, `user_id`) VALUES
(14, 'チラズアート', 4),
(15, 'カプコン', 4);

-- --------------------------------------------------------

--
-- テーブルの構造 `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `game_name` varchar(50) NOT NULL,
  `made_name` varchar(50) NOT NULL,
  `category` varchar(11) NOT NULL,
  `play_time` varchar(11) NOT NULL,
  `system` varchar(255) NOT NULL,
  `spec` varchar(255) NOT NULL,
  `story` varchar(255) NOT NULL,
  `sale` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `c_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `game`
--

INSERT INTO `game` (`id`, `game_name`, `made_name`, `category`, `play_time`, `system`, `spec`, `story`, `sale`, `file_path`, `c_date`) VALUES
(44, 'モンスターハンターワールド', 'カプコン', 'アドベンチャー', '指定なし', 'キーボード、Xbox 360 コントローラー、Xbox One コントローラー', 'OS	WINDOWS® 7, 8, 8.1, 10 (64-BIT 必須)\r\nプロセッサー	Intel® Core™ i7 3770 3.4GHz or Intel® Core™ i3 8350 4GHz or AMD Ryzen™ 5 1500X\r\nメモリー	8GB RAM\r\nストレージ	20GB以上の空きが必要\r\nグラフィック	NVIDIA® GeForce® GTX 1060（VRAM 3GB) or AMD Radeon™ RX 570 (VRAM 4GB)\r\nDirectX	Version 11', 'ひと狩り行こうぜ！！！！！！！！！', 'https://www.capcom.co.jp/monsterhunter/world/pc/', '/img/game_img/60cca030131f4.png', '2021-06-22 02:22:32'),
(45, 'バイオハザード初代', 'カプコン', 'ホラー', '1時間～2時間', 'キーボード、Xbox 360 コントローラー、Xbox One コントローラー', '・OS：\r\n（必須）Windows 7 SP1 / Windows 8.1\r\n（推奨）Windows 7 SP1 / Windows 8.1\r\n\r\n・CPU：\r\n（必須）Intel Core 2 Duo 2.4 GHz 以上 / AMD Athlon X2 2.8 GHz 以上\r\n（推奨）Intel Core 2 Quad 2.7 GHz 以上 / AMD Phenom II X4 3.0 GHz 以上\r\n\r\n・メモリ：\r\n（必須）2GB RAM\r\n（推奨）4GB RAM\r\n\r\n・モニタ：\r\n（必須）10', '1998年夏、アメリカ中西部の地方都市ラクーンシティの郊外で、孤立した民家が10人前後のグループに襲われ、住民が食い殺されるという猟奇的殺人事件が発生した。その異常性にも反して犯人は特定されず捜査は難航。その後も犠牲者が続出したことで、事態を重く見たラクーン市警は特殊作戦部隊S.T.A.R.S.（スターズ）に出動を要請する。7月23日の夜、同部隊のブラヴォーチームが街郊外のアークレイ山地にヘリで捜査に向かったが、その後通信が途絶え、チームは行方不明となってしまう。', 'https://www.capcom.co.jp/biohazard/1/', '/img/game_img/60cca132a882a.png', '2021-06-18 22:35:46'),
(46, 'バイオハザードヴィレッジ', 'カプコン', 'ホラー', '1時間～2時間', 'キーボード、Xbox 360 コントローラー、Xbox One コントローラー', '【推奨環境（レイトレーシングなし）】\r\n64 ビットプロセッサとオペレーティングシステムが必要です\r\n\r\nOS: Windows 10 (64bit必須)\r\nプロセッサー: AMD Ryzen 5 3600 ／ Intel Core i7 8700\r\nメモリー: 16GB RAM\r\nグラフィック: AMD Radeon RX 5700 ／ NVIDIA GeForce GTX 1070\r\n\r\n※グラフィックカードはオンボードでの動作は保証対象外となります。また、VRAMがメインメモリと共有になる場合の動作', 'ベイカー家での悪夢から約3年半後の、2021年2月。イーサン・ウィンターズと妻のミアはBSAAの指示でヨーロッパに渡り、生まれたばかりの娘ローズマリーを育てながら新しい生活を始めていた。だが、ある夜にクリス・レッドフィールド率いる部隊が彼らの家を襲撃。クリスはミアを殺害し、イーサンとローズマリーは捕えられてしまう。その後、事故を起こした輸送車の側で意識を取り戻したイーサンは、山中の暗い雪道を進み、近くの村に迷い込む。その村は、「ライカン」と呼ばれる狂暴な獣人達に襲われていた。', 'https://www.capcom.co.jp/biohazard/village/', '/img/game_img/60cca1a93be9d.jpg', '2021-06-18 22:37:45'),
(47, '終焉介護', 'チラズアート', 'ホラー', '1時間～2時間', 'キーボード', '最低:\r\nOS: Windows 7 SP1+ x64\r\nプロセッサー: Intel/Amd\r\nメモリー: 4 GB RAM\r\nグラフィック: Nvidia/Amd\r\nDirectX: Version 11\r\nストレージ: 5 GB 利用可能\r\nサウンドカード: Yes\r\n追記事項: Wear headphones and play in the dark.\r\n\r\n推奨:\r\nOS: Windows 10 x64\r\nプロセッサー: Intel/Amd\r\nメモリー: 8 GB RAM\r\nグラフィック: Nvi', '終焉介護は、介護士に関する日本のホラーアドベンチャーゲームです。', 'https://store.steampowered.com/app/1503670/ ', '/img/game_img/60cdd50a4f75a.jpg', '2021-06-19 20:29:14'),
(48, '事故物件', 'チラズアート', 'ホラー', '1時間～2時間', 'キーボード・マウス', 'OS: Windows 7 SP1+\r\nプロセッサー: Intel/Amd\r\nメモリー: 4 GB RAM\r\nグラフィック: Integrated graphics\r\nストレージ: 2 GB 利用可能\r\nサウンドカード: Yes\r\n追記事項: Wear headphone', '事故物件とは、広義には不動産取引や賃貸借契約の対象となる土地・建物や、アパート・マンションなどのうち、その物件の本体部分もしくは共用部分のいずれかにおいて、何らかの原因で前居住者が死亡した経歴のあるものをいう。', 'https://store.steampowered.com/app/1162680/Stigmatized_Property/', '/img/game_img/60cdd5c30d1be.jpg', '2021-06-19 20:32:19'),
(49, '夜勤事件', 'チラズアート', 'ホラー', '1時間～2時間', 'キーボード・マウス', 'OS: Windows 7 SP1+\r\nプロセッサー: Intel/Amd\r\nメモリー: 4 GB RAM\r\nグラフィック: Nvidia/Amd\r\nDirectX: Version 11\r\nストレージ: 2 GB 利用可能\r\nサウンドカード: Yes\r\n追記事項: Wear headphone', '夜勤事件は、コンビニの夜勤で働く女子大生に関するJ-Horrorゲームです。', 'https://store.steampowered.com/app/1228520/The_Convenience_Store/', '/img/game_img/60cdd60667e67.jpg', '2021-06-19 20:33:26'),
(50, '行方不明', 'チラズアート', 'ホラー', '1時間～2時間', 'キーボード・マウス', 'OS: Windows 7 SP1+ x64\r\nプロセッサー: Intel/Amd\r\nメモリー: 4 GB RAM\r\nグラフィック: Nvidia/Amd\r\nストレージ: 3 GB 利用可能\r\nサウンドカード: Yes\r\n追記事項: Please wear headphones', 'Missing Children | 行方不明は、いじめ探偵として行方不明の子どもを探すゲームであり、和風ホラーをテーマにしたアドベンチャーゲームです。\r\n', 'https://store.steampowered.com/app/1306620/Missing_Children/', '/img/game_img/60cdd641c197f.jpg', '2021-06-19 20:34:25'),
(51, 'デビル メイ クライ 5', 'カプコン', 'RPG', '指定なし', 'キーボード、Xbox 360 コントローラー、Xbox One コントローラー', '最低:\r\nOS: WINDOWS® 7 / WINDOWS® 8.1 / WINDOWS® 10 (64-BIT必須)\r\nプロセッサー: Intel® Core™ i5-4460以上、AMD FX™-6300以上\r\nメモリー: 8 GB RAM\r\nグラフィック: NVIDIA® GeForce® GTX 760(2GB)/AMD Radeon™ R7 260x(2GB)以上\r\nDirectX: Version 11\r\nストレージ: 35 GB 利用可能\r\n追記事項: 本作はXinput対応コントローラーで', '最強の悪魔狩人（デビルハンター）が帰ってきた！アクションゲームファン待望、伝説のスタイリッシュアクション「デビル メイ クライ」が遂に復活！\r\n\r\nリアリティーを超える過剰現実感【オーバードーズド・リアリティ】。\r\n“最強”“革新”“王道”…三者三様のバトルスタイル。\r\n競い、魅せ合うネットワーククロスプレイ。\r\n\r\nアクションの快感全てがここに集う！', 'https://www.capcom.co.jp/devil5/', '/img/game_img/60cdd7a2218ff.png', '2021-06-19 20:40:18'),
(52, 'ロックマン クラシックス コレクション', 'カプコン', 'アドベンチャー', '1時間～2時間', 'キーボード、Xbox 360 コントローラー、Xbox One コントローラー', 'OS: Windows 7 Home 64-bit\r\nプロセッサー: Intel(R) Core(TM)2 CPU 6600 @ 2.40GHz (2 CPUs), ~2.4GHz\r\nメモリー: 1024 MB RAM\r\nグラフィック: ATI Radeon HD 4800 Series, Nvidia GeForce 8800GT 以上\r\nDirectX: Version 11\r\nストレージ: 379 MB 利用可能\r\n追記事項: Windows 7 Home 64-bit以外のOSは動作保証しておりま', 'ロックマン１から６までを忠実に移植。更にステージをリミックスした\r\nチャンレンジモードを追加！チャレンジモードでクリアタイムを更新し、\r\nリーダーボード上で自分のタイムやプレイスタイルを披露しよう！\r\nオリジナル版　開発当時に使用したスケッチやコンセプトアートなどを、\r\n閲覧するモードや、ゲーム内サウンドだけを堪能できるモードも搭載！', 'https://store.steampowered.com/app/363440/_/?l=japanese', '/img/game_img/60cdd7f709e7b.jpg', '2021-06-19 20:41:43'),
(55, '魔界村', 'カプコン', 'アドベンチャー', '指定なし', 'キーボード、Xbox 360 コントローラー、Xbox One コントローラー', '最低:\r\nOS: WINDOWS® 10 (64-BIT 必須)\r\nプロセッサー: Intel® Core™ i5-4460 または AMD FX™-6300以上\r\nメモリー: 4 GB RAM\r\nグラフィック: NVIDIA® GeForce® GTX 760 or AMD Radeon™ R7 260x with 2GB Video RAM\r\nDirectX: Version 11\r\nストレージ: 4 GB 利用可能\r\n追記事項: 想定動作は720P/60FPS。本作はXinput対応コントローラーで', 'プリンセスが魔界の使者にさらわれた!\r\n騎士アーサーよ、大魔王を倒しプリンセスを救い出せ!', 'https://store.steampowered.com/app/1556690/Capcom_Arcade_Stadium/', '/img/game_img/60d728a524ea8.jpg', '2021-06-26 22:16:21'),
(56, 'INSIDE', 'nintendo', 'RPG', '1時間～2時間', 'Nintendo Switch Proコントローラー', 'Nintendo Switch', '追われに追われて一人きり、少年はいつのまにか闇のプロジェクトの中枢に引きずり込まれていた。', 'https://store-jp.nintendo.com/list/software/70010000011738.html', '/img/game_img/60e45de157099.jpg', '2021-07-06 22:42:57'),
(57, 'Florence', 'nintendo', 'アドベンチャー', '30～1時間', 'Nintendo Switch Proコントローラー', 'Nintendo Switch', '25歳のフローレンス・ヨーは、行き詰まりを感じています。彼女の毎日は終わりのない仕事、睡眠、そしてソーシャルメディアに時間を喰われることの繰り返し。しかしある日、クリシュという名前のチェリストに出会い、それは彼女の世界観をガラリと塗り替えることになります。\r\n\r\nプレイヤーは、カスタムメイドのミニゲーム・エピソードを通して、フローレンスとクリシュの関係を、一鼓動づつ体験していきます。出会ったあとの誘惑から、訪れる衝突、お互いの成長を刺激し合い、やがてさまよう心…。実生活の一片を描写したグラフィック小説やウ', 'https://store-jp.nintendo.com/list/software/70010000027592.html', '/img/game_img/60e45e6e5d176.jpg', '2021-07-06 22:45:18'),
(58, 'ベア・ナックル4', 'nintendo', 'アドベンチャー', '1時間～2時間', 'キーボード、Xbox 360 コントローラー、Xbox One コントローラー', '64 ビットプロセッサとオペレーティングシステムが必要です\r\nOS: Windows 7+\r\nプロセッサー: Intel i5+\r\nメモリー: 8 GB RAM\r\nグラフィック: NVIDIA GTX 960 / Radeon HD 5750 or better\r\nストレージ: 10 GB 利用可能', '日本では『ベア・ナックル』のタイトルで知られる永遠の名作『Streets of Rage』は、その色あせることのないゲームプレイとエレクトロダンスに影響を受けた音楽で有名な格闘ゲーム三部作です。『Streets of Rage 4』は、新たなシステム、手描きの美しいビジュアル、ゴッドレベルのサウンドトラックを備えつつ、この名三部作をベースとして制作されています。\r\nそして彼らは再会する\r\n25年ぶりの続編となるStreets of Rage 4は、Axel、AdamやBlazeの華麗なカムバックで横スクロ', 'https://store.steampowered.com/app/985890/4/?l=japanese', '/img/game_img/60e45fd68e199.jpg', '2021-07-06 22:51:18'),
(59, 'SUPERHOT', 'nintendo', 'アドベンチャー', '1時間～2時間', 'キーボード、Xbox 360 コントローラー、Xbox One コントローラー', '最低:\r\nOS: Windows 7\r\nプロセッサー: Intel Core2Quad Q6600 2,40 GHz\r\nメモリー: 4 GB RAM\r\nグラフィック: GeForce GTX 650 (1024 MB Ram)\r\nストレージ: 4 GB 利用可能\r\n推奨:\r\nプロセッサー: Intel Core I5-4440 3,10 GHz\r\nメモリー: 8 GB RAM\r\nグラフィック: GeForce GTX 660 (2048 MB Ram)\r\nストレージ: 4 GB 利用可能', '『SUPERHOT』は、慎重な戦略と激しいアクションの両要素を持ったFPSゲーム。「自分が動くときだけ、時間が進む」、それが本作品の最大の特徴だ。ライフ回復や弾薬の補充などは一切ない。武装した赤いヤツらに立ち向かうのは、自分ひとりだけだ。スローモーションで迫り来る銃弾の嵐をよけながら、奪った武器でヤツらを倒せ！\r\n\r\n『SUPERHOT』は、独特かつスタイリッシュなグラフィックでFPSジャンルに新たな旋風を巻き起こした。洗練されたビジュアルによって、プレイヤーはもっとも重要な要素である「なめらかなゲームプ', 'https://store.steampowered.com/app/322500/SUPERHOT/?l=japanese', '/img/game_img/60e4605908aab.jpg', '2021-07-06 22:53:29'),
(60, 'Your Toy', 'nintendo', 'ホラー', '1時間～2時間', 'キーボード、Xbox 360 コントローラー、Xbox One コントローラー', '最低:\r\nOS: WINDOWS 7, 8, 8.1, 10\r\nプロセッサー: 3.0 GHz processor\r\nメモリー: 4 GB RAM\r\nストレージ: 1 GB 利用可能\r\n推奨:\r\nOS: WINDOWS 7, 8, 8.1, 10\r\nプロセッサー: 3.5 GHz processor\r\nメモリー: 4 GB RAM\r\nストレージ: 1 GB 利用可能', '「キミノオモチャ」は１人称の3D密室脱出ゲームです。\r\nあなたは子供の頃のオモチャを覚えていますか？\r\n\r\nもしあなたのオモチャが突然夢の中に現れ襲い掛かってきたとしたら？\r\n\r\nあなたは暗闇の中で目を覚まします。\r\n\r\n一つ一つ謎を解いていくと、そこが未知の深淵であることを知ります。\r\n存在しないはずの世界であなたを待っているのは…？\r\n夢と記憶の狭間で、忘れられたオモチャが蘇ります。', 'https://store.steampowered.com/app/760120/Your_Toy/?l=japanese', '/img/game_img/60e4614d2cffe.jpg', '2021-07-06 22:57:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `review` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `c_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `review`
--

INSERT INTO `review` (`id`, `game_id`, `name`, `review`, `url`, `c_date`) VALUES
(1, 44, 'くりす', 'a', 'https://www.youtube.com/watch?v=WBdn8YOQjz4&t=3s', '2021-06-19 22:35:36'),
(4, 45, 'レオン', 'やっぱりバイオは初代でしょ！クリアするまで実況してみた！', 'https://www.youtube.com/watch?v=daH6WpY5JE4', '2021-06-19 22:56:45'),
(5, 46, 'レオン', '衝撃のストーリー。映画を一本見ているようだった。\r\nぜひみんなもやってほしい作品。良作すぎる。', 'https://www.youtube.com/watch?v=AqIAwa2Kf2E', '2021-06-20 22:15:00'),
(6, 45, 'クリス', '初代はまじで最高。ナンバリングの中では縛りが多いけどそれもまたいい。\r\n何週でもやりたくなるね', NULL, '2021-06-21 22:07:24'),
(7, 45, 'クリス', '神ゲー', NULL, '2021-06-21 22:08:12'),
(9, 46, 'クリス', 'トラウマセットは注意', NULL, '2021-06-22 02:16:31'),
(11, 46, 'クリス', '良作過ぎる。', NULL, '2021-06-22 02:18:20'),
(12, 45, 'クリス', '最高の一言', NULL, '2021-06-22 16:42:58'),
(13, 45, 'クリス', '素晴らしい', NULL, '2021-06-22 16:44:17');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(11) DEFAULT NULL,
  `play_time` varchar(11) DEFAULT NULL,
  `type` varchar(11) NOT NULL,
  `channel` varchar(255) DEFAULT NULL,
  `c_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `category`, `play_time`, `type`, `channel`, `c_date`) VALUES
(4, 'test@test.co.jp', '$2y$10$6zMF6R8nHt2slnulrCh4LurGknshvlS3ZMXnpz0Nk.TwPDzjqaJG.', 'クリス', 'ホラー', '指定なし', '1', NULL, '2021-06-26 23:15:11'),
(5, 'test3@test.co.jp', '$2y$10$4j0srQIZmSW2mKmLCUYPs.XhKHXJKSUyldpOZEo2r8PamcoSxv6W6', 'クリス3', NULL, NULL, '3', NULL, '2021-06-12 22:19:34'),
(6, 'test2@test.co.jp', '$2y$10$jEvTS0oQlW.En9x.ybWcb.igzra56uhSmaLT6W8y9UCYeE6iW.WBW', 'くりす', 'アドベンチャー', '指定なし', '2', 'https://www.youtube.com/channel/UCu3Mp1ZimtNvyA-bcfo9VrQ', '2021-07-08 16:10:03'),
(7, 'test4@test.co.jp', '$2y$10$akZdyiUiW/epGEOrHK5Mu.c9a8HztU0Mtlrdv3wBjrZ1mHcC4M9IC', 'カプコン', NULL, NULL, '3', NULL, '2021-06-14 00:08:31'),
(8, 'test5@test.co.jp', '$2y$10$L17omjYnSai9qGVs6rEf7OhpuhQ7PD1X/EuW5GScixQQ77DrOoKI6', 'チラズアート', NULL, NULL, '3', NULL, '2021-06-14 00:35:20'),
(13, 'test6@test.co.jp', '$2y$10$839zo2HS6YFe0rzvxfecx.jiKUiGtQ0t2Vd1xb8aoR8bqHUkgbuNq', 'レオン', 'ホラー', '1時間～2時間', '2', 'https://www.youtube.com/channel/UCu3Mp1ZimtNvyA-bcfo9VrQ', '2021-06-19 22:53:57'),
(16, 'test7@test.co.jp', '$2y$10$Np3j.KEpi9ZqCL31KC4fMO9j7vaQksDTUIDyqbUMFKafs6o.74M56', 'nintendo', NULL, NULL, '3', NULL, '2021-07-06 22:41:00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `favorite_game`
--
ALTER TABLE `favorite_game`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `favorite_user`
--
ALTER TABLE `favorite_user`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `favorite_game`
--
ALTER TABLE `favorite_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- テーブルの AUTO_INCREMENT `favorite_user`
--
ALTER TABLE `favorite_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- テーブルの AUTO_INCREMENT `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- テーブルの AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
