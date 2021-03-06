<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // for question============================
        \Gate::define('update-question',function($user,$question){
            return $user->id===$question->user_id;
        });

        \Gate::define('delete-question',function($user,$question){
            return $user->id === $question->user_id && $question->answer < 1;
        });

        //for answer=================================
        \Gate::define('update-answer',function($user,$answer){
            return $user->id===$answer->user_id;
        });

        \Gate::define('delete-answer',function($user,$answer){
            return $user->id === $answer->user_id;
        });

        // for answer accept===========================
        \Gate::define('accept',function($user,$answer){
            return $user->id === $answer->question->user_id;
        });

    }
}
