<?php
/**	op-unit-database-testcase:/PreparedStatements.php
 *
 * @created    2025-12-03
 * @package    op-unit-database-testcase
 * @copyright  2025 Tomoaki Nagahara All Rights Reserved.
 */

/**	Declare strict type
 *
 */
declare(strict_types=1);

/**	Namespace
 *
 */
namespace OP;

//	...
use PDO, PDOException;

//	...
$driver   = 'mysql';
$host     = 'localhost';
$user     = 'testcase';
$password = 'testcase';
$database = 'testcase';
$charset  = 'utf8mb4';
$socket   = '/opt/local/var/run/mariadb-11.4/mysqld.sock';
$dsn      = "{$driver}:host={$host};dbname={$database};charset={$charset};unix_socket={$socket}";

//	...
try{
	$pdo = new PDO( $dsn, $user, $password, [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Return associative array
		PDO::ATTR_EMULATE_PREPARES   => false,                  // Use native prepared statements, Up to more security
	]);
}catch( PDOException $e ){
	OP()->Error( $e->getMessage() );
	return;
}

//	Specifying value type.
$sql  = "SELECT * FROM t_testcase WHERE ai = :ai";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':ai', 1, PDO::PARAM_INT);
$stmt->execute();
D( $stmt->fetch() );

//	No specifying value type.
$sql  = "SELECT * FROM t_testcase WHERE ai > :ai AND timestamp >= :timestamp ORDER BY :order LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->execute([
	':ai'        => '0',
	':timestamp' => '2025-01-01',
	':limit'     => '5',
	':offset'    => '0',
	':order'     => 'timestamp', // Does not work
]);
D( $stmt->fetchAll() );
