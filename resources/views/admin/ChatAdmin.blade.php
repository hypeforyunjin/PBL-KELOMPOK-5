<!-- filepath: resources/views/admin/ChatAdmin.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Chat Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bubble-admin { background: #0b80ee; color: #fff; border-radius: 16px 16px 16px 4px; }
        .bubble-user { background: #f0f2f5; color: #111518; border-radius: 16px 16px 4px 16px; }
        .avatar { width: 40px; height: 40px; border-radius: 50%; background-size: cover; background-position: center; }
        .time-text { color: #9ca3af; font-size: 0.75rem; margin-top: 2px; }
    </style>
</head>
<body>
    <div class="flex flex-col min-h-screen bg-white justify-between">
        <div class="flex items-center bg-white p-4 pb-2 justify-between">
            <h2 class="text-[#111518] text-lg font-bold flex-1 text-center">Chat dengan {{ $user->name ?? '-' }}</h2>
        </div>
        <div id="chat-messages" class="flex-1 overflow-y-auto px-4 py-4 bg-white space-y-4"></div>
        <form id="chat-form" action="{{ route('admin.chat.send', $user->id) }}" method="POST" class="flex items-center px-4 py-3 gap-3 border-t bg-white">
            @csrf
            <input type="text" name="message" id="message-input" placeholder="Tulis pesan ke user..."
                class="form-input flex w-full min-w-0 flex-1 rounded-xl bg-[#f0f2f5] h-12 px-4 text-base"
                autocomplete="off" required />
            <button type="submit" class="h-12 w-12 flex items-center justify-center bg-[#0b80ee] text-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
            </button>
        </form>
        <div class="h-5 bg-white"></div>
    </div>
    <script>
        function formatTime(date) {
            const d = new Date(date);
            return d.getHours().toString().padStart(2, '0') + ':' + d.getMinutes().toString().padStart(2, '0');
        }
        function escapeHtml(text) {
            var map = {'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'};
            return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }
        function fetchChats() {
            fetch("{{ route('admin.chat.fetch', $user->id) }}")
                .then(response => response.json())
                .then(data => {
                    const chatBox = document.getElementById('chat-messages');
                    chatBox.innerHTML = '';
                    data.forEach(chat => {
                        const isAdmin = chat.sender === 'admin';
                        chatBox.innerHTML += `
                            <div class="flex ${isAdmin ? 'justify-start' : 'justify-end'} gap-3">
                                ${isAdmin ? `
                                    <div class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=Admin&background=0b80ee&color=fff');"></div>
                                    <div class="flex flex-col items-start max-w-[75%]">
                                        <div class="bubble-admin px-4 py-3">${escapeHtml(chat.message)}</div>
                                        <div class="time-text text-left">${formatTime(chat.created_at)}</div>
                                    </div>
                                ` : `
                                    <div class="flex flex-col items-end max-w-[75%]">
                                        <div class="bubble-user px-4 py-3">${escapeHtml(chat.message)}</div>
                                        <div class="time-text text-right">${formatTime(chat.created_at)}</div>
                                    </div>
                                    <div class="avatar" style="background-image: url('https://ui-avatars.com/api/?name=User&background=f0f2f5&color=111518');"></div>
                                `}
                            </div>
                        `;
                    });
                    chatBox.scrollTop = chatBox.scrollHeight;
                });
        }
        setInterval(fetchChats, 2000);
        fetchChats();

        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = this;
            const input = document.getElementById('message-input');
            if (!input.value.trim()) return;
            const data = new FormData(form);
            fetch(form.action, {
                method: 'POST',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                body: data
            }).then(() => {
                input.value = '';
                fetchChats();
            });
        });
    </script>
</body>
</html>