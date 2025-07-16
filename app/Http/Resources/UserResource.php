<?php

namespace App\Resources;

class UserResource {
    /**
     * Transform the user data into a resource array.
     *
     * @param  \App\Models\User  $user
     * @return array
     */
    public static function toArray($user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at->toDateTimeString(),
            'updated_at' => $user->updated_at->toDateTimeString(),
        ];
    }
}
