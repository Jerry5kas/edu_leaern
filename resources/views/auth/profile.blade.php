<x-layouts.main>
    <div class="bg-gray-50 min-h-screen py-8 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Profile Settings</h1>
                <p class="text-gray-600 mt-2">Manage your account information and preferences</p>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Profile Overview Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="text-center">
                            <!-- Profile Image -->
                            <div class="relative inline-block">
                                @if($user && $user->profile)
                                    <img src="{{ asset('storage/profile_images/' . $user->profile) }}"
                                         alt="Profile"
                                         class="w-32 h-32 rounded-full object-cover border-4 border-gray-200">
                                @else
                                    <img src="{{ asset('default-avatar.svg') }}"
                                         alt="Profile"
                                         class="w-32 h-32 rounded-full object-cover border-4 border-gray-200">
                                @endif

                                <!-- Profile Image Upload -->
                                <form action="{{ route('profile.image') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                                    @csrf
                                    <label class="cursor-pointer bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25v7.5a2.25 2.25 0 002.25 2.25h15a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-2.878a1.5 1.5 0 01-1.06-.44l-.94-.94A1.5 1.5 0 0012.439 4.5h-.878a1.5 1.5 0 00-1.06.44l-.94.94A1.5 1.5 0 0110.5 4.5h-.878a1.5 1.5 0 00-1.06.44l-.94.94A1.5 1.5 0 015.25 4.5h-.878a1.5 1.5 0 00-1.06.44l-.94.94A1.5 1.5 0 015.25 4.5H5.25A2.25 2.25 0 002.25 8.25z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Change Photo
                                        <input type="file" name="profile" accept="image/*" class="hidden" onchange="this.form.submit()">
                                    </label>
                                </form>
                            </div>

                            <!-- User Info -->
                            <div class="mt-6">
                                <h2 class="text-2xl font-bold text-gray-900">{{ $user->name ?? 'Guest' }}</h2>
                                <p class="text-gray-600">{{ $user->email ?? 'No email' }}</p>
                                @if($user)
                                    <p class="text-sm text-gray-500 mt-1">Member since {{ $user->created_at->format('M Y') }}</p>
                                    @if($user->last_login_at)
                                        <p class="text-sm text-gray-500">Last login: {{ $user->last_login_at->diffForHumans() }}</p>
                                    @endif
                                @endif
                            </div>

                            <!-- Quick Stats -->
                            <div class="mt-6 grid grid-cols-3 gap-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-blue-600">208</div>
                                    <div class="text-sm text-gray-600">Watch mins</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-green-600">1</div>
                                    <div class="text-sm text-gray-600">Following</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-purple-600">2</div>
                                    <div class="text-sm text-gray-600">Knowledge Hats</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Profile Information Form -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6">Personal Information</h3>

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input type="text" name="name" id="name"
                                           value="{{ old('name', $user->name ?? '') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                                           placeholder="Enter your full name">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" name="email" id="email"
                                           value="{{ old('email', $user->email ?? '') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                                           placeholder="Enter your email">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label for="phone_e164" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" name="phone_e164" id="phone_e164"
                                           value="{{ old('phone_e164', $user->phone_e164 ?? '') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('phone_e164') border-red-500 @enderror"
                                           placeholder="+1234567890">
                                    @error('phone_e164')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Date of Birth -->
                                <div>
                                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth"
                                           value="{{ old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : '') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('date_of_birth') border-red-500 @enderror">
                                    @error('date_of_birth')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Country -->
                                <div>
                                    <label for="country_code" class="block text-sm font-medium text-gray-700 mb-2">Country</label>
                                    <select name="country_code" id="country_code"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('country_code') border-red-500 @enderror">
                                        <option value="">Select Country</option>
                                        <option value="DE" {{ old('country_code', $user->country_code ?? '') == 'DE' ? 'selected' : '' }}>Germany</option>
                                        <option value="US" {{ old('country_code', $user->country_code ?? '') == 'US' ? 'selected' : '' }}>United States</option>
                                        <option value="GB" {{ old('country_code', $user->country_code ?? '') == 'GB' ? 'selected' : '' }}>United Kingdom</option>
                                        <option value="CA" {{ old('country_code', $user->country_code ?? '') == 'CA' ? 'selected' : '' }}>Canada</option>
                                        <option value="AU" {{ old('country_code', $user->country_code ?? '') == 'AU' ? 'selected' : '' }}>Australia</option>
                                        <option value="IN" {{ old('country_code', $user->country_code ?? '') == 'IN' ? 'selected' : '' }}>India</option>
                                    </select>
                                    @error('country_code')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Timezone -->
                                <div>
                                    <label for="timezone" class="block text-sm font-medium text-gray-700 mb-2">Timezone</label>
                                    <select name="timezone" id="timezone"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('timezone') border-red-500 @enderror">
                                        <option value="">Select Timezone</option>
                                        <option value="Europe/Berlin" {{ old('timezone', $user->timezone ?? '') == 'Europe/Berlin' ? 'selected' : '' }}>Europe/Berlin</option>
                                        <option value="America/New_York" {{ old('timezone', $user->timezone ?? '') == 'America/New_York' ? 'selected' : '' }}>America/New_York</option>
                                        <option value="America/Los_Angeles" {{ old('timezone', $user->timezone ?? '') == 'America/Los_Angeles' ? 'selected' : '' }}>America/Los_Angeles</option>
                                        <option value="Europe/London" {{ old('timezone', $user->timezone ?? '') == 'Europe/London' ? 'selected' : '' }}>Europe/London</option>
                                        <option value="Asia/Tokyo" {{ old('timezone', $user->timezone ?? '') == 'Asia/Tokyo' ? 'selected' : '' }}>Asia/Tokyo</option>
                                        <option value="Asia/Kolkata" {{ old('timezone', $user->timezone ?? '') == 'Asia/Kolkata' ? 'selected' : '' }}>Asia/Kolkata</option>
                                    </select>
                                    @error('timezone')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Language -->
                                <div>
                                    <label for="locale" class="block text-sm font-medium text-gray-700 mb-2">Language</label>
                                    <select name="locale" id="locale"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('locale') border-red-500 @enderror">
                                        <option value="">Select Language</option>
                                        <option value="de_DE" {{ old('locale', $user->locale ?? '') == 'de_DE' ? 'selected' : '' }}>German</option>
                                        <option value="en_US" {{ old('locale', $user->locale ?? '') == 'en_US' ? 'selected' : '' }}>English (US)</option>
                                        <option value="en_GB" {{ old('locale', $user->locale ?? '') == 'en_GB' ? 'selected' : '' }}>English (UK)</option>
                                        <option value="es_ES" {{ old('locale', $user->locale ?? '') == 'es_ES' ? 'selected' : '' }}>Spanish</option>
                                        <option value="fr_FR" {{ old('locale', $user->locale ?? '') == 'fr_FR' ? 'selected' : '' }}>French</option>
                                    </select>
                                    @error('locale')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Marketing Opt-in -->
                            <div class="mt-6">
                                <label class="flex items-center">
                                    <input type="checkbox" name="marketing_opt_in" value="1"
                                           {{ old('marketing_opt_in', $user->marketing_opt_in ?? false) ? 'checked' : '' }}
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="ml-2 text-sm text-gray-700">Receive marketing communications and updates</span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-6">
                                <button type="submit"
                                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Password Change Form -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6">Change Password</h3>

                        <form action="{{ route('profile.password') }}" method="POST">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Current Password -->
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                    <input type="password" name="current_password" id="current_password"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('current_password') border-red-500 @enderror"
                                           placeholder="Enter current password">
                                    @error('current_password')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- New Password -->
                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                    <input type="password" name="new_password" id="new_password"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('new_password') border-red-500 @enderror"
                                           placeholder="Enter new password">
                                    @error('new_password')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Confirm New Password -->
                                <div class="md:col-span-2">
                                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Confirm new password">
                                </div>
                            </div>

                            <!-- Password Requirements -->
                            <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Password Requirements:</h4>
                                <ul class="text-sm text-gray-600 space-y-1">
                                    <li>• At least 8 characters long</li>
                                    <li>• Should be different from your current password</li>
                                    <li>• Consider using a mix of letters, numbers, and symbols</li>
                                </ul>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-6">
                                <button type="submit"
                                        class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition-colors">
                                    Change Password
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Account Information -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6">Account Information</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Account ID</label>
                                <p class="text-gray-900">{{ $user->uuid ?? 'N/A' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Member Since</label>
                                <p class="text-gray-900">{{ $user ? $user->created_at->format('F j, Y') : 'N/A' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Login</label>
                                <p class="text-gray-900">{{ $user && $user->last_login_at ? $user->last_login_at->format('F j, Y g:i A') : 'Never' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email Verified</label>
                                <p class="text-gray-900">
                                    @if($user && $user->email_verified_at)
                                        <span class="text-green-600">✓ Verified on {{ $user->email_verified_at->format('M j, Y') }}</span>
                                    @else
                                        <span class="text-red-600">✗ Not verified</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.main>
