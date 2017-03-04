INSERT INTO `platforms` (`id`, `public`, `str`, `str_sub`, `description`, `path`, `sort`) VALUES
(1, 1, 'Windows', '10, 8, 7, Vista, XP', '<p>インストール型からブラウザ型まで、あらゆるオンラインゲームに対応しているのがWindowsの魅力です。やりたいと思ったPCゲームがWindowsでできないことはほとんどありません。</p>\r\n<p>キーボードやマウス、コントローラー、はてはゲーミングPCまで、拡張性の高さを活かしてより快適なゲーム環境を組み立てることができるのも、Windowsならではと言えます。</p>\r\n<p>Windows対応ゲームで人気が高いのは、<a href="/categories/shooting.html">FPS</a>と呼ばれる一人称視点のゲームです。PCならではの高度なグラフィックにより、迫力のある戦闘シーンを楽しむことができます。大人数で冒険を楽しむ<a href="/categories/mmo.html">MMO</a>も人気の高いジャンルの一つです。</p>\r\n<p>※バージョン別OS(Windows 10, 8, 7, Vista, XP)の対応状況は、各ゲームの公式サイトでご確認ください。</p>', 'windows', 1),
(2, 1, 'Mac', 'Apple, Macintosh', '<p>直感性の高さと洗練されたデザインで根強いファンを持つMacのPC。最近ではiPhoneの普及により、連動性を考慮してMacのPCを選ぶ人も多いことでしょう。</p>\r\n<p>とはいえ、シェア面では<a href="/platforms/windows.html">Windows</a>に劣ることもあり、Mac対応のインストール型オンラインゲームはほとんどないのが実情です。オンラインゲームを楽しむことが目的であれば、WindowsPCを選ぶのが無難です。</p>\r\n<p>ただし、<a href="/platforms/pcbrowser.html">ブラウザ型のゲーム</a>であればMacであっても十分に楽しむことができます。ブラウザゲームの表現技術も日々進歩していますから、インストール型ゲームとはまた違った魅力を感じられることでしょう。</p>', 'mac', 2),
(3, 1, 'PCブラウザ', '', '<p>PCにソフトをインストールすることなく、Webブラウザ上で楽しむことができるのがブラウザゲームです。</p>\r\n<p>インストール型と比べて表現力や操作性などに大きな制約がかかりますが、スペックがそれほど高くないPCであっても楽しめることから、広く親しまれています。</p>\r\n<p>ほとんど他者が関与することなく進めるタイプのものもあれば、戦略ゲームのように大人数で連携を取りながら勝敗を競うタイプのものもあり、それぞれの趣味趣向に沿った多様なゲームが提供されています。</p>', 'pcbrowser', 3),
(4, 1, 'iOSアプリ', 'iPhone, iPad, iPod touch', '<p>iPhoneやiPadなどの普及により、対応アプリはかなりのペースで増えています。世界と比べてもiPhoneユーザーの割合が高い日本においては、積極的にアプリがリリースされる市場でもあります。</p>\r\n<p>iPhone、iPadの高性能化により、対戦型カードゲームやFPS、複数人同士で楽しむ戦略ゲームなど、PCゲームさながらの本格的なゲームが増えています。また、タッチパネル式ならではの直感的な操作が可能になっているのも、スマートフォンアプリの特徴でしょう。</p>\r\n<p>多くの人が対応端末を保有するiOSアプリの市場は、これからも各社が力を入れて取り組んでいく場所となるでしょう。</p>', 'ios', 4),
(5, 1, 'Androidアプリ', '', '<p>世界的にはiOSを大きく上回るシェアを誇っているのが、Androidアプリの市場です。iOSと比較して基準が厳しくないこともあり、その数の多さもあいまってバライティに富んだアプリが配信されています。</p>\r\n<p>Android端末の高性能化により、対戦型カードゲームやFPS、複数人同士で楽しむ戦略ゲームなど、PCゲームさながらの本格的なゲームが増えています。また、タッチパネル式ならではの直感的な操作が可能になっているのも、スマートフォンアプリの特徴でしょう。</p>\r\n<p><a href="/platforms/ios.html">iOS</a>と違い多くのメーカーがAndroid端末を発売しているため、同じゲームであっても端末によって動作や操作性に大きな違いが出ることもあります。</p>', 'android', 5),
(6, 1, 'スマホブラウザ', '', '<p>「ネイティブアプリ」と呼ばれる<a href="/platforms/ios.html">iOS</a>、<a href="/platforms/android.html">Android</a>アプリに対し、スマートフォンであってもブラウザタイプのゲームが数多く存在します。</p>\r\n<p>ネイティブアプリの多くがより高いスペックを要求するのに対し、低スペックであっても比較的よく動くのがスマホブラウザタイプのゲームの特徴です。</p>\r\n<p>表現技術ではネイティブアプリには及ばないものの、シンプルながらはまれる、工夫をこらしたゲームが多数存在しているのが特徴です。ネイティブアプリのように複雑な操作を要求されないため、落ち着いて楽しむことができるのはうれしい点です。</p>', 'spbrowser', 6);


-- "Windows" all by 2017/03
INSERT INTO `platforms_titles` (`platform_id`, `title_id`) 
SELECT '1', `id` FROM `titles` WHERE 1;

-- "Mac" style = 11 to platform = 2
INSERT INTO `platforms_titles` (`platform_id`, `title_id`) 
SELECT '2', `title_id` FROM `styles_titles` WHERE `style_id` = 11;

-- "Browser" style = 9 to platform = 3
INSERT INTO `platforms_titles` (`platform_id`, `title_id`) 
SELECT '3', `title_id` FROM `styles_titles` WHERE `style_id` = 9;

-- "iOS" titles.appdl_app_store is not null
INSERT INTO `platforms_titles` (`platform_id`, `title_id`) 
SELECT '4', `id` FROM `titles` WHERE `appdl_app_store` IS NOT NULL;

-- "Android" titles.appdl_google_play is not null
INSERT INTO `platforms_titles` (`platform_id`, `title_id`) 
SELECT '5', `id` FROM `titles` WHERE `appdl_google_play` IS NOT NULL;

