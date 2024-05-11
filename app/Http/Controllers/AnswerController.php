<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Certificate;
use App\Models\Line_Session;
use App\Models\Session;
use App\Models\User;
use App\Mail\GratulationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AnswerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function show($session_id)
    {
        $answers = DB::select('select answers.id as id,answers.question_id,answers.answer_text as text,answers.answer_validate as validate,answers.order from answers,line__sessions where answers.question_id=line__sessions.question_id and line__sessions.session_id=?', [$session_id]);
        if ($answers != null)
            return response()->json($answers);
        return redirect('/404');
    }
    function validation_check_result_end($data)
    {
        return $data->validate([
            'id' => ['required', 'integer', 'exists:line__sessions,id'],
            'question_id' => ['required', 'integer'],
            'answer_text' => ['required', 'string'],
            'session_id' => ['required', 'integer'],
            'time' => ['required', 'string']
        ]);
    }
    function validation_check_result($data)
    {
        return $data->validate([
            'id' => ['required', 'integer', 'exists:line__sessions,id'],
            'question_id' => ['required', 'integer'],
            'answer_text' => ['required', 'string']
        ]);
    }
    function validation_order($data)
    {
        return $data->validate([
            'id' => ['required', 'integer', 'exists:line__sessions,id'],
            'question_id' => ['required', 'integer'],
            'order_1' => ['required', 'string'],
            'order_2' => ['required', 'string'],
            'order_3' => ['required', 'string'],
            'order_4' => ['required', 'string'],
        ]);
    }
    function validation_order_end($data)
    {
        return $data->validate([
            'id' => ['required', 'integer', 'exists:line__sessions,id'],
            'question_id' => ['required', 'integer', 'exists:questions,id'],
            'order_1' => ['required', 'string'],
            'order_2' => ['required', 'string'],
            'order_3' => ['required', 'string'],
            'order_4' => ['required', 'string'],
            'session_id' => ['required', 'integer', 'exists:sessions,id'],
            'time' => ['required', 'string']
        ]);
    }
    function test_check_result(Request $req)
    {
        $data = $this->validation_check_result($req);
        $result = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['answer_text'])->where('answer_validate', true)->count();
        if ($result > 0)
            Line_Session::find($data['id'])->update(['Rep' => true]);
        return $result;
    }
    function validate_language()
    {
        $ns = Session::query()->where('user_id', Auth::user()->id)->where('session_validate', true)->count();
        if ($ns == 3) {
            $ts = DB::select('select session_time_passed from sessions where user_id=?', [Auth::user()->id]);
            $time1 = $ts[0]->session_time_passed;
            $time2 = $ts[1]->session_time_passed;
            $time3 = $ts[2]->session_time_passed;
            $time1 = str_split($time1, 2);
            $time2 = str_split($time2, 2);
            $time3 = str_split($time3, 2);
            $s = $time1[4] + $time2[4] + $time3[4];
            $m = $time1[2] + $time2[2] + $time3[2];
            $h = $time1[0] + $time2[0] + $time3[0];
            $s_f = $s % 60;
            $m += intval($s / 60);
            $m_f = $m % 60;
            $h += intval($m / 60);
            $h_f = $h < 10 ? '0' . $h . 'h ' : $h . 'h ';
            $m_f = $m_f < 10 ? '0' . $m_f . 'm ' : $m_f . 'm ';
            $s_f = $s_f < 10 ? '0' . $s_f . 's' : $s_f . 's';
            $file = $h_f . ' ' . $m_f . ' ' . $s_f;
            $date = date("d M,Y");
            $cer = DB::select('select certificate_id,certificate_validate,time_passed from certificates where user_id=? ', [Auth::user()->id]);
            if ($cer[0]->certificate_validate == true) {
                if (strcmp($cer[0]->time_passed, $file) == true)
                    Certificate::query()->where('user_id', Auth::user()->id)->update(['time_passed' => $file]);
            } else
                Certificate::query()->where('user_id', Auth::user()->id)->update(['time_passed' => $file, 'certificate_validate' => true, 'date_validate' => $date]);
            if (file_exists("/Images/certificate/" . $cer[0]->certificate_id . ".jpg") == false) {
                $font = realpath("./Poppins-SemiBold.ttf");
                $image = imagecreatefromjpeg("./Images/modale.jpg");
                $color = imagecolorallocate($image, 19, 21, 22);
                $color_1 = imagecolorallocate($image, 96, 96, 96);
                $a = 655;
                if (strlen(Auth::user()->name) >= 5 && strlen(Auth::user()->name) <= 7)
                    $a += (strlen(Auth::user()->name) * 15);
                else if (strlen(Auth::user()->name) >= 8 && strlen(Auth::user()->name) <= 10)
                    $a += (strlen(Auth::user()->name) * 8);
                else if (strlen(Auth::user()->name) >= 11 && strlen(Auth::user()->name) <= 12)
                    $a += (strlen(Auth::user()->name) * 5.2);
                else if (strlen(Auth::user()->name) >= 13 && strlen(Auth::user()->name) <= 15)
                    $a += (strlen(Auth::user()->name) * 1.5);
                else if (strlen(Auth::user()->name) >= 16 && strlen(Auth::user()->name) <= 18)
                    $a = 655;
                else if (strlen(Auth::user()->name) >= 19 && strlen(Auth::user()->name) <= 21)
                    $a -= (strlen(Auth::user()->name) * 1.2);
                else if (strlen(Auth::user()->name) >= 22 && strlen(Auth::user()->name) <= 24)
                    $a -= (strlen(Auth::user()->name) * 2);
                else if (strlen(Auth::user()->name) >= 25 && strlen(Auth::user()->name) <= 27)
                    $a -= (strlen(Auth::user()->name) * 3);
                else if (strlen(Auth::user()->name) >= 28 && strlen(Auth::user()->name) <= 30)
                    $a -= (strlen(Auth::user()->name) * 4);
                else
                    $a = 520;
                $code_c = str_split($cer[0]->certificate_id, 13);
                $c_t = DB::select('select time_passed from certificates where user_id=? ', [Auth::user()->id]);
                imagettftext($image, 30, 0, $a, 490, $color, $font, Auth::user()->name);
                imagettftext($image, 19, 0, 790, 975, $color_1, $font, $date);
                imagettftext($image, 19, 0, 800, 925, $color_1, $font, $code_c[0]);
                imagettftext($image, 19, 0, 785, 1025, $color_1, $font, $c_t[0]->time_passed);
                imagejpeg($image, public_path() . "/Images/certificate/" . $cer[0]->certificate_id . ".jpg");
                $email = "";
                $data = "";
                $user = User::find(Auth::user()->id);
                Mail::to($user->email)->send(new GratulationMail($user, $cer[0]->certificate_id));
            }
        }
    }
    function test_check_result_end(Request $req)
    {
        $data = $this->validation_check_result_end($req);
        $result = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['answer_text'])->where('answer_validate', true)->count();
        if ($result > 0)
            Line_Session::find($data['id'])->update(['Rep' => true]);
        $result_finel = Line_Session::query()->where('session_id', $data['session_id'])->where('Rep', true)->count();
        $session = Session::find($data['session_id']);
        $user = User::find(Auth::user()->id);
        $new_xp = $user->xp;
        if ($session->level_id == 1)
            $new_xp += ($result_finel * 10);
        else if ($session->level_id == 2)
            $new_xp += ($result_finel * 20);
        else
            $new_xp += ($result_finel * 30);
        $new_level = intval($new_xp / 50);
        $user->update(['xp' => $new_xp, 'level' => $new_level]);

        if ($session->session_validate == true) {
            if (strcmp($session->session_time_passed, $data['time']) == true && $result_finel >= 7) {
                $session->update(['session_time_passed' => $data['time']]);
                $cer = DB::select('select certificate_validate from certificates where user_id=? ', [Auth::user()->id]);
                if ($cer[0]->certificate_validate == true) {
                    $ts = DB::select('select session_time_passed from sessions where user_id=?', [Auth::user()->id]);
                    $time1 = $ts[0]->session_time_passed;
                    $time2 = $ts[1]->session_time_passed;
                    $time3 = $ts[2]->session_time_passed;
                    $time1 = str_split($time1, 2);
                    $time2 = str_split($time2, 2);
                    $time3 = str_split($time3, 2);
                    $s = $time1[4] + $time2[4] + $time3[4];
                    $m = $time1[2] + $time2[2] + $time3[2];
                    $h = $time1[0] + $time2[0] + $time3[0];
                    $s_f = $s % 60;
                    $m += intval($s / 60);
                    $m_f = $m % 60;
                    $h += intval($m / 60);
                    $h_f = $h < 10 ? '0' . $h . 'h ' : $h . 'h ';
                    $m_f = $m_f < 10 ? '0' . $m_f . 'm ' : $m_f . 'm ';
                    $s_f = $s_f < 10 ? '0' . $s_f . 's' : $s_f . 's';
                    $file = $h_f . ' ' . $m_f . ' ' . $s_f;
                    Certificate::query()->where('user_id', Auth::user()->id)->update(['time_passed' => $file]);
                }
            }
        } else if ($result_finel >= 7) {
            $session->update(['session_time_passed' => $data['time']]);
        } else
            $session->update(['session_time_passed' => ' ']);


        if ($session->session_progress < $result_finel) {
            $session->update(['session_progress' => $result_finel]);
            if ($result_finel >= 7) {
                $session->update(['session_validate' => true]);
                $session = Session::find($data['session_id']);
                $s1 = Session::query()->where('user_id', Auth::user()->id)->count();
                if ($session->level_id == 1 && $session->session_validate == true && $s1 == 1)
                    Certificate::query()->where('user_id', Auth::user()->id)->update(['language_progress' => 33]);
                else if ($session->level_id == 2 && $session->session_validate == true && $s1 == 2)
                    Certificate::query()->where('user_id', Auth::user()->id)->update(['language_progress' => 67]);
                else
                    Certificate::query()->where('user_id', Auth::user()->id)->update(['language_progress' => 100]);
                if ($session->level_id == 1) {
                    $s2 = Session::query()->where('user_id', Auth::user()->id)->where('level_id', 2)->count();
                    if ($s2 == 0)
                        Session::create(['user_id' => Auth::user()->id, 'level_id' => 2]);
                } else if ($session->level_id == 2) {
                    $s3 = Session::query()->where('user_id', Auth::user()->id)->where('level_id', 3)->count();
                    if ($s3 == 0)
                        Session::create(['user_id' => Auth::user()->id, 'level_id' => 3]);
                } else {
                    $this->validate_language();
                }
            }
        }
        return true;
    }
    function test_order(Request $req)
    {
        $data = $this->validation_order($req);
        $order_1 = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['order_1'])->where('order', 0)->count();
        $order_2 = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['order_2'])->where('order', 1)->count();
        $order_3 = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['order_3'])->where('order', 2)->count();
        $order_4 = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['order_4'])->where('order', 3)->count();
        if ($order_1 == 1 && $order_2 == 1 && $order_3 == 1 && $order_4 == 1)
            Line_Session::find($data['id'])->update(['Rep' => true]);
        return $order_1;
    }
    function test_order_end(Request $req)
    {
        $data = $this->validation_order_end($req);
        $order_1 = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['order_1'])->where('order', 0)->count();
        $order_2 = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['order_2'])->where('order', 1)->count();
        $order_3 = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['order_3'])->where('order', 2)->count();
        $order_4 = Answer::query()->where('question_id', $data['question_id'])->where('answer_text', $data['order_4'])->where('order', 3)->count();
        if ($order_1 == 1 && $order_2 == 1 && $order_3 == 1 && $order_4 == 1)
            Line_Session::find($data['id'])->update(['Rep' => true]);

        $result_finel = Line_Session::query()->where('session_id', $data['session_id'])->where('Rep', true)->count();
        $session = Session::find($data['session_id']);
        $user = User::find(Auth::user()->id);
        $new_xp = $user->xp;
        if ($session->level_id == 1)
            $new_xp += ($result_finel * 10);
        else if ($session->level_id == 2)
            $new_xp += ($result_finel * 20);
        else
            $new_xp += ($result_finel * 30);
        $new_level = intval($new_xp / 50);
        $user->update(['xp' => $new_xp, 'level' => $new_level]);

        if ($session->session_validate == true) {
            if (strcmp($session->session_time_passed, $data['time']) == true && $result_finel >= 7) {
                $session->update(['session_time_passed' => $data['time']]);
                $cer = DB::select('select certificate_validate from certificates where user_id=? ', [Auth::user()->id]);
                if ($cer[0]->certificate_validate == true) {
                    $ts = DB::select('select session_time_passed from sessions where user_id=?', [Auth::user()->id]);
                    $time1 = $ts[0]->session_time_passed;
                    $time2 = $ts[1]->session_time_passed;
                    $time3 = $ts[2]->session_time_passed;
                    $time1 = str_split($time1, 2);
                    $time2 = str_split($time2, 2);
                    $time3 = str_split($time3, 2);
                    $s = $time1[4] + $time2[4] + $time3[4];
                    $m = $time1[2] + $time2[2] + $time3[2];
                    $h = $time1[0] + $time2[0] + $time3[0];
                    $s_f = $s % 60;
                    $m += intval($s / 60);
                    $m_f = $m % 60;
                    $h += intval($m / 60);
                    $h_f = $h < 10 ? '0' . $h . 'h ' : $h . 'h ';
                    $m_f = $m_f < 10 ? '0' . $m_f . 'm ' : $m_f . 'm ';
                    $s_f = $s_f < 10 ? '0' . $s_f . 's' : $s_f . 's';
                    $file = $h_f . ' ' . $m_f . ' ' . $s_f;
                    Certificate::query()->where('user_id', Auth::user()->id)->update(['time_passed' => $file]);
                }
            }
        } else if ($result_finel >= 7)
            $session->update(['session_time_passed' => $data['time']]);
        else
            $session->update(['session_time_passed' => '']);
        if ($session->session_progress < $result_finel) {
            $session->update(['session_progress' => $result_finel]);
            if ($result_finel >= 7) {
                $session->update(['session_validate' => true]);
                $session = Session::find($data['session_id']);
                $s1 = Session::query()->where('user_id', Auth::user()->id)->count();
                if ($session->level_id == 1 && $session->session_validate == true && $s1 == 1)
                    Certificate::query()->where('user_id', Auth::user()->id)->update(['language_progress' => 33]);
                else if ($session->level_id == 2 && $session->session_validate == true && $s1 == 2)
                    Certificate::query()->where('user_id', Auth::user()->id)->update(['language_progress' => 67]);
                else
                    Certificate::query()->where('user_id', Auth::user()->id)->update(['language_progress' => 100]);
                if ($session->level_id == 1) {
                    $s2 = Session::query()->where('user_id', Auth::user()->id)->where('level_id', 2)->count();
                    if ($s2 == 0)
                        Session::create(['user_id' => Auth::user()->id, 'level_id' => 2]);
                } else if ($session->level_id == 2) {
                    $s3 = Session::query()->where('user_id', Auth::user()->id)->where('level_id', 3)->count();
                    if ($s3 == 0)
                        Session::create(['user_id' => Auth::user()->id, 'level_id' => 3]);
                } else {
                    $this->validate_language();
                }
            }
        }
        return false;
    }
}
