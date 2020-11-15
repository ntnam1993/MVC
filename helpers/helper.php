<?php

function getList($start, $end, $key = null)
{
    $html = '';
    for ($i = $start; $i <= $end; $i++) {
        $i = ($i < 10) ? "0" . $i : $i;
        $select = ($key && ($key == $i)) ? 'selected' : '';
        $html .= "<option value='$i' $select>$i</option>";
    }
    return $html;
}

function getStatus($start, $end)
{
    $planning = '<span class="label label-primary">Planning</span>';
    $doing = '<span class="label label-warning">Doing</span>';
    $complete = '<span class="label label-success">Complete</span>';
    $date = date('Y-m-d h:i:s');
    if ($date < $start) {
        return $planning;
    } else {
        if ($date < $end) {
            return $doing;
        } else {
            return $complete;
        }
    }
}