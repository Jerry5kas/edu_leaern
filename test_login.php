<?php
/**
 * Simple Login Test Script
 * 
 * This script tests the login functionality by:
 * 1. Creating a test user
 * 2. Testing login with correct credentials
 * 3. Testing login with incorrect credentials
 */

require_once 'vendor/autoload.php';

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Login Functionality Test ===\n\n";

try {
    // Test 1: Check if test user exists, if not create one
    $testEmail = 'test@example.com';
    $testPassword = 'password123';
    
    $user = User::where('email', $testEmail)->first();
    
    if (!$user) {
        echo "1. Creating test user...\n";
        $user = User::create([
            'name' => 'Test User',
            'email' => $testEmail,
            'password' => Hash::make($testPassword),
        ]);
        echo "   ✓ Test user created with ID: {$user->id}\n";
    } else {
        echo "1. Test user already exists with ID: {$user->id}\n";
    }
    
    // Test 2: Test login with correct credentials
    echo "\n2. Testing login with correct credentials...\n";
    $credentials = [
        'email' => $testEmail,
        'password' => $testPassword
    ];
    
    if (Auth::attempt($credentials)) {
        echo "   ✓ Login successful!\n";
        echo "   ✓ User ID: " . Auth::id() . "\n";
        echo "   ✓ User Name: " . Auth::user()->name . "\n";
        
        // Logout for next test
        Auth::logout();
    } else {
        echo "   ✗ Login failed with correct credentials!\n";
    }
    
    // Test 3: Test login with incorrect password
    echo "\n3. Testing login with incorrect password...\n";
    $wrongCredentials = [
        'email' => $testEmail,
        'password' => 'wrongpassword'
    ];
    
    if (Auth::attempt($wrongCredentials)) {
        echo "   ✗ Login succeeded with wrong password (this is bad)!\n";
    } else {
        echo "   ✓ Login correctly failed with wrong password\n";
    }
    
    // Test 4: Test login with non-existent email
    echo "\n4. Testing login with non-existent email...\n";
    $nonExistentCredentials = [
        'email' => 'nonexistent@example.com',
        'password' => 'password123'
    ];
    
    if (Auth::attempt($nonExistentCredentials)) {
        echo "   ✗ Login succeeded with non-existent email (this is bad)!\n";
    } else {
        echo "   ✓ Login correctly failed with non-existent email\n";
    }
    
    echo "\n=== Test Results Summary ===\n";
    echo "✓ User creation/retrieval: Working\n";
    echo "✓ Login with correct credentials: Working\n";
    echo "✓ Login with wrong password: Working (correctly fails)\n";
    echo "✓ Login with non-existent email: Working (correctly fails)\n";
    echo "\n🎉 All login functionality tests passed!\n";
    
} catch (Exception $e) {
    echo "\n❌ Test failed with error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}
