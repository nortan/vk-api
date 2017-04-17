<?php

/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 17.04.17
 * Time: 14:47
 */

namespace ZxCoder\Methods\Newsfeed\Filter;

class GetFilter
{
    private $filter = [];

    public function addPhoto()
    {
        $this->filter['photo'] = 'photo';
    }

    public function addPost()
    {
        $this->filter['post'] = 'post';
    }

    public function addPhotoTag()
    {
        $this->filter['photo_tag'] = 'photo_tag';
    }

    public function addWallPhoto()
    {
        $this->filter['wall_photo'] = 'wall_photo';
    }

    public function addFriend()
    {
        $this->filter['friend'] = 'friend';
    }

    public function addNote()
    {
        $this->filter['note'] = 'note';
    }

    public function addVideo()
    {
        $this->filter['video'] = 'video';
    }

    public function addAudio()
    {
        $this->filter['audio'] = 'audio';
    }

    public function getFilterValue()
    {
        return implode(',', $this->filter);
    }
}