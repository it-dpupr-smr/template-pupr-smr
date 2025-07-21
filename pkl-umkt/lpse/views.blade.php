Code index.blade.php, create.blade.php, dan edit.blade.php ada di sini

.
.
.
.
.
.

{{-- ========== index.blade.php (START) ========== --}}

@extends('admin.layout')

@section('document.head')
  @vite(['resources/css/datatables.css', 'resources/js/datatables.js'])
@endsection

@section('document.body')
  <a href="{{ route('admin.lpse.create') }}"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5">
    <i class="fa-solid fa-plus me-1"></i>Tambah LPSE
  </a>

  <div class="w-full p-4 rounded-lg shadow-xl sm:p-8 mt-5">
    <div class="relative overflow-x-auto text-sm md:text-base">
      {{-- TODO: Tambahkan kolom yang diperlukan --}}
      <table id="lpse" class="stripe hover row-border table-auto" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Dibuat pada</th>
            <th>Diubah pada</th>
            <th>Kelola</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($lpse as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>

              <td>{{ $item->views_count }}</td>
              <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
              <td>{{ $item->update_at->format('d-m-Y H:i') }}</td>
              <td>
                <div class="flex gap-2">
                  <a href="{{ route('admin.lpse.edit', $item->id) }}"
                    class="flex justify-center items-center w-10 h-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm p-2.5 focus:outline-none">
                    <i class="fa-solid fa-pencil"></i>
                  </a>
                  <button data-modal-target="deleteModal-{{ $item->id }}"
                    data-modal-toggle="deleteModal-{{ $item->id }}"
                    class="flex justify-center items-center w-10 h-10 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg text-sm p-2.5 focus:outline-none">
                    <i class="fa-solid fa-trash-can"></i>
                  </button>
                </div>
              </td>
            </tr>

            <div id="deleteModal-{{ $item->id }}" data-modal-target="deleteModal-{{ $item->id }}"
              data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
              class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Konfirmasi Penghapusan
                    </h3>
                    <button type="button"
                      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                      data-modal-hide="deleteModal-{{ $item->id }}">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                  </div>
                  <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                      Apakah Anda yakin ingin menghapus lpse <strong>{{ $item->judul_lpse }}</strong>?
                    </p>
                  </div>
                  <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <form action="{{ route('admin.lpse.destroy', $item->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Hapus</button>
                    </form>
                    <button type="button"
                      class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                      data-modal-hide="deleteModal-{{ $item->id }}">
                      Tidak
                    </button>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>#</th>
            <th>Dibuat pada</th>
            <th>Diubah pada</th>
            <th>Kelola</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

@section('document.end')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      $('#lpse').DataTable();

      document.body.addEventListener('click', function(e) {
        var toggleBtn = e.target.closest('[data-modal-toggle]');
        if (toggleBtn) {
          var modalId = toggleBtn.getAttribute('data-modal-toggle');
          var modalEl = document.getElementById(modalId);
          if (window.Modal && modalEl) {
            if (!modalEl.__flowbiteModal) {
              modalEl.__flowbiteModal = new window.Modal(modalEl);
            }
            modalEl.__flowbiteModal.show();
          }
        }
      });

      document.body.addEventListener('click', function(e) {
        var hideBtn = e.target.closest('[data-modal-hide]');
        if (hideBtn) {
          var modalId = hideBtn.getAttribute('data-modal-hide');
          var modalEl = document.getElementById(modalId);
          if (window.Modal && modalEl && modalEl.__flowbiteModal) {
            modalEl.__flowbiteModal.hide();
          }
        }
      });
    });
  </script>
@endsection

{{-- ========== index.blade.php (END) ========== --}}

.
.
.
.
.
.

{{-- ========== create.blade.php (START) ========== --}}
@extends('admin.layout')

@section('document.head')
  {{-- Tambahkan code di sini jika diperlukan. Hapus section ini jika tidak diperlukan --}}
@endsection

@section('document.body')
  {{-- TODO: Tambahkan form input yang diperlukan --}}
  <form action="{{ route('admin.lpse.store') }}" method="POST" id="form-lpse">
    @csrf

    {{-- Input type text --}}
    <div class="mb-4">
      <label for="nama_kolom" class="block text-sm font-medium text-gray-700">Ini input type text</label>
      <input type="text" name="nama_kolom" id="nama_kolom"
        class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required />
    </div>

    {{-- Input type select --}}
    <div class="mb-4">
      <label for="nama_kolom" class="block text-sm font-medium text-gray-700">Ini input type select</label>
      <select name="nama_kolom" id="nama_kolom" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        <option value="ini value option">Ini option yang ada</option>
        <option value="ini value option">Ini option yang ada</option>
      </select>
    </div>

    <div class="mb-4">
      <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md">Tambah</button>
    </div>
  </form>
@endsection

@section('document.end')
  {{-- Tambahkan code di sini jika diperlukan. Hapus section ini jika tidak diperlukan --}}
@endsection

{{-- ========== create.blade.php (END) ========== --}}

.
.
.
.
.
.

{{-- ========== edit.blade.php (START) ========== --}}
@extends('admin.layout')

@section('document.head')
  {{-- Tambahkan code di sini jika diperlukan. Hapus section ini jika tidak diperlukan --}}
@endsection

@section('document.body')
  {{-- TODO: Tambahkan form input yang diperlukan --}}
  <form action="{{ route('admin.lpse.update', $lpse->id) }}" method="POST" id="form-lpse">
    @csrf
    @method('PUT')

    {{-- Input type text --}}
    <div class="mb-4">
      <label for="nama_kolom" class="block text-sm font-medium text-gray-700">Ini input type text</label>
      <input type="text" name="nama_kolom" id="nama_kolom" value="{{ $lpse->nama_kolom }}"
        class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required />
    </div>

    {{-- Input type select --}}
    <div class="mb-4">
      <label for="nama_kolom" class="block text-sm font-medium text-gray-700">Ini input type select</label>
      <select name="nama_kolom" id="nama_kolom" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        <option value="ini value option" {{ $lpse->nama_kolom ? 'selected' : '' }}>Ini option yang ada</option>
        <option value="ini value option" {{ $lpse->nama_kolom ? 'selected' : '' }}>Ini option yang ada</option>
      </select>
    </div>

    <div class="mb-4">
      <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md">Perbarui</button>
    </div>
  </form>
@endsection

@section('document.end')
  {{-- Tambahkan code di sini jika diperlukan. Hapus section ini jika tidak diperlukan --}}
@endsection

{{-- ========== edit.blade.php (END) ========== --}}
