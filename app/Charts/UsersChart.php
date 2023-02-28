<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\User;

class UsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        Date_default_timezone_set('Asia/Manila');

        $admin = User::where('role', 'admin')->where('status', '1')->count();
        $teacher = User::where('role', 'teacher')->where('status', '1')->count();
        $cashier = User::where('role', 'cashier')->where('status', '1')->count();
        $guidance = User::where('role', 'guidance')->where('status', '1')->count();
        $student = User::where('role', 'student')->where('status', '1')->count();

         $donut = $this->chart->donutChart()
            ->setTitle('Active Users from the System')
            ->setSubtitle('as of '. \Carbon\Carbon::parse(today())->format('F j, Y'))
            ->addData([$admin, $teacher, $cashier, $guidance, $student])
            ->setLabels(['Admin', 'Teacher', 'Cashier', 'Guidance', 'Student']);

            return $donut;
    }
}
