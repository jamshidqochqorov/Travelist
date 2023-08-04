<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index(Request $request){

        abort_if_forbidden('agent.show');

        $agents = Agent::all();
        return view('pages.agents.index',compact('agents'));
    }
    public function add(){
        abort_if_forbidden('agent.add');
        $latest_promo = Agent::latest()->first()->promo_cod??0;

        return view('pages.agents.add',compact('latest_promo'));
    }

    public function create(Request$request){
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>['required','min:9','integer'],
            'promo_cod'=>['required','unique:agents','numeric']
        ]);
        $agent = Agent::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'phone'=>$request->phone,
            'promo_cod'=>$request->promo_cod
        ]);
        message_set('Agent Muvofiqiyatli yaratildi','success',3);

        return redirect()->route('agentIndex');

    }
    public function edit($id){
        $agent = Agent::find($id);
        return view('pages.agents.edit',compact('agent'));
    }
    public function update(Request$request,$id){
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>['required','min:9','integer'],
            'promo_cod'=>['required','numeric','unique:agents,promo_cod,'.$id]
        ]);
        $agent = Agent::find($id);
        $agent->firstname = $request->firstname;
        $agent->lastname = $request->lastname;
        $agent->phone = $request->phone;
        $agent->promo_cod  =$request->promo_cod;
        $agent->save();

        message_set('Agent Tahrirlandi!','success','3');
        return  redirect()->route('agentIndex');
    }
    public function destroy($id){
        $agent  = Agent::find($id);
        $transactions_sum = $this->transactionSum($agent->id);
        $agent = Agent::find($agent->id);
        $sum = $this->agentSum($agent->id);
        if($sum-$transactions_sum == 0){
            $agent->delete();
            message_set('Agent o\'chirildi','success',3);
            return redirect()->route('agentIndex');

        }else{
            message_set('Atchotni to\'g\'irlang!','warning',3);
            return  redirect()->route('transactionHistory',$agent->id);
        }


    }
    public function agentSum($id){
        $agent = Agent::find($id);
        $sum = 0;
        foreach ($agent->clients as $client):
            $sum += $client->count*$client->category->price;
        endforeach;
        return $sum;
    }
    public function transactionSum($id){
        $sum =   Transaction::where('agent_id',$id)->sum('price');
        return $sum;
    }
}
