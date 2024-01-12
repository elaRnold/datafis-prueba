<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tareasItems = Tarea::where('userID', Auth::user()->id)->get();
        return view('home', compact('tareasItems'));

    }

    public function addDataView()
    {
        return view('data.addData');
    }

    public function addDataSend(Request $request)
    {
        $request->validate([
            "name" => "required|max:60"
        ]);

        $tarea = Tarea::create([
            "userID" => $request->userID,
            "name" => $request->name
        ]);

        if ($tarea) {
            return redirect()->route('tareas.add.view')->with(['create' => 'Tarea creada correcta 😊']);
        }
    }

    public function deleteDataItems($id)
    {
        $deleteTareasItem = Tarea::where('userID', Auth::user()->id)
            ->where('id', $id);

        try {
            $deleteTareasItem->delete();
        } catch (\Throwable $th) {
            abort(403);
        }

        if ($deleteTareasItem) {
            return redirect()->route('home')->with(['delete' => 'Tarea eliminada correctamente 😊']);
        }
    }

    public function editDataView($id)
    {
        $tarea = Tarea::where('userID', Auth::user()->id)
            ->where('id', $id)->first();

        return view('data.editData', compact('tarea'));

    }

    public function editDataSend(Request $request)
    {

        $request->validate([
            "name" => "required|max:60",
            "id" => "required",
        ]);


        $act = Tarea::where('userID', Auth::user()->id)
            ->where('id', $request->id)->first();

        try {
            $act->name = $request->name;
            $act->save();
        } catch (\Throwable $th) {
            abort(403);
        }

        if ($act) {
            return redirect()->route('home')->with(['update' => 'Tarea actualizada correctamente 😊']);
        }

    }
}
