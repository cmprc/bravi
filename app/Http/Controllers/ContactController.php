<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ContactController extends Controller
{
  public function index(Request $request)
  {
    $request = Request::create('/api/contacts', 'GET');
    $response = Route::dispatch($request);
    $contacts = json_decode($response->getContent(), true);

    return view('contatos.index', compact('contacts'));
  }

  public function create()
  {
    return view('contatos.form');
  }

  public function edit(string $id)
  {
    $request = Request::create('/api/contacts/' . $id, 'GET');
    $response = Route::dispatch($request);
    $contact = json_decode($response->getContent(), true);

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
        $req = Request::create('/api/contacts/' . $id, 'POST', $request->all());
        $response = Route::dispatch($req);
        $message = json_decode($response->getContent(), true);
      } else {
        $req = Request::create('/api/contacts', 'POST', $request->all());
        $response = Route::dispatch($req);
        $message = json_decode($response->getContent(), true);
      }
    });

    return redirect()->route('contatos.index');
  }

  public function destroy(string $id)
  {
    $req = Request::create('/api/contacts/' . $id, 'DELETE');
    $response = Route::dispatch($req);
    $message = json_decode($response->getContent(), true);

    return redirect()
      ->route('contatos.index')
      ->with('message', __('Registro removido com sucesso!'));
  }

  public function validator()
  {
    return view('contatos.validator');
  }
}
