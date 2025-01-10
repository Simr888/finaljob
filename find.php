<?php
include('header.php');
include('header1.php');
?>
  <style>
    .job-image { max-width: 100%; height: auto; border-radius: 5px; }
    .filters { margin-bottom: 20px; }
  </style>

<body>
  <div class="container my-5">
    <h1 class="text-center mb-4 fw-bold text-primary-emphasis">Job Listings </h1>

    <!-- Filter Section -->
    <div class="filters bg-light p-4 rounded shadow-sm mb-4">
      <div class="row g-3">
        <div class="col-md-4">
          <label for="filterLocation" class="form-label">Location</label>
          <input type="text" id="filterLocation" class="form-control" placeholder="Enter location">
        </div>
        <div class="col-md-4">
          <label for="filterType" class="form-label">Job Type</label>
          <select id="filterType" class="form-select">
            <option value="">All</option>
            <option value="Full Time">Full Time</option>
            <option value="Part-time">Part-time</option>
            
          </select>
        </div>
        <div class="col-md-4">
          <label for="filterSalary" class="form-label">Minimum Salary</label>
          <input type="number" id="filterSalary" class="form-control" placeholder="Enter minimum salary">
        </div>
      </div>
      <div class="text-end mt-3">
        <button class="btn btn-primary" onclick="applyFilters()">Apply Filters</button>
      </div>
    </div>

    <!-- Job Results Section -->
    <div id="jobResults" class="row g-4"></div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Modal -->
  <div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="jobModalLabel">Job Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalBody">
          <!-- Full Job Description will go here -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Simulated JSON data
    const jobs = [
      {
        "id": "11",
        "location": "Noida",
        "department": "Noida",
        "vacancy": "Java Developer",
        "mustskill": "Java, Strong Understanding, Algorithms",
        "haveskill": "C, C++",
        "company": "Simran Critical",
        "salary": "7800",
        "type": "Full Time",
        "description": "We are a dynamic software development company specializing in robust, scalable, and innovative Java-based applications for our diverse range of clients.",
        "about": "Founded on innovation and driven by excellence, Simran Critical is a leading software development company.",
        "image": "upload_image/images/find3.jpg",
        "date": "2024-10-26 13:56:39.000000"
      },
      {
        "id": "12",
        "location": "Kolkata",
        "department": "Management",
        "vacancy": "PHP Developer",
        "mustskill": "Bootstrap, strong understanding of PHP",
        "haveskill": "Vanilla CSS, Software recognition",
        "company": "Life Work",
        "salary": "9000",
        "type": "Part-time",
        "description": "We are looking for a skilled PHP Developer to join our team and help build dynamic, high-performing, and scalable web applications.",
        "about": "Collaborate with cross-functional teams to define, design, and ship new features.",
        "image": "upload_image/images/find1.jpg",
        "date": "2024-10-28 15:38:57.000000"
      },
      {
        "id": "13",
        "location": "Ranchi",
        "department": "Pharmacy",
        "vacancy": "Reporting",
        "mustskill": "HTML",
        "haveskill": "React",
        "company": "Life Work",
        "salary": "230000",
        "type": "Full Time",
        "description": "We are seeking a dedicated and knowledgeable Pharmacist / Pharmacy Technician to join our healthcare team.",
        "about": "Life Work is a trusted leader in the pharmacy and healthcare industry, dedicated to providing top-quality medical services.",
        "image": "upload_image/images/find1.jpg",
        "date": "2024-11-09 11:06:20.000000"
      }];

    // Function to render jobs
    function renderJobs(jobs) {
      const jobResults = document.getElementById("jobResults");
      jobResults.innerHTML = ""; // Clear existing jobs

      // Iterate through each job and create HTML
      jobs.forEach(job => {
        const jobCard = document.createElement("div");
        jobCard.classList.add("col-md-4");

        // Populate the job card with job data
        jobCard.innerHTML = `
          <div class="card shadow-sm h-100" onclick="openJobModal(${job.id})">
            <img src="${job.image}" class="card-img-top job-image" alt="${job.vacancy}">
            <div class="card-body">
              <h5 class="card-title">${job.vacancy} - ${job.company}</h5>
              <p class="card-text"><strong>Location:</strong> ${job.location}</p>
              <p class="card-text"><strong>Type:</strong> ${job.type}</p>
              <p class="card-text"><strong>Salary:</strong> $${job.salary}</p>
              <p class="card-text text-truncate"><strong>Description:</strong> ${job.description}</p>
            </div>
            <div class="card-footer text-end">
              <small class="text-muted">Posted on ${new Date(job.date).toLocaleDateString()}</small>
            </div>
          </div>
        `;

        // Append the card to the container
        jobResults.appendChild(jobCard);
      });
    }

    // Function to filter jobs
    function applyFilters() {
      const filterLocation = document.getElementById("filterLocation").value.toLowerCase();
      const filterType = document.getElementById("filterType").value;
      const filterSalary = document.getElementById("filterSalary").value;

      // Apply filters
      const filteredJobs = jobs.filter(job => {
        const matchesLocation = job.location.toLowerCase().includes(filterLocation);
        const matchesType = !filterType || job.type === filterType;
        const matchesSalary = !filterSalary || parseInt(job.salary) >= parseInt(filterSalary);
        return matchesLocation && matchesType && matchesSalary;
      });

      renderJobs(filteredJobs);
    }

    // Function to open modal with full job details
    function openJobModal(jobId) {
      const job = jobs.find(j => j.id == jobId);

      const modalBody = document.getElementById("modalBody");
      modalBody.innerHTML = `
        <h5>${job.vacancy} - ${job.company}</h5>
        <p><strong>Location:</strong> ${job.location}</p>
        <p><strong>Type:</strong> ${job.type}</p>
        <p><strong>Salary:</strong> $${job.salary}</p>
        <p><strong>Must Have Skills:</strong> ${job.mustskill}</p>
        <p><strong>Nice to Have Skills:</strong> ${job.haveskill}</p>
        <p><strong>Description:</strong> ${job.description}</p>
        <p><strong>About the Company:</strong> ${job.about}</p>
        <p><strong>Posted On:</strong> ${new Date(job.date).toLocaleDateString()}</p>
      `;

      // Show the modal
      const jobModal = new bootstrap.Modal(document.getElementById("jobModal"));
      jobModal.show();
    }

    // Initial render
    renderJobs(jobs);
  </script>
</body>
</html>
<?php
include('footer.php');
?>
