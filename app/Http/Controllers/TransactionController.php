<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function history($id){
        $agent = Agent::find($id);
        $transactions_sum = Transaction::where('agent_id',$agent->id)->sum('price');
        $transactions =  Transaction::where('agent_id',$agent->id)->paginate(5);
        $sum = $this->agentSum($agent->id);
        return view('pages.transaction.history',compact('agent','sum','transactions_sum','transactions'));
    }
    public function index(){
        $transactions = Transaction::paginate(10);
        return view('pages.transaction.index',compact('transactions'));
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'price'=>'required|numeric|min:999'
        ]);
        $transactions_sum = $this->transactionSum($request->agent_id);
        $agent = Agent::find($request->agent_id);
        $sum = $this->agentSum($agent->id);
        if($sum-$transactions_sum == 0){
            message_set('Agent allaqachon rachot qilingan!','warning',3);
            return redirect()->back();
        }elseif ($request->price >$sum-$transactions_sum){
            message_set('Kiritilayotgan summa xato','warning',3);
            return  redirect()->back();
        }

        $transaction = new Transaction();
        $transaction->agent_id = $request->agent_id;
        $transaction->price = $request->price;
        $transaction->comment  = $request->comment != null ? $request->comment : 'Mavjud emas';
        $transaction->save();
        message_set('Malumot saqlandi','success',3);
        return redirect()->back();
    }
    public function edit($id){
        $transaction = Transaction::find($id);
        return view('pages.transaction.edit',compact('transaction'));
    }
    public function update(Request $request,$id){
;
        $this->validate($request,[
            'price'=>'required|numeric|min:999'
        ]);
        $transactions_sum = (int)$this->transactionSum($request->agent_id)-Transaction::find($id)->price;
        $agent = Agent::find($request->agent_id);
        $sum = $this->agentSum($agent->id);
         if ($request->price>$sum-$transactions_sum ){
             message_set('Kiritilayotgan summa xato','warning',3);
            return  redirect()->back();
        }
        $transaction = Transaction::find($id);
        $transaction->agent_id = $request->agent_id;
        $transaction->price = $request->price;
        $transaction->comment  = $request->comment != null ? $request->comment : 'Mavjud emas';
        $transaction->save();
        return redirect()->route('transactionHistory',$agent->id);

    }
    public function history_delete($id){
        $agent = Agent::find($id);
        $transactions = Transaction::where('agent_id',$agent->id)->get();
        foreach ($transactions as $transaction):
            $transaction->delete();
        endforeach;
        $clients = Client::where('agent_id',$agent->id)->get();

        foreach ($clients as $client):
            $client->delete();
        endforeach ;
        return redirect()->route('transactionHistory',$agent->id);
    }
    public function destroy($id){
        $transaction = Transaction::find($id)->delete();
        return redirect()->back();
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
