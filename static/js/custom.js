// Custom JavaScript for Random Address Generator - No External Dependencies

// Copy to Clipboard Function
function copyToClipboard(text) {
  // Create temporary textarea
  const textArea = document.createElement('textarea');
  textArea.value = text;
  document.body.appendChild(textArea);
  textArea.select();
  
  try {
    // Execute copy command
    document.execCommand('copy');
    
    // Show success feedback
    const button = event.target.closest('button');
    const originalHTML = button.innerHTML;
    const originalClasses = button.className;
    
    // Show copy success icon
    button.innerHTML = `
      <svg class="copy-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
      </svg>
    `;
    button.classList.remove('copy-btn');
    button.classList.add('copy-btn-small', 'copied');
    
    // Restore after 1.5 seconds
    setTimeout(() => {
      button.innerHTML = originalHTML;
      button.className = originalClasses;
    }, 1500);
    
  } catch (err) {
    console.error('Copy failed:', err);
  }
  
  // Clean up
  document.body.removeChild(textArea);
}

// Flag Emoji Support Detection
function supportsFlagEmoji() {
  const canvas = document.createElement('canvas');
  const ctx = canvas.getContext('2d');
  ctx.font = '32px Arial';
  ctx.fillText('🇺🇸', 0, 30);
  const pixels = ctx.getImageData(16, 16, 1, 1).data;
  // In colored flags, this pixel is usually not pure black or white
  return !(pixels[0] === pixels[1] && pixels[1] === pixels[2]);
}

// Initialize page functionality
document.addEventListener('DOMContentLoaded', function() {
  // Check flag emoji support and apply fallback if needed
  if (!supportsFlagEmoji()) {
    const flagElements = document.querySelectorAll('.flag-emoji, .flag-emoji-small');
    flagElements.forEach(element => {
      element.classList.add('fallback');
    });
  }
  
  // Add copy button functionality to all copy buttons
  const copyButtons = document.querySelectorAll('[onclick*="copyToClipboard"]');
  copyButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      const text = this.getAttribute('data-text') || this.previousElementSibling?.textContent || '';
      if (text) {
        copyToClipboard(text);
      }
    });
  });
  
  // Initialize responsive navigation
  initResponsiveNav();
  
  // Initialize smooth scrolling for anchor links
  initSmoothScrolling();
  
  // Initialize lazy loading for images
  initLazyLoading();
});

// Responsive Navigation
function initResponsiveNav() {
  const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
  const mobileMenu = document.querySelector('.mobile-menu');
  
  if (mobileMenuToggle && mobileMenu) {
    mobileMenuToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
      this.setAttribute('aria-expanded', 
        this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'
      );
    });
  }
}

// Smooth Scrolling
function initSmoothScrolling() {
  const anchorLinks = document.querySelectorAll('a[href^="#"]');
  anchorLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = this.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);
      
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
}

// Lazy Loading for Images
function initLazyLoading() {
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove('lazy');
          imageObserver.unobserve(img);
        }
      });
    });
    
    const lazyImages = document.querySelectorAll('img[data-src]');
    lazyImages.forEach(img => imageObserver.observe(img));
  }
}

// Utility Functions
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

function throttle(func, limit) {
  let inThrottle;
  return function() {
    const args = arguments;
    const context = this;
    if (!inThrottle) {
      func.apply(context, args);
      inThrottle = true;
      setTimeout(() => inThrottle = false, limit);
    }
  };
}

// Form Validation
function validateForm(form) {
  const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
  let isValid = true;
  
  inputs.forEach(input => {
    if (!input.value.trim()) {
      input.classList.add('error');
      isValid = false;
    } else {
      input.classList.remove('error');
    }
  });
  
  return isValid;
}

// Toast Notification System
function showToast(message, type = 'info', duration = 3000) {
  const toast = document.createElement('div');
  toast.className = `toast toast-${type}`;
  toast.textContent = message;
  
  // Add toast styles
  Object.assign(toast.style, {
    position: 'fixed',
    top: '20px',
    right: '20px',
    padding: '12px 20px',
    borderRadius: '6px',
    color: 'white',
    fontWeight: '500',
    zIndex: '9999',
    transform: 'translateX(100%)',
    transition: 'transform 0.3s ease',
    maxWidth: '300px',
    wordWrap: 'break-word'
  });
  
  // Set background color based on type
  const colors = {
    info: '#2563eb',
    success: '#059669',
    warning: '#d97706',
    error: '#dc2626'
  };
  toast.style.backgroundColor = colors[type] || colors.info;
  
  document.body.appendChild(toast);
  
  // Animate in
  setTimeout(() => {
    toast.style.transform = 'translateX(0)';
  }, 100);
  
  // Auto remove
  setTimeout(() => {
    toast.style.transform = 'translateX(100%)';
    setTimeout(() => {
      if (toast.parentNode) {
        toast.parentNode.removeChild(toast);
      }
    }, 300);
  }, duration);
}

// Search Functionality
function initSearch() {
  const searchInput = document.querySelector('.search-input');
  const searchResults = document.querySelector('.search-results');
  
  if (searchInput && searchResults) {
    const debouncedSearch = debounce(function(query) {
      performSearch(query, searchResults);
    }, 300);
    
    searchInput.addEventListener('input', function() {
      const query = this.value.trim();
      if (query.length > 2) {
        debouncedSearch(query);
      } else {
        searchResults.innerHTML = '';
        searchResults.style.display = 'none';
      }
    });
  }
}

function performSearch(query, resultsContainer) {
  // This would typically make an AJAX request to your backend
  // For now, we'll show a placeholder
  resultsContainer.innerHTML = `
    <div class="search-result-item">
      <p>Searching for: "${query}"</p>
      <p class="text-sm text-gray-500">Implement your search logic here</p>
    </div>
  `;
  resultsContainer.style.display = 'block';
}

// Theme Toggle (if needed)
function initThemeToggle() {
  const themeToggle = document.querySelector('.theme-toggle');
  if (themeToggle) {
    themeToggle.addEventListener('click', function() {
      const currentTheme = document.documentElement.getAttribute('data-theme');
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      
      document.documentElement.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      
      // Update toggle button
      this.innerHTML = newTheme === 'dark' ? '☀️' : '🌙';
    });
    
    // Set initial theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
    themeToggle.innerHTML = savedTheme === 'dark' ? '☀️' : '🌙';
  }
}

// Performance Monitoring
function initPerformanceMonitoring() {
  if ('performance' in window) {
    window.addEventListener('load', function() {
      setTimeout(function() {
        const perfData = performance.getEntriesByType('navigation')[0];
        if (perfData) {
          console.log('Page Load Time:', perfData.loadEventEnd - perfData.loadEventStart, 'ms');
          console.log('DOM Content Loaded:', perfData.domContentLoadedEventEnd - perfData.domContentLoadedEventStart, 'ms');
        }
      }, 0);
    });
  }
}

// Error Handling
function initErrorHandling() {
  window.addEventListener('error', function(e) {
    console.error('JavaScript Error:', e.error);
    showToast('An error occurred. Please refresh the page.', 'error');
  });
  
  window.addEventListener('unhandledrejection', function(e) {
    console.error('Unhandled Promise Rejection:', e.reason);
    showToast('An error occurred. Please refresh the page.', 'error');
  });
}

// Initialize all functionality when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
  initResponsiveNav();
  initSmoothScrolling();
  initLazyLoading();
  initSearch();
  initThemeToggle();
  initPerformanceMonitoring();
  initErrorHandling();
});

// Export functions for global use
window.copyToClipboard = copyToClipboard;
window.showToast = showToast;
window.validateForm = validateForm; 