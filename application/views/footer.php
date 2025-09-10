<footer class="bg-white/80 backdrop-blur-md border-t border-gray-200 shadow-soft">
  <div class="container-main py-10 lg:py-14">
    <div class="flex justify-center">
      <div class="w-full lg:w-1/3 grid grid-cols-2 gap-6 lg:gap-20">
        <!-- About -->
        <nav aria-label="About">
          <div class="text-xs uppercase tracking-widest text-gray-800 font-bold mb-3">About</div>
          <ul class="space-y-2 text-sm">
            <li>
              <a href="<?php echo base_url();?>about-us" class="inline-flex items-center gap-2 text-gray-700 hover:text-primary-700">📋 <span>About us</span></a>
            </li>
            <li>
              <a href="mailto:support@randomAddress.com" class="inline-flex items-center gap-2 text-gray-700 hover:text-primary-700">📧 <span>Contact</span></a>
            </li>
          </ul>
        </nav>

        <!-- Legal -->
        <nav aria-label="Legal">
          <div class="text-xs uppercase tracking-widest text-gray-800 font-bold mb-3">Legal</div>
          <ul class="space-y-2 text-sm">
            <li>
              <a href="<?php echo base_url();?>terms-of-use" class="inline-flex items-center gap-2 text-gray-700 hover:text-primary-700">📄 <span>Terms of use</span></a>
            </li>
            <li>
              <a href="<?php echo base_url();?>privacy-policy" class="inline-flex items-center gap-2 text-gray-700 hover:text-primary-700">🔒 <span>Privacy policy</span></a>
            </li>
            <li>
              <a href="<?php echo base_url();?>cookie-policy" class="inline-flex items-center gap-2 text-gray-700 hover:text-primary-700">🍪 <span>Cookie policy</span></a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    
    <!-- Copyright -->
    <div class="text-center mt-8 pt-6 border-t border-gray-200">
      <p class="text-gray-500 text-sm">RandomAddress ©<?php echo date('Y'); ?>, all rights reserved</p>
    </div>
  </div>
</footer>