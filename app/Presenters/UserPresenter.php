<?php

namespace Community\Presenters;

use Illuminate\Support\Str;
use Community\ContentParser\ContentParserFacade as ContentParser;
use Laracasts\Presenter\Presenter;
use Thomaswelton\LaravelGravatar\Facades\Gravatar;

class UserPresenter extends Presenter
{

    public function profileImage($width = null)
    {
        if (isset($this->entity->avatar)) {

            if(filter_var($this->entity->avatar, FILTER_VALIDATE_URL)){
                return $this->entity->avatar;
            }

            if (!is_null($width)) {
                $width = "?w=" . $width;
            }

            return config('upload_paths.avatars') . $this->entity->avatar . $width;
        }

        return Gravatar::src($this->entity->email, $width);
    }

    public function biography()
    {
        return ContentParser::transform($this->entity->bio);
    }
    
   
    
    public function getUserimage($width = null, $image, $email)
    {
        if (isset($image)) {
            if(filter_var($image, FILTER_VALIDATE_URL)){
                return $image;
            }
            if (!is_null($width)) {
                $width = "?w=" . $width;
            }
            return config('upload_paths.avatars') . $image . $width;
        }
        return Gravatar::src($email, $width);
    }
   

}
