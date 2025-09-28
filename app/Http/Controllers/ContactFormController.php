<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactFormRequest $request): RedirectResponse
    {
        $mail = config('mail.from')['address'];

        Mail::to($mail)->queue(new ContactForm($request->validated()));

        return to_route('home')->with(['email_status' => 'Thank you for contacting me. I will get in touch with you shortly.']);
    }
}
