<?php
/**
 * Created by PhpStorm.
 * User: kauxtero
 * Date: 1/29/19
 * Time: 9:33 AM
 */

namespace App\Http\Controllers;


use App\Contact;
use App\Http\Requests\StoreContact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Contact::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = new Contact();
        $contact->name = 'John Doe';
        $contact->email = 'johndoe@test.com';
        $contact->phone = '093238282338';
        $contact->country = 'Philippines';
        $contact->city = 'Cebu';
        $contact->state = 'n/a';
        $contact->zip = '6000';
        $contact->save();

        return response($contact->jsonSerialize(), Response::HTTP_CREATED);
    }

    /**
     * Store the data for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->country = $request->input('country');
        $contact->city = $request->input('city');
        $contact->state = $request->input('state');
        $contact->zip = $request->input('zip');
        $contact->save();

        return response($contact->jsonSerialize(), Response::HTTP_CREATED);
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
        $contact = Contact::findOrFail($id);
        $contact->color = $request->color;
        $contact->save();
        return response(null, Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}