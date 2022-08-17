<?php

namespace App\Http\Controllers;
use file;
use App\Models\Header;
use App\Models\Images;
use App\Models\HubFile;
use App\Models\Services;
use App\Models\Extra_Mile;
use App\Models\How_It_Works;
use App\Models\Why_Use_Awen;
use Illuminate\Http\Request;
use App\Models\Powerful_Platform;
use App\Helpers\UploadFilesHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class HomePageController extends Controller
{
    public function editHomePage(){
        ////////////// Start Header////////////////
        $data_Header = Header::first();
        $imgs_Header = Images::
            where('section_id',$data_Header->id)->where('section','header')->get();
        $header =[];
        array_push($header,[
            'title'=>json_decode($data_Header->title),
            'description'=>json_decode($data_Header->description),
            'main_image' =>$data_Header->main_image,
            'video_link'=>$data_Header->video_link,
            // 'imgs'=>json_decode($data_Header->imgs)
        ]);
        /////////////// End Header/////////

        ////////////// Start Services////////////////
        $Desc_services_section = json_decode(Services::first()->description);
        $services_data = Services::where('id','>',Services::first()->id)->get();

        $services =[];
        if(count($services_data) > 0){
            foreach ($services_data as $service) {
                array_push($services,[
                    'id'=>$service->id,
                    'icon'=> $service->icon,
                    'serv_title'=>json_decode($service->serv_title),
                    'serv_desc'=>json_decode($service->serv_desc),
                ]);
            }
        }
        /////////////// End Services/////////

        /////////////// Start How-It-Works /////////

        $Works_data = How_It_Works::get();

        $Works =[];
        if(count($Works_data) > 0){
            foreach ($Works_data as $Work) {
                array_push($Works,[
                    'id'=>$Work->id,
                    'img'=> $Work->img,
                    'title'=>json_decode($Work->title),
                    'description'=>json_decode($Work->description),
                ]);
            }
        }

        /////////////// End How-It-Works /////////




        ////////////// Start Why Use Awen////////////////
        $Desc_Why_Use_Awen_section = json_decode(Why_Use_Awen::first()->description);
        $Why_Use_Awen_data = Why_Use_Awen::where('id','>',Why_Use_Awen::first()->id)->get();

        $Why_Use_Awen =[];
        if(count($Why_Use_Awen_data) > 0){
            foreach ($Why_Use_Awen_data as $service) {
                array_push($Why_Use_Awen,[
                    'id'=>$service->id,
                    'img_icon'=> $service->img_icon,
                    'serv_title'=>json_decode($service->serv_title),
                    'serv_desc'=>json_decode($service->serv_desc),
                ]);
            }
        }
        /////////////// End Why Use Awen/////////
///////////////// Start integrate-with ////////////////////////////////////

        $integrate_imgs = Images::
        where('section_id',5)->where('section','integrate-with')->get();

///////////////// End integrate-with ////////////////////////////////////

///////////////// Start Extra-Mile ////////////////////////////////////
        $extra_mile_data = Extra_Mile::get();

        $extra_mile =[];
        if(count($Why_Use_Awen_data) > 0){
            foreach ($extra_mile_data as $ext_mile) {
                array_push($extra_mile,[
                    'id'=>$ext_mile->id,
                    'img'=> $ext_mile->img,
                    'title'=>json_decode($ext_mile->title),
                ]);
            }
        }

///////////////// End Extra-Mile ////////////////////////////////////

///////////////// Start Powerful_Platform ////////////////////////////////////
        $Powerful_Platform_data = Powerful_Platform::first();
        $Powerful_Platform =[];
        if(isset($Powerful_Platform_data)){
                array_push($Powerful_Platform,[
                    'id'=>$Powerful_Platform_data->id,
                    'img'=> $Powerful_Platform_data->img,
                    'description'=>json_decode($Powerful_Platform_data->description),
                ]);

        }
///////////////// End Powerful_Platform ////////////////////////////////////





        return view('admin.pages.editHomePage',
        ['header'=>$header[0],'imgs_Header'=>$imgs_Header,
          'Desc_services_section'=>$Desc_services_section,
          'services'=>$services,'Works'=>$Works,
          'Desc_why_use_awen_section'=>$Desc_Why_Use_Awen_section,
          'Why_Use_Awen'=>$Why_Use_Awen,'integrate_imgs'=>$integrate_imgs,
          'extra_mile'=>$extra_mile,'Powerful_Platform'=>$Powerful_Platform[0]
        ]);
    }

    public function update_header(Request $request){
        $header = Header::first();

        $arrImgs=[];
        if($request->hasFile('images')){
            foreach ($request->images as $img) {

                $file = $this->store_file([
                    'source'=>$img,
                    'validation'=>"image",
                    'path_to_save'=>'/uploads/home_page/',
                    'type'=>'home_page',
                    'user_id'=>\Auth::user()->id,
                    'resize'=>null,
                    'small_path'=>'small/',
                    'visibility'=>'PUBLIC',
                    'file_system_type'=>env('FILESYSTEM_DRIVER'),
                    /*'watermark'=>true,*/
                    'compress'=>'auto'
                ]);
                // array_push($arrImgs,$file['filename']);
                Images::create([
                    'img'=>$file['filename'],
                    'section'=>'header',
                    'section_id'=>$header->id
                ]);
            }

        }

        $main_image=[];
        if($request->hasFile('main_image')){
            $main_image = $this->store_file([
                'source'=>$request->main_image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/home_page/',
                'type'=>'home_page',
                'user_id'=>\Auth::user()->id,
                'resize'=>null,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress'=>'auto'
            ]);
            UploadFilesHelper::remove_hub_file($header->main_image);
            unlink('storage/uploads/home_page/'.$header->main_image);
        }else{
            $main_image['filename']=$header->main_image;
        }

        $header = Header::first();
        $result = $header->update([
            'title'=> json_encode($request->title),
            'description'=> json_encode($request->description),
            'main_image'=> $main_image['filename'],
            'video_link'=> $request->video_link,
        ]);

        if($result){
            flash()->success('تم العملية بنجاح','عملية ناجحة');
        }else{
            flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
        }
        return redirect()->back();
    }

///////////////// Start  Services ////////////////////////////////////
    // Start Create Services
    public function create_service(Request $request){

        $request->validate([
            'icon' => 'required',
            'serv_title.*'=> 'required',
            'description.*'=> 'required',
         ],[
             'icon.required'=>__('lang.icon').__('validation.required'),
             'serv_title.*'=> __('lang.title').__('validation.required'),
            'serv_desc.*'=> __('lang.description').__('validation.required')
         ]);

         if($request->hasFile('icon')){
            $icon = $this->store_file([
                'source'=>$request->icon,
                'validation'=>"image",
                'path_to_save'=>'/uploads/home_page/',
                'type'=>'home_page',
                'user_id'=>\Auth::user()->id,
                'resize'=>null,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress'=>'auto'
            ]);
        }

        $result = Services::create([
            'icon'=> $icon['filename'],
            'serv_title'=>json_encode($request->serv_title),
            'serv_desc'=>json_encode($request->serv_desc),
        ]);

        if($result){
            flash()->success('تم العملية بنجاح','عملية ناجحة');
        }else{
            flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
        }
        return redirect()->back();

    }

    // Start Update Services
    public function update_services_description( Request $request){

            $result = Services::where('id',Services::first()->id)->update([
                'description'=>json_encode($request->description),
            ]);


        if($result){
            flash()->success('تم العملية بنجاح','عملية ناجحة');
        }else{
            flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
        }
        return redirect()->back();
    }

    public function update_services($id , Request $request){

        $service = Services::findorfail($id);

        if($request->hasFile('icon')){
            $icon = $this->store_file([
                'source'=>$request->icon,
                'validation'=>"image",
                'path_to_save'=>'/uploads/home_page/',
                'type'=>'home_page',
                'user_id'=>\Auth::user()->id,
                'resize'=>null,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress'=>'auto'
            ]);
            UploadFilesHelper::remove_hub_file($service->icon);
            unlink('storage/uploads/home_page/'.$service->icon);
        }else{
            $icon['filename']=$service->icon;
        }

        $result = Services::where('id',$id)->update([
            'icon'=> $icon['filename'],
            'serv_title'=>json_encode($request->serv_title),
            'serv_desc'=>json_encode($request->serv_desc),
        ]);

        if($result){
            flash()->success('تم العملية بنجاح','عملية ناجحة');
        }else{
            flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
        }
        return redirect()->back();
    }
    // End Update Services

    // Start Delete Services
    public function delete_service($id){
        $result = Services::where('id', $id)->delete();
        if($result){
            flash()->success('تم العملية بنجاح','عملية ناجحة');
        }else{
            flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
        }
        return redirect()->back();
    }


///////////////// End  Services ////////////////////////////////////


/////////////// Start How-It-Works /////////

public function create_work(Request $request){

    $request->validate([
        'img' => 'required',
        'title.*'=> 'required',
        'description.*'=> 'required',
     ],[
         'img.required'=>__('lang.Image').__('validation.required'),
         'title.*'=> __('lang.title').__('validation.required'),
        'description.*'=> __('lang.description').__('validation.required')
     ]);
    if($request->hasFile('img')){
        $img = $this->store_file([
            'source'=>$request->img,
            'validation'=>"image",
            'path_to_save'=>'/uploads/home_page/',
            'type'=>'home_page',
            'user_id'=>\Auth::user()->id,
            'resize'=>null,
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            'compress'=>'auto'
        ]);
    }

    $result = How_It_Works::create([
        'img'=> $img['filename'],
        'title'=>json_encode($request->title),
        'description'=>json_encode($request->description),
    ]);

    if($result){
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}
public function update_Work($id , Request $request){

    $work = How_It_Works::findorfail($id);

    if($request->hasFile('img')){
        $img = $this->store_file([
            'source'=>$request->img,
            'validation'=>"image",
            'path_to_save'=>'/uploads/home_page/',
            'type'=>'home_page',
            'user_id'=>\Auth::user()->id,
            'resize'=>null,
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            'compress'=>'auto'
        ]);
        $img_work = $img['filename'];
        UploadFilesHelper::remove_hub_file($work->img);
        unlink('storage/uploads/home_page/'.$work->img);
    }else{
        $img_work = $work->img;
    }

    $result = How_It_Works::where('id',$id)->update([
        'img'=> $img_work,
        'title'=>json_encode($request->title),
        'description'=>json_encode($request->description),
    ]);

    if($result){
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}
public function delete_work($id){
    $work = How_It_Works::findorfail($id);
    $result = $work->delete();
    if($result){
            UploadFilesHelper::remove_hub_file($work->img);
            unlink('storage/uploads/home_page/'.$work->img);
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}

/////////////// End How-It-Works /////////

///////////////// Start  why_use_awen ////////////////////////////////////

// Start Create why_use_awen
public function create_why_use_awen(Request $request){
    $request->validate([
        'img_icon' => 'required',
        'serv_title.*'=> 'required',
        'serv_desc.*'=> 'required',
     ],[
         'img_integrate.required'=>__('lang.Image').__('validation.required'),
         'serv_title.*'=> __('lang.title').__('validation.required'),
        'serv_desc.*'=> __('lang.description').__('validation.required')
     ]);

    if($request->hasFile('img_icon')){
        $img = $this->store_file([
            'source'=>$request->img_icon,
            'validation'=>"image",
            'path_to_save'=>'/uploads/home_page/',
            'type'=>'home_page',
            'user_id'=>\Auth::user()->id,
            'resize'=>null,
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            'compress'=>'auto'
        ]);
    }

    $result = Why_Use_Awen::create([
        'img_icon'=> $img['filename'],
        'serv_title'=>json_encode($request->serv_title),
        'serv_desc'=>json_encode($request->serv_desc),
    ]);

    if($result){
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();

}

// Start Update why_use_awen
public function update_why_use_awen_description( Request $request){

        $result = Why_Use_Awen::where('id',Why_Use_Awen::first()->id)->update([
            'description'=>json_encode($request->description),
        ]);


    if($result){
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}

public function update_why_use_awen($id , Request $request){

    $why_use_awen = Why_Use_Awen::findorfail($id);

    if($request->hasFile('img_icon')){
        $img = $this->store_file([
            'source'=>$request->img_icon,
            'validation'=>"image",
            'path_to_save'=>'/uploads/home_page/',
            'type'=>'home_page',
            'user_id'=>\Auth::user()->id,
            'resize'=>null,
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            'compress'=>'auto'
        ]);
        $img_icon = $img['filename'];
        UploadFilesHelper::remove_hub_file($why_use_awen->img_icon);
        unlink('storage/uploads/home_page/'.$why_use_awen->img_icon);
    }else{
        $img_icon = $why_use_awen->img_icon;
    }

    $result = Why_Use_Awen::where('id',$id)->update([
        'img_icon'=> $img_icon,
        'serv_title'=>json_encode($request->serv_title),
        'serv_desc'=>json_encode($request->serv_desc),
    ]);

    if($result){

        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}
// End Update why_use_awen

// Start Delete why_use_awen
public function delete_why_use_awen($id){
    $Why_Use_Awen = Why_Use_Awen::findorfail($id);
    $result = $Why_Use_Awen->delete();
    if($result){
            UploadFilesHelper::remove_hub_file($Why_Use_Awen->img_icon);
            unlink('storage/uploads/home_page/'.$Why_Use_Awen->img_icon);
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}

///////////////// End  why_use_awen ////////////////////////////////////


///////////////// Start integrate-with ////////////////////////////////////

public function create_integrate_with(Request $request){

    $request->validate([
        'img_integrate.*' => 'required',
     ],[
         'img_integrate.*.required'=>__('lang.Image').__('validation.required'),
     ]);
     $result=false;
    if($request->hasFile('img_integrate')){
        foreach ($request->img_integrate as $img) {

            $file = $this->store_file([
                'source'=>$img,
                'validation'=>"image",
                'path_to_save'=>'/uploads/home_page/',
                'type'=>'home_page',
                'user_id'=>\Auth::user()->id,
                'resize'=>null,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress'=>'auto'
            ]);
            // array_push($arrImgs,$file['filename']);
            $result = Images::create([
                'img'=>$file['filename'],
                'section'=>'integrate-with',
                'section_id'=>5
            ]);
        }
    }

    if($result){
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}

public function delete_integrate_with($id){
    $integrate_with = Images::findorfail($id);
    $result = $integrate_with->delete();
    if($result){
            UploadFilesHelper::remove_hub_file($integrate_with->img);
            unlink('storage/uploads/home_page/'.$integrate_with->img);
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}

///////////////// End integrate-with ////////////////////////////////////


///////////////// Start Extra-Mile ////////////////////////////////////

public function create_extra_mile(Request $request){


    $request->validate([
        'title.*' => 'required',
        'img' => 'required',
     ],[
         'title.*.required'=>__('lang.title').__('validation.required'),
         'img.required'=> __('validation.image')
     ]);


    if($request->hasFile('img')){
        $img = $this->store_file([
            'source'=>$request->img,
            'validation'=>"image",
            'path_to_save'=>'/uploads/home_page/',
            'type'=>'home_page',
            'user_id'=>\Auth::user()->id,
            'resize'=>null,
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            'compress'=>'auto'
        ]);
    }

    $result = Extra_Mile::create([
        'title'=>json_encode($request->title),
        'img'=>$img['filename'],
    ]);

    if($result){
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}


public function update_extra_mile($id , Request $request){

    $Extra_Mile = Extra_Mile::findorfail($id);

    if($request->hasFile('img')){
        $main_image = $this->store_file([
            'source'=>$request->img,
            'validation'=>"image",
            'path_to_save'=>'/uploads/home_page/',
            'type'=>'home_page',
            'user_id'=>\Auth::user()->id,
            'resize'=>null,
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            /*'watermark'=>true,*/
            'compress'=>'auto'
        ]);
        UploadFilesHelper::remove_hub_file($Extra_Mile->img);
        unlink('storage/uploads/home_page/'.$Extra_Mile->img);
    }else{
        $main_image['filename']=$Extra_Mile->img;
    }

    $result = Extra_Mile::where('id',$id)->update([
        'img'=> $main_image['filename'],
        'title'=>json_encode($request->title),
    ]);

    if($result){
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}

public function delete_extra_mile($id){
    $extra_mile = Extra_Mile::findorfail($id);
    $result = $extra_mile->delete();
    if($result){
            UploadFilesHelper::remove_hub_file($extra_mile->img);
            unlink('storage/uploads/home_page/'.$extra_mile->img);
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}
///////////////// End Extra-Mile ////////////////////////////////////

public function update_Powerful_Platform(Request $request){

    $Powerful_Platform = Powerful_Platform::first();

    $request->validate([
        'description.*' => 'required',
     ],[
         'description.*.required'=>__('lang.description').__('validation.required'),
     ]);

     $img;
    if($request->hasFile('img')){
        $img = $this->store_file([
            'source'=>$request->img,
            'validation'=>"image",
            'path_to_save'=>'/uploads/home_page/',
            'type'=>'home_page',
            'user_id'=>\Auth::user()->id,
            'resize'=>null,
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            'compress'=>'auto'
        ]);
        // UploadFilesHelper::remove_hub_file($Powerful_Platform->img);
        // unlink('storage/uploads/home_page/'.$Powerful_Platform->img);
    }else{
        $img['filename']=$Powerful_Platform->img;
    }


    $result = Powerful_Platform::where('id',$Powerful_Platform->id)->update([
        'description'=>json_encode($request->description),
        'img'=>$img['filename'],
    ]);

    if($result){
        flash()->success('تم العملية بنجاح','عملية ناجحة');
    }else{
        flash()->error('عفواً , تأكد من ادخال البيانات بشكل صحيح , وأعد المحاوله','عمليةغير ناجحة');
    }
    return redirect()->back();
}






    public function delete_img($id){
        $imgId = Images::findorfail($id);
        $result = $imgId->delete();
        if($result){
            UploadFilesHelper::remove_hub_file($imgId->img);
            unlink('storage/uploads/home_page/'.$imgId->img);
            flash()->success('تم العملية بنجاح','عملية ناجحة');
        }else{
            flash()->error('عفواً , أعد المحاوله','عمليةغير ناجحة');
        }
        return redirect()->back();
    }




}
