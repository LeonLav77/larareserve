<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */
namespace App\Models{
/**
 * App\Models\Day
 *
 * @property int $id
 * @property string $date
 * @property int $time
 * @property string $status
 * @property int|null $reservationID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Reservation|null $reservation
 * @method static \Illuminate\Database\Eloquent\Builder|Day newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Day newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Day query()
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereReservationID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Day whereUpdatedAt($value)
 */
    class Day extends \Eloquent
    {
    }
}
namespace App\Models{
/**
 * App\Models\Outdatedday
 *
 * @property int $id
 * @property string $date
 * @property string|null $expiryDate
 * @property int $time
 * @property string $status
 * @property int|null $reservationID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Reservation|null $reservation
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday query()
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday whereReservationID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Outdatedday whereUpdatedAt($value)
 */
    class Outdatedday extends \Eloquent
    {
    }
}
namespace App\Models{
/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property int $user_id
 * @property int $day_id
 * @property string $date
 * @property string|null $expiryDate
 * @property int $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Day $day
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUserId($value)
 */
    class Reservation extends \Eloquent
    {
    }
}
namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reservation[] $reservations
 * @property-read int|null $reservations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
    class User extends \Eloquent
    {
    }
}
