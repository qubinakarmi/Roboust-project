<?php

namespace App\Http\Controllers;

use App\Exports\TeamsExport;
use Illuminate\Http\Request;
use App\Models\Team;
use Maatwebsite\Excel\Facades\Excel;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function export()
   {
    return Excel::download(new TeamsExport,'teams.xlsx');

   }
    public function index(Request $request)

    {
        $teams=Team::when($request->filled('search'),function($query) use($request){
            $query->where(function($q) use($request){
            $q->where('designation','LIKE','%'.$request->search.'%')
            ->orWhere('full_name','LIKE','%'.$request->search.'%')
            ->orWhere('phone','LIKE','%'.$request->search.'%')
            ->orWhere('address','LIKE','%'.$request->search.'%')
            ->orWhere('ordering','LIKE','%'.$request->search.'%');
            });
           

        })->when($request->filled('status') , function ($query) use ($request) {
                $query->where('status', $request->status);
            })->latest()->paginate(5)->appends([
            'status'=>$request->status,
            'search'=>$request->search,
            
        ]);
        return view('admin.teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([



        'designation'=>'required',
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'address'=>'required',
        'logo'=>'required|mimes:jpg,jpeg,svg,png|max:2048',
        'linkedin'=>'required',
        'twitter'=>'required',
        'facebook'=>'required',
        'ordering'=>'required',
        'status'=>'required',


        ]);

        if($request->hasFile('logo'))
            {
                $file=$request->file('logo');
                $fileName= time(). '.' .$file->getClientOriginalExtension();
                $file->move(public_path('teams'),$fileName);
            }

            Team::create([
                'designation'=>$request->designation,
                'full_name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'short_bio'=>$request->bio,
                'image'=>$fileName,
                'linkedin'=>$request->linkedin,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'ordering'=>$request->ordering,
                'status'=>$request->status,

            ]);

            return redirect()->route('team.index')->with('success','Teams has been Registered');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $team=Team::findorFail($id);
        return view('admin.teams.edit',compact('team'));




        

    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $request->validate([
        'designation' => 'required',
        'name'        => 'required',
        'email'       => 'required',
        'phone'       => 'required',
        'address'     => 'required',
        'logo'        => 'nullable|mimes:jpg,jpeg,svg,png|max:2048',
        'linkedin'    => 'required',
        'twitter'     => 'required',
        'facebook'    => 'required',
        'ordering'    => 'required',
        'status'      => 'required',
    ]);

    $team = Team::findOrFail($id);

    // Prepare data array for update
    $data = [
        'designation' => $request->designation,
        'full_name'   => $request->name,
        'email'       => $request->email,
        'phone'       => $request->phone,
        'address'     => $request->address,
        'short_bio'   => $request->bio,
        'linkedin'    => $request->linkedin,
        'facebook'    => $request->facebook,
        'twitter'     => $request->twitter,
        'ordering'    => $request->ordering,
        'status'      => $request->status,
    ];

    // Handle file upload if present
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('teams'), $fileName);

        $data['image'] = $fileName; // add image to data array
    }

    // Update all fields at once
    $team->update($data);

    return redirect()->route('team.index')->with('success', 'Team updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

           $team = Team::findOrFail($id);

        // Optional: Delete the associated image file from storage
        if ($team->image && file_exists(public_path('teams/' . $team->image))) {
            unlink(public_path('teams/' . $team->image));
        }

        // Delete the record from database
        $team->delete();

        return redirect()->route('team.index')->with('success', 'Team deleted successfully!');
    }
}
