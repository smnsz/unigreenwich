<?php

namespace Community;

use Community\User;

class Models
{

    protected static $models = [];

    protected static $tables = [];

    public static function setMessageModel($model)
    {
        static::$models[Message::class] = $model;
    }

    public static function setParticipantModel($model)
    {
        static::$models[Participant::class] = $model;
    }

    public static function setThreadModel($model)
    {
        static::$models[Thread::class] = $model;
    }

    public static function setUserModel($model)
    {
        static::$models[User::class] = $model;
    }

    public static function setTables(array $map)
    {
        static::$tables = array_merge(static::$tables, $map);
    }

    public static function table($table)
    {
        if (isset(static::$tables[$table])) {
            return static::$tables[$table];
        }
        return $table;
    }

    public static function classname($model)
    {
        if (isset(static::$models[$model])) {
            return static::$models[$model];
        }
        return $model;
    }

    public static function message(array $attributes = [])
    {
        return static::make(Message::class, $attributes);
    }

    public static function participant(array $attributes = [])
    {
        return static::make(Participant::class, $attributes);
    }

    public static function thread(array $attributes = [])
    {
        return static::make(Thread::class, $attributes);
    }

    public static function user(array $attributes = [])
    {
        return static::make(User::class, $attributes);
    }

    protected static function make($model, array $attributes = [])
    {
        $model = static::classname($model);
        return new $model($attributes);
    }
}