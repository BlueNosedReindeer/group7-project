<?php

namespace App\Services;

use App\Models\Profile;
use Exception;
use Illuminate\Database\Eloquent\Model;

class ProfileService
{
    /**
     * Profile creation service
     *
     * @param array $data
     * @return void
     */
    public function createNewProfile(array $data): void
    {
        Profile::create($data);
    }

    /**
     * Retrieve a profile by username
     *
     * @param string $username
     * @return Profile
     * @throws Exception
     */
    public function getProfileByUsername(string $username): Profile
    {
        $profile = Profile::where('username', $username)->firstOrFail();

        if (!$profile) {
            throw new Exception('Profile not found');
        }

        return $profile;
    }

    /**
     * Update a profile by username
     *
     * @param array $data
     * @param string $username
     * @return void
     * @throws Exception
     */
    public function updateProfile(array $data, string $username): void
    {
        $profile = $this->getProfileByUsername($username);

        foreach ($data as $key => $value) {
            $profile->$key = $value;
        }

        $profile->save();
    }

    /**
     * Creates a credit card for a profile
     *
     * @param string $username
     * @param array $creditCardData
     * @return Model
     * @throws Exception
     */
    public function createCreditCardForProfile(array $creditCardData, string $username)
    {
        $profile = $this->getProfileByUsername($username);

        return $profile->creditCards()->create($creditCardData);
    }
}
