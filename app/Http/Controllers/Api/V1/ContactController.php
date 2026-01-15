<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return Contact::where('user_id', $request->user()->id)
        ->orderBy('name')
        ->get();
    }

    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'nullable|email|max:255',
            'phone'=>'nullable|string|max:50',
            'notes'=>'nullable|string',
        ]);
        $data['user_id'] = $request->user()->id;

        $contact = Contact::create($data);
        return response()->json($contact, 201);
    }

    public function show(Contact $contact)
    {
        //
        return $contact;
    }

    public function update(Request $request, Contact $contact)
    {
        //
        $data = $request->validate([
            'name'=>'sometimes|required|string|max:255',
            'email'=>'nullable|email|max:255',
            'phone'=>'nullable|string|max:50',
            'notes'=>'nullable|string',
        ]);

        $contact->update($data);
        return $contact;

    }

    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        return response()->json(null, 204);
    }
}
