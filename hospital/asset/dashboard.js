// Dashboard JavaScript - Responsive and Interactive Features

document.addEventListener('DOMContentLoaded', function() {
    // Initialize dashboard functionality
    initDashboard();
});

function initDashboard() {
    // Mobile menu toggle
    initMobileMenu();
    
    // Sidebar collapse functionality
    initSidebarCollapse();
    
    // Add smooth animations
    initAnimations();
    
    // Initialize tooltips and interactions
    initInteractions();
    
    // Handle window resize
    handleResize();
}

// Mobile Menu Toggle
function initMobileMenu() {
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = createOverlay();
    
    if (menuToggle && sidebar) {
        menuToggle.addEventListener('click', function() {
            toggleMobileMenu(sidebar, overlay);
        });
        
        // Close menu when clicking overlay
        overlay.addEventListener('click', function() {
            closeMobileMenu(sidebar, overlay);
        });
        
        // Close menu when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMobileMenu(sidebar, overlay);
            }
        });
    }
}

function createOverlay() {
    const overlay = document.createElement('div');
    overlay.className = 'mobile-overlay';
    overlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 998;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    `;
    document.body.appendChild(overlay);
    return overlay;
}

function toggleMobileMenu(sidebar, overlay) {
    const isOpen = sidebar.classList.contains('active');
    
    if (isOpen) {
        closeMobileMenu(sidebar, overlay);
    } else {
        openMobileMenu(sidebar, overlay);
    }
}

function openMobileMenu(sidebar, overlay) {
    sidebar.classList.add('active');
    overlay.style.opacity = '1';
    overlay.style.visibility = 'visible';
    document.body.style.overflow = 'hidden';
}

function closeMobileMenu(sidebar, overlay) {
    sidebar.classList.remove('active');
    overlay.style.opacity = '0';
    overlay.style.visibility = 'hidden';
    document.body.style.overflow = '';
}

// Sidebar Collapse Functionality
function initSidebarCollapse() {
    const sidebar = document.getElementById('sidebar');
    const main = document.querySelector('.dashboard-main');
    
    // Add collapse button to sidebar
    if (sidebar) {
        const collapseBtn = createCollapseButton();
        sidebar.querySelector('.sidebar-nav').prepend(collapseBtn);
        
        collapseBtn.addEventListener('click', function() {
            toggleSidebarCollapse(sidebar, main);
        });
    }
}

function createCollapseButton() {
    const collapseBtn = document.createElement('div');
    collapseBtn.className = 'sidebar-collapse-btn';
    collapseBtn.innerHTML = `
        <button class="collapse-toggle" title="Collapse Sidebar">
            <i class="fas fa-chevron-left"></i>
        </button>
    `;
    
    collapseBtn.style.cssText = `
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 1rem;
    `;
    
    const toggleBtn = collapseBtn.querySelector('.collapse-toggle');
    toggleBtn.style.cssText = `
        width: 100%;
        padding: 0.5rem;
        border: none;
        background: var(--bg-tertiary);
        color: var(--text-secondary);
        border-radius: var(--border-radius-sm);
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    `;
    
    toggleBtn.addEventListener('mouseenter', function() {
        this.style.background = 'var(--primary-color)';
        this.style.color = 'white';
    });
    
    toggleBtn.addEventListener('mouseleave', function() {
        this.style.background = 'var(--bg-tertiary)';
        this.style.color = 'var(--text-secondary)';
    });
    
    return collapseBtn;
}

function toggleSidebarCollapse(sidebar, main) {
    const isCollapsed = sidebar.classList.contains('collapsed');
    const toggleIcon = sidebar.querySelector('.collapse-toggle i');
    
    if (isCollapsed) {
        // Expand sidebar
        sidebar.classList.remove('collapsed');
        toggleIcon.className = 'fas fa-chevron-left';
        localStorage.setItem('sidebarCollapsed', 'false');
    } else {
        // Collapse sidebar
        sidebar.classList.add('collapsed');
        toggleIcon.className = 'fas fa-chevron-right';
        localStorage.setItem('sidebarCollapsed', 'true');
    }
}

// Initialize Animations
function initAnimations() {
    // Add fade-in animation to stat cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
    
    // Add hover effects to activity items
    const activityItems = document.querySelectorAll('.activity-item');
    activityItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
}

// Initialize Interactions
function initInteractions() {
    // Add click effects to stat cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        card.addEventListener('click', function() {
            // Add ripple effect
            addRippleEffect(this, event);
        });
    });
    
    // Add loading states to navigation links
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (this.getAttribute('href') && this.getAttribute('href') !== '#') {
                this.classList.add('loading');
                this.style.pointerEvents = 'none';
            }
        });
    });
}

// Ripple Effect
function addRippleEffect(element, event) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        background: rgba(45, 212, 191, 0.3);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    `;
    
    element.style.position = 'relative';
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Add ripple animation to CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// Handle Window Resize
function handleResize() {
    let resizeTimer;
    
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            const width = window.innerWidth;
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.mobile-overlay');
            
            // Auto-close mobile menu on larger screens
            if (width >= 1024 && sidebar && overlay) {
                closeMobileMenu(sidebar, overlay);
            }
            
            // Restore sidebar state on larger screens
            if (width >= 1024 && sidebar) {
                sidebar.style.transform = 'translateX(0)';
            }
        }, 250);
    });
}

// Load saved sidebar state
function loadSidebarState() {
    const sidebar = document.getElementById('sidebar');
    const main = document.querySelector('.dashboard-main');
    
    if (sidebar && main) {
        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed) {
            sidebar.classList.add('collapsed');
            const toggleIcon = sidebar.querySelector('.collapse-toggle i');
            if (toggleIcon) {
                toggleIcon.className = 'fas fa-chevron-right';
            }
        }
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    loadSidebarState();
});

// Add smooth scrolling for anchor links
document.addEventListener('click', function(e) {
    if (e.target.tagName === 'A' && e.target.getAttribute('href').startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(e.target.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
});

// Add keyboard navigation support
document.addEventListener('keydown', function(e) {
    // Tab navigation for sidebar
    if (e.key === 'Tab' && document.activeElement.classList.contains('nav-link')) {
        const navLinks = document.querySelectorAll('.nav-link');
        const currentIndex = Array.from(navLinks).indexOf(document.activeElement);
        
        if (e.shiftKey && currentIndex === 0) {
            e.preventDefault();
            navLinks[navLinks.length - 1].focus();
        } else if (!e.shiftKey && currentIndex === navLinks.length - 1) {
            e.preventDefault();
            navLinks[0].focus();
        }
    }
});

// Performance optimization: Debounce scroll events
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Add scroll-based animations
const scrollHandler = debounce(function() {
    const elements = document.querySelectorAll('.stat-card, .activity-item');
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add('fade-in');
        }
    });
}, 10);

window.addEventListener('scroll', scrollHandler);

// Export functions for potential external use
window.Dashboard = {
    init: initDashboard,
    toggleMobileMenu: toggleMobileMenu,
    toggleSidebarCollapse: toggleSidebarCollapse
};
