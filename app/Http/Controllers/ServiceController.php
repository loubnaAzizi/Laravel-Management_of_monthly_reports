<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services =DB::table('services')->orderBy('id','desc')->paginate(4);
        return view('service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add=false;
        $request->validate([
            'nomService'=>'required|unique:services',
        ]);
       
        $service=new Service();
        $service->nomService=$request->input('nomService');
        $service->save();
        $add=true;
        if($add==true){
            Toastr::success('Service Successfully saved','Success');
            return redirect()->route('service.index');
        }else{
            Toastr::error('Service not saved','Error');
            return redirect()->route('service.index');
        }
        

        return redirect()->route('service.index');
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
    public function edit(Service $service)
    {
       
        return view('service.edit',['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $add=false;
        $service =Service::findOrFail($id);
        if($service->nomService===$request->nomService){
            $request->validate([
                 'nomService'=>'required',
                
             ]);
         
         }else{
            $request->validate([
                 'nomService'=>'required|unique:services',
               
             ]);
 
         }
         $service->nomService=$request->input('nomService');
         $service->save();
         $add=true;
         if($add==true){
             Toastr::success('Service Successfully updated','Success');
             return redirect()->route('service.index');
         }else{
             Toastr::error('Service not updated','Error');
             return redirect()->route('service.index');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        
        return redirect()->route('service.index');
    }
}
