<?php

namespace App\Http\Controllers;

use App\Intention;
use App\Clocher;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Auth;

class ChartDataController extends Controller
{
    public function getAllMonths()
    {

        $month_array = array();
        $intentions_dates = Intention::orderBy('created_at', 'ASC')
                                     ->pluck('created_at');
        $intentions_dates = json_decode($intentions_dates);
        $tz = new DateTimeZone('Europe/Paris');

        if (!empty($intentions_dates)) {
            foreach ($intentions_dates as $date) {
                $date = new DateTime($date->date);
                $month_nbre = $date->format('m');
                $month_name = $date->format('F');

                $month_array[$month_nbre] = $month_name;
            }
        }
        return $month_array;

    }

    function getMonthlyIntentionCount( $month ) {
        $id_paroisse =  Auth::user()->id_paroisses;
        $monthly_intention_count = Intention::leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                        ->where('id_paroisses', '=', $id_paroisse)
                                        ->whereMonth( 'date_celebree', $month)
                                        ->get()
                                        ->count();
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


    public function getAllClochers()
    {
        $clocher_array = array();
        $id_paroisse =  Auth::user()->id_paroisses;
        $clocher_name = Clocher::where('id_paroisses', '=', $id_paroisse)
                               ->get();

        $clocher_name = json_decode($clocher_name);

        if (!empty($clocher_name)) {
            foreach ($clocher_name as $name) {
                $clocher_no = $name->id_clocher;
                $clocher_nam = $name->nom;

                $clocher_array[$clocher_no] = $clocher_nam;
            }
        }
		return $clocher_array;

    }

    function getMonthlyClocherCount($clocher) {
        $id_paroisse =  Auth::user()->id_paroisses;
        $moisCourant = date("n");
        $monthly_clocher_count = Intention::leftjoin('clochers', 'id_clochers', '=', 'clochers.id_clocher')
                                        ->where('id_paroisses', '=', $id_paroisse)
                                        ->whereMonth( 'date_celebree', $moisCourant)
                                        ->where('id_clochers', '=', $clocher)
                                        ->get()
                                        ->count();

        return $monthly_clocher_count;
    }

    public function getMonthlyClocherData()
    {
        $monthly_clocher_count_array = array();
        $clocher_array = $this->getAllClochers();
        $clocher_name_array = array();
        if (! empty($clocher_array)) {
            foreach ($clocher_array as $clocher_no => $clocher_nam) {
                $monthly_clocher_count = $this->getMonthlyClocherCount($clocher_no);
                array_push($clocher_name_array, $clocher_nam);
                array_push($monthly_clocher_count_array, $monthly_clocher_count);

            }
        }
        $monthly_clocher_data_array = array(
            'clocher' => $clocher_name_array,
            'clocher_count_data' => $monthly_clocher_count_array,
        );

        return $monthly_clocher_data_array;
    }

    public function getIntentionEventCalendar()
    {
      $event_calendar_intention = Intention::where('date_annoncee', '!=', NULL)
                                           ->get();

        foreach ($event_calendar_intention as $value) {
            $array_calendar[] = $value->toArray();
        }


      return $array_calendar;
    }







}
