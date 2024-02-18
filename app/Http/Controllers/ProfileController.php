<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profileService;

    /**
     * @param ProfileService $profileService
     *
     * Inject ProfileService into controller
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * @param ProfileRequest $request
     * @return string
     *
     * Creates a new profile
     */
    public function store(ProfileRequest $request)
    {
        return 'success';
    }

    /**
     * @param Profile $profile
     * @return string
     *
     * Display profile from given username
     */
    public function read(Profile $profile)
    {
        return 'success';
    }

    /**
     * @param ProfileRequest $request
     * @param Profile $profile
     * @return string
     *
     * Update username attributes
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        return 'success';
    }

    /**
     * @param Profile $profile
     * @return string
     *
     * Deletes profile
     */
    public function destroy(Profile $profile)
    {
        return 'success';
    }

    /**
     * @param ProfileRequest $request
     * @return string
     *
     * Stores a new credit card
     */
    public function storeCreditCard (ProfileRequest $request)
    {
        return 'success';
    }
}
