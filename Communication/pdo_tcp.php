<?php
/**	op-unit-database-testcase:/Communication/pdo_socket.php
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
use PDO;
use PDOException;

//	...
$host     = '127.0.0.1';
$username = 'testcase';
$password = 'testcase';
$database = 'testcase';
/*
 $port     = null; // 3306
 $socket   = null; // '/opt/local/var/run/mariadb-11.4/mysqld.sock';
 */
$dsn  = "mysql:host={$host};dbname={$database};charset=utf8mb4";

//	...
try{
	$pdo = new PDO($dsn, $username, $password, [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);
}catch( PDOException $e ){
	return $e->getMessage();
}

//	...
unset($pdo);

//	...
return true;
