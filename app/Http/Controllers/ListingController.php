<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{   
    // show all listings
    public function index() {

    
        // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // show create form
    public function create() {
        return view('listings.create');
    }


    // update listing data
    public function update(Request $request, Listing $listing) {

        // make sure login user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // TODO
        // se for usar o unguard pro mass assignment
        // fazer antes um array com os valores validados que você quer inserir no seu banco

        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
    }

        // show listing data
        public function store(Request $request) {
            $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required', Rule::unique('listings', 'company')],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required',
            ]);
    
            if ($request->hasFile('logo')) {
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }
    
            // TODO
            // se for usar o unguard pro mass assignment
            // fazer antes um array com os valores validados que você quer inserir no seu banco
    
            $formFields['user_id'] = auth()->id();
            
            Listing::create($formFields);
    
            return redirect('/')->with('message', 'Listing created successfully!');
        }

    public function edit(Listing $listing) {
        // if($listing->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized action');
        // }
        // dd($listing);
        return view('listings.edit', ['listing' => $listing]);
    }

    public function destroy(Listing $listing) {
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }

    // manage listings
    public function manage() {
        // dd(auth()->user()->listings()->get());
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
        // illuminate\database\eloquent\erlations
    }

}
