<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Models\position;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PositionsController extends Controller
{

    public function allData(){
        return view('table-positions', ['data' => position::all()]);

    }

    public function create(Request $request){
        return view('position-create');
    }

    public function create_submit(Request $request){

        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
        ]);

        $pos = new position();
        $pos->pos_name = $request->input('name');
        $pos->admin_updated_id = '';
        $pos->admin_created_id = '';
        $pos->save();

        return redirect()->route('table-positions');
    }


    public function edit( $id){
        $data = new position();
        return view('position-edit', ['data' => $data->find($id)]);
    }


    public function edit_submit($id, Request $request){

        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
        ]);

        $pos = position::find($id);
        $all_emp = admins::all();

        foreach ($all_emp as $emp){
            if ($emp->position === $pos->pos_name){
                $emp->position = $request->input('name');
                $emp->save();
            }
        }

        $pos->pos_name = $request->input('name');
        $pos->save();

        return redirect()->route('table-positions');
    }

    public function destroy_submit($id){
        $pos = position::find($id);

        $pos->delete();
        return redirect()->route('table-positions');
    }

    public function destroy($id){
        $data = position::find($id);

        $all_emp = admins::all();

        foreach ($all_emp as $emp) {
            if ($emp->position === $data->pos_name) {
                return redirect()->route('table-positions')->with('trouble', 'You cannot delete this position because it has employees.');
            }
        }
        return view('position-delete-submit', ['data' => $data]);
    }
}
