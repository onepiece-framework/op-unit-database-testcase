<?php
/**	op-unit-database-testcase:/config.php
 *
 * @created    2025-12-02
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
return [
	'scheme'  => 'mysql',
	'host'    => 'localhost',
	'port'    =>  null,
	'user'    => 'testcase',
	'password'=> 'testcase',
	'database'=> 'testcase',
	'charset' => 'utf8',
];