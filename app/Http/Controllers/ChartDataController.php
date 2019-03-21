<?php

namespace App\Http\Controllers;

use App\Intention;
use Illuminate\Http\Request;
use DateTime;

class ChartDataController extends Controller
{
    public function getAllMonths()
    {

        $month_array = array();
        $intentions_dates = Intention::orderBy('created_at', 'ASC')
                                ->pluck('created_at');
        $intentions_dates = json_decode($intentions_dates);

        if (!empty($intentions_dates)) {
            foreach ($intentions_dates as $date) {
                $date = new DateTime($date->date);
                $month_nbre = $date->format('m');
                $month_name = $date->format('M');

                $month_array[$month_nbre] = $month_name;
            }
        }
        return $month_array;

    }

    function getMonthlyIntentionCount( $month ) {
		$monthly_intention_count = Intention::whereMonth( 'date_celebree', $month )->get()->count();
		return $monthly_intention_count;
	}

    public function getMonthlyIntentionData()
    {
        $monthly_intention_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if (! empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                $monthly_intention_count = $this->getMonthlyIntentionCount($month_no);
                array_push($monthly_intention_count_array, $monthly_intention_count);
                array_push($month_name_array, $month_name);
            }
        }
        $max_no = max($monthly_intention_count_array);
        $max = round(( $max_no + 10/2 ) / 10 ) * 10;
        $monthly_intention_data_array = array(
            'months' => $month_name_array,
            'intention_count_data' => $monthly_intention_count_array,
            'max' => $max,
        );

        return $monthly_intention_data_array;
    }
}
