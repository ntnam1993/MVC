<?php

namespace App\Controllers;

use App\App\App;
use App\Models\Work;

class CalendarController
{
    public function show()
    {
        $works = App::get('db')->selectAll('work', Work::class);
        $count = count($works);
        $works = (object)$works;
        $title = 'Calendar Page';
        return view('calendar.index', compact('title', 'works', 'count'));
    }
}
