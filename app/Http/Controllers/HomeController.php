<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Dare;
use App\Models\Vote;

class HomeController extends Controller
{
    public function __construct() {
    }

    public function index() {
        return view('frontend.home');
    }

    public function terms() {
        return view('frontend.terms');
    }

    public function dare() {
        $data = array();

        $data['votes_count'] = Dare::count();

        return view('frontend.dare', $data);
    }

    public function get_dares() {
        $page = request('page');
        $order = request('order');

        $dares = Dare::orderby(explode(',', $order)[0], explode(',', $order)[1])->limit(10)->offset(($page - 1) * 10)->get();
        return json_encode($dares);
    }

    public function post() {
        return view('frontend.post');
    }

    public function create() {
        $data = request("data");
        if($data["to"] == strtolower(env('CONTRACT_ADDRESS'))) {
            $one = $data["events"]["postDare"]["returnValues"];

            if(Dare::where('id', '=', $one["dareId"])->first() == NULL) {
                $dare = new Dare();
                $dare->id = $one["dareId"];
                $dare->poster = $one["poster"];
                $dare->content = $one["content"];
                $dare->vote_count = 0;
                $dare->vote_amount = 0;
                $dare->dare_amount = 0;
                $dare->created_at = $one["_time"];
                $dare->save();

                return json_encode(array("status" => 'success'));
            }
        }
    }

    public function vote() {
        $data = request("data");
        if($data["to"] == strtolower(env('CONTRACT_ADDRESS'))) {
            $one = $data["events"]["voteDare"]["returnValues"];
            if(Vote::where('txn_id', '=', $data["events"]["voteDare"]["transactionHash"])->first() == NULL) {
                $vote = new Vote();
                $vote->dare_id = $one["dareId"];
                $vote->voter = $one["voter"];
                $vote->vote_amount = $one["amount"];
                $vote->txn_id = $data["events"]["voteDare"]["transactionHash"];
                $vote->created_at = $one["_time"];
                $vote->save();

                $dare = Dare::where('id', '=', $vote->dare_id)->first();
                $dare->vote_count++;
                $dare->vote_amount += $vote->vote_amount;
                $dare->save();
                
                return json_encode(array("status" => 'success'));
            }
        }
    }

    public function works() {
        return view('frontend.works');
    }

    public function buy() {
        return view('frontend.buy');
    }
}
