<?php
namespace PHPMaker2019\project1;

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(1, "mi_article", $Language->MenuPhrase("1", "MenuText"), "articlelist.php", -1, "", IsLoggedIn() || AllowListMenu('{630ABB70-6252-440B-92AA-E90933EF0649}article'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(2, "mi_category", $Language->MenuPhrase("2", "MenuText"), "categorylist.php", -1, "", IsLoggedIn() || AllowListMenu('{630ABB70-6252-440B-92AA-E90933EF0649}category'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(3, "mi_countries", $Language->MenuPhrase("3", "MenuText"), "countrieslist.php", -1, "", IsLoggedIn() || AllowListMenu('{630ABB70-6252-440B-92AA-E90933EF0649}countries'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(4, "mi_employees", $Language->MenuPhrase("4", "MenuText"), "employeeslist.php", -1, "", IsLoggedIn() || AllowListMenu('{630ABB70-6252-440B-92AA-E90933EF0649}employees'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(5, "mi_group", $Language->MenuPhrase("5", "MenuText"), "grouplist.php", -1, "", IsLoggedIn() || AllowListMenu('{630ABB70-6252-440B-92AA-E90933EF0649}group'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(6, "mi_product", $Language->MenuPhrase("6", "MenuText"), "productlist.php", -1, "", IsLoggedIn() || AllowListMenu('{630ABB70-6252-440B-92AA-E90933EF0649}product'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(7, "mi_students", $Language->MenuPhrase("7", "MenuText"), "studentslist.php", -1, "", IsLoggedIn() || AllowListMenu('{630ABB70-6252-440B-92AA-E90933EF0649}students'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(8, "mi_users", $Language->MenuPhrase("8", "MenuText"), "userslist.php", -1, "", IsLoggedIn() || AllowListMenu('{630ABB70-6252-440B-92AA-E90933EF0649}users'), FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>
