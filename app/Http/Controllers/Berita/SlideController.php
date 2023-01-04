<?php

namespace App\Http\Controllers\Berita;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 5;
        $slide = Slide::paginate($pagination);
        return view('AdminDashboard.Slide.slide', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.Slide.slide-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_slide' => 'required|min:5',
            'gambar_slide' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (!empty($request->file('gambar_slide'))) {
            $slide = $request->all();
            $slide['gambar_slide'] = $request->file('gambar_slide')->store('slide');

            Slide::create($slide);

            return redirect()->route('slide.index')->with('success', 'Data Berhasil Tersimpan!');
        } else {
            $slide = $request->all();

            Slide::create($slide);

            return redirect()->route('slide.index')->with('success', 'Data Berhasil Tersimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::findorfail($id);

        return view('AdminDashboard.Slide.slide-edit', compact('slide'));
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
        $this->validate($request, [
            'judul_slide' => 'required|min:5',
            'gambar_slide' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (empty($request->file('gambar_slide'))) {
            $slide = Slide::findorfail($id);
            $slide->update([
                'judul_slide' => $request->judul_slide,
                'link' => $request->link,
                'status' => $request->status
            ]);
            return redirect()->route('slide.index')->with('info', 'Data Berhasil Diubah!');
        } else {
            $slide = Slide::findorfail($id);
            Storage::delete($slide->gambar_slide);
            $slide->update([
                'judul_slide' => $request->judul_slide,
                'link' => $request->link,
                'status' => $request->status,
                'gambar_slide' => $request->file('gambar_slide')->store('slide')
            ]);
            return redirect()->route('slide.index')->with('info', 'Data Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findorfail($id);
        if (!$slide) {
            return redirect()->back()->with('success', 'Mohon Maaf Data Ditidak Ada!');
        }

        Storage::delete($slide->gambar_slide);
        $slide->delete();

        return redirect()->route('slide.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
