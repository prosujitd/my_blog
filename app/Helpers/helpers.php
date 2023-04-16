<?php


use Carbon\Carbon;

function convertYmdToMdy($date)
{
    return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
}



