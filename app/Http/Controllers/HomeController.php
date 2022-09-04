<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sidbar;
use App\Models\User;
use App\Models\supplier;
use App\Models\buy;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\sold;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sidbar()
    {
        return sidbar::all();
    }

    public function index()
    {
        $sidbar = $this->sidbar();
        return view('sale', compact('sidbar'));
    }

    public function cashir()
    {
        $sidbar = $this->sidbar();
        $cashers = User::all();
        return view('cashir', compact('sidbar', 'cashers'));
    // mabst lawaya brawata sar cashir.blade.php
    }


    public function addcashir(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rule' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('Casher')->withErrors($validator);
        }
        else {
            $create_user = User::create([ //drustkrdny usera
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'rule' => $request->rule
            ]);

            return $create_user ? redirect('Casher')->with('result', "added") : redirect('Casher')->with('result', "not added");
        }
    }

    public function supplier()
    {
        $sidbar = $this->sidbar();
        $supplier = supplier::all();
        return view('supplier', compact('sidbar', 'supplier'));
    }

    public function AddSupplier($status, $id, Request $request)
    {
        if ($status == 0) {
            $validator = \Validator::make($request->all(), [
                'name_supplier' => 'required',
                'email_supplier' => 'required',
                'address_supplier' => 'required',
                'phone_supplier' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('Supplier')->withErrors($validator);
            }
            else {
                // Create
                $create_supplier = supplier::create([
                    'name_supplier' => $request->name_supplier,
                    'email_supplier' => $request->email_supplier,
                    'address_supplier' => $request->address_supplier,
                    'phone_supplier' => $request->phone_supplier
                ]);
            }
        }
        elseif ($status == 1 && !empty($status) && !empty($id)) {
            // Delete
            $create_supplier = supplier::findOrfail($id);
            $create_supplier->delete();
        }
        else {
            //edit

            $validator = \Validator::make($request->all(), [
                'name_supplier' => 'required',
                'email_supplier' => 'required',
                'address_supplier' => 'required',
                'phone_supplier' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('Supplier')->withErrors($validator);
            }
            else {
                $create_supplier = supplier::where('id', $id)->update([
                    'name_supplier' => $request->name_supplier,
                    'email_supplier' => $request->email_supplier,
                    'address_supplier' => $request->address_supplier,
                    'phone_supplier' => $request->phone_supplier
                ]);
            }

        }
        return $create_supplier ? redirect('Supplier')->with('result', 'The Supplier Was Successfuly !') : redirect('Supplier')->with('result', 'Some Thing Went Wrong !');
    }

    public function buy()
    {
        $sidbar = $this->sidbar();
        $suppliers = supplier::all();
        $buy = buy::with('one_supplier')->orderBy('id', 'DESC')->paginate();
        return view('buy', compact('sidbar', 'buy', 'suppliers'));
    }

    public function add_buy($status, $id, Request $request)
    {
        $required = [
            'id' => 'required',
            'name' => 'required',
            'supplier' => 'required',
            'count' => 'required',
            'price' => 'required',
            'expire' => 'required',
            'debt' => 'required',
            'type' => 'required'];


        $crud = [
            'id' => $request->id,
            'name' => $request->name,
            'supplier' => $request->supplier,
            'count' => $request->count,
            'price' => $request->price,
            'expire' => $request->expire,
            'debt' => $request->debt,
            'type' => $request->type,
        ];

        if ($status == 0) {
            $validator = \Validator::make($request->all(), $required);

            if ($validator->fails()) {
                return redirect('Buy')->withErrors($validator);
            }
            else {
                // Create          nawy table
                $buy = buy::create($crud);
            }
        }
        elseif ($status == 1 && !empty($status) && !empty($id)) {
            // Delete
            $buy = buy::findOrfail($id)->delete();
        }
        else {
            //edit

            $validator = \Validator::make($request->all(), $required);

            if ($validator->fails()) {
                return redirect('Buy')->withErrors($validator);
            }
            else {
                $buy = buy::where('id', $id)->update($crud);
            }

        }
        return $buy ? redirect('Buy')->with('result', 'The buy Was Successfuly !') : redirect('Buy')->with('result', 'Some Thing Went Wrong !');
    }

    public function NotLeft()
    {
        $sidbar = $this->sidbar();
        $suppliers = supplier::all();
        //lera wtwmana agar zhmaray danakay la colomi count < la 2 ba boman bhenet
        $buy = buy::where('count', '<', 2)->with('one_supplier')->orderBy('id', 'DESC')->paginate();
        return view('notleft', compact('sidbar', 'buy', 'suppliers'));

    }

    public function DebtList()
    {
        $sidbar = $this->sidbar();
        $suppliers = supplier::all();
        //lera wtwmana colomi debt = bw ba 1 ba boman bhene yan ble haya
        $buy = buy::where('debt', 1)->with('one_supplier')->orderBy('id', 'DESC')->paginate();
        return view('DebtList', compact('sidbar', 'buy', 'suppliers'));

    }


    public function Expire()
    {
        $sidbar = $this->sidbar();
        $suppliers = supplier::all();
        //lera wtwmana colomi debt = bw ba 1 ba boman bhene yan ble haya
        $buy = buy::where('expire', '<=', Carbon::today())->with('one_supplier')->orderBy('id', 'DESC')->paginate();
        return view('Expire', compact('sidbar', 'buy', 'suppliers'));

    }


    public function Saller()
    {
        $list = [
            'all piece' => sold::where('clean', 1)->sum('piece_at'),
            'all price' => sold::where('clean', 1)->sum('price_at'),
            'all piece today' => sold::where(['clean' => 1, 'created_at' => Carbon::today()])->sum('piece_at'),
            'all price today' => sold::where(['clean' => 1, 'created_at' => Carbon::today()])->sum('price_at'), ];
        $sidbar = $this->sidbar();
        $sold = sold::where('clean', 1)->orderBy('id', 'DESC')->paginate();
        return view('saller', compact('sidbar', 'sold', 'list'));
    }

    public function sale()
    {
        $sidbar = $this->sidbar();
        return view('sale', compact('sidbar', ));
    }

    public function get_sale(Request $request)
    {
        if (empty($request->id)) {
            exit("code nya");
        }
        $buy = buy::find($request->id);
        if ($buy) {
            if ($buy->count != 0) {
                if ($buy->expire > Carbon::today()) {
                    $buy->count = $buy->count - 1;
                    $buy->save();

                    $find = sold::where(['user_id' => Auth::id(), 'buy_id' => $buy->id, 'clean' => 0])->first();
                    if ($find == null) {
                        $sold = sold::create([
                            'user_id' => Auth::id(),
                            'buy_id' => $buy->id,
                            'clean' => 0,
                            'price_at' => $buy->price,
                            'piece_at' => 1,
                        ]);
                        return $sold ? "success" : "something worrning";
                    }
                    else {
                        $find->piece_at = $find->piece_at + 1;
                        $find->save();
                        return "success";
                    }
                }
                else {
                    exit("This product is expired");
                }
            }
            else {
                exit('The product int not longer available !');
            }
        }
        else {
            exit("this product is not founded");
        }
    }

    public function viewtb()
    {
        $sold = sold::where(['user_id' => Auth::id(), 'clean' => 0])->orderBy('updated_at', 'DESC')->get();
        return view('layout.table', compact('sold'));
    }

    public function undo(Request $request)
    {
        $find_sold = sold::where(['clean' => 0 ,'user_id' => Auth::id()])->find($request->sold_id);
        if ($find_sold) {

            $find_buy = buy::find($find_sold->buy_id);

            if ($find_buy) {
                // count +1
                $find_buy->count = $find_buy->count + 1;
                $find_buy->save();

                //piece -1
                if ($find_sold->piece_at == 1) {
                    $find_sold->delete();
                }
                else {
                    $find_sold->piece_at = $find_sold->piece_at - 1;
                    $find_sold->save();
                }
                return "success";
            }
            else {
                exit('The product is not founded');
            }
        }
        else {
            exit('Failed');
        }
    }

    public function wasl(){
        $sold = sold::where(['user_id' => Auth::id() , 'clean' => 0])->get();
        return View('layout.wasl' , compact('sold'));
    }

    public function clean(){
        $sold = sold::where('user_id' , Auth::id())->update(['clean' => 1]);
       return  redirect('Sale');
    }
}
