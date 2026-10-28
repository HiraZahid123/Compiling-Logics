/**
 * Compiling Logics — Agentic AI Assistant & WhatsApp Integration
 */

const escapeHtml = (unsafe) => {
    return (unsafe || '')
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
};

const whatsappSVG = `<svg style="width:0.75rem;height:0.75rem;fill:white;flex-shrink:0;" viewBox="0 0 24 24" aria-hidden="true"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>`;

export function initAgenticChat() {
    const chatWidget = document.querySelector('[data-agentic-chat]');
    if (!chatWidget) return;

    const chatWindow   = chatWidget.querySelector('[data-chat-window]');
    const chatMessages = chatWidget.querySelector('[data-chat-messages]');
    const chatForm     = chatWidget.querySelector('[data-chat-form]');
    const chatInput    = chatWidget.querySelector('[data-chat-input]');
    const toggleBtns   = document.querySelectorAll('[data-chat-toggle]');
    const closeBtn     = chatWidget.querySelector('[data-chat-close]');
    const directWa     = chatWidget.querySelector('[data-direct-whatsapp]');
    const footerWa     = chatWidget.querySelector('[data-footer-whatsapp]');

    const rawWhatsapp   = chatWidget.dataset.whatsappNumber || '';
    const whatsappNumber = rawWhatsapp.replace(/[^0-9]/g, '');

    let isOpen = false;

    // ── WhatsApp URL builder ──────────────────────────────────────
    const buildWaUrl = (text = '') => {
        const base   = `https://wa.me/${whatsappNumber}`;
        const prefix = 'Hello Compiling Logics, I was on your website and would like to discuss: ';
        const body   = text.trim()
            ? `${prefix}\n\n"${text.trim()}"`
            : 'Hello Compiling Logics, I\'d like to inquire about your software development services.';
        return `${base}?text=${encodeURIComponent(body)}`;
    };

    // ── Scroll to very bottom ─────────────────────────────────────
    const scrollToBottom = () => {
        requestAnimationFrame(() => {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });
    };

    // ── Open / Close ──────────────────────────────────────────────
    const openChat = () => {
        isOpen = true;
        chatWindow.style.display = 'flex';
        // Allow display to settle, then animate in
        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                chatWindow.style.opacity   = '1';
                chatWindow.style.transform = 'scale(1) translateY(0)';
            });
        });
        scrollToBottom();
        chatInput?.focus();
    };

    const closeChat = () => {
        isOpen = false;
        chatWindow.style.opacity   = '0';
        chatWindow.style.transform = 'scale(0.95) translateY(10px)';
        setTimeout(() => {
            if (!isOpen) {
                chatWindow.style.display = 'none';
            }
        }, 220);
    };

    toggleBtns.forEach((btn) => btn.addEventListener('click', () => (isOpen ? closeChat() : openChat())));
    closeBtn?.addEventListener('click', closeChat);
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && isOpen) closeChat(); });

    // ── Message renderers ─────────────────────────────────────────
    const timeLabel = () => {
        const d = new Date();
        return d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    };

    const addUserMessage = (text) => {
        const row = document.createElement('div');
        row.style.cssText = 'display:flex;align-items:flex-end;justify-content:flex-end;gap:0.5rem;';
        row.innerHTML = `
            <div style="max-width:82%;text-align:right;">
                <div style="
                    background:#0049fd;color:white;
                    padding:0.625rem 0.875rem;
                    border-radius:1rem 1rem 0.2rem 1rem;
                    box-shadow:0 1px 3px rgba(0,0,0,0.12);
                    font-size:0.8125rem;line-height:1.55;
                    word-break:break-word;text-align:left;
                ">${escapeHtml(text)}</div>
                <p style="font-size:0.6rem;color:#64748b;margin-top:0.2rem;padding-right:0.25rem;">${timeLabel()}</p>
            </div>
        `;
        chatMessages.appendChild(row);
        scrollToBottom();
    };

    const showTyping = () => {
        const el = document.createElement('div');
        el.id = 'chat-typing';
        el.style.cssText = 'display:flex;align-items:flex-end;gap:0.5rem;';
        el.innerHTML = `
            <div style="width:1.75rem;height:1.75rem;border-radius:9999px;background:#0049fd;color:white;display:flex;align-items:center;justify-content:center;font-size:0.55rem;font-weight:700;flex-shrink:0;">AI</div>
            <div style="background:white;padding:0.625rem 0.875rem;border-radius:1rem 1rem 1rem 0.2rem;box-shadow:0 1px 3px rgba(0,0,0,0.1);display:flex;align-items:center;gap:0.3rem;">
                <span style="width:0.45rem;height:0.45rem;border-radius:9999px;background:#94a3b8;display:inline-block;animation:bounce 1s infinite 0ms;"></span>
                <span style="width:0.45rem;height:0.45rem;border-radius:9999px;background:#94a3b8;display:inline-block;animation:bounce 1s infinite 200ms;"></span>
                <span style="width:0.45rem;height:0.45rem;border-radius:9999px;background:#94a3b8;display:inline-block;animation:bounce 1s infinite 400ms;"></span>
            </div>
        `;
        chatMessages.appendChild(el);
        scrollToBottom();

        // Inject bounce keyframes once
        if (!document.getElementById('chat-bounce-style')) {
            const s = document.createElement('style');
            s.id = 'chat-bounce-style';
            s.textContent = '@keyframes bounce{0%,80%,100%{transform:translateY(0)}40%{transform:translateY(-6px)}}';
            document.head.appendChild(s);
        }
    };

    const removeTyping = () => document.getElementById('chat-typing')?.remove();

    const addAgentMessage = (html, rawQuery) => {
        const waUrl = buildWaUrl(rawQuery);

        const row = document.createElement('div');
        row.style.cssText = 'display:flex;align-items:flex-end;gap:0.5rem;';
        row.innerHTML = `
            <div style="width:1.75rem;height:1.75rem;border-radius:9999px;background:#0049fd;color:white;display:flex;align-items:center;justify-content:center;font-size:0.55rem;font-weight:700;flex-shrink:0;">AI</div>
            <div style="max-width:84%;">
                <div style="
                    background:white;color:#1e293b;
                    padding:0.625rem 0.875rem;
                    border-radius:1rem 1rem 1rem 0.2rem;
                    box-shadow:0 1px 3px rgba(0,0,0,0.1);
                    font-size:0.8125rem;line-height:1.55;
                    word-break:break-word;
                ">
                    <div>${html}</div>
                    <div style="margin-top:0.625rem;padding-top:0.5rem;border-top:1px solid #f1f5f9;display:flex;flex-wrap:wrap;align-items:center;gap:0.5rem;">
                        <a href="${waUrl}" target="_blank" rel="noopener noreferrer"
                            style="display:inline-flex;align-items:center;gap:0.375rem;padding:0.35rem 0.75rem;background:#25D366;color:white;border-radius:9999px;font-size:0.7rem;font-weight:700;text-decoration:none;">
                            ${whatsappSVG} Chat on WhatsApp →
                        </a>
                        <a href="/contact" style="font-size:0.7rem;color:#0049fd;font-weight:600;text-decoration:none;">
                            Or Book a Call
                        </a>
                    </div>
                </div>
                <p style="font-size:0.6rem;color:#64748b;margin-top:0.2rem;padding-left:0.25rem;">${timeLabel()}</p>
            </div>
        `;
        chatMessages.appendChild(row);
        scrollToBottom();
    };

    // ── Agentic Response Engine ───────────────────────────────────
    const generateResponse = (userQuery) => {
        const q = userQuery.toLowerCase().trim();

        // 0. Greetings
        if (/^(hi|hello|hey|howdy|greetings|salaam|salam|assalam|sup|hiya|good (morning|afternoon|evening|day))[\s!?.]*$/.test(q)) {
            return `Hi there! 👋 Welcome to <strong>Compiling Logics</strong>!<br><br>
                I'm your AI assistant. I can help you with:<br>
                🛠️ <strong>Services</strong> — AI agents, web &amp; mobile apps, cloud<br>
                📂 <strong>Case Studies</strong> — 11 featured projects with PDFs<br>
                💰 <strong>Pricing</strong> — milestone-based estimates<br>
                📅 <strong>Book a Call</strong> — free 30-min discovery session<br><br>
                What can I help you with today?`;
        }

        // 1. WhatsApp explicit intent
        if (q.includes('whatsapp') || q.includes('phone') || q.includes('number') || q.includes('call you') || q.includes('engineer')) {
            return `You can reach our senior engineers and project leads directly on <strong>WhatsApp</strong> right now! Click the button below to start a live conversation.`;
        }

        // 2. Services
        if (q.includes('service') || q.includes('what do you do') || q.includes('build') || q.includes('offer') || q.includes('provide')) {
            return `At <strong>Compiling Logics</strong> we engineer high-performance digital products across 6 pillars:<br>
                • <strong>AI Agents &amp; Automation</strong> — LLM agents, chatbots, workflow automation<br>
                • <strong>Software Development</strong> — SaaS, web &amp; mobile (iOS/Android)<br>
                • <strong>Cloud &amp; DevOps</strong> — AWS, GCP, Azure, CI/CD pipelines<br>
                • <strong>Quality Assurance</strong> — automated testing &amp; security audits<br>
                • <strong>Product Design</strong> — UI/UX wireframing &amp; design systems<br>
                • <strong>IT Consultation</strong> — technical advisory &amp; roadmaps<br><br>
                See full details on our <a href="/services" style="color:#0049fd;font-weight:700;">Services page</a>.`;
        }

        // 3. AI / ML
        if (q.includes('ai') || q.includes('agent') || q.includes('bot') || q.includes('machine learning') || q.includes('llm') || q.includes('gpt') || q.includes('automation')) {
            return `Our <strong>AI Agents &amp; Automation</strong> team builds production-grade autonomous agents, RAG pipelines, and custom LLM integrations that replace manual, repetitive work.<br><br>
                We can design a secure, scalable AI architecture tailored to your workflow. Want to explore what's possible?`;
        }

        // 4. Case studies / portfolio
        if (q.includes('case study') || q.includes('case studies') || q.includes('project') || q.includes('portfolio') || q.includes('work') || q.includes('example')) {
            return `We have <strong>11 featured enterprise solutions</strong> — each with a downloadable PDF case study:<br>
                • <strong>ExpatCarBuyers</strong> — UAE car valuation engine (&lt;50ms transitions)<br>
                • <strong>Kids Health Club</strong> — Australian healthcare &amp; telehealth directory<br>
                • <strong>Best Local Law</strong> — national attorney-client matching portal<br>
                • <strong>Certus 3D</strong> — industrial 3D printing platform<br>
                • <strong>JollyWitMe</strong> — event ticketing &amp; registration SaaS<br><br>
                Browse &amp; download all PDFs on our <a href="/work" style="color:#0049fd;font-weight:700;">Work page</a>.`;
        }

        // 5. Booking / consultation
        if (q.includes('book') || q.includes('call') || q.includes('meeting') || q.includes('schedule') || q.includes('consultation') || q.includes('appointment')) {
            return `We'd love to discuss your project! Book a <strong>free 30-minute discovery call</strong> with our technical team via our <a href="/contact" style="color:#0049fd;font-weight:700;">Booking Portal</a>, or message us instantly on WhatsApp below.`;
        }

        // 6. Pricing / cost
        if (q.includes('cost') || q.includes('price') || q.includes('pricing') || q.includes('quote') || q.includes('rate') || q.includes('how much') || q.includes('budget') || q.includes('estimate')) {
            return `Every project is unique, so we offer <strong>transparent, milestone-based pricing</strong> for MVPs, enterprise builds, and dedicated sprint teams.<br><br>
                Share your scope on WhatsApp or book a discovery call — we'll deliver a precise timeline &amp; budget estimate within <strong>24 hours</strong>.`;
        }

        // 7. Tech stack
        if (q.includes('tech') || q.includes('stack') || q.includes('react') || q.includes('laravel') || q.includes('python') || q.includes('next') || q.includes('node') || q.includes('database')) {
            return `We build with modern, battle-tested technologies:<br>
                • <strong>Backend:</strong> Laravel (PHP 8.2+), Python (FastAPI), Node.js<br>
                • <strong>Frontend:</strong> React 19, Next.js 15, TypeScript, Tailwind v4<br>
                • <strong>Data:</strong> PostgreSQL, MySQL, Redis, Neon Serverless<br>
                • <strong>Cloud:</strong> AWS, Cloudflare, Docker, CI/CD<br><br>
                What technology are you planning? Let's discuss on WhatsApp!`;
        }

        // 8. Default fallback
        return `Thank you for reaching out! I'm the Compiling Logics AI — I can help with info about our services, case studies, pricing, or connecting you with our engineers.<br><br>
            To get a direct, personalised answer, click <strong>Chat on WhatsApp →</strong> below and one of our leads will respond.`;
    };

    // ── Form submit handler ───────────────────────────────────────
    chatForm?.addEventListener('submit', (e) => {
        e.preventDefault();
        const query = chatInput.value.trim();
        if (!query) return;

        // Hide chips after first message
        chatWidget.querySelector('[data-chat-chips]')?.remove();

        addUserMessage(query);
        chatInput.value = '';

        // Update all WhatsApp links with the query context
        const waUrl = buildWaUrl(query);
        if (footerWa) footerWa.href = waUrl;
        if (directWa) directWa.href = waUrl;

        showTyping();

        setTimeout(() => {
            removeTyping();
            addAgentMessage(generateResponse(query), query);
        }, 700);
    });

    // ── Chip clicks ───────────────────────────────────────────────
    document.addEventListener('click', (e) => {
        const chip = e.target.closest('[data-chip]');
        if (!chip) return;
        chatInput.value = chip.dataset.chip;
        chatForm.dispatchEvent(new Event('submit'));
    });
}
