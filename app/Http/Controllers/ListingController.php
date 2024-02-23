<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        // OR
        $this->middleware('auth')->only(['store', 'update', 'edit', 'create']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view("listing.index", ["listings" => Listing::latest()->filter(request(["tag", "search"]))->paginate(6)]);

        // }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("listing.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate(
            [
                "company" => "required",
                "title" => "required",
                "location" => "required",
                "email" => ["required", "email"],
                "website" => "required",
                "tags" => "required",
                "description" => "required",


            ]

        );
        if (request()->hasFile("logo")) {

            $fields["logo"] = $request->file("logo")->store("logos", "public");

        }
        $fields["user_id"] = auth()->id();

        Listing::create($fields);

        return redirect("/")->with("message", "Job Created Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return view('listing.show', [
            "list" => $listing,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view("listing.edit", ["list" => $listing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $fields = $request->validate(
            [
                "company" => "required",
                "title" => "required",
                "location" => "required",
                "email" => ["required", "email"],
                "website" => "required",
                "tags" => "required",
                "description" => "required",


            ]

        );
        if (request()->hasFile("logo")) {

            $fields["logo"] = $request->file("logo")->store("logos", "public");
        }
        if ($listing->user_id != auth()->id()) {

            abort(403, "unauthoriezed");
        }
        $listing->update($fields);

        return back()->with("message", "Job Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
        if ($listing->user_id != auth()->id()) {

            abort(403, "unauthoriezed");
        }
        $listing->delete();
        return redirect("/")->with("message", "Job Deleted Successfully");

    }
    public function manage()
    {
        return view("listing.manage", ["listings" => auth()->user()->listings()->get()]);
    }

}