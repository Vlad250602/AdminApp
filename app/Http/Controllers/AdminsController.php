<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Models\position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = DB::table('admins')->simplePaginate(100);

        return view('home', ['admins' => $admins]);
    }

    public function allData(){
        return view('home', ['data' => admins::all()]);

    }

    public function create(Request $request){
        return view('employee-create',['all_emp' => admins::all()],['all_pos' => position::all()]);
    }

    public function create_submit(Request $request){

        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' =>  'email:rfc,dns',
            'salary' => 'required|numeric|max:500',
            'head' => 'nullable|exists:admins,name|not_in:' .$request->input('name'),
            'emp_date' => 'required',
            'phone' => 'required|min:19',
            'photo' => 'dimensions:min_width=300,min_height=300|max:5120'
        ]);



        $admin = new admins();
        $admin->name = $request->input('name');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->position = $request->input('position');
        if ($request->input('head') === NULL){
            $admin->head = "";
        }
        else{
            $admin->head = $request->input('head');
        };
        $admin->salary = $request->input('salary');
        $admin->emp_date = $request->input('emp_date');
        $admin->admin_updated_id = Auth::user()->id;
        $admin->admin_created_id = Auth::user()->id;
        if ($request->file('photo') === NULL){
            $admin->photo = 'emp_placeholder.png';
        }
        else {
            $filename = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(Storage::path('/public/image/employees/') . 'origin/', $filename);
            Image::make(Storage::path('/public/image/employees/').'origin/'.$filename)->fit(300, 300)->save();

            $admin->photo = $filename;
        }


        $admin->save();

        return redirect()->route('home');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(admins $admins)
    {
        //
    }


    public function edit(admins $admins, $id){
        $data = new admins;
        return view('employee-edit', ['data' => $data->find($id)],['all_pos' => position::all()]);
    }


    public function edit_submit($id, Request $request){

        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' =>  'email:rfc,dns',
            'salary' => 'required|numeric|max:500',
            'head' => 'nullable|exists:admins,name|not_in:' .$request->input('name'),
            'emp_date' => 'required',
            'photo' => 'dimensions:min_width=300,min_height=300|max:5120'
        ]);

        $admin = admins::find($id);

        $all_emp = admins::all();
        foreach ($all_emp as $emp){
            if ($emp->head === $admin->name){
                $emp->head = $request->input('name');
                $emp->save();
            }
        }

        $admin->name = $request->input('name');
        $admin->phone = $request->input('phone');
        $admin->email = $request->input('email');
        $admin->position = $request->input('position');
        if ($request->input('head') === NULL){
            $admin->head = "";
        }
        else{
            $admin->head = $request->input('head');
        };
        $admin->salary = round($request->input('salary'),3);
        $admin->emp_date = $request->input('emp_date');
        $admin->admin_updated_id = Auth::user()->id;

        if ($request->file('photo') === NULL){
            $admin->photo = 'emp_placeholder.png';
        }
        else {
            $filename = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(Storage::path('/public/image/employees/') . 'origin/', $filename);
            Image::make(Storage::path('/public/image/employees/').'origin/'.$filename)->fit(300, 300)->save();

            $admin->photo = $filename;
        }

        $admin->save();


        return redirect()->route('home');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admins $admins)
    {
        //
    }

    public function destroy_submit($id){

        $admin = admins::find($id);

        $all_emp = admins::all();
        foreach ($all_emp as $emp){
            if ($emp->head === $admin->name){
                $emp->head = "";
                $emp->save();
            }
        }
        admins::find($id)->delete();
        return redirect()->route('home');
    }

    public function destroy($id){
        $data = new admins();
        return view('employee-delete-submit', ['data' => $data->find($id)]);
    }
}
