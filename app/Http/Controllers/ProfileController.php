<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditCardRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Services\ProfileCreateRequest;
use App\Services\ProfileService;
use Exception;

class ProfileController extends Controller
{
    protected $profileService;

    /**
     * Injects profile service class
     *
     * @param ProfileService $profileService
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Creates a new profile
     *
     * @param ProfileCreateRequest $request
     * @return void
     */
    public function store(ProfileCreateRequest $request): void
    {
        $this->profileService->createNewProfile($request->validated());
    }

    /**
     * Displays profile when given its username
     *
     * @param string $username
     * @return Profile
     * @throws Exception
     */
    public function show(string $username)
    {
        return $this->profileService->getProfileByUsername($username);
    }

    /**
     * Updates any field (except email) within a profile when given its username
     *
     * @param ProfileRequest $request
     * @param string $username
     * @return void
     * @throws Exception
     */
    public function update(ProfileRequest $request, string $username): void
    {
        $this->profileService->updateProfile($request->except(['email']), $username);
    }

    /**
     * Stores a credit card to a profile when given its username
     *
     * @param CreditCardRequest $request
     * @param string $username
     * @return void
     * @throws Exception
     */
    public function storeCard(CreditCardRequest $request, string $username)
    {
        $this->profileService->createCreditCardForProfile($request->validated(), $username);
    }
}
