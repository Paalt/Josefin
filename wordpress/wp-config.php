<?php
/**
 * Grunnkonfigurasjonen til WordPress.
 *
 * Denne filen inneholder følgende konfigurasjoner: MySQL-innstillinger, tabellprefiks,
 * hemmelige nøkler, WordPress-språk og ABSPATH. Du kan finne mer informasjon
 * ved å besøke {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex-siden. Du kan få MySQL-innstillingene fra din nettjener.
 * 
 * Denne filen brukes av koden som lager wp-config.php i løpet av
 * installasjonen. Du trenger ikke å bruke nettstedet til å gjøre det, du trenger bare
 * å kopiere denne filen til "wp-config.php" og fylle inn verdiene.
 *
 * @package WordPress
 */

// ** MySQL-innstillinger - Dette får du fra din nettjener ** //
/** Navnet på WordPress-databasen */
define('DB_NAME', 'qcumber3');

/** MySQL-databasens brukernavn */
define('DB_USER', 'qcumber3');

/** MySQL-databasens passord */
define('DB_PASSWORD', '7QG3BZn3K5nSkUv');

/** MySQL-tjener */
define('DB_HOST', 'qcumber3.mysql.domeneshop.no');

/** Tegnsettet som skal brukes i databasen for å lage tabeller. */
define('DB_CHARSET', 'utf8mb4');

/** Databasens "Collate"-type. La denne være hvis du er i tvil. */
define('DB_COLLATE', '');

/**#@+
 * Autentiseringsnøkler og salter.
 *
 * Endre disse til unike nøkler!
 * Du kan generere nøkler med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Du kan når som helst endre disse nøklene for å gjøre aktive cookies ugyldige. Dette vil tvinge alle brukere å logge inn igjen.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`*PK>GX sRs4S}>Z=M*E?Q=v^]_Vt+HLtnQ~Z~E|_dq_ya7X>L-v$x(J*V$(a._R');
define('SECURE_AUTH_KEY',  'fQdY4.E?xEFUs1-@EDJ]Q0~/UFQg`5SN^u]3r.IpGH24 E#T$)C5D21]Od1y!0|5');
define('LOGGED_IN_KEY',    '&f8Ic4CT/Y$GZE}:Y,9EBEV1::b=42u8|`)tdq-sn[Q}{p8)9otfi66rbW4+$Ck&');
define('NONCE_KEY',        'Yp!`jJ4^|D/}@m!c:35KXOZxK.w6)6`{kal`dB}goE*6n3Dpl{<Q3[{?Dz #+{W2');
define('AUTH_SALT',        'ax2gY:dTl~P;7L)yDWPr%@A+sZ|q3l{+q4,87x%80%IQ9t1canMaPx~ MApa10P^');
define('SECURE_AUTH_SALT', 'cL+=N]V6,97G|sF#aMFWMP70J%/m=|Wz+S=-oXZU]Nn+[+%GCQrU^t7(/N~R51-0');
define('LOGGED_IN_SALT',   'oTcy!MgDWo|mL58RtxbyYw0Q+msfZ:v)-QU+vj+lb-GZ34V}]:H%n{?*r?9-vxww');
define('NONCE_SALT',       'OQM!KNG2}+{<a&)Do}LxTnG=O&OeqX7Y|^IMJv.5Vc*FC(NbbdZc9kZ?^Pu~C=(e');

/**#@-*/

/**
 * WordPress-databasens tabellprefiks.
 *
 * Du kan ha flere installasjoner i en databasehvis du gir dem hver deres unike
 * prefiks. Kun tall, bokstaver og understrek (_), takk!
 */
$table_prefix  = 'wp_';

/**
 * For utviklere: WordPress-feilsøkingstilstand.
 *
 * Sett denne til "true" for å aktivere visning av meldinger under utvikling.
 * Det er sterkt anbefalt at innstikks- og tema-utviklere bruker WP_DEBUG
 * i deres utviklermiljøer.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
