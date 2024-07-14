<?php

namespace App\Http\Controllers\Fe;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $req)
    {
        return view("Fe.Contact.index");
    }
    public function postContact(Request $req)
    {
        $attachmentName = $req->photo->getClientOriginalName();
        $req->photo->storeAs('public/attachment',$attachmentName);
        $req->merge(['attachment' => $attachmentName]);
        try {
            $contact = Contact::create($req->all());
            Mail::to('kien18092004@gmail.com ')->queue(new ContactMail($contact));
            return back()->with('success', 'Gửi liên hệ thành công');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            Log::error('Error when sending contact email: ' . $th->getMessage());
            return back()->with('error', 'Gửi liên hệ thất bại');
        }
    }
    // public function postContact(Request $req)
    // {
    //     try {
    //         if ($req->hasFile('attachment')) {
    //             $fileName = $req->attachment->getClientOriginalName();
    //             $req->attachment->storeAs('public/attachment', $fileName);
    //         } else {
    //             $fileName = null;
    //         }
    //         $contact = Contact::create([
    //             'title' => $req->title,
    //             'name' => $req->name,
    //             'email' => $req->email,
    //             'phone' => $req->phone,
    //             'message' => $req->message,
    //             'attachment' => $fileName,
    //         ]);
    //         Mail::to(env('MAIL_USERNAME'))->queue(new ContactMail($contact));
    //         return back()->with('success', 'Gửi liên hệ thành công');
    //     } catch (\Throwable $th) {
    //         dd($th->getMessage());
    //         // Ghi log lỗi hoặc hiển thị thông báo lỗi
    //         Log::error('Error when sending contact email: ' . $th->getMessage());
    //         return back()->with('error', 'Gửi liên hệ thất bại');
    //     }
    // }
}
