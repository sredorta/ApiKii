<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Artisan;
class AuthTest extends TestCase
{
     //Database setup
     public function setUp() {
        parent::setUp();
        
        Mail::fake();        //Avoid sending emails
        //Storage::fake('public');     //Avoid writting to storage
        Artisan::call('migrate');
        $this->cleanDirectories();
    }

    //Clean up after the test
    public function tearDown() {
        parent::tearDown();
        $this->cleanDirectories();
    }

    public function cleanDirectories () {
        Storage::disk('public')->deleteDirectory('uploads');
    }

    ////////////////////////////////////////////////////////////////////////
    // SignUp testing
    ////////////////////////////////////////////////////////////////////////
    public function testAuthSignUpParameters() {
        $data = [
            "mobile" => "0623133212",
            "password" => "Secure0"
        ];
        $response = $this->post('api/auth/signup', $data);
        dd($response);
    }

}
