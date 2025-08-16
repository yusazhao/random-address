// Custom JavaScript for Random Address Generator - Tailwind CSS Enhanced

// Enhanced Copy to Clipboard Function
function copyToClipboard(text) {
  try {
    // Use modern clipboard API if available
    if (navigator.clipboard && window.isSecureContext) {
      navigator.clipboard.writeText(text).then(() => {
        showCopySuccess(text);
      }).catch(() => {
        // Fallback to execCommand
        fallbackCopyToClipboard(text);
      });
    } else {
      // Fallback for older browsers
      fallbackCopyToClipboard(text);
    }
  } catch (err) {
    console.error('Copy failed:', err);
    showToast('Copy failed. Please try again.', 'error');
  }
}

// Fallback copy method
function fallbackCopyToClipboard(text) {
  const textArea = document.createElement('textarea');
  textArea.value = text;
  textArea.style.position = 'fixed';
  textArea.style.left = '-9999px';
  textArea.style.top = '-9999px';
  
  document.body.appendChild(textArea);
  textArea.select();
  textArea.setSelectionRange(0, 99999);
  
  const success = document.execCommand('copy');
  document.body.removeChild(textArea);
  
  if (success) {
    showCopySuccess(text);
  } else {
    showToast('Copy failed. Please try again.', 'error');
  }
}

// Enhanced visual feedback for copy success
function showCopySuccess(text) {
  // Find the button that was clicked
  const buttons = document.querySelectorAll('.copy-btn');
  let targetButton = null;
  
  for (const button of buttons) {
    const onclickAttr = button.getAttribute('onclick');
    if (onclickAttr && onclickAttr.includes(text.replace(/'/g, "\\'"))) {
      targetButton = button;
      break;
    }
  }
  
  if (targetButton && !targetButton.getAttribute('data-copying')) {
    // Mark as copying
    targetButton.setAttribute('data-copying', 'true');
    
    // Store original content
    const originalHTML = targetButton.innerHTML;
    const originalClasses = targetButton.className;
    
    // Show success state
    targetButton.innerHTML = `
      <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
      </svg>
    `;
    targetButton.className = originalClasses.replace(/bg-\w+-100/g, 'bg-green-100').replace(/hover:bg-\w+-200/g, 'hover:bg-green-200');
    
    // Add success animation
    targetButton.classList.add('animate-bounce-soft');
    
    // Show toast notification
    showToast('Copied to clipboard!', 'success');
    
    // Restore after 1.5 seconds
    setTimeout(() => {
      if (targetButton) {
        targetButton.innerHTML = originalHTML;
        targetButton.className = originalClasses;
        targetButton.removeAttribute('data-copying');
        targetButton.classList.remove('animate-bounce-soft');
      }
    }, 1500);
  }
}

// Enhanced Toast Notification System
function showToast(message, type = 'info', duration = 3000) {
  const toast = document.createElement('div');
  
  // Base classes
  const baseClasses = 'fixed top-4 right-4 z-50 p-4 rounded-lg shadow-large transform transition-all duration-300 max-w-sm';
  
  // Type-specific classes
  const typeClasses = {
    info: 'bg-primary-500 text-white',
    success: 'bg-success-500 text-white',
    warning: 'bg-warning-500 text-white',
    error: 'bg-danger-500 text-white'
  };
  
  toast.className = `${baseClasses} ${typeClasses[type] || typeClasses.info}`;
  toast.style.transform = 'translateX(100%)';
  
  // Add icon based on type
  const icons = {
    info: '<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
    success: '<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>',
    warning: '<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>',
    error: '<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
  };
  
  toast.innerHTML = `
    <div class="flex items-center">
      ${icons[type] || icons.info}
      <span class="font-medium">${message}</span>
    </div>
  `;
  
  document.body.appendChild(toast);
  
  // Animate in
  requestAnimationFrame(() => {
    toast.style.transform = 'translateX(0)';
  });
  
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

// Enhanced Mobile Menu Toggle
function toggleMenu() {
  const menu = document.getElementById('mobile-menu');
  if (menu) {
    const isHidden = menu.classList.contains('hidden');
    
    if (isHidden) {
      // Show menu with animation
      menu.classList.remove('hidden');
      menu.classList.add('animate-slide-up');
    } else {
      // Hide menu with animation
      menu.classList.add('animate-slide-up');
      setTimeout(() => {
        menu.classList.add('hidden');
        menu.classList.remove('animate-slide-up');
      }, 300);
    }
  }
}

// Enhanced Page Initialization
document.addEventListener('DOMContentLoaded', function() {
  // Initialize all components
  initResponsiveNav();
  initSmoothScrolling();
  initLazyLoading();
  initSearch();
  initThemeToggle();
  initPerformanceMonitoring();
  initErrorHandling();
  initAnimations();
  
  // Add copy button functionality
  const copyButtons = document.querySelectorAll('[onclick*="copyToClipboard"]');
  copyButtons.forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      const text = this.getAttribute('data-text') || 
                   this.previousElementSibling?.textContent || 
                   this.closest('.address-field')?.querySelector('.address-field-value')?.textContent || '';
      if (text) {
        copyToClipboard(text.trim());
      }
    });
  });
  
  // Close mobile menu when clicking outside
  document.addEventListener('click', function(e) {
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuBtn = document.querySelector('[onclick="toggleMenu()"]');
    
    if (mobileMenu && !mobileMenu.contains(e.target) && !mobileMenuBtn?.contains(e.target)) {
      mobileMenu.classList.add('hidden');
    }
  });
});

