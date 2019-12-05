<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ESHOP</title>
</head>
<?php
session_start();
if( ! isset($_SESSION['username'])) {
	$_SESSION['username']='?';
}
require_once "internal/dbconnect.php";
?>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>E shop</title>
<link href="layout.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="top">
<a href="index.php?p=start">Αρχική</a>
<a href="?p=shopinfo">Το κατάστημά μας</a>
<a href="?p=products">Τα προϊόντα μας</a>
<a href="?p=cart">Καλάθι αγορών</a>
<a href="?p=login">Σύνδεση πελατών</a>
<a href="?p=contact">Επικοινωνία</a>
</div>
<div id="left">
<?php
	print "<p>This is user: $_SESSION[username]</p>";
	require 'internal/menuleft.php';
	if($_SESSION['username']=='admin') {
		print "<h2>Admin MENU</h2>";
		include 'internal/customers.php';
		include 'internal/orders.php';
	}elseif($_SESSION['username']=='andreas'){
		print "<h2>Andreas MENU</h2>";
		include 'internal/myorders.php';
		include 'internal/mydetails.php';
		include 'internal/logout.php';
	}
?>
</div>
<div id="content">
<?php
if( ! isset($_REQUEST['p'])) {
	$_REQUEST['p']='start';
}
$p = $_REQUEST['p'];
//print "must require page: internal/$p";
switch ($p){
case "start" :		require "internal/start.php";
					break;
case "shopinfo": 	require "internal/shopinfo.php";
					break;
case "products":	require "internal/products.php";
					break;
case "cart":		require "internal/cart.php";
					break;
case "prodinfo": require "internal/prodinfo.php";
					break;
case "addtocart": require "internal/addtocart.php";
					break;
case "login" :		require "internal/login.php";
					break;
case 'do_login':	require "internal/do_login.php";
					break;
case "contact":		require "internal/contact.php";
					break;

default:
	print "Η σελίδα δεν υπάρχει";
}
?>
</div>
<div id="footer"></div>
</body>
</html>

