<?php

use Illuminate\Support\Facades\Route;
use App\Mail\Registration;
use Illuminate\Support\Facades\Mail; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Define a POST route for sending an email
Route::post('/kirim-email', function () {
    // Retrieve the 'email' and 'username' from the request
    $email = request('email');
    $username = request('username');

    // Check if 'email' or 'username' is missing in the request
    if (!$email || !$username) {
        // Return a JSON response with an error message and a 400 status code
        return response()->json(['message' => 'Email and username are required'], status: 400);
    }
    
    // Send an email using the Registration Mailable class
    Mail::to($email)->send(new Registration($email, $username));

    // Return a JSON response indicating the email was sent successfully
    return response()->json(['message' => 'email sent successfully']);
})
// Disable the CSRF token verification for this route
->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);