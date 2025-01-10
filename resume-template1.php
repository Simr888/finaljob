<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Keith Severson offers expert computer repair services, custom PC builds, and mobile service calls. Contact us for reliable tech solutions.">
  <meta name="keywords" content="computer repair, custom PC builds, mobile computer technician, tech services">
  <meta name="author" content="Keith Severson">
  <title>Keith Severson - Computer Tech & Custom PC Builder</title>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    line-height: 1.6;
    color: #333;
}

header {
    background: #007BFF;
    color: #fff;
    padding: 1rem 0;
    text-align: center;
}

header h1 {
    margin: 0;
}

header nav ul {
    list-style: none;
    padding: 0;
}

header nav ul li {
    display: inline;
    margin: 0 10px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
}

/* Section Styles */
section {
    padding: 2rem;
}

section h2 {
    color: #007BFF;
}

button {
    background: #007BFF;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
}

/* Form Styles */
form label {
    display: block;
}

form input, form textarea {
    width: 100%;
}

/* Footer */
footer {
    background: #333;
}
<nav>
  <ul>
    <li>Home</li>
    <li>About</li>
    <li>Services
      <ul class="dropdown">
        <li>Custom PC Builds</li>
        <li>Mobile Service Calls</li>
        <li>Computer Repairs</li>
      </ul>
    </li>
    <li>Contact</li>
  </ul>
</nav>

<script>
  const servicesMenu = document.querySelector('.dropdown');
  document.querySelector('li:contains("Services")').addEventListener('mouseover', () => {
    servicesMenu.style.display = 'block';
  });
  document.querySelector('li:contains("Services")').addEventListener('mouseout', () => {
    servicesMenu.style.display = 'none';
  });
</script>
<form id="contactForm">
  <input type="text" id="name" placeholder="Your Name" required />
  <input type="email" id="email" placeholder="Your Email" required />
  <textarea id="message" placeholder="Your Message" required></textarea>
  <button type="submit">Send</button>
</form>

<script>
  document.getElementById('contactForm').addEventListener('submit', (e) => {
    const email = document.getElementById('email').value;
    if (!email.includes('@')) {
      alert('Please enter a valid email address.');
      e.preventDefault();
    }
  });
</script>
<form id="contactForm">
  <input type="text" id="name" placeholder="Your Name" required />
  <input type="email" id="email" placeholder="Your Email" required />
  <textarea id="message" placeholder="Your Message" required></textarea>
  <button type="submit">Send</button>
</form>

<script>
  document.getElementById('contactForm').addEventListener('submit', (e) => {
    const email = document.getElementById('email').value;
    if (!email.includes('@')) {
      alert('Please enter a valid email address.');
      e.preventDefault();
    }
  });
</script>
</head>

<body>
  <!-- Header Section -->
  <header>
    <h1>Keith Severson</h1>
    <p>Your Trusted Computer Tech – Building Systems, Solving Problems</p>
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#faq">FAQ</a></li>
      </ul>
    </nav>
  </header>

  <!-- Home Section -->
  <section id="home">
    <h2>Welcome to Keith Severson's Tech Services</h2>
    <p>Custom PC Builds, Computer Repairs, and Mobile Service Calls.</p>
    <button onclick="location.href='#contact'">Book a Service Call</button>
  </section>

  <!-- About Section -->
  <section id="about">
    <h2>About Keith</h2>
    <p>Keith Severson is a seasoned computer technician with years of experience in building and repairing computers. He is passionate about technology and dedicated to providing top-notch service to his clients.</p>
  </section>

  <!-- Services Section -->
  <section id="services">
    <h2>Our Services</h2>
    <ul>
      <li><strong>Custom PC Builds:</strong> Tailored to your needs.</li>
      <li><strong>Computer Repairs:</strong> Hardware and software solutions.</li>
      <li><strong>Mobile Service Calls:</strong> On-site diagnostics and repairs (extra fee applies).</li>
    </ul>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <h2>Contact Us</h2>
    <form action="#" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>

      <button type="submit">Send</button>
    </form>
  </section>

  <!-- FAQ Section -->
  <section id="faq">
    <h2>Frequently Asked Questions</h2>
    <ul>
      <li><strong>What areas do you serve?</strong> We serve the Minneapolis area and surrounding regions.</li>
      <li><strong>How much do mobile service calls cost?</strong> Mobile service calls include an additional fee based on location.</li>
      <li><strong>What’s your turnaround time for repairs?</strong> Most repairs are completed within 24-48 hours.</li>
    </ul>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 Keith Severson. All rights reserved.</p>
  </footer>

</body>

</html>