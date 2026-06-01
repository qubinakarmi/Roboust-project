@props([
    'type' => null, // optional
])

@php
    // Determine which session message exists
    if (session('success-cart')) {
        $messageKey = 'success-cart';
    } elseif (session('success')) {
        $messageKey = 'success';
    } else {
        $messageKey = null;
    }
@endphp

@if ($messageKey)
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;">
        <div class="toast align-items-center text-white bg-success border-0 shadow-lg rounded-3" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session($messageKey) }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                toastEl.classList.add('show');

                setTimeout(() => {
                    toastEl.style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
                    toastEl.style.opacity = '0';
                    toastEl.style.transform = 'translateX(100%)';
                    setTimeout(() => toastEl.remove(), 300);
                }, 5000);

                const closeBtn = toastEl.querySelector('.btn-close');
                if (closeBtn) {
                    closeBtn.addEventListener('click', () => {
                        toastEl.style.transition = 'opacity 0.3s ease-out, transform 0.3s ease-out';
                        toastEl.style.opacity = '0';
                        toastEl.style.transform = 'translateX(100%)';
                        setTimeout(() => toastEl.remove(), 300);
                    });
                }
            }
        });
    </script>

    <style>
        .toast {
            min-width: 250px;
            max-width: 350px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
@endif
