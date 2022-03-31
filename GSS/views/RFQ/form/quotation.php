<?php
$category = '';
$is_winner = '';
foreach ($supplier_item_quotation as $key => $val) {
    if ($val['is_winner'] == 1) {
        $is_winner = 'style="background-color:#d32f2f;color:#fff;"';
    } else {
        $is_winner = '';
    }
    if ($count == $count) {
        $rowspan = $count;
    }
    echo '<tr>';
    if ($val['supplier_title'] != $category) {
        $category = $val['supplier_title'];
        $category = $val['supplier_title'];
        echo '<td  rowspan = ' . $rowspan . '>' . $val['supplier_title'] . '</td>';
    } else {
    }
    echo '<td ' . $is_winner . '>' . $val['procurement'] . '</td>';
    echo '<td ' . $is_winner . '>₱' . number_format($val['price_per_unit'], 2) . '</td>';
    echo '</tr>';
}