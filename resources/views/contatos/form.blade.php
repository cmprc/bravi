@extends('layouts.master', ['title' => 'Contato' ])

@section('content')
<div class="max-w mx-auto bg-white p-16 dark:bg-gray-800 dark:border-gray-700">
  <form id="form.{{ 'contatos' }}" action="{{ route('contatos'.(isset($contact) ? '.update' : '.store'), $contact->id ?? null) }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($contact))
    @method('PUT')
    @endif

    <div class="grid gap-6 mb-6 lg:grid-cols-2">
      <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nome</label>
        <input type="text" id="name"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Nome" value="{{ $contact->name ?? '' }}" name="name" required>
      </div>
      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">E-mail</label>
        <input type="text" id="email"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="E-mail" value="{{ $contact->email ?? '' }}" name="email">
      </div>
      <div>
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Telefone</label>
        <input type="text" id="phone"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Telefone" value="{{ $contact->phone ?? '' }}" name="phone">
      </div>
      <div>
        <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Whatsapp</label>
        <input type="text" id="whatsapp"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Whatsapp" value="{{ $contact->whatsapp ?? '' }}" name="whatsapp">
      </div>
    </div>
    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvar</button>

  </form>
</div>
@endsection