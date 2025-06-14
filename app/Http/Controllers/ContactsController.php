<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;

//use Illuminate\Database\Eloquent\SoftDeletes;


/*
A contact is an entity with 4 fields: ID, Name, Contact and email address. Name should be a string of any size greater than 5, contact should be 9 digits, and email should be a valid email.

Each row in the index page should have a link to edit the contact, and a button to delete the contact. The delete should perform a soft delete of the record, using Laravel features.

The contact details page should show all the fields of the contact plus the edit link and the delete button. A standalone page should be implemented for showing the details of a contact, and not a popup displaying the information.

Contact and email address should be unique, two contacts cannot have the same.

*/

class ContactsController extends Controller
{
    /**
     * Show the whole good stuff aka the contacts themselves
     */
    public function index(): View
    {
        $contact = new Contact();
        $contacts = $contact->all();

        return view('home', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating the resource.
     */
    public function create(): View
    {
        return view('new');
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $message = ['status' => 'bg-danger', 'text' => 'Invalid data input.'];

        //Get all values from post request in one array
        $data = $request->all();

        // Validate "name" only
        $nameValidator = Validator::make(['name' => $data['name']], [
            'name' => 'required|string|min:6'
        ]);

        if ($nameValidator->fails()) {
            $message = ['status' => 'bg-danger', 'text' => 'Name must be at least 6 characters long.'];
            return redirect('new')->with('message', $message);
        }

        // Validate "email" only
        $emailValidator = Validator::make(['email' => $data['email']], [
            'email' => 'required|email|unique:contacts,email'
        ]);

        if ($emailValidator->fails()) {
            $message = ['status' => 'bg-danger', 'text' => 'Email is not valid.'];
            return redirect('new')->with('message', $message);
        }

        // Validate "telephone" only
        $telephoneValidator = Validator::make(['telephone' => $data['telephone']], [
            'telephone' => 'required|digits:9'
        ]);

        if ($telephoneValidator->fails()) {
            $message = ['status' => 'bg-danger', 'text' => 'Phone number must have 9 digits.'];
            return redirect('new')->with('message', $message);
        }
        
        if($data){
            $message = ['status' => 'bg-success', 'text' => 'Contact added.'];
            Contact::create($data);
        }

        return redirect('new')->with('message', $message);
    }

    /**
     * Display the resource.
     */
    public function show($id): View
    {
        $contact = new Contact();
        $item = $contact->find($id);

        return view('detail', [
            'contact' => $item
        ]);
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id): View
    {
        $contact = new Contact();
        $item = $contact->find($id);

        return view('edit', [
            'contact' => $item
        ]);
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $message = ['status' => 'bg-danger', 'text' => 'Invalid data input.'];
        $data = $request->all();

        $contact = new Contact();
        $item = $contact->findOrFail($id);

        /*if (!$item) {
            $message = ['status' => 'bg-danger', 'text' => 'No data.'];
            return redirect('edit/' . $id)->with('message', $message);
        }*/

        // Validate "name" only
        $nameValidator = Validator::make(['name' => $data['name']], [
            'name' => 'required|string|min:6'
        ]);

        if ($nameValidator->fails()) {
            $message = ['status' => 'bg-danger', 'text' => 'Name must be at least 6 characters long.'];
            return redirect('edit/' . $id)->with('message', $message);
        }

        // Validate "email" only
        $emailValidator = Validator::make(['email' => $data['email']], [
            'email' => 'required|email'
        ]);

        if ($emailValidator->fails()) {
            $message = ['status' => 'bg-danger', 'text' => 'Email is not valid.'];
            return redirect('edit/' . $id)->with('message', $message);
        }

        // Validate "telephone" only
        $telephoneValidator = Validator::make(['telephone' => $data['telephone']], [
            'telephone' => 'required|digits:9'
        ]);

        if ($telephoneValidator->fails()) {
            $message = ['status' => 'bg-danger', 'text' => 'Phone number must have 9 digits.'];
            return redirect('edit/' . $id)->with('message', $message);
        }

        if($data){
            $message = ['status' => 'bg-success', 'text' => 'Contact updated.'];
            
            $validated = array_merge(
                $nameValidator->validated(),
                $emailValidator->validated(),
                $telephoneValidator->validated()
            );

            $item->update($validated);
        }
         
        return redirect('edit/' . $id)->with('message', $message);
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $message = ['status' => 'bg-danger', 'text' => 'An error occurred.'];

        $contact = new Contact();
        $item = $contact->findOrFail($id);

        if($item){
            $message = ['status' => 'bg-success', 'text' => 'Contact deleted with success.'];
        }

        return redirect('/')->with('message', $message);
    }
}
