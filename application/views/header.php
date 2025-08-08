<div class="navbar bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100 relative z-50 min-h-[80px] sm:min-h-[90px] lg:min-h-[80px]">
  <div class="container mx-auto px-3 sm:px-4 lg:px-6 relative">
    <div class="navbar-start">
      <div class="dropdown lg:hidden relative overflow-visible">
        <div tabindex="0" role="button" class="btn btn-ghost hover:bg-blue-50 border border-gray-200 hover:border-blue-300 rounded-xl px-3 sm:px-4 py-2 sm:py-3 flex items-center" onclick="toggleMobileMenu()">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 sm:h-7 sm:w-7 text-gray-700"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <span class="text-sm sm:text-base font-semibold text-gray-700 ml-1 sm:ml-2">Menu</span>
        </div>
        <ul
          id="mobile-menu"
          class="menu menu-lg dropdown-content bg-white rounded-2xl z-[9999] w-80 max-w-[95vw] p-4 shadow-2xl border border-gray-200 hidden absolute top-full left-0 mt-2 max-h-[80vh] overflow-y-auto">
          
          <li class="mb-1">
                            <a href="<?php echo base_url();?>random-address-generator/us" class="rounded-xl hover:bg-blue-50 transition-all duration-300 text-sm font-semibold text-gray-800 py-3 px-4 flex items-center w-full">
                  <svg class="w-4 h-4 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  <span class="flex-1">🇺🇸 US Address</span>
                </a>
              </li>
              <li class="mb-1">
                <a href="<?php echo base_url();?>random-address-generator/ca" class="rounded-xl hover:bg-blue-50 transition-all duration-300 text-sm font-semibold text-gray-800 py-3 px-4 flex items-center w-full">
                  <svg class="w-4 h-4 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  <span class="flex-1">🇨🇦 CA Address</span>
                </a>
              </li>
              <li class="mb-1">
                <a href="<?php echo base_url();?>random-address-generator/de" class="rounded-xl hover:bg-blue-50 transition-all duration-300 text-sm font-semibold text-gray-800 py-3 px-4 flex items-center w-full">
                  <svg class="w-4 h-4 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  <span class="flex-1">🇩🇪 DE Address</span>
                </a>
              </li>
              <li class="mb-1">
                <a href="<?php echo base_url();?>random-address-generator/uk" class="rounded-xl hover:bg-blue-50 transition-all duration-300 text-sm font-semibold text-gray-800 py-3 px-4 flex items-center w-full">
                  <svg class="w-4 h-4 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  <span class="flex-1">🇬🇧 UK Address</span>
                </a>
              </li>
              <li class="mb-1">
                <a href="<?php echo base_url();?>random-address-generator-countries" class="rounded-xl hover:bg-blue-50 transition-all duration-300 text-sm font-semibold text-gray-800 py-3 px-4 flex items-center w-full">
                  <svg class="w-4 h-4 mr-3 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  <span class="flex-1">🌍 All Countries</span>
                </a>
          </li>



        </ul>
      </div>
      <a class="btn btn-ghost text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 hover:text-blue-600 transition-all duration-200 px-2 sm:px-4 py-6 sm:py-8 lg:py-0 ml-2 sm:ml-0" href="<?php echo base_url();?>" title="RandomAddress - Free Random Data Generator for Testing and Development">RandomAddress</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-lg menu-horizontal px-1 z-[9999] whitespace-nowrap items-center">
        
        <li><a href="<?php echo base_url();?>random-address-generator/us" class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition-all duration-200 font-medium flex items-center">US Address</a></li>
        <li><a href="<?php echo base_url();?>random-address-generator/ca" class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition-all duration-200 font-medium flex items-center">CA Address</a></li>
        <li><a href="<?php echo base_url();?>random-address-generator/de" class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition-all duration-200 font-medium flex items-center">DE Address</a></li>
        <li><a href="<?php echo base_url();?>random-address-generator/uk" class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition-all duration-200 font-medium flex items-center">UK Address</a></li>
        <li><a href="<?php echo base_url();?>random-address-generator-countries" class="text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-xl transition-all duration-200 font-medium flex items-center">All Countries</a></li>



         
      
       

   

       
      </ul>
    </div>
    <div class="navbar-end">
      <!-- 空白区域保持平衡 -->
    </div>
  </div>
</div>

<script>
function toggleMobileMenu() {
  const menu = document.getElementById('mobile-menu');
  
  if (menu.classList.contains('hidden')) {
    menu.classList.remove('hidden');
  } else {
    menu.classList.add('hidden');
  }
}

// 点击页面其他地方时关闭移动端菜单
document.addEventListener('click', function(event) {
  const menu = document.getElementById('mobile-menu');
  const button = event.target.closest('[onclick="toggleMobileMenu()"]');
  
  if (!button && !menu.contains(event.target)) {
    menu.classList.add('hidden');
  }
});

// 桌面端下拉菜单互斥逻辑
document.addEventListener('DOMContentLoaded', function() {
  const desktopDropdowns = document.querySelectorAll('.desktop-dropdown');
  
  desktopDropdowns.forEach(function(dropdown) {
    const summary = dropdown.querySelector('summary');
    
    summary.addEventListener('click', function(event) {
      // 检查当前dropdown是否即将打开
      const isOpening = !dropdown.hasAttribute('open');
      
      if (isOpening) {
        // 关闭所有其他的desktop dropdown
        desktopDropdowns.forEach(function(otherDropdown) {
          if (otherDropdown !== dropdown && otherDropdown.hasAttribute('open')) {
            otherDropdown.removeAttribute('open');
          }
        });
      }
    });
  });
  
  // 点击页面其他地方时关闭所有桌面端下拉菜单
  document.addEventListener('click', function(event) {
    // 检查点击的元素是否在任何dropdown内
    const clickedInsideDropdown = event.target.closest('.desktop-dropdown');
    
    if (!clickedInsideDropdown) {
      // 关闭所有desktop dropdown
      desktopDropdowns.forEach(function(dropdown) {
        dropdown.removeAttribute('open');
      });
    }
  });
});
</script>