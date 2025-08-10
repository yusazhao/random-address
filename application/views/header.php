<!-- Navigation Bar -->
<nav class="bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 sticky top-0 z-50 relative">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-20 md:h-22 lg:h-26">
      
      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="<?php echo base_url();?>" class="text-2xl md:text-3xl lg:text-custom-logo xl:text-4xl font-bold text-gray-900 hover:text-blue-600 transition-colors duration-200" title="RandomAddress - Free Random Data Generator for Testing and Development">
          RandomAddress
        </a>
      </div>
      
      <!-- Desktop Navigation -->
      <div class="hidden lg:flex lg:items-center lg:space-x-4">
        <a href="<?php echo base_url();?>random-address-generator/us" class="px-4 py-3 rounded-lg text-base lg:text-custom-menu font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
          US Address
        </a>
        <a href="<?php echo base_url();?>random-address-generator/ca" class="px-4 py-3 rounded-lg text-base lg:text-custom-menu font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
          CA Address
        </a>
        <a href="<?php echo base_url();?>random-address-generator/de" class="px-4 py-3 rounded-lg text-base lg:text-custom-menu font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
          DE Address
        </a>
        <a href="<?php echo base_url();?>random-address-generator/uk" class="px-4 py-3 rounded-lg text-base lg:text-custom-menu font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
          UK Address
        </a>
        <a href="<?php echo base_url();?>random-address-generator-countries" class="px-4 py-3 rounded-lg text-base lg:text-custom-menu font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
          All Countries
        </a>
      </div>
      
      <!-- Tablet Navigation -->
      <div class="hidden md:flex lg:hidden">
        <div class="relative">
          <button id="tablet-menu-button" class="flex items-center px-3 py-2 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
            <span>Menu</span>
            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div id="tablet-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden z-50">
            <div class="py-1">
              <a href="<?php echo base_url();?>random-address-generator/us" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">🇺🇸 US Address</a>
              <a href="<?php echo base_url();?>random-address-generator/ca" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">🇨🇦 CA Address</a>
              <a href="<?php echo base_url();?>random-address-generator/de" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">🇩🇪 DE Address</a>
              <a href="<?php echo base_url();?>random-address-generator/uk" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">🇬🇧 UK Address</a>
              <a href="<?php echo base_url();?>random-address-generator-countries" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">🌍 All Countries</a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Mobile Menu Button -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="flex items-center px-3 py-2 rounded-lg text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200 border border-gray-200 hover:border-blue-300" aria-label="Toggle menu">
          <svg id="menu-icon" class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <svg id="close-icon" class="h-5 w-5 mr-2 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
          <span class="text-sm font-medium">Menu</span>
        </button>
      </div>
    </div>
  </div>
  
  <!-- Mobile Menu -->
  <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-100 absolute top-full left-0 right-0 shadow-lg" style="z-index: 9999;">
    <div class="px-4 py-3 space-y-2">
      <a href="<?php echo base_url();?>random-address-generator/us" class="flex items-center px-3 py-3 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
        <span class="mr-3">🇺🇸</span>
        <span>US Address</span>
      </a>
      <a href="<?php echo base_url();?>random-address-generator/ca" class="flex items-center px-3 py-3 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
        <span class="mr-3">🇨🇦</span>
        <span>CA Address</span>
      </a>
      <a href="<?php echo base_url();?>random-address-generator/de" class="flex items-center px-3 py-3 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
        <span class="mr-3">🇩🇪</span>
        <span>DE Address</span>
      </a>
      <a href="<?php echo base_url();?>random-address-generator/uk" class="flex items-center px-3 py-3 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
        <span class="mr-3">🇬🇧</span>
        <span>UK Address</span>
      </a>
      <a href="<?php echo base_url();?>random-address-generator-countries" class="flex items-center px-3 py-3 rounded-lg text-sm font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 transition-all duration-200">
        <span class="mr-3">🌍</span>
        <span>All Countries</span>
      </a>
    </div>
  </div>
</nav>

<script>
// Navigation functionality
document.addEventListener('DOMContentLoaded', function() {
  // Mobile menu elements
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const menuIcon = document.getElementById('menu-icon');
  const closeIcon = document.getElementById('close-icon');
  
  // Tablet menu elements
  const tabletMenuButton = document.getElementById('tablet-menu-button');
  const tabletMenu = document.getElementById('tablet-menu');
  
  // Mobile menu toggle
  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', function(e) {
      e.stopPropagation();
      const isHidden = mobileMenu.classList.contains('hidden');
      
      if (isHidden) {
        mobileMenu.classList.remove('hidden');
        menuIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
      } else {
        mobileMenu.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
      }
    });
  }
  
  // Tablet menu toggle
  if (tabletMenuButton && tabletMenu) {
    tabletMenuButton.addEventListener('click', function(e) {
      e.stopPropagation();
      tabletMenu.classList.toggle('hidden');
    });
  }
  
  // Close menus when clicking outside
  document.addEventListener('click', function(event) {
    // Close mobile menu
    if (mobileMenu && !mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
      mobileMenu.classList.add('hidden');
      menuIcon.classList.remove('hidden');
      closeIcon.classList.add('hidden');
    }
    
    // Close tablet menu
    if (tabletMenu && !tabletMenu.contains(event.target) && !tabletMenuButton.contains(event.target)) {
      tabletMenu.classList.add('hidden');
    }
  });
  
  // Close mobile menu when window is resized to larger screen
  window.addEventListener('resize', function() {
    if (window.innerWidth >= 768 && mobileMenu) {
      mobileMenu.classList.add('hidden');
      menuIcon.classList.remove('hidden');
      closeIcon.classList.add('hidden');
    }
    
    if (window.innerWidth >= 1024 && tabletMenu) {
      tabletMenu.classList.add('hidden');
    }
  });
  
  // Handle menu item clicks on mobile
  const mobileMenuLinks = mobileMenu?.querySelectorAll('a');
  if (mobileMenuLinks) {
    mobileMenuLinks.forEach(link => {
      link.addEventListener('click', function() {
        mobileMenu.classList.add('hidden');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
      });
    });
  }
  
  // Handle menu item clicks on tablet
  const tabletMenuLinks = tabletMenu?.querySelectorAll('a');
  if (tabletMenuLinks) {
    tabletMenuLinks.forEach(link => {
      link.addEventListener('click', function() {
        tabletMenu.classList.add('hidden');
      });
    });
  }
});
</script>