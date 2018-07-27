<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Database\Schema\SQLiteBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.slider.add-slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->validate($request,[
         'slider_image' =>  'required',

       ]);
        if ($request->hasFile('slider_images')){
            $thumbnail = $this->saveThumbnails($request->file('slider_images'));
            if ($request->hasFile('slider_images')){
                $thumbnail = $this->saveThumbnails($request->file('thumbnail'));

            }
        }


        Slider::create([
        'slider_image'  => $thumbnail,
        'name'          => $request->input('name'),
        'description'   => $request->input('description'),
        ''
       ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::find($id);
        return view('backend.pages.slider.edit-slider',compact('slider'));
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
        $this->validate($request,[
            'slider_image' =>  'required',
            'description' => 'required'

        ]);
        if ($request->hasFile('slider_images')){
            $thumbnail = $this->saveThumbnails($request->file('slider_images'));
            if ($request->hasFile('slider_images')){
                $thumbnail = $this->saveThumbnails($request->file('thumbnail'));

            }
        }

        $data=array(
            'slider_image' =>$thumbnail,
            'description'  =>$request->input('descripiton'),
            'name'         =>$request->input('name'),
        );

        if(Slider::where('id',$id)->update($data))
        {
            return redirect('dashboard')->with('success','Data sucessfully Updated');

        }
        else
        {
           return redirect()->back()->with('error','Data cannot be inserted ');
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
        $slider=Slider::find($id);

        $slider->delete();
        if($slider)
        {
            return redirect()->back('success','Data have been sucessfully Deleted');
        }
        else
        {
            return redirect()->back('error ','Data cannot be delteted');
        }


    }
    protected function saveThumbnails($image)
    {
        $uploadPath = public_path('images/');
        $ext = $image->getClientOriginalExtension();
        $imageName = date('Ymds-') . str_random(6) . '.' . $ext;
        $save = $this->resizeImage($image, 920, 700);
        if ($save->save($uploadPath . $imageName)) {
            return $imageName;
        }
    }
    protected function resizeImage($file, $width, $height)
    {
        return Image::make($file)->resize(
            $width,
            null,
            function ($constraint) {
                $constraint->aspectRatio();
            }
        )->crop($width, $height);
    }
}
