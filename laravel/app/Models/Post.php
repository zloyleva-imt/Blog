<?php

namespace App\Models;

use App\Models\Traits\Pagination;
use App\Models\Traits\Search;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use Pagination, Search;

    private $searchFields = [
        'title', 'body',
    ];

    protected $fillable = [
        'title', 'slug','body', 'views', 'likes', 'published_status', 'user_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getAll(Request $request):LengthAwarePaginator
    {
        return $this->addPagination(
            $this->addSearch($this->with('user'),$request->query()),
            $request->query()
        );
    }
}
