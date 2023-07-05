<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Datatables extends BaseController
{
    public function income()
    {
        $income = $this->income
            ->select('income_id, income_nominal, income_type, income_desc, income_actor, income_created')
            ->findAll();
        $json_data["data"] = $income;
        // echo "<pre>";
        echo json_encode($json_data);
    }
    public function outcome()
    {
        $outcome = $this->outcome
            ->select('outcome_id, outcome_nominal, outcome_type, outcome_desc, outcome_actor, outcome_created')
            ->findAll();
        $json_data["data"] = $outcome;
        // echo "<pre>";
        echo json_encode($json_data);
    }
    public function card_info()
    {
        if ($this->session->has('isLoggedIn')) {
            $data['dp'] = $this->income->sumDeposit();
            if ($data['dp'] == null) {
                $data['dp'] = 0;
            }
            $data['pelunasan'] = $this->income->sumPelunasan();
            if ($data['pelunasan'] == null) {
                $data['pelunasan'] = 0;
            }
            $data['all'] = $this->income->sumAll();
            if ($data['all'] == null) {
                $data['all'] = 0;
            }
            $data['allout'] = $this->outcome->sumAll();
            if ($data['allout'] == null) {
                $data['allout'] = 0;
            }
            $data['clear'] = $data['all'] - $data['allout'];
            $msg = [
                'success' => [
                    'dp' => $data['dp'],
                    'pelunasan' => $data['pelunasan'],
                    'all' => $data['all'],
                    'out' => $data['allout'],
                    'clear' => $data['clear'],
                ]
            ] ;
        } else {
            $msg['error'] = "expiry";
        }
        echo json_encode($msg);
    }
}
