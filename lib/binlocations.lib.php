<?php
/* Copyright (C) 2023 Benjamin Bailón Salas <b.bailon@stgmining.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * \file    binlocations/lib/binlocations.lib.php
 * \ingroup binlocations
 * \brief   Library files with common functions for BinLocations
 */

/**
 * Prepare admin pages header
 *
 * @return array
 */
function binlocationsAdminPrepareHead()
{
	global $langs, $conf;

	$langs->load("binlocations@binlocations");

	$h = 0;
	$head = array();

	$head[$h][0] = dol_buildpath("/binlocations/admin/setup.php", 1);
	$head[$h][1] = $langs->trans("Settings");
	$head[$h][2] = 'settings';
	$h++;

	/*
	$head[$h][0] = dol_buildpath("/binlocations/admin/myobject_extrafields.php", 1);
	$head[$h][1] = $langs->trans("ExtraFields");
	$head[$h][2] = 'myobject_extrafields';
	$h++;
	*/

	$head[$h][0] = dol_buildpath("/binlocations/admin/about.php", 1);
	$head[$h][1] = $langs->trans("About");
	$head[$h][2] = 'about';
	$h++;

	// Show more tabs from modules
	// Entries must be declared in modules descriptor with line
	//$this->tabs = array(
	//	'entity:+tabname:Title:@binlocations:/binlocations/mypage.php?id=__ID__'
	//); // to add new tab
	//$this->tabs = array(
	//	'entity:-tabname:Title:@binlocations:/binlocations/mypage.php?id=__ID__'
	//); // to remove a tab
	complete_head_from_modules($conf, $langs, null, $head, $h, 'binlocations@binlocations');

	complete_head_from_modules($conf, $langs, null, $head, $h, 'binlocations@binlocations', 'remove');

	return $head;
}

function getBinLocations($warehouse = null)
{
	global $db;
	$sql = "SELECT bl.rowid,bl.label, e.ref FROM " . MAIN_DB_PREFIX . "binlocations_locations as bl";
	$sql .= " LEFT JOIN " . MAIN_DB_PREFIX . "entrepot as e ON bl.fk_warehouse = e.rowid";
	$sql .= " WHERE e.entity =" . getEntity('entrepot');
	if ($warehouse)
		$sql .= " AND bl.fk_warehouse =" . $warehouse;
	$resql = $db->query($sql);
	$binlocations = array();
	while ($obj = $db->fetch_object($resql)) {
		$binlocations[] = $obj;
	}
	return $binlocations;
}
function getBinProducts($binLocation)
{
	global $db;
	$sql = "SELECT * FROM " . MAIN_DB_PREFIX . "binlocations_stock_locations as sl";
	$sql .= " LEFT JOIN " . MAIN_DB_PREFIX . "product as p ON sl.fk_product = p.rowid";
	$sql .= " WHERE sl.fk_location =" . $binLocation;
	$resql = $db->query($sql);
	$binProducts = array();
	while ($obj = $db->fetch_object($resql)) {
		$binProducts[] = $obj;
	}
	return $binProducts;
}
