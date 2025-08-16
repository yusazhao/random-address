<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RandomAddress</title>
    <link rel="stylesheet" href="<?php echo base_url();?>static/css/tailwind.css">
</head>
<body class="bg-gradient-hero min-h-screen">

<nav class="bg-white/80 backdrop-blur-md border-b border-gray-200 sticky top-0 z-50 shadow-soft">
  <div class="container-main">
    <div class="flex justify-between items-center h-16">
      
      <!-- Logo -->
      <div>
        <a href="<?php echo base_url();?>" class="text-2xl lg:text-3xl font-bold text-primary-600 hover:text-primary-700 transition-colors duration-200">
          RandomAddress
        </a>
      </div>
      
      <!-- Desktop Navigation -->
      <div class="hidden lg:flex items-center space-x-2">
        <a href="<?php echo base_url();?>random-address-generator/us" 
           class="nav-link bg-success-50 text-success-700 border border-success-200 hover:bg-success-100">
          <img src="<?php echo base_url();?>static/img/flags/us_200_150.svg" alt="USA flag" 
               class="w-4 h-3 mr-2 object-cover rounded shadow-sm"
               onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
          USA Address
        </a>
        <a href="<?php echo base_url();?>random-address-generator/ca" 
           class="nav-link bg-primary-50 text-primary-700 border border-primary-200 hover:bg-primary-100">
          <img src="<?php echo base_url();?>static/img/flags/ca_200_150.svg" alt="Canada flag" 
               class="w-4 h-3 mr-2 object-cover rounded shadow-sm"
               onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
          Canada Address
        </a>
        <a href="<?php echo base_url();?>random-address-generator/de" 
           class="nav-link bg-warning-50 text-warning-700 border border-warning-200 hover:bg-warning-100">
          <img src="<?php echo base_url();?>static/img/flags/de_200_150.svg" alt="Germany flag" 
               class="w-4 h-3 mr-2 object-cover rounded shadow-sm"
               onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
          Germany Address
        </a>
        <a href="<?php echo base_url();?>random-address-generator/uk" 
           class="nav-link bg-danger-50 text-danger-700 border border-danger-200 hover:bg-danger-100">
          <img src="<?php echo base_url();?>static/img/flags/gb_200_150.svg" alt="UK flag" 
               class="w-4 h-3 mr-2 object-cover rounded shadow-sm"
               onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
          UK Address
        </a>
        <a href="<?php echo base_url();?>random-address-generator-countries" 
           class="nav-link bg-secondary-50 text-secondary-700 border border-secondary-200 hover:bg-secondary-100">
          <svg class="w-4 h-4 mr-2 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          All Countries
        </a>
      </div>
      
      <!-- Mobile Menu Button -->
      <button type="button" onclick="toggleMenu()" 
              class="lg:hidden flex items-center px-3 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <span class="text-sm font-medium">Menu</span>
      </button>
    </div>
  </div>
  
  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden lg:hidden bg-white/95 backdrop-blur-lg border-t border-gray-200 shadow-large">
    <div class="p-4 space-y-3">
      <a href="<?php echo base_url();?>random-address-generator/us" 
         class="mobile-nav-link bg-success-50 border-success-200 text-success-700">
        <img src="<?php echo base_url();?>static/img/flags/us_200_150.svg" alt="USA flag" 
             class="w-6 h-4 object-cover rounded shadow-sm"
             onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
        <span>USA Random Address</span>
        <svg class="w-4 h-4 text-success-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
      <a href="<?php echo base_url();?>random-address-generator/ca" 
         class="mobile-nav-link bg-primary-50 border-primary-200 text-primary-700">
        <img src="<?php echo base_url();?>static/img/flags/ca_200_150.svg" alt="Canada flag" 
             class="w-6 h-4 object-cover rounded shadow-sm"
             onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
        <span>Canada Random Address</span>
        <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
      <a href="<?php echo base_url();?>random-address-generator/de" 
         class="mobile-nav-link bg-warning-50 border-warning-200 text-warning-700">
        <img src="<?php echo base_url();?>static/img/flags/de_200_150.svg" alt="Germany flag" 
             class="w-6 h-4 object-cover rounded shadow-sm"
             onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
        <span>Germany Random Address</span>
        <svg class="w-4 h-4 text-warning-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
      <a href="<?php echo base_url();?>random-address-generator/uk" 
         class="mobile-nav-link bg-danger-50 border-danger-200 text-danger-700">
        <img src="<?php echo base_url();?>static/img/flags/gb_200_150.svg" alt="UK flag" 
             class="w-6 h-4 object-cover rounded shadow-sm"
             onerror="this.src='<?php echo base_url();?>static/img/flags/Unknown_200_150.svg'">
        <span>UK Random Address</span>
        <svg class="w-4 h-4 text-danger-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
      <a href="<?php echo base_url();?>random-address-generator-countries" 
         class="mobile-nav-link bg-secondary-50 border-secondary-200 text-secondary-700">
        <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>All Countries</span>
        <svg class="w-4 h-4 text-secondary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </a>
    </div>
  </div>
</nav>

<style>
.mobile-nav-link {
  @apply flex items-center p-4 rounded-xl border transition-all duration-300 hover:shadow-medium transform hover:-translate-y-1 no-underline;
}

.mobile-nav-link img,
.mobile-nav-link svg {
  @apply flex-shrink-0;
}

.mobile-nav-link span {
  @apply font-semibold text-base flex-1 ml-3;
}

.mobile-nav-link svg:last-child {
  @apply ml-auto;
}
</style>

<script>
function toggleMenu() {
  const menu = document.getElementById('mobile-menu');
  if (menu) {
    menu.classList.toggle('hidden');
  }
}

// Close mobile menu when clicking on links
document.addEventListener('DOMContentLoaded', function() {
  const menuLinks = document.querySelectorAll('#mobile-menu a');
  menuLinks.forEach(function(link) {
    link.addEventListener('click', function() {
      const menu = document.getElementById('mobile-menu');
      if (menu) {
        menu.classList.add('hidden');
      }
    });
  });
});
</script>