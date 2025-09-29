<?php

declare(strict_types=1);

namespace Mortezaa97\Wishlist\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mortezaa97\Wishlist\Models\Wishlist;

class ToggleWishlistController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'type' => ['required', 'string', 'max:255', 'in:post,review,product'],
            'id' => ['required', 'integer'],
            'is_dislike' => ['sometimes', 'boolean'],
        ]);
        $model_type = match ($request->type) {
            'post' => 'App\\Models\\Post',
            'review' => 'Mortezaa97\\Reviews\\Models\\Review',
            'product' => 'Mortezaa97\\Shop\\Models\\Product',
            default => null,
        };

        $user = Auth::guard('api')->user();
        $wishlist = Wishlist::where('model_type', $model_type)
            ->where('model_id', $request->id)
            ->where('is_dislike', $request->is_dislike ? 1 : 0)
            ->where(function ($query) use ($user, $request) {
                $query->where('user_id', $user?->id)->orWhere('ip', $request->ip);
            })
            ->first();

        if (isset($wishlist)) {
            $wishlist->delete();

            return response()->json([
                'message' => 'از علاقه‌مندی‌ها حذف شد.',
                'data' => [
                    'is_liked' => false,
                ],
            ]);
        } else {
            Wishlist::create([
                'model_type' => $model_type,
                'model_id' => $request->id,
                'user_id' => $user?->id,
                'is_dislike' => $request->is_dislike ? 1 : 0,
                'created_by' => $user?->id,
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'message' => 'به علاقه‌مندی‌ها اضافه شد.',
                'data' => [
                    'is_liked' => true,
                ],
            ], 201);
        }
    }
}
