<?php
/**	op-unit-database-testcase:/Transaction.php
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
$result = [];

//	...
$config = include('config.php');

//	...
OP()->Unit()->Database()->Connect($config);

//	...
$count = [
	'table' => 't_testcase',
	'where' => 'ai > 0',
];
$result['before'] = OP()->Unit()->Database()->Count($count);

//	...
$result['Transaction'] = OP()->Unit()->Database()->Transaction();

//	...
$insert = [
	'table' => 't_testcase',
	'set' => [
		'number' => __LINE__,
		'string' => 'This is transaction insert test!',
	],
];
//	...
$result['insert'] = OP()->Unit()->Database()->Insert($insert);

//	...
$select = [
	'table' => 't_testcase',
	'where' => 'ai > 0',
	'limit' =>  2,
];
$record = OP()->Unit()->Database()->Select($select);

//	...
$update = [
	'table' => 't_testcase',
	'limit' => 1,
	'where' => [
		'ai' => $record[0]['ai'],
	],
	'set' => [
		'string' => 'This is transaction update test!',
	],
];
$result['update'] = OP()->Unit()->Database()->Update($update);

//	...
$delete = [
	'table' => 't_testcase',
	'limit' =>  1,
	'where' => [
		'ai' => $record[1]['ai'],
	],
];
$result['delete'] = OP()->Unit()->Database()->Delete($delete);

//	...
if( OP()->Request('Commit') ){
	$result['Commit']   = OP()->Unit()->Database()->Commit();
}else{
	$result['Rollback'] = OP()->Unit()->Database()->Rollback();
}

//	...
$result['after'] = OP()->Unit()->Database()->Count($count);

//	...
D($result, $insert, $select, $update, $delete, $record);
