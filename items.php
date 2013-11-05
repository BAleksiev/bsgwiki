<?php
include 'head.php';

if($_GET['id']) {
    $id = $_GET['id'];
    $item = fetch(query('SELECT * FROM items WHERE id = '.$id.''));
    
    $item['stats'] = explodeItemStats($item['stats']);
    if($item['price'])
        $item['price'] = explodeItemStats($item['price']);
    if($item['sell'])
        $item['sell'] = explodeItemStats($item['sell']);
    $item['suffix'] = explodeItemStats($item['suffix']);
    $item['prefix'] = explodeItemStats($item['prefix']);
    
    $table['comments'] = fetchAll(query('SELECT * FROM comments WHERE item_id = '.$item['id'].' AND category = "items"'));
    $table['screenshots'] = fetchAll(query('SELECT * FROM screenshots WHERE item_id = '.$item['id'].' AND category = "items"'));
    
    $data['breadcrumbs'][] = setBreadcrumb($action, 'search.php?s='.$action);
    $data['breadcrumbs'][] = setBreadcrumb($item['type'], 'search.php?s='.$action.'&a='.$item['type']);
    $data['breadcrumbs'][] = setBreadcrumb($item['name'], 'items.php?id='.$item['id']);
    
} else if($_POST['ajaxReq'] == 1) {
    header('Content-type: application/json');
    $id = $_POST['id'];
    $sk = fetchAll(query('SELECT * FROM skills'));
    foreach($sk as $k => $s)
        $skills[$s['id']] = $s;

    $up = fetch(query('SELECT * FROM item_upgrades WHERE item_id = '.$id.''));

    $d['upgrades']['price'] = explodeItemStats($up['price'], true);
    $d['upgrades']['2-10'] = explodeItemStats($up['2-10']);
    $d['upgrades']['11-15'] = explodeItemStats($up['11-15']);
    $skill = explodeItemStats($up['skill'], true);
    foreach($skill as $k => $s) {
        foreach($s as $kk => $ss) {
            $d['upgrades']['skill'][$k]['name'] = $skills[$kk]['name'];
            $d['upgrades']['skill'][$k]['id'] = $skills[$kk]['id'];
            $d['upgrades']['skill'][$k]['level'] = $ss;
        }
    }

    $item = fetch(query('SELECT stats FROM items WHERE id = '.$id.''));

    $d['upgrades'][1] = explodeItemStats($item['stats']);
    
    echo json_encode($d);
    die;
    
} else if($_POST['ajaxReq'] == 2){
    header('Content-type: application/json');
    
    $level = $_POST['level'];
    $upgrades = $_POST['upgrades'];
    
    for($i=2; $i<=$level; $i++) {
        $tot['tyl'] += $upgrades['price'][$i][1];
        $tot['cub'] += $upgrades['price'][$i][2];
        $tot['tk'] += $upgrades['price'][$i][3];
        $tot['mer'] += $upgrades['price'][$i][4];
    }
    
    echo json_encode($tot);
    die;
    
} else {
    header('Location: search.php');
}

$data['table'] = $table;
$data['item'] = $item;

$act[] = 'header';
$act[] = 'items';
$act[] = 'popups';
$act[] = 'footer';

loadDwoo($act, $data);