<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {

	$host = '10.19.19.50'; 
	$user = 'sa'; 
	$pass = 'w,jgvkojk'; 
	$dbname = 'Office'; 

	//$BrnCode = $_GET['BrnCode'];

	try // Connect to server with try/catch error reporting
	  {
	  	$DBH = new PDO('dblib:host='.$host.';dbname='.$dbname, $user, $pass);
	  	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	  }
	catch(PDOException $e)
	  {
	  	echo "Couldn't connect to $host/$dbname: ".$e->getMessage();
	  	exit();
	  }
	//echo "Connected to the $host/$dbname server OK:<br>\n";

	// Simple SELECT query with no error reporting
	$sql="
			SELECT 
				T_Branch.BrnCode, T_Branch.BrnName, T_Branch.BrnOpen, T_Branch.BrnAddress, T_Branch.BrnTel, T_Branch.BrnFax,
				T_Cashier.CshCode, T_Cashier.CshName, T_Cashier.CshDatabaseServerAlone, T_Cashier.CshReceiptPosCashier
			FROM T_Branch 
			JOIN T_Cashier
			ON T_Branch.BrnCode=T_Cashier.CshBranch
			WHERE T_Branch.BrnCode='$BrnCode' AND T_Branch.BrnCode<>'S066'
			ORDER BY T_Cashier.CshDatabaseServerAlone ASC

	";



	$STH = $DBH->query($sql);
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	$row=$STH->fetchall();

	return response()->json($row);

    }
}