// Enhanced Responsive Navigation
function initResponsiveNav() {
  const mobileMenuLinks = document.querySelectorAll('#mobile-menu a');
  mobileMenuLinks.forEach(link => {
    link.addEventListener('click', function() {
      const menu = document.getElementById('mobile-menu');
      if (menu) {
        menu.classList.add('hidden');
      }
    });
  });
}

// Enhanced Smooth Scrolling
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

// Enhanced Lazy Loading
function initLazyLoading() {
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.classList.remove('lazy');
            img.classList.add('animate-fade-in');
            imageObserver.unobserve(img);
          }
        }
      });
    });
    
    const lazyImages = document.querySelectorAll('img[data-src]');
    lazyImages.forEach(img => imageObserver.observe(img));
  }
}

// Enhanced Animations
function initAnimations() {
  // Add intersection observer for scroll animations
  if ('IntersectionObserver' in window) {
    const animationObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-fade-in');
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });
    
    // Observe elements that should animate on scroll
    const animatedElements = document.querySelectorAll('.card, .country-card, .faq-item');
    animatedElements.forEach(el => animationObserver.observe(el));
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

// Enhanced Search Functionality
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
        searchResults.classList.add('hidden');
      }
    });
  }
}

function performSearch(query, resultsContainer) {
  // Placeholder for search implementation
  resultsContainer.innerHTML = `
    <div class="p-4 bg-white rounded-lg shadow-soft border border-gray-200">
      <p class="text-gray-800">Searching for: "${query}"</p>
      <p class="text-sm text-gray-500 mt-1">Implement your search logic here</p>
    </div>
  `;
  resultsContainer.classList.remove('hidden');
}

// Enhanced Theme Toggle
function initThemeToggle() {
  const themeToggle = document.querySelector('.theme-toggle');
  if (themeToggle) {
    themeToggle.addEventListener('click', function() {
      const currentTheme = document.documentElement.getAttribute('data-theme');
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      
      document.documentElement.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      
      // Update toggle button with animation
      this.classList.add('animate-bounce-soft');
      this.innerHTML = newTheme === 'dark' ? '☀️' : '🌙';
      
      setTimeout(() => {
        this.classList.remove('animate-bounce-soft');
      }, 600);
    });
    
    // Set initial theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
    themeToggle.innerHTML = savedTheme === 'dark' ? '☀️' : '🌙';
  }
}

// Enhanced Performance Monitoring
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

// Enhanced Error Handling
function initErrorHandling() {
  window.addEventListener('error', function(e) {
    console.error('JavaScript Error:', e.error);
  });
  
  window.addEventListener('unhandledrejection', function(e) {
    console.error('Unhandled Promise Rejection:', e.reason);
  });
}

// Export functions for global use
window.copyToClipboard = copyToClipboard;
window.showToast = showToast;
window.toggleMenu = toggleMenu; 