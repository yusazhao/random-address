<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Privacy Policy - RandomAddress</title>

  <link rel="stylesheet" href="<?php echo base_url();?>static/css/custom.css">

</head>
<body class="privacy-body">

  <?php echo $header; ?>

  <main class="privacy-main">
    <div class="privacy-container">
      <h1 class="privacy-title">Privacy Policy</h1>

      <div class="privacy-content">
        <div class="privacy-text">
          <p class="privacy-update"><strong>Last Updated: February 2025</strong></p>

          <p class="privacy-paragraph">Welcome to <strong>RandomAddress.com</strong> ("Website", "we", "us", or "our"). We respect your privacy and are committed to protecting any information you provide while using our website.</p>

          <h2 class="privacy-heading">1. Information We Collect</h2>
          <p class="privacy-paragraph">We do not require users to provide any personal information to use our services. However, we may collect the following data:</p>
          <ul class="privacy-list">
            <li>Non-personal data such as IP address, browser type, and device information for analytics and performance optimization.</li>
            <li>Cookies and tracking technologies to improve user experience (see "Cookies & Tracking" below).</li>
          </ul>

          <h2 class="privacy-heading">2. How We Use Collected Information</h2>
          <p class="privacy-paragraph">The information we collect is used to:</p>
          <ul class="privacy-list">
            <li>Improve website performance and user experience.</li>
            <li>Monitor website traffic and analyze trends.</li>
            <li>Ensure security and prevent abuse.</li>
          </ul>

          <h2 class="privacy-heading">3. Cookies & Tracking</h2>
          <p class="privacy-paragraph">We may use cookies and similar tracking technologies to enhance user experience. You can disable cookies in your browser settings if you prefer.</p>

          <h2 class="privacy-heading">4. Data Security</h2>
          <p class="privacy-paragraph">We implement standard security measures to protect data, but we cannot guarantee absolute security. Users should take precautions when browsing online.</p>

          <h2 class="privacy-heading">5. Third-Party Services</h2>
          <p class="privacy-paragraph">We may use third-party services (such as Google Analytics) for traffic analysis. These services have their own privacy policies, and we do not control how they collect or use data.</p>

          <h2 class="privacy-heading">6. No Data Storage of Generated Content</h2>
          <p class="privacy-paragraph">RandomAddress does not store or track any data that users generate using our tools. All generated data is processed in real-time and not saved on our servers.</p>

          <h2 class="privacy-heading">7. Changes to This Policy</h2>
          <p class="privacy-paragraph">We may update this Privacy Policy from time to time. Any changes will be posted on this page, and continued use of the website constitutes acceptance of the new terms.</p>

          <h2 class="privacy-heading">8. Contact Us</h2>
          <p class="privacy-paragraph">If you have any questions about this Privacy Policy, please contact us at <strong>support@randomaddress.com</strong>.</p>

          <p class="privacy-paragraph">By using <strong>RandomAddress.com</strong>, you acknowledge that you have read and agreed to this Privacy Policy.</p>
        </div>
      </div>
    </div>
  </main>

  <?php echo $footer; ?>

</body>
</html>

<style>
.privacy-body {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.privacy-main {
  flex: 1;
}

.privacy-container {
  max-width: 1024px;
  margin: 0 auto;
  padding: 3rem 1rem;
}

@media (min-width: 640px) {
  .privacy-container {
    padding: 3rem 1.5rem;
  }
}

@media (min-width: 1024px) {
  .privacy-container {
    padding: 3rem 2rem;
  }
}

.privacy-title {
  font-size: 2.25rem;
  font-weight: 300;
  color: #111827;
  margin-bottom: 2rem;
}

@media (min-width: 1024px) {
  .privacy-title {
    font-size: 2.5rem;
  }
}

.privacy-content {
  background: rgba(255, 255, 255, 0.7);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  border-radius: 1.5rem;
  padding: 2rem;
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

@media (min-width: 1024px) {
  .privacy-content {
    padding: 2.5rem;
  }
}

.privacy-text {
  max-width: none;
}

.privacy-update {
  color: #4b5563;
  margin-bottom: 1.5rem;
}

.privacy-paragraph {
  color: #374151;
  line-height: 1.75;
  margin-bottom: 1.5rem;
}

.privacy-heading {
  font-size: 1.5rem;
  font-weight: 300;
  color: #111827;
  margin-top: 2rem;
  margin-bottom: 1rem;
}

.privacy-list {
  color: #374151;
  line-height: 1.75;
  margin-bottom: 1.5rem;
  padding-left: 1.5rem;
}

.privacy-list li {
  margin-bottom: 0.5rem;
}
</style>