<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LPSEAdminController extends Controller
{
	/**
	 * Menampilkan data LPSE.
	 */
	public function index()
	{
		$page_title = "LPSE";
		$page_description = "Kelola daftar LPSE yang diadakan oleh Dinas PUPR Kota Samarinda.";

		// TODO: Ambil semua data LPSE dari database dan kirimkan ke view
	}

	/**
	 * Menampilkan form untuk membuat data LPSE baru.
	 */
	public function create()
	{
		$page_title = "Tambah LPSE";
		$page_description = "Tambah LPSE yang diadakan oleh Dinas PUPR Kota Samarinda.";

		// TODO: Tampilkan form untuk input data LPSE baru
	}

	/**
	 * Menyimpan data LPSE yang baru dibuat ke database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 */
	public function store(Request $request)
	{
		// TODO: Validasi data yang dikirim dari form
		// TODO: Simpan data baru ke database
		// TODO: Redirect atau berikan response setelah penyimpanan
	}

	/**
	 * Menampilkan form untuk mengedit data LPSE berdasarkan ID.
	 *
	 * @param  int  $id
	 */
	public function edit($id)
	{
		$page_title = "Edit LPSE";
		$page_description = "ubah LPSE yang sudah diadakan oleh Dinas PUPR Kota Samarinda.";

		// TODO: Cari data LPSE berdasarkan ID
		// TODO: Tampilkan form dengan data yang ingin diedit
	}

	/**
	 * Memperbarui data LPSE di database berdasarkan ID.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 */
	public function update(Request $request, $id)
	{
		// TODO: Validasi data yang dikirim dari form
		// TODO: Update data LPSE berdasarkan ID
		// TODO: Redirect atau berikan response setelah update
	}

	/**
	 * Menghapus data LPSE dari database berdasarkan ID.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		// TODO: Validasi data yang dikirim dari form
		// TODO: Hapus data LPSE berdasarkan ID
		// TODO: Redirect atau berikan response setelah penghapusan
	}
}

