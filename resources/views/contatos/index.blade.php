@extends('layouts.master', ['title' => 'Contatos' ])

@section('content')
{{-- <section id="contacts">
  <div class="contacts-wrapper">

  </div>
</section> --}}
<div class="max-w mx-auto">

  <div class="p-4 max-w bg-white border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Contatos</h3>
      <a href="{{ route('contatos.create') }}"
        class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
        Cadastrar
      </a>
    </div>
    <div class="flow-root">
      <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach ($contacts as $item)
        <li class="py-3 sm:py-4">
          <div class="flex items-center space-x-4">
            <div class="flex-1 min-w-0">
              <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                {{ $item->name }}
              </p>
              <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                {{ $item->email }}
              </p>
            </div>
            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
              <a href="{{ route('contatos.edit', $item->id) }}"
                class="text-sm mr-4 font-medium text-blue-600 hover:underline dark:text-blue-500">
                Editar
              </a>
              <form action="{{ route('contatos.destroy', $item->id)}}" method="POST">
                <input name="_method" type="hidden" value="DELETE">
                {{ csrf_field() }}
                <button
                  class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                  Remover
                </button>
              </form>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection