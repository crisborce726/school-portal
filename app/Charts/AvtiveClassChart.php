<?php

namespace App\Charts;

use App\Models\Calendar;
use App\Models\ClassSchedule;
use App\Models\Post;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class AvtiveClassChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart{
        Date_default_timezone_set('Asia/Manila');

        $classes = ClassSchedule::where('status', '1')->count();
        $posts = Post::whereDate('created_at', today())->count();
        $calendar = Calendar::whereDate('created_at', today())->count();

        return $this->chart->pieChart()
            ->setTitle('Active Class, Posts, Calendar')
            ->setSubtitle('as of '. \Carbon\Carbon::parse(today())->format('F j, Y'))
            ->addData([$classes, $posts, $calendar])
            ->setLabels(['Classes', 'Posts', 'Calendar']);
    }
}
