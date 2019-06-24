<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    public function index(){
 
        $portfolios = \App\Portfolio::all();
        return view('pages.portfolio', compact('portfolios'));
    }

    public function store(Request $request) {
        
        // Regex for http and https links
        $regex = '/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/';

        $validatePortfolio = $request->validate([  
            'name' => ['required'],
            'desc' => ['required'],
            'url' => ['required', 'regex:'.$regex],
            'img' => ['mimes:jpg,jpeg,png,bmp,tiff'],
        ]);
        
        $portfolio = new Portfolio;

        // Image Input Field
        if($request->file('img')) {
            $portfolioFile = $request->file('img');
            $portfolioExtension = $request->file('img')->getClientOriginalExtension();
            $portfolioFileOriginalName = $request->file('img')->getClientOriginalName();
            $pureFileName = substr($portfolioFileOriginalName, 0, strrpos($portfolioFileOriginalName, "."));
            $portfolioFileName = $pureFileName;
        
            $num = 1;
            $exists = Storage::disk('portfolio')->exists($portfolioFileOriginalName);
            if($exists == false) {
                $portfolioCheckName = $portfolioFileName;
            }
            while($exists == true) {
                $portfolioCheckName = $portfolioFileName . '(' . $num . ')';
                $num++;
                $exists = Storage::disk('portfolio')->exists($portfolioCheckName . '.' . $portfolioExtension);
            }

            $portfolioFileName = $portfolioCheckName . '.' . $portfolioExtension;
            Storage::disk('portfolio')->put($portfolioFileName, File::get($portfolioFile));
            $portfolio->img = $portfolioFileName;
        }
        // End Image Input Field 

        $portfolio->name = $request->name;
        $portfolio->desc = $request->desc;
        $portfolio->url = $request->url;

        $portfolio->save();
        return redirect('/portfolio')->with('message', 'Added new portfolio item successfully!');
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolio = new Portfolio;
        return view('pages.portfolio.portfolio-add', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::where('id', $id)
                    ->first();
        
        return view('pages.portfolio.portfolio-edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
         // Regex for http and https links
         $regex = '/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/';

         $validatePortfolio = $request->validate([  
             'name' => ['required'],
             'desc' => ['required'],
             'url' => ['required', 'regex:'.$regex],
             'img' => ['mimes:jpg,jpeg,png,bmp,tiff'],
         ]);

         $portfolio = Portfolio::where('id', $id)
         ->first();
         
         // Image Input Field
         if($request->file('img')) {
            $portfolioFile = $request->file('img');
            $portfolioExtension = $request->file('img')->getClientOriginalExtension();
            $portfolioFileOriginalName = $request->file('img')->getClientOriginalName();
            $pureFileName = substr($portfolioFileOriginalName, 0, strrpos($portfolioFileOriginalName, "."));
            $portfolioFileName = $pureFileName;

            $num = 1;
            $exists = Storage::disk('portfolio')->exists($portfolioFileOriginalName);
            if($exists == false) {
                $portfolioCheckName = $portfolioFileName;
            }
            while($exists == true) {
                $portfolioCheckName = $portfolioFileName . '(' . $num . ')';
                $num++;
                $exists = Storage::disk('portfolio')->exists($portfolioCheckName . '.' . $portfolioExtension);
            }
            
            $portfolioFileName = $portfolioCheckName . '.' . $portfolioExtension;
            Storage::disk('portfolio')->put($portfolioFileName, File::get($portfolioFile));
            $portfolio->img = $portfolioFileName;
         }
         // End Image Input Field

         $portfolio->name = $request->name;
         $portfolio->desc = $request->desc;
         $portfolio->url = $request->url;
        
         $portfolio->save();

         return redirect('/portfolio')->with('message', 'Successfully edited portfolio item!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $portfolio = Portfolio::findOrFail($id);

        $portfolio->delete();
    
        return redirect('/portfolio')->with('message', 'Removed portfolio item successfully!');
    }
}
