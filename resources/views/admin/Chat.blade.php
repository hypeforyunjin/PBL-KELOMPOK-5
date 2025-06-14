<!-- filepath: resources/views/admin/ChatUsers.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Daftar User Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Daftar User yang Pernah Chat</h2>
        <div class="bg-white rounded-lg shadow p-4">
            @if($users->count())
                <ul>
                    @foreach($users as $user)
                        <li class="flex items-center justify-between border-b py-3 last:border-b-0">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-lg font-bold text-blue-600">
                                    {{ strtoupper(substr($user->name,0,1)) }}
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                            <a href="{{ route('admin.chat.with', $user->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Lihat Chat</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="text-center text-gray-500 py-8">Belum ada user yang mengirim pesan.</div>
            @endif
        </div>
    </div>
</body>
</html>