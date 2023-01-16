<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ApiController extends Controller
{
  public function getAllContacts()
  {
    $contacts = Contact::get()->toJson(JSON_PRETTY_PRINT);
    return response($contacts, 200);
  }

  public function createContact(Request $request)
  {
    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email ?? '';
    $contact->phone = $request->phone ?? '';
    $contact->whatsapp = $request->whatsapp ?? '';
    $contact->save();

    return response()->json([
      "message" => "Contato criado com sucesso!"
    ], 201);
  }

  public function getContact($id)
  {
    if (Contact::where('id', $id)->exists()) {
      $contact = Contact::find($id)->toJson(JSON_PRETTY_PRINT);
      return response($contact, 200);
    } else {
      return response()->json([
        "message" => "Contato não encontrado!"
      ], 404);
    }
  }

  public function updateContact(Request $request, $id)
  {
    if (Contact::where('id', $id)->exists()) {
      $contact = Contact::find($id);
      $contact->name = is_null($request->name) ? $contact->name : $request->name;
      $contact->email = is_null($request->email) ? $contact->email : $request->email;
      $contact->phone = is_null($request->phone) ? $contact->phone : $request->phone;
      $contact->whatsapp = is_null($request->whatsapp) ? $contact->whatsapp : $request->whatsapp;
      $contact->save();

      return response()->json([
        "message" => "Contato atualizado com sucesso!"
      ], 200);
    } else {
      return response()->json([
        "message" => "Contato não encontrado"
      ], 404);
    }
  }

  public function deleteContact($id)
  {
    if(Contact::where('id', $id)->exists()) {
      $contact = Contact::find($id);
      $contact->delete();

      return response()->json([
        "message" => "Contato removido!"
      ], 202);
    } else {
      return response()->json([
        "message" => "Contato não encontrado"
      ], 404);
    }
  }
}
