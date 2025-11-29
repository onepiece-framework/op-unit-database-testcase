<?php
/**	op-unit-database-testcase:/Communication/mysqli_tcp.php
 *
 * @created    2025-11-28
 * @package    op-unit-database-testcase
 * @copyright  2025 Tomoaki Nagahara All Rights Reserved.
 */

/**	Declare strict
 *
 */
declare(strict_types=1);

/**	namespace
 *
 */
namespace OP;

//	...
use mysqli;

//	...
$host     = '127.0.0.1';
$user     = 'testcase';
$password = 'testcase';
$database = 'testcase';
$port     = null; // 3306
$socket   = null; // '/opt/local/var/run/mariadb-11.4/mysqld.sock';
$mysqli   = new mysqli($host, $user, $password, $database, $port, $socket);

//	...
return ($error = $mysqli->connect_errno) ? $error: true;
