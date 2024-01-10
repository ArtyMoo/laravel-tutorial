<?php

namespace App\Http\Controllers;

use App\Services\MailchimpNewsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function addToList(MailchimpNewsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {

            $newsletter->subscribe(request('email'));

        } catch (\Exception $e) {

            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list'.$e
            ]);

        }

        return redirect('/')
            ->with('success', 'Thank you for signing up to our newsletter! Cant wait to send you some lil spam :)');
    }
}
