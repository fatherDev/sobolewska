<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Roots\Acorn\View\Composers\Concerns\AcfFields;


class App extends Composer
{
    use AcfFields;
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'fields' => collect($this->fields())->toArray(),
            'siteName' => $this->siteName(),
            'highlightedPosts' => $this->highlightedPosts(),
            'excludedPostsID' => $this->excludedPostsID(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    public function highlightedPosts()
    {
        $highlightedQuery = new \WP_Query([
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
        ]);

        $highlightedPosts = $highlightedQuery->posts;

        return $highlightedPosts;
    }

    public function excludedPostsID()
    {

        $highlightedQuery = new \WP_Query([
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
        ]);

        $highlightedPosts = $highlightedQuery->posts;

        $excludedPostsID = [];
        foreach ($highlightedPosts as $post) {
            array_push($excludedPostsID, $post->ID);
        }
        return $excludedPostsID;
    }


}
