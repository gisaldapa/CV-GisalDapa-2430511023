import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// ===================================
// PAGE LOADER
// ===================================
window.addEventListener('load', () => {
    const loader = document.getElementById('rpg-loader');
    if (loader) {
        setTimeout(() => {
            loader.classList.add('hidden');
            setTimeout(() => loader.remove(), 500);
        }, 500);
    }
});

// ===================================
// BACK TO TOP
// ===================================
const backToTop = document.getElementById('back-to-top');
if (backToTop) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTop.classList.add('visible');
        } else {
            backToTop.classList.remove('visible');
        }
    });

    backToTop.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// ===================================
// TOAST NOTIFICATIONS
// ===================================
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container') || createToastContainer();
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    const icon = type === 'success' ? '⚔️' : '💀';
    toast.innerHTML = `<span>${icon}</span><span>${message}</span>`;
    container.appendChild(toast);

    setTimeout(() => {
        toast.style.animation = 'slideIn 0.3s ease reverse';
        setTimeout(() => toast.remove(), 300);
    }, 4000);
}

function createToastContainer() {
    const container = document.createElement('div');
    container.id = 'toast-container';
    container.className = 'toast-container';
    document.body.appendChild(container);
    return container;
}

window.showToast = showToast;

// ===================================
// SKILL BAR ANIMATION
// ===================================
function animateSkillBars() {
    const bars = document.querySelectorAll('.skill-bar-fill[data-width]');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bar = entry.target;
                const width = bar.getAttribute('data-width');
                bar.style.width = width + '%';
                observer.unobserve(bar);
            }
        });
    }, { threshold: 0.3 });

    bars.forEach(bar => {
        bar.style.width = '0%';
        observer.observe(bar);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    animateSkillBars();

    // ===================================
    // LIGHTBOX
    // ===================================
    const lightboxOverlay = document.getElementById('lightbox-overlay');
    if (lightboxOverlay) {
        document.querySelectorAll('[data-lightbox]').forEach(img => {
            img.addEventListener('click', () => {
                const src = img.getAttribute('data-lightbox') || img.src;
                const lightboxImg = document.getElementById('lightbox-img');
                if (lightboxImg) lightboxImg.src = src;
                lightboxOverlay.classList.add('active');
            });
        });

        lightboxOverlay.addEventListener('click', (e) => {
            if (e.target === lightboxOverlay) {
                lightboxOverlay.classList.remove('active');
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                lightboxOverlay.classList.remove('active');
            }
        });
    }

    // ===================================
    // DELETE CONFIRMATION MODAL
    // ===================================
    document.querySelectorAll('[data-confirm-delete]').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const message = btn.getAttribute('data-confirm-delete') || 'Are you sure you want to delete this record?';
            const form = btn.closest('form') || document.querySelector(btn.getAttribute('data-form'));
            if (confirm(message)) {
                if (form) form.submit();
            }
        });
    });

    // ===================================
    // IMAGE PREVIEW
    // ===================================
    document.querySelectorAll('input[type="file"][data-preview]').forEach(input => {
        input.addEventListener('change', function () {
            const previewId = this.getAttribute('data-preview');
            const preview = document.getElementById(previewId);
            if (preview && this.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    // ===================================
    // TABLE SEARCH
    // ===================================
    const searchInput = document.getElementById('table-search');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr[data-searchable]');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    }

    // ===================================
    // MOBILE NAV TOGGLE
    // ===================================
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
