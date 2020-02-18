<?php

declare(strict_types=1);

namespace App\Models\Admin;

use App\User as BasicUser;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\app\Models\Traits\InheritsRelationsFromParentModel;
use Backpack\CRUD\app\Notifications\ResetPasswordNotification as ResetPasswordNotification;

/**
 * App\Models\Admin\User
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends BasicUser
{
    use CrudTrait;
    use Notifiable;
    use InheritsRelationsFromParentModel;

    protected $table = 'users';

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset(): string
    {
        return $this->email;
    }
}
