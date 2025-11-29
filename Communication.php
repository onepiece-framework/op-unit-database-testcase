<?php
/**	op-unit-database-testcase:/Communication.php
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
$communication = [];
$communication['mysqli']['socket'] = include('Communication/mysqli_socket.php');
$communication['mysqli']['tcp']    = include('Communication/mysqli_tcp.php');
$communication['pdo']['socket']    = include('Communication/pdo_socket.php');
$communication['pdo']['tcp']       = include('Communication/pdo_tcp.php');

//	...
D( $communication );

?>
<h1>Communication</h1>
<p data-translation="true">
	Connect to the database using raw PHP functions without using the ONEPIECE framework functions.
</p>
<h2>How to use</h2>
<h3>MySQL / MariaDB</h3>
<pre><code>
CREATE USER 'testcase'@'localhost' IDENTIFIED BY 'testcase';
CREATE USER 'testcase'@'127.0.0.1' IDENTIFIED BY 'testcase';
GRANT ALL PRIVILEGES ON testcase.* TO 'testcase'@'127.0.0.1';
GRANT ALL PRIVILEGES ON testcase.* TO 'testcase'@'localhost';
</code></pre>
<hr/>
<?php OP()->Template('index.phtml') ?>
