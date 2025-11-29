<?php
/**	op-unit-database-testcase:/DML.php
 *
 * @created    2025-11-29
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
$result = [];

//	Connect
$config = [
	'prod'     => 'mysql',
	'host'     => 'localhost',
	'port'     =>  null,
	'database' => 'testcase',
	'user'     => 'testcase',
	'password' => 'testcase',
	'charset'  => 'utf8',
];
$result['Connect'] = [
	'config' => $config,
	'result' => OP()->Unit()->Database()->Connect($config),
];

//	Count
$config = [
	'table' => 't_testcase',
	'where' => 'ai > 0',
];
$result['Count'] = [
	'config' => $config,
	'result' => OP()->Unit()->Database()->Count($config),
];

//	Insert
$config = [
	'table' => 't_testcase',
	'set'   => [
		'number' => '1',
		'string' => 'test',
	],
];
$result['Insert'] = [
	'config' => $config,
	'result' => OP()->Unit()->Database()->Insert($config),
];

//	...
$config = [
	'table' => 't_testcase',
	'where' => 'ai > 0',
	'limit' => 1,
];
$result['Select'] = [
	'config' => $config,
	'result' => OP()->Unit()->Database()->Select($config),
];

//	...
$config = [
	'table' => 't_testcase',
	'set'   => [
		'number' => '+1',
		'string' => 'Update!',
	],
	'where' => 'ai > 0',
	'limit' => 1,
];
$result['Update'] = [
	'config' => $config,
	'result' => OP()->Unit()->Database()->Update($config),
];

//	...
$config = [
	'table' => 't_testcase',
	'where' => 'ai > 10',
	'limit' => 1,
];
$result['Delete'] = [
	'config' => $config,
	'result' => OP()->Unit()->Database()->Delete($config),
];

//	...
D($result);

?>
<hr/>
<section>
	<h1>DML is Database Manipulate Language</h1>
	<ul>
		<li>Connect: <span data-translation="true">Connect to the database.</span></li>
		<li>Count:   <span data-translation="true">Counts the number of records in a table that match the WHERE clause.</span></li>
		<li>Insert:  <span data-translation="true">Insert a record into the table.</span></li>
		<li>Select:  <span data-translation="true">Selects records from a table that meet the specified criteria.</span></li>
		<li>Update:  <span data-translation="true">Updates only the records that meet the specified criteria.</span></li>
		<li>Delete:  <span data-translation="true">Deletes only the records that meet the specified criteria.</span></li>
	</ul>
</section>
<hr/>
<?php OP()->Template('index.phtml') ?>
