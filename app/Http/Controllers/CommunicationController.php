<?php

namespace App\Http\Controllers;

use App\Communication;
use App\Project;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommunicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function communication_PC($p_id)
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $communi = Communication::where('project_id', $p_id)->get();
        $proceeding = $projects->where('step', '=', '계약')
            ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '대금지급'))
            ->get();

        return view('mypage.CommunicationPC.CommunicationPC', compact('communi', 'loginUser', 'proceeding', 'p_id'));
    }

    public function communication_PC_detail($id)
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $communi = Communication::find($id);
        $proceeding = $projects->where('step', '=', '계약')
            ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '대금지급'))
            ->get();

        return view('mypage.CommunicationPC.CommunicationPC_detail', compact('communi', 'loginUser', 'proceeding', 'id'));
    }

    public function communication_PC_create($p_id)
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);

        $proceeding = $projects->where('step', '=', '계약')
            ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '대금지급'))
            ->get();

        return view('mypage.CommunicationPC.CommunicationPC_create', compact('loginUser', 'proceeding', 'p_id'));
    }

    public function communication_PC_create_post(Request $request, $p_id)
    {

        $new_communi = new Communication();
        $new_communi->title = $request->title;
        $new_communi->content = $request->description;
        $new_communi->project_id = $p_id;
        $new_communi->writer_id = Auth::user()->id;
        $new_communi->save();
        $communi = Communication::where('project_id', $p_id)->get();

        return view('mypage.CommunicationPC.CommunicationPC', compact('p_id', 'communi'));
    }

    public function communication_PC_update($id)
    {
        $loginUser = Auth::user();
        $projects = Project::where('Client_id', '=', Auth::user()->id);
        $communi = Communication::find($id);
        $proceeding = $projects->where('step', '=', '계약')
            ->union(Project::where('Client_id', '=', Auth::user()->id)->where('step', '=', '대금지급'))
            ->get();

        return view('mypage.CommunicationPC.CommunicationPC_update', compact('loginUser', 'proceeding', 'communi', 'id'));
    }

    public function communication_PC_update_put(Request $request, $id)
    {
        $communi = Communication::find($id);
        $communi->title = $request->title;
        $communi->content = $request->description;
        $communi->save();

        return redirect()->action('CommunicationController@communication_PC_detail', ['id' => $id]);
        
    }

    public function communication_PC_delete(Request $request, $id)
    {

        $delete_communi = Communication::find($id);
        if (Auth::user()->id != $delete_communi->writer_id) {
            return response()->view('errors.503');
        }
        $p_id = $delete_communi->project_id;
        $delete_communi->delete();
        $communi = Communication::where('project_id', $p_id)->get();

        return view('mypage.CommunicationPC.CommunicationPC', compact('communi', 'p_id'));
    }
}
