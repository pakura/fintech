<?php

namespace Models\Traits;

use Models\Gallery;

trait HasGalleryTrait
{
    use PositionableTrait;

    /**
     * Get the data based on the admin gallery.
     *
     * @param  \Models\Gallery  $gallery
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAdminGallery(Gallery $gallery, $columns = ['*'])
    {
        return $this->adminGallery($gallery)
            ->paginate($gallery->admin_per_page, $columns);
    }

    /**
     * Get the data based on the public gallery.
     *
     * @param  \Models\Gallery  $gallery
     * @param  array  $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPublicGallery(Gallery $gallery, $columns = ['*'])
    {
        return $this->publicGallery($gallery)
            ->paginate($gallery->web_per_page, $columns);
    }

    /**
     * Build a query based on the admin gallery.
     *
     * @param  \Models\Gallery  $gallery
     * @return \Models\Builder\Builder
     */
    public function adminGallery(Gallery $gallery)
    {
        return $this->byGallery($gallery->id)
            ->orderBy($gallery->admin_order_by, $gallery->admin_sort);
    }

    /**
     * Build a query based on the public gallery.
     *
     * @param  \Models\Gallery  $gallery
     * @return \Models\Builder\Builder
     */
    public function publicGallery(Gallery $gallery)
    {
        return $this->byGallery($gallery->id)
            ->hasFile()
            ->visible()
            ->orderBy($gallery->web_order_by, $gallery->web_sort);
    }

    /**
     * Build a query based on the gallery.
     *
     * @param  int  $id
     * @return \Models\Builder\Builder
     */
    public function byGallery($id)
    {
        return $this->joinLanguage()->galleryId($id);
    }

    /**
     * Get the same type gallery instance.
     *
     * @param  string|null  $type
     * @return \Models\Builder\Builder
     */
    public function byType($type = null)
    {
        return (new Gallery)->joinLanguage()->where(
            'type', is_null($type) ? static::TYPE : $type
        );
    }

    /**
     * Add a where "file" is not empty clause to the query.
     *
     * @return \Models\Builder\Builder
     */
    public function hasFile()
    {
        return $this->whereNotNull('file')->where('file', '!=', '');
    }

    /**
     * Add a where "gallery_id" clause to the query.
     *
     * @param  mixed  $id
     * @return \Models\Builder\Builder
     */
    public function galleryId($id)
    {
        return $this->where('gallery_id', $id);
    }

    /**
     * Add a where "visible" clause to the query.
     *
     * @param  int  $value
     * @return \Models\Builder\Builder
     */
    public function visible($value = 1)
    {
        return $this->where('visible', (int) $value);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $attributes = [])
    {
        if (isset($attributes['gallery_id'])) {
            $attributes['position'] = (int) $this->galleryId($attributes['gallery_id'])
                    ->max('position') + 1;
        } else {
            $attributes['position'] = (int) $this->max('position') + 1;
        }

        return parent::create($attributes);
    }
}
