<<<<<<< HEAD
<?php 
=======
<?php

>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PropertySearch extends Model
{
<<<<<<< HEAD
    // The model does not need a table, as it's used for search purposes
    protected $table = null;

    /**
     * Scope for filtering by listing type.
     */
    public function scopeListType(Builder $query, $listType)
    {
        return $query->when($listType, function ($q) use ($listType) {
            $q->where('list_type', 'like', "%{$listType}%");
=======
    // The model uses the 'properties' table
    protected $table = 'properties';

    // Define relationships to use in scopes
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    /**
     * Scope for filtering by category type.
     */
    public function scopeCategoryType(Builder $query, $categoryType)
    {
        return $query->when($categoryType, function ($q) use ($categoryType) {
            $q->whereHas('category', function ($query) use ($categoryType) {
                $query->where('name', 'like', "%{$categoryType}%");
            });
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        });
    }

    /**
<<<<<<< HEAD
     * Scope for filtering by property type.
     */
    public function scopePropertyType(Builder $query, $propertyType)
    {
        return $query->when($propertyType, function ($q) use ($propertyType) {
            $q->where('property_type', 'like', "%{$propertyType}%");
=======
     * Scope for filtering by sub-category.
     */
    public function scopeSubCategory(Builder $query, $subCategory)
    {
        return $query->when($subCategory, function ($q) use ($subCategory) {
            $q->whereHas('subCategory', function ($query) use ($subCategory) {
                $query->where('name', 'like', "%{$subCategory}%");
            });
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        });
    }

    /**
     * Scope for filtering by location.
     */
    public function scopeLocation(Builder $query, $location)
    {
        return $query->when($location, function ($q) use ($location) {
<<<<<<< HEAD
            $q->where('location', 'like', "%{$location}%");
=======
            $q->where(function ($query) use ($location) {
                $query->where('street', 'like', "%{$location}%")
                      ->orWhere('suburb', 'like', "%{$location}%")
                      ->orWhere('state', 'like', "%{$location}%")
                      ->orWhere('post_code', 'like', "%{$location}%")
                      ->orWhere('country', 'like', "%{$location}%");
            });
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        });
    }

    /**
     * Scope for filtering by price range.
     */
    public function scopePrice(Builder $query, $minPrice, $maxPrice)
    {
        return $query->when($minPrice || $maxPrice, function ($q) use ($minPrice, $maxPrice) {
            if ($minPrice && $maxPrice) {
                $q->whereBetween('price', [$minPrice, $maxPrice]);
            } elseif ($minPrice) {
                $q->where('price', '>=', $minPrice);
            } elseif ($maxPrice) {
                $q->where('price', '<=', $maxPrice);
            }
        });
    }

    /**
     * Scope for filtering by number of bedrooms.
     */
    public function scopeBedroom(Builder $query, $bedroom)
    {
        return $query->when($bedroom, function ($q) use ($bedroom) {
<<<<<<< HEAD
            $q->where('bedroom', $bedroom);
=======
            $q->where('bedrooms', $bedroom);
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        });
    }

    /**
     * Apply all filters to the query.
<<<<<<< HEAD
     */
    public static function applyFilters($query, $filters)
    {
        return $query
            ->listType($filters['list_type'] ?? null)
            ->propertyType($filters['property_type'] ?? null)
=======
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public static function applyFilters(Builder $query, array $filters): Builder
    {
        return $query
            ->categoryType($filters['category_type'] ?? null)
            ->subCategory($filters['sub_category'] ?? null)
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
            ->location($filters['location'] ?? null)
            ->price($filters['min_price'] ?? null, $filters['max_price'] ?? null)
            ->bedroom($filters['bedroom'] ?? null);
    }
}
