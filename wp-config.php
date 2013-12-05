<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'biospace');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'biospace');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'Dda2d72_');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9KxjJ3&KepNB)N;f0aQJ}E+*BU/Yv6W-30:N@+YVYbu=Xr1Xb0-P(1/`j{p]_ Bj');
define('SECURE_AUTH_KEY',  'gOw%tMfMygrK|#yO}hNyqo5r-!QcEyV9#[/LJ2j_WI:yNd+FkIAi;XMJ5oWj{,qG');
define('LOGGED_IN_KEY',    'meJ(fet7[kafc.|p$f-.dz(PVmsRct=?w@A^$RO?u;xW99GBP.LZlv*h;O0-/@ {');
define('NONCE_KEY',        '.=Z(g|Rw!>*#Bbjuo+y_uZ6q;x}Y+[8Ir/e yk18VP:%VER=9K.$f<Z+n;G@+tl5');
define('AUTH_SALT',        '+*@[fIcd6p=|b8;d:4|0w7]/wbj4 94{AKL:Ox-6~5_1%]5++o]%l0(|/xTo/>pg');
define('SECURE_AUTH_SALT', 'T-Rqcl!f?omo[KRR_A7R[h>WM~Z+$j-WE2{P39;Vm&QbI4tgdA)m`-luEI=tb!,i');
define('LOGGED_IN_SALT',   'G9&P>KUoKHZw;JYzQr-7^ZpBvKz}=M+59^y-1LJxa@(S:y&!2.RBjgl+ lT.ZDhx');
define('NONCE_SALT',       'h$%F.o&?[-*3+`~%=!Gt}]LMX;&?ck!Au;B+4gje&8$o?MqY6MX R2%|Yzs[qKD{');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
