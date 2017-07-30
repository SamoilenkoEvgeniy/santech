<?php

use App\Modules\User\Models\Role;
use App\Modules\User\Models\RoleUser;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("users", function (Blueprint $blueprint) {
            $blueprint->increments("id");
            $blueprint->string("email")->unique();
            $blueprint->text("password");
            $blueprint->text("name");
            $blueprint->text("remember_token")->nullable();
            $blueprint->timestamps();
        });


        Schema::create("roles", function (Blueprint $blueprint) {
            $blueprint->increments("id");
            $blueprint->text("name");
            $blueprint->string("slug")->unique();
            $blueprint->timestamps();
        });

        Schema::create("role_user", function (Blueprint $blueprint) {
            $blueprint->increments("id");
            $blueprint->integer("user_id", false, true)->index();
            $blueprint->integer("role_id", false, true)->index();
            $blueprint->timestamps();

            $blueprint->foreign("user_id")->references('id')->on("users")->onDelete("cascade");
            $blueprint->foreign("role_id")->references('id')->on("roles")->onDelete("cascade");
        });

        $user = User::create([
            "email" => "samoilenkoevgeniy@gmail.com",
            "password" => \Hash::make("Aeywq<%12"),
            "name" => "Admin"
        ]);

        $role = Role::create([
            "name" => "Администратор",
            "slug" => "administrator"
        ]);

        RoleUser::create([
            "user_id" => $user->id,
            "role_id" => $role->id
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("role_user");
        Schema::drop("users");
        Schema::drop("roles");
    }
}
