<?php
include 'head.php';

if($_GET['id'] && $_GET['a']) {
    $type = $_GET['a'];
    $id = $_GET['id'];
    
    $item = fetch(query('SELECT * FROM '.$type.' WHERE id = '.$id.''));
    
    $table['comments'] = fetchAll(query('SELECT * FROM comments WHERE item_id = '.$item['id'].' AND category = "'.$type.'"'));
    $table['screenshots'] = fetchAll(query('SELECT * FROM screenshots WHERE item_id = '.$item['id'].' AND category = "'.$type.'"'));
    
    $data['breadcrumbs'][] = setBreadcrumb($type, 'search.php?s='.$type);
    $data['breadcrumbs'][] = setBreadcrumb($item['name'], 'info.php?a='.$type.'&id='.$item['id']);
    
} else {
    header('Location: search.php');
}

$data['item'] = $item;
$data['type'] = $type;

$act[] = 'header';
$act[] = 'info';
$act[] = 'popups';
$act[] = 'footer';

loadDwoo($act, $data);