<?php

namespace App\Controllers;

use App\App\App;
use App\Models\Work;
use DateTime;

class WorkController
{
    public function __construct()
    {
        session_start();
    }

    public static function add()
    {
        $title = "Add Work";
        return view('work.add', compact('title'));
    }

    public static function store()
    {
        $data = self::setWork($_REQUEST);
        try {
            App::get('db')->insert('work', $data);
        } catch (Exception $e) {
            require "views/500.php";
        }
        $_SESSION["success"] = "Create Work Success";
        return redirect('');
    }

    private static function setWork($request)
    {
        $strToTimeStart = strtotime($request['year-start'] . '-' . $request['month-start'] . '-' . $request['date-start'] . ' ' . $request['hour-start'] . ':' . $request['minute-start'] . ':' . $request['second-start']);
        $strToTimeEnd = strtotime($request['year-end'] . '-' . $request['month-end'] . '-' . $request['date-end'] . ' ' . $request['hour-end'] . ':' . $request['minute-end'] . ':' . $request['second-end']);

        $data['name'] = $request['name'];
        $data['start'] = date("Y-m-d h:i:s", $strToTimeStart);
        $data['end'] = date("Y-m-d h:i:s", $strToTimeEnd);

        return $data;
    }

    public static function edit()
    {
        $id = $_REQUEST['id'];
        $work = App::get('db')->find('work', $id);
        $data = self::getWork($work);
        $title = "Edit Work";
        return view('work.edit', compact('title', 'data'));
    }

    private static function getWork($data)
    {
        $start = new DateTime($data->start);
        $end = new DateTime($data->end);
        return [
            'id' => $data->id,
            'name' => $data->name,
            'year-start' => $start->format('Y'),
            'month-start' => $start->format('m'),
            'date-start' => $start->format('d'),
            'hour-start' => $start->format('h'),
            'minute-start' => $start->format('i'),
            'second-start' => $start->format('s'),
            'year-end' => $end->format('Y'),
            'month-end' => $end->format('m'),
            'date-end' => $end->format('d'),
            'hour-end' => $end->format('h'),
            'minute-end' => $end->format('i'),
            'second-end' => $end->format('s'),
        ];
    }

    public static function update()
    {
        $id = $_REQUEST['id'];
        $data = self::setWork($_REQUEST);
        App::get('db')->update('work', $id, $data);
        $_SESSION["success"] = "Update Work Success";
        return redirect('');
    }

    public function index()
    {
        $works = App::get('db')->selectAll('work', Work::class);
        $title = 'Work Page';
        return view('work.index', compact('title', 'works'));
    }

    public function delete()
    {
        try {
            App::get('db')->delete('work', $_GET['id']);
        } catch (Exception $e) {
            require 'views/500.php';
        }

        $_SESSION["success"] = "Delete Work Success";
        return redirect('');
    }
}
