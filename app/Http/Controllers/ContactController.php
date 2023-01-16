<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
  public function index(Request $request)
  {
    $contacts = ApiController::getAllContacts();
    $contacts = json_decode($contacts->getContent());

    return view('contatos.index', compact('contacts'));
  }

  public function create()
  {
    return view('contatos.form');
  }

  public function edit(string $id)
  {
    $contact = ApiController::getContact($id);
    $contact = json_decode($contact->getContent());

    return view("contatos.form", compact('contact'));
  }

  public function update(Request $request, string $id)
  {
    return $this->save($request, $id);
  }

  public function store(Request $request)
  {
    return $this->save($request);
  }

  private function save(Request $request, ?string $id = null)
  {
    DB::transaction(function () use ($request, $id) {
      if (isset($id)) {
        $contact = ApiController::updateContact($request, $id);
      } else {
        $contact = ApiController::createContact($request);
      }
    });

    return redirect()->route('contatos.index');
  }

  public function destroy(string $id)
  {
    $register = ApiController::deleteContact($id);

    return redirect()
      ->route('contatos.index')
      ->with('message', __('Registro removido com sucesso!'));
  }
}
