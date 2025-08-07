<div class="card shadow col-md-8 m-auto">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-robot me-2"></i>KI-Chat</h5>
        <button id="clearChat" class="btn btn-sm btn-outline-danger">
            <i class="fas fa-trash-alt"></i> Verlauf löschen
        </button>
    </div>
    <div id="chatBody" class="card-body overflow-auto" style="height:60vh;"></div>
    <div class="card-footer border-top">
        <form id="chatForm" class="input-group">
            <input id="questionInput" class="form-control" placeholder="Deine Frage …" autocomplete="off" required>
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>

<script>
    $(function () {
        const STORAGE_KEY = 'kiChatHistory';
        const $chatBody = $('#chatBody');
        const $form = $('#chatForm');
        const $input = $('#questionInput');
        const $clearBtn = $('#clearChat');

        let history = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
        renderHistory();

        $form.on('submit', async function (e) {
            e.preventDefault();
            const msg = $.trim($input.val());
            addMessage('user', msg);
            $input.val('');
            await sendToAI(msg);
        });

        $clearBtn.on('click', function () {
            history = [];
            renderHistory();
        });

        function addMessage(role, content) {
            history.push({role, content});
            localStorage.setItem(STORAGE_KEY, JSON.stringify(history));
            renderMessage(role, content);
        }

        function renderHistory() {
            $chatBody.empty();
            history.forEach(m => renderMessage(m.role, m.content));
            scrollDown();
        }

        function renderMessage(role, content) {
            const isUser = role === 'user';
            const icon   = isUser ? 'fa-user' : 'fa-robot';
            const align  = isUser ? 'justify-content-end' : 'justify-content-start';
            const tone   = isUser ? 'bg-primary text-white' : 'bg-secondary text-white';
            const iconColor = isUser ? 'text-primary' : 'text-secondary';

            const html = `
      <div class="d-flex my-2 ${align}">
        ${isUser ? '' : `<div class="d-flex align-items-start me-2"><i class="fas ${icon} ${iconColor} fa-lg"></i></div>`}
        <div class="p-2 px-3 rounded shadow-sm ${tone}" style="max-width: 75%; word-break: break-word;">
          ${content}
        </div>
        ${isUser ? `<div class="d-flex align-items-start ms-2"><i class="fas ${icon} ${iconColor} fa-lg"></i></div>` : ''}
      </div>`;

            $chatBody.append(html);
            scrollDown();
        }


        function scrollDown() {
            $chatBody.scrollTop($chatBody.prop('scrollHeight'));
        }

        async function sendToAI(question) {
            addMessage('assistant', '<div class="spinner-border spinner-border-sm text-info" role="status"></div>');

            const res = await $.ajax({
                url: '<?= base_url(index_page()) ?>/KIApi',
                method: 'POST',
                dataType: 'text',
                data: {
                    question: question,
                    history: JSON.stringify(history.filter(m => m.content))
                }
            });

            history.pop();
            $chatBody.children().last().remove();

            addMessage('assistant', res);
        }
    });
</script>
