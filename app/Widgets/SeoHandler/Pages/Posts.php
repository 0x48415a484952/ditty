<?php

namespace App\Widgets\SeoHandler\Pages;

class Posts
{

    public function get(array $parsedUri)
    {
        if (!empty($parsedUri[1])) {
            $post_id = $parsedUri[1];

            if (is_numeric($post_id)) {
                $posts = app('posts');
                $post = $posts->find($post_id);

                if (! empty($post)) {
                    return [
                        'title' => $post->title,
                        'canonical' => $post->url,
                        'meta' => [
                            [
                                'attribute_title' => 'name',
                                'attribute_value' => 'description',
                                'content' => $post->brief_text,
                            ],
                            [
                                'attribute_title' => 'name',
                                'attribute_value' => 'author',
                                'content' => $post->user->name,
                            ],
                            [
                                'attribute_title' => 'itemprop',
                                'attribute_value' => 'image',
                                'content' => url('/') . $post->cover_image,
                            ],
                            [
                                'attribute_title' => 'property',
                                'attribute_value' => 'og:type',
                                'content' => 'article',
                            ],
                            [
                                'attribute_title' => 'property',
                                'attribute_value' => 'og:title',
                                'content' => $post->title,
                            ],
                            [
                                'attribute_title' => 'property',
                                'attribute_value' => 'og:url',
                                'content' => $post->url,
                            ],
                            [
                                'attribute_title' => 'property',
                                'attribute_value' => 'og:description',
                                'content' => $post->brief_text,
                            ],
                            [
                                'attribute_title' => 'property',
                                'attribute_value' => 'og:image',
                                'content' => url('/') . $post->cover_image,
                            ],
                            [
                                'attribute_title' => 'name',
                                'attribute_value' => 'robots',
                                'content' => 'index, follow',
                            ],
                            [
                                'attribute_title' => 'name',
                                'attribute_value' => 'keywords',
                                'content' => implode(',', $post->tags),
                            ],
                        ]
                    ];
                }
            }
        }
    }

}