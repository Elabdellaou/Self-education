<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use PDF;

class CertificateController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function download_jpg($image){
        $c=DB::select("select certificates.certificate_id,certificates.certificate_validate as validate from certificates,users where users.id=certificates.user_id and user_id=? and certificates.certificate_id=? limit 1",[Auth::user()->id,$image]);
        if(file_exists( public_path()."/Images/certificate/".$image.".jpg")&&$c!=null&&$c[0]->validate==true){
            $path= public_path()."/Images/certificate/".$image.".jpg";
            $headers =['Content-Type: image/jpeg'];
            return response()->download($path,time().'.jpg', $headers);
        }else
            return redirect('/404');
    }
    public function download_pdf($pdf){
        $c=DB::select("select certificates.certificate_id,certificates.certificate_validate as validate from certificates,users where users.id=certificates.user_id and user_id=? and certificates.certificate_id=? limit 1",[Auth::user()->id,$pdf]);
        if(file_exists( public_path()."/Images/certificate/".$pdf.".jpg")&&$c!=null&&$c[0]->validate==true){
            $p=app('dompdf.wrapper');
            $p=Pdf::setOptions([
                'isHTML5ParserEnabled'=>true,
                'isRemoteEnabled'=>true,
            ]);
            $img=base_path("public/Images/certificate/".$pdf.".jpg");
            $type=pathinfo($img,PATHINFO_EXTENSION);
            $img_data=file_get_contents($img);
            $img_new='data:image/'.$type.';base64,'.base64_encode($img_data);
            $p->loadView('pdf.certificate',compact('img_new'));
            $p->setPaper('A4','landscape');
            return $p->download(time().'.pdf');
        }else
            return redirect('/404');
    }
}
