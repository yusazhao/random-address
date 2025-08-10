// Simple Copy Function with reliable visual feedback
function copyToClipboard(text) {
  try {
    // Create temporary textarea element
    var textArea = document.createElement('textarea');
    textArea.value = text;
    
    // Make it invisible but keep it functional
    textArea.style.position = 'fixed';
    textArea.style.left = '-9999px';
    textArea.style.top = '-9999px';
    
    // Add to page, select and copy
    document.body.appendChild(textArea);
    textArea.select();
    textArea.setSelectionRange(0, 99999); // For mobile devices
    
    // Execute copy command
    var success = document.execCommand('copy');
    
    // Clean up
    document.body.removeChild(textArea);
    
    if (success) {
      // Find the button that was clicked (simple approach)
      var buttons = document.getElementsByClassName('copy-btn');
      for (var i = 0; i < buttons.length; i++) {
        var button = buttons[i];
        if (button.onclick && button.onclick.toString().indexOf(text) > -1) {
          showCopySuccess(button);
          break;
        }
      }
      console.log('Copied: ' + text);
    }
    
  } catch (err) {
    console.error('Copy failed: ' + err);
  }
}

// Simple visual feedback for copy success
function showCopySuccess(button) {
  if (!button || button.getAttribute('data-copying')) return;
  
  // Mark as copying
  button.setAttribute('data-copying', 'true');
  
  // Store original content
  var originalHTML = button.innerHTML;
  var originalClass = button.className;
  
  // Show success icon
  button.innerHTML = '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
  button.className = originalClass + ' copied';
  
  // Restore after 1.5 seconds
  setTimeout(function() {
    if (button) {
      button.innerHTML = originalHTML;
      button.className = originalClass;
      button.removeAttribute('data-copying');
    }
  }, 1500);
}

// Mobile menu toggle function
function toggleMobileMenu() {
  var menu = document.getElementById('mobile-menu');
  if (menu) {
    if (menu.classList.contains('hidden')) {
      menu.classList.remove('hidden');
    } else {
      menu.classList.add('hidden');
    }
  }
}
