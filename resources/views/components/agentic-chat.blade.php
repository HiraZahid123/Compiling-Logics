@php
    $rawWhatsapp = config('services.whatsapp.number', '+1234567890');
    $cleanWhatsapp = preg_replace('/[^0-9]/', '', $rawWhatsapp);
@endphp

{{-- AI Assistant & WhatsApp Chat Widget --}}
<aside
    id="agentic-chat-widget"
    data-agentic-chat
    data-whatsapp-number="{{ $cleanWhatsapp }}"
    aria-label="AI Assistant and WhatsApp Support"
    class="font-electrolize"
>
    {{-- Floating Launcher Button --}}
    <button
        type="button"
        data-chat-toggle
        aria-label="Open AI Chat Assistant"
        title="Chat with Compiling Logics AI"
        class="fixed bottom-5 right-5 z-[9998] size-14 rounded-full bg-eccentric-blue text-white shadow-2xl flex items-center justify-center cursor-pointer hover:scale-110 active:scale-95 transition-transform duration-200"
    >
        {{-- Chat icon --}}
        <svg class="size-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/>
        </svg>
        {{-- Online pulse dot --}}
        <span class="absolute top-0.5 right-0.5 flex size-3" aria-hidden="true">
            <span class="animate-ping absolute inline-flex size-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex size-3 rounded-full bg-emerald-500 border-2 border-white"></span>
        </span>
    </button>

    {{-- Chat Popup Window (display toggled via JS inline style) --}}
    <div
        data-chat-window
        role="dialog"
        aria-modal="false"
        aria-labelledby="agentic-chat-title"
        style="
            display: none;
            flex-direction: column;
            position: fixed;
            bottom: 5.5rem;
            right: 1rem;
            z-index: 9999;
            width: 390px;
            max-width: calc(100vw - 1.5rem);
            height: min(620px, calc(100svh - 8rem));
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 12px 48px rgba(0,0,0,0.22);
            transform-origin: bottom right;
            opacity: 0;
            transform: scale(0.95) translateY(10px);
            transition: opacity 0.2s ease, transform 0.2s ease;
        "
    >
        {{-- ── Header ── --}}
        <header style="
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            background: #0f172a;
            color: white;
            flex-shrink: 0;
        ">
            {{-- Avatar --}}
            <div style="position: relative; flex-shrink: 0;">
                <div style="
                    width: 2.5rem; height: 2.5rem;
                    border-radius: 9999px;
                    background: #0049fd;
                    display: flex; align-items: center; justify-content: center;
                    font-size: 0.7rem; font-weight: 700; color: white;
                ">CL</div>
                <span style="
                    position: absolute; bottom: 0; right: 0;
                    width: 0.6rem; height: 0.6rem;
                    background: #4ade80;
                    border-radius: 9999px;
                    border: 2px solid #0f172a;
                "></span>
            </div>

            {{-- Name & status --}}
            <div style="flex: 1; min-width: 0;">
                <h3 id="agentic-chat-title" style="font-size: 0.875rem; font-weight: 700; line-height: 1.25; color: white;">Compiling Logics AI</h3>
                <p style="font-size: 0.65rem; color: #4ade80; margin-top: 0.125rem; display: flex; align-items: center; gap: 0.25rem;">
                    <span style="width: 0.4rem; height: 0.4rem; background: #4ade80; border-radius: 9999px; display: inline-block;"></span>
                    Online — replies instantly
                </p>
            </div>

            {{-- WhatsApp direct link --}}
            <a
                href="https://wa.me/{{ $cleanWhatsapp }}"
                target="_blank"
                rel="noopener noreferrer"
                data-direct-whatsapp
                title="Open WhatsApp"
                style="
                    display: inline-flex; align-items: center; gap: 0.3rem;
                    padding: 0.35rem 0.75rem;
                    background: #25D366; color: white;
                    border-radius: 9999px;
                    font-size: 0.7rem; font-weight: 700;
                    text-decoration: none;
                    flex-shrink: 0;
                "
            >
                <svg style="width:0.875rem;height:0.875rem;fill:white;flex-shrink:0;" viewBox="0 0 24 24" aria-hidden="true"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                WhatsApp
            </a>

            {{-- Close button --}}
            <button
                type="button"
                data-chat-close
                aria-label="Close chat"
                style="
                    width: 2rem; height: 2rem; border-radius: 9999px;
                    background: transparent; border: none;
                    color: #94a3b8; cursor: pointer;
                    display: flex; align-items: center; justify-content: center;
                    flex-shrink: 0;
                    transition: color 0.15s, background 0.15s;
                "
                onmouseover="this.style.background='rgba(148,163,184,0.15)';this.style.color='white'"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8'"
            >
                <svg style="width:1.25rem;height:1.25rem;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </header>

        {{-- ── Messages Scroll Area ── --}}
        <div
            data-chat-messages
            style="
                flex: 1 1 0%;
                min-height: 0;
                overflow-y: auto;
                overflow-x: hidden;
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
                padding: 1rem;
                background: #ece5dd;
                scroll-behavior: smooth;
            "
        >
            {{-- Welcome bubble --}}
            <div style="display:flex; align-items:flex-end; gap:0.5rem;">
                <div style="
                    width:1.75rem;height:1.75rem;border-radius:9999px;
                    background:#0049fd;color:white;
                    display:flex;align-items:center;justify-content:center;
                    font-size:0.55rem;font-weight:700;flex-shrink:0;
                ">AI</div>
                <div style="max-width:82%;">
                    <div style="
                        background:white;color:#1e293b;
                        padding:0.625rem 0.875rem;
                        border-radius:1rem 1rem 1rem 0.2rem;
                        box-shadow:0 1px 3px rgba(0,0,0,0.1);
                        font-size:0.8125rem;line-height:1.55;
                    ">
                        <p style="font-weight:700;color:black;margin-bottom:0.25rem;">Hello! 👋</p>
                        <p>I'm the Compiling Logics AI. Ask me anything about our services, case studies, pricing — or I'll connect you with our team on <strong>WhatsApp</strong> right away.</p>
                    </div>
                    <p style="font-size:0.625rem;color:#64748b;margin-top:0.25rem;padding-left:0.25rem;">Just now</p>
                </div>
            </div>

            {{-- Quick-action chips --}}
            <div data-chat-chips style="display:flex;flex-wrap:wrap;gap:0.375rem;padding-left:2.25rem;">
                <button type="button" data-chip="What services do you offer?" class="chat-chip">🛠️ Services</button>
                <button type="button" data-chip="Show me your case studies" class="chat-chip">📂 Case studies</button>
                <button type="button" data-chip="Can I book a discovery call?" class="chat-chip">📅 Book a call</button>
                <button type="button" data-chip="How much does a project cost?" class="chat-chip">💰 Pricing</button>
                <button type="button" data-chip="I want to talk to an engineer on WhatsApp" class="chat-chip chat-chip-wa">💬 WhatsApp</button>
            </div>
        </div>

        {{-- ── Input Footer ── --}}
        <footer style="
            background: #f0f2f5;
            border-top: 1px solid #e2e8f0;
            padding: 0.625rem 0.75rem;
            flex-shrink: 0;
        ">
            <form data-chat-form style="display:flex;align-items:center;gap:0.5rem;">
                <input
                    type="text"
                    data-chat-input
                    placeholder="Type a message..."
                    maxlength="500"
                    required
                    style="
                        flex: 1; min-width: 0;
                        padding: 0.625rem 1rem;
                        font-size: 0.8125rem;
                        background: white;
                        border: 1px solid #e2e8f0;
                        border-radius: 9999px;
                        outline: none;
                        transition: border-color 0.15s;
                        font-family: inherit;
                    "
                    onfocus="this.style.borderColor='#0049fd'"
                    onblur="this.style.borderColor='#e2e8f0'"
                >
                <button
                    type="submit"
                    aria-label="Send message"
                    style="
                        width:2.5rem;height:2.5rem;border-radius:9999px;
                        background:#0049fd;color:white;border:none;
                        display:flex;align-items:center;justify-content:center;
                        cursor:pointer;flex-shrink:0;
                        transition:background 0.15s,transform 0.15s;
                    "
                    onmouseover="this.style.background='#0037cc'"
                    onmouseout="this.style.background='#0049fd'"
                >
                    <svg style="width:1rem;height:1rem;transform:rotate(90deg);" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19V5m0 0l-7 7m7-7l7 7"/>
                    </svg>
                </button>
            </form>
            <p style="text-align:center;font-size:0.6rem;color:#94a3b8;margin-top:0.375rem;">
                Need instant help?
                <a href="https://wa.me/{{ $cleanWhatsapp }}" target="_blank" rel="noopener noreferrer" data-footer-whatsapp style="color:#25D366;font-weight:600;text-decoration:none;">
                    Chat on WhatsApp ↗
                </a>
            </p>
        </footer>
    </div>

    {{-- Chip styles (scoped, tiny) --}}
    <style>
        .chat-chip {
            font-size: 0.7rem;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 9999px;
            padding: 0.3rem 0.7rem;
            color: #475569;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
            font-family: inherit;
            box-shadow: 0 1px 2px rgba(0,0,0,0.06);
        }
        .chat-chip:hover {
            background: #0049fd;
            color: white;
            border-color: #0049fd;
        }
        .chat-chip-wa {
            background: #f0fdf4;
            color: #166534;
            border-color: #bbf7d0;
        }
        .chat-chip-wa:hover {
            background: #25D366;
            border-color: #25D366;
            color: white;
        }
    </style>
</aside>
