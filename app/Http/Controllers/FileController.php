<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }

    public function upload(Request $request)
    {

        // dd($request);

        if ($request->my_file->isValid()) { //Valida carga
            
            //Guarda en storage/app/archivos_cargados
            $hash = $request->my_file->store('products', 'public');
            
            // dd($request);

            //Crea registro en tabla archivos
            File::create([
                'product_id' => $request->product_id,
                'name' => $request->my_file->getClientOriginalName(),
                'hash' => $hash,
                'mime' => $request->my_file->getClientMimeType(),
                'size' => $request->my_file->getSize(),
            ]);
        }

        return redirect('/file')->with('message', 'File Saved');
    }

    public function download(File $file)
    {
        //Obtiene ruta del archivo
        $pathFile = storage_path('app/public/' . $file->hash);
        
        //La respuesta contiene el archivo con el tipo de documento
        return response()->download($pathFile, $file->name, ['Content-Type' => $file->mime]);
    }

    public function delete(File $file)
    {
        //Verifica la existencia del archivo
        if (\Storage::exists('public/' . $file->hash)) {
            \Storage::delete('public/' . $file->hash); //Elimina archivo
            
            $file->delete(); //Elimina registro en tabla
        }

        return redirect()->back()->with('message', 'File Deleted');
    }
}
