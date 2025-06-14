<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // User mengirim pesan ke admin
    public function store(Request $request)
    {
        $request->validate(['message' => 'required']);
        $admin = Admin::first(); // ambil admin pertama, atau sesuaikan

        Chat::create([
            'user_id' => Auth::id(),
            'receiver_id' => $admin->id,
            'sender_type' => 'user',
            'receiver_type' => 'admin',
            'message' => $request->message,
            'sender' => 'user',
        ]);

        return response()->json(['success' => true]);
    }

    // Admin mengirim pesan ke user
    public function adminSend(Request $request, User $user)
    {
        $request->validate(['message' => 'required']);
        $adminId = Auth::guard('admin')->id();

        Chat::create([
            'user_id' => $adminId,
            'receiver_id' => $user->id,
            'sender_type' => 'admin',
            'receiver_type' => 'user',
            'message' => $request->message,
            'sender' => 'admin',
        ]);

        return response()->json(['success' => true]);
    }

    // Fetch chat antara user dan admin (untuk user)
    public function fetchChatsUser()
    {
        $user = Auth::user();
        $admin = Admin::first();

        $chats = Chat::where(function($q) use ($user, $admin) {
                $q->where('user_id', $user->id)
                  ->where('sender_type', 'user')
                  ->where('receiver_id', $admin->id)
                  ->where('receiver_type', 'admin');
            })->orWhere(function($q) use ($user, $admin) {
                $q->where('user_id', $admin->id)
                  ->where('sender_type', 'admin')
                  ->where('receiver_id', $user->id)
                  ->where('receiver_type', 'user');
            })
            ->orderBy('created_at')
            ->get();

        return response()->json($chats);
    }

    // Fetch chat antara admin dan user (untuk admin)
    public function fetchChats(User $user)
    {
        $adminId = Auth::guard('admin')->id();

        $chats = Chat::where(function($q) use ($user, $adminId) {
                $q->where('user_id', $user->id)
                  ->where('sender_type', 'user')
                  ->where('receiver_id', $adminId)
                  ->where('receiver_type', 'admin');
            })->orWhere(function($q) use ($user, $adminId) {
                $q->where('user_id', $adminId)
                  ->where('sender_type', 'admin')
                  ->where('receiver_id', $user->id)
                  ->where('receiver_type', 'user');
            })
            ->orderBy('created_at')
            ->get();

        return response()->json($chats);
    }

    // (Opsional) Halaman chat user
    public function index()
    {
        return view('customer.auth.ChatUsers');
    }

    // (Opsional) Halaman chat admin
    public function adminChat(User $user)
    {
        return view('admin.ChatAdmin', compact('user'));
    }

    public function adminChatUsers()
{
    $adminId = Auth::guard('admin')->id();
    $users = \App\Models\User::whereHas('chats', function($q) use ($adminId) {
        $q->where(function($q2) use ($adminId) {
            $q2->where('receiver_id', $adminId)->where('receiver_type', 'admin');
        })->orWhere(function($q2) use ($adminId) {
            $q2->where('user_id', $adminId)->where('sender_type', 'admin');
        });
    })->get();

    return view('admin.Chat', compact('users'));
}
}