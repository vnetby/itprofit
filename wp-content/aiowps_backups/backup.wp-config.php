<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'seobilit_forex' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'seobilit_admin' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'V008gmNhk6' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'I$BHY0Ie#@bACAwOk|biUV2;W&a^r53lzBdyk=NQy!?4,S7*&f;AU%/2@U?k?4.Y' );
define( 'SECURE_AUTH_KEY',  'yP*+@%c*TL39%VM7CYZ~8 <F||3}%m%oihVjT9~:igA)=s@cDCBX+Dt8Q]uu~l*M' );
define( 'LOGGED_IN_KEY',    'Z_uf@g5l92SjoQf wOimoIj*eMF(w1vG6uG?xsjE0t+?>ECb=fh>U7N=OP3]l%;)' );
define( 'NONCE_KEY',        '}Ea&4KGM3.JBZW?)![ i7I!jaVeis!?$Y 14#g+2yJ0d#e*qy=&jmfae@Y~xpN09' );
define( 'AUTH_SALT',        '1)[Z=*+U5 (P*~<>T!qG&VBh53dyq:>HY(JmGMFXZQE~b9l.x(DiiLij#qzi;fbH' );
define( 'SECURE_AUTH_SALT', 'U#D~86VH!rNe;WF<Bx]GP5UNhXVp8hcvX/IGzs2H&Lh1Fea- oi,qdh3+L6tO2wz' );
define( 'LOGGED_IN_SALT',   '@y{MFXi1>3*9ili#KDj>ZXZ@d?Zx`jQk9-Ku].CiYt.}/LV_YbKm9dM->+WL{Hm~' );
define( 'NONCE_SALT',       '&^xjvqn{6NH!Vs0[Y&Np6F&9vyWIokyvd2r6-tQjx/}Y/;BLUth Q% hcaS9&5-Y' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'profit';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY ', true );
define( 'SCRIPT_DEBUG', true );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
