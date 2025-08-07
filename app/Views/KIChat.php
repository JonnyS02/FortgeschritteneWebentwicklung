<div class="card shadow col-md-8 m-auto">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-robot"></i> KI-Chat</h5>
        <button id="clearChat" class="btn btn-sm btn-outline-danger" type="button">
            <i class="bi bi-trash"></i> Verlauf&nbsp;löschen
        </button>
    </div>

    <div id="chatBody" class="card-body overflow-auto" style="height:60vh;"></div>

    <div class="card-footer bg-light border-top">
        <form id="chatForm" class="d-flex gap-2">
            <input id="questionInput"
                   class="form-control"
                   placeholder="Deine Frage …"
                   autocomplete="off"
                   required>
            <button id="sendBtn" class="btn btn-primary" type="submit">
                <i class="bi bi-send"></i>
            </button>
        </form>
    </div>
</div>

<script>
    (() => {
        const STORAGE_KEY = 'kiChatHistory';
        const chatBody = document.getElementById('chatBody');
        const form = document.getElementById('chatForm');
        const input = document.getElementById('questionInput');
        const clearBtn = document.getElementById('clearChat');

        let history = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
        renderHistory();

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const msg = input.value.trim();
            if (!msg) return;
            addMessage('user', msg);
            input.value = '';
            await sendToAI(msg);
        });

        clearBtn.addEventListener('click', () => {
            history = [];
            saveHistory();
            renderHistory();
        });

        function addMessage(role, content) {
            history.push({role, content});
            saveHistory();
            renderMessage(role, content);
        }

        function renderHistory() {
            chatBody.innerHTML = '';
            history.forEach(m => renderMessage(m.role, m.content));
            scrollDown();
        }

        function renderMessage(role, content) {
            const wrapper = document.createElement('div');
            wrapper.className = 'd-flex my-2';
            wrapper.innerHTML = `
            <div class="p-2 rounded ${role === 'user'
                ? 'bg-primary text-white ms-auto'
                : 'bg-secondary-subtle me-auto'}">${content}</div>`;
            chatBody.appendChild(wrapper);
            scrollDown();
        }

        function scrollDown() {
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        function saveHistory() {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(history));
        }

        async function sendToAI(question) {
            addMessage('assistant',
                '<div class="spinner-border spinner-border-sm text-secondary" role="status"></div>');

            try {
                const response = await fetch('<?= base_url(index_page()) ?>/KIApi', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: new URLSearchParams({
                        question,
                        history: JSON.stringify(history.filter(m => m.content)) // ggf. Mini-Cleanup
                    })
                });

                const text = await response.text();

                history.pop();
                chatBody.lastChild.remove();

                addMessage('assistant', text);
            } catch (err) {
                alert('Fehler bei der Verbindung zur KI: ' + err.message);
            }
        }
    })();
</script>
