<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ContactsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetchedAllContacts = Contact::all();
        $fetchedAllAttributes = [];

        foreach ($fetchedAllContacts as $model){
            $fetchedAllAttributes[] = $model->attributesToArray();
        }

        return json_encode($fetchedAllAttributes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

           $a=5;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::json();

        $contact = new Contact();
        $contact->first_name = $input->get('first_name');
        $contact->last_name = $input->get('last_name');
        $contact->email_address = $input->get('email_address');
        $contact->description = $input->get('description');
        $contact->save();

       //обязательно вернуть модель с присвоенным id
        return json_encode($contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode(Contact::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a=5;
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
        $contact = Contact::find($id);
        $input = Input::json();

        $contact->first_name = $input->get('first_name');
        $contact->last_name = $input->get('last_name');
        $contact->email_address = $input->get('email_address');
        $contact->description = $input->get('description');
        $contact->save();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (string)Contact::find($id)->delete();
    }

}