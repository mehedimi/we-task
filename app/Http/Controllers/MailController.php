<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Repositories\MailRepository;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        return view('mail.index', [
            'emails' => Mail::all()
        ]);
    }

    public function send(MailRepository $mailRepository)
    {
        $mailRepository->clearCache();

        $mailRepository->emails();

        return view('mail.feedback');
    }
}
