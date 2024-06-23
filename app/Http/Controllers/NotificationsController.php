<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class NotificationsController extends Controller
{
    protected $database;

    public function pushNotification($notifications)
    {
        $factory = (new Factory)
            ->withDatabaseUri(config('firebase.database_url'));

        $this->database = $factory->createDatabase(); // Correct method to instantiate Firebase

        foreach ($notifications as $notification) {
            $messagesRef = $this->database->getReference('notifications/' . $notification["user_id"]);
            $message = $messagesRef->push([

                "title" => $notification["title"],
                "body" => $notification["body"],
                'timestamp' => now()->toISOString(),
            ]);
        }

        return response()->json($message, 201);
    }
}
