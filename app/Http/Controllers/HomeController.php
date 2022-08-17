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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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



        return view('front.index',
        ['header'=>$header[0],'imgs_Header'=>$imgs_Header,
          'Desc_services_section'=>$Desc_services_section,
          'services'=>$services,'Works'=>$Works,
          'Desc_why_use_awen_section'=>$Desc_Why_Use_Awen_section,
          'Why_Use_Awen'=>$Why_Use_Awen,'integrate_imgs'=>$integrate_imgs,
          'extra_mile'=>$extra_mile,'Powerful_Platform'=>$Powerful_Platform[0],
        ]);
    }
}
