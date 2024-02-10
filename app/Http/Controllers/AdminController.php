<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Lead;
use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $categories = VideoCategory::all();
        $videos = Video::all();

        return view('admin.dashboard', compact('categories', 'videos'));
    }

    public function getLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.auth.login');
        }
    }

    public function postLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' =>   $request->password])) {
            return redirect()->route('admin.dashboard')->with('success', 'You are Logged in sucessfully.');
        } else {
            return redirect()->back()->with('error', 'Whooops Email and Password does not match.');
        }
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }


    public function getLeads()
    {
        $leads = Lead::with('campaign')->get();
        $accepted = Lead::where('status', '=', 1)->get();
        $rejected = Lead::where('status', '=', 0)->get();
        $total_leads = $leads->count();
        $accepted_lead_count = $accepted->count();
        $rejected_lead_count = $rejected->count();

        return view('admin.components.leads.leads-list', compact('leads', 'accepted_lead_count', 'rejected_lead_count', 'total_leads'));
    }

    public function getFilterLeads(Request $request)
    {
        $data = Lead::with('campaign')->whereBetween('created_at', [$request->start, $request->end]);
        $leads = $data->get();
        $total_leads = $leads->count();
        $accepted = $data->where('status', 1)->get();
        $rejected = $data->where('status', 0)->get();
        $accepted_lead_count = $accepted->count();
        $rejected_lead_count = $rejected->count();

        return view('admin.components.leads.leads-list', compact('leads', 'accepted_lead_count', 'rejected_lead_count', 'total_leads'));
    }

    public function addLeads()
    {
        $campaign = Campaign::all();
        return view('admin.components.leads.lead-form', compact('campaign'));
    }

    public function getCampaigns()
    {
        $campaign = Campaign::all();

        return view('admin.components.campaign.campaign-list', compact('campaign'));
    }

    public function storeCampaign(Request $request)
    {
        // dd($request->all());
        Campaign::create([
            'name' => $request->name,
        ]);
        return redirect('/admin/campaign-list')->with('success', 'created.');
    }

    public function storeLead(Request $request)
    {
        $data = $request->except('_token');
        Lead::create($data);
        return redirect('/admin/leads-list')->with('success', 'created.');
    }

    public function template()
    {
        return view('admin.components.template');
    }
}
