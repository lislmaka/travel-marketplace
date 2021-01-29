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
 * Class Event
 *
 * @package App\Models
 * @property int $id
 * @property int $country_id
 * @property int $city_id
 * @property string $name
 * @property string $slug
 * @property string $img
 * @property string $short_description
 * @property string $description
 * @property string $address
 * @property mixed $coordinates
 * @property int $price
 * @property int|null $old_price
 * @property int|null $rating
 * @property int $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PivotEventCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\EventCity $city
 * @property-read \App\Models\EventCountry $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCoordinates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * Class EventCategory
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCategory whereUpdatedAt($value)
 */
	class EventCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * Class EventCity
 *
 * @package App\Models
 * @property int $id
 * @property int $country_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCity whereUpdatedAt($value)
 */
	class EventCity extends \Eloquent {}
}

namespace App\Models{
/**
 * Class EventCountry
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EventCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCountry whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCountry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCountry whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCountry whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCountry whereUpdatedAt($value)
 */
	class EventCountry extends \Eloquent {}
}

namespace App\Models{
/**
 * Class EventOption
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property int $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventOption whereUpdatedAt($value)
 */
	class EventOption extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Page
 *
 * @package App\Models
 * @property int $id
 * @property int $page_category_id
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property int $active
 * @property int $show
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PageCategory $pageCategory
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page wherePageCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PageCategory
 *
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $column
 * @property int $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Page[] $pages
 * @property-read int|null $pages_count
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory whereColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageCategory whereUrl($value)
 */
	class PageCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PivotEventCategory
 *
 * @package App\Models
 * @property int $id
 * @property int $category_id
 * @property int $event_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\EventCategory $category
 * @property-read \App\Models\Event $event
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventCategory whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventCategory whereUpdatedAt($value)
 */
	class PivotEventCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PivotEventOption
 *
 * @package App\Models
 * @property int $id
 * @property int $option_id
 * @property int $event_id
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @property-read \App\Models\EventOption $option
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventOption whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventOption whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventOption wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PivotEventOption whereUpdatedAt($value)
 */
	class PivotEventOption extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Review
 *
 * @package App\Models
 * @property int $id
 * @property int $user_id
 * @property int $event_id
 * @property string $description
 * @property int $active
 * @property int|null $rating
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @package App\Models
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
	class User extends \Eloquent {}
}

