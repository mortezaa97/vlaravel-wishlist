<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Mortezaa97\Wishlist\Http\Resources\WishlistResource;
use Mortezaa97\Wishlist\Models\Wishlist;

class WishlistController extends Controller
{
    protected $model;

    public function index(Request $request)
    {
        $items = new Wishlist;

        if ($request->conditions) {
            $items = $items->where(json_decode($request->conditions, true));
        }

        if ($request->with) {
            $items = $items->with($request->with);
        }

        return $request->noPaginate ? WishlistResource::collection($items->get()) : WishlistResource::collection($items->paginate());
    }

    public function store(Request $request)
    {
        $data = [];
        $conditions = [];
        $ip = $request->ip();
        $data['ip'] = $ip;

        $user = Auth::guard('api')->user();
        if ($user) {
            $userId = $user->id;
            $conditions['user_id'] = $userId;
            $data['user_id'] = $userId;
            $data['created_by'] = $userId;
        } else {
            $conditions['ip'] = $ip;
        }

        // if ($request->product_slug) {
        //     $product = Product::where('slug', $request->product_slug)->first();
        //     if ($product) {
        //         $data['product_id'] = $product->id;
        //     }
        // }

        if ($request->story_slug) {
            $story = Story::where('slug', $request->story_slug)->first();
            if ($story) {
                $data['model_id'] = $story->id;
                $data['model_type'] = Story::class;
            }
        }

        $wishlist = Wishlist::updateOrCreate($conditions, $data);

        return WishlistResource::make($wishlist);
    }

    public function show(Wishlist $wishlist)
    {
        return WishlistResource::make($wishlist);
    }

    public function update(Request $request, Wishlist $wishlist)
    {
        Gate::authorize('update', $wishlist);
        $data = $request->all();
        $data['updated_by'] = Auth::user()->id;
        $wishlist->update($data);

        return WishlistResource::make($wishlist);
    }
}
