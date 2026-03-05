document.addEventListener("DOMContentLoaded", function () {
  // Add Projects Dynamically //
  
  document.querySelector("header").classList.add("show");

  const sections = document.querySelectorAll("section");

  // Section Scroll Animation 
  function revealSections() {
    sections.forEach((section) => {
      if (section.getBoundingClientRect().top < window.innerHeight * 0.85) {
        section.classList.add("show");
      }
    });
  }

  window.addEventListener("scroll", revealSections);
  revealSections();
 // Initialization of Projects, Descriptions, and Links 
  const projects = [
    { 
      title: "Random Quote Generator",
      description: "The Random Quote Generator is a simple web application that dynamically displays random motivational or humorous quotes to users. It fetches a new quote whenever the user clicks the 'Generate Quote' button. This project is useful for inspiration and entertainment, as well as for practicing JavaScript DOM manipulation and API fetching.",
      link: "https://miniwebtool.com/random-quote-generator/"
    },
    { 
      title: "To-Do List App",
      description: "The To-Do List App is designed to help users manage tasks efficiently. It allows users to add new tasks, set due dates, modify existing tasks, and mark completed ones. The application provides sorting options based on priority, deadlines, or completion status. It ensures users can stay organized whether for personal use, work, or academic tracking.",
      link: "https://www.microsoft.com/en-us/microsoft-365/microsoft-to-do-list-app"
    },
    { 
      title: "Currency Converter",
      description: "The Currency Converter application enables users to easily convert one currency into another based on real-time exchange rates. It pulls live data from an exchange rate API and supports multiple currencies. Users can input an amount, select their preferred currency, and get instant conversions. This is especially useful for travelers, business transactions, and financial analysis.",
      link: "https://www.xe.com/currencyconverter/"
    },
    { 
      title: "Calculator",
      description: "A fully functional calculator that performs essential arithmetic operations, including addition, subtraction, multiplication, and division. The user interface is intuitive, allowing easy input of numbers and calculations. The project helps users understand fundamental JavaScript functions and event handling for UI interactions.",
      link: "https://www.desmos.com/scientific"
    },
    { 
      title: "Snake Game",
      description: "The Snake Game is a browser-based version of the classic arcade game. The player controls a snake that moves around the screen, consuming food to grow while avoiding collisions with the walls and itself. The game features smooth controls, increasing difficulty, and engaging graphics. This project demonstrates game development concepts such as animation, event handling, and collision detection.",
      link: "https://snake.io/"
    },
    { 
      title: "Portfolio Website",
      description: "This Portfolio Website is a professionally designed personal website that showcases an individual's work, skills, and achievements. It acts as an online resume, featuring sections such as 'About Me,' 'Projects,' 'Skills,' and 'Contact.' The project focuses on responsive web design, clean UI/UX, and accessibility to create an engaging online presence.",
      link: "file:///C:/xampp/htdocs/example/sample.html"
    }
  ];

  const projectList = document.getElementById("projectList");

  if (projectList) {
  projects.forEach(project => {
    const li = document.createElement("li");
    li.style.marginBottom = "20px"; // Add spacing between projects

    // Project Title
    const title = document.createElement("h3");
    title.textContent = project.title;

    // Project Description (Hidden by default)
    const description = document.createElement("p");
    description.textContent = project.description;
    description.classList.add("description");
    description.style.display = "none";

    // Create the project link (Hidden by default)
    let link = null;
    if (project.link) {
      link = document.createElement("a");
      link.href = project.link;
      link.textContent = "Visit Project";
      link.target = "_blank";
      link.style.display = "none"; // Initially hidden
      link.style.marginTop = "5px"; // Space between description and link
    }

    // "Read More / Read Less" Button
    const button = document.createElement("button");
    button.textContent = "Read More";
    button.classList.add("read-more");

    button.addEventListener("click", function () {
      if (description.style.display === "none") {
        description.style.display = "block"; // Show description
        if (link) link.style.display = "block"; // Show link if available
        button.textContent = "Read Less"; // Changes the text on the button

        // Move button below the description when expanded
        li.appendChild(button);
      } else {
        description.style.display = "none"; // Hide description
        if (link) link.style.display = "none"; // Hide link
        button.textContent = "Read More";

        // Move button back above description
        li.insertBefore(button, description);
      }
    });

    li.appendChild(title);
    li.appendChild(button); // Initially place the button before description
    li.appendChild(description);
    if (link) li.appendChild(link); // Append link if available, but it's hidden initially

    projectList.appendChild(li);
  });
}

  // Add Skills Dynamically
  const skills = [
    "C++", "Java", "HTML", "CSS", "JavaScript",
    "Game Development", "Data Structures and Algorithms",
    "System Architecture", "Cloud Computing", "Machine Learning"
  ];

  const skillList = document.getElementById("skillList");
  if (skillList) {
  skills.forEach(skill => {
    const li = document.createElement("li");
    li.textContent = skill;
    li.classList.add("skill-box"); // Add a CSS class for styling
    skillList.appendChild(li);
});
  }

  // Toggle Dark/Light Mode
  const themeToggle = document.getElementById("themeToggle");
      const body = document.body;
  
      // Function to update button text
      function updateButtonText() {
          themeToggle.textContent = body.classList.contains("light-mode") 
              ? "🌙 Toggle Dark Mode" 
              : "🌞 Toggle Light Mode";
      }
  
      // Set initial button text
      updateButtonText();
  
      // Toggle dark/light mode on click
      themeToggle.addEventListener("click", function () {
          body.classList.toggle("light-mode");
          updateButtonText(); // Update button text when toggled
      });

    
    

  // Contact Form Validation
  const contactForm = document.getElementById("contactForm");
  const formMessage = document.getElementById("formMessage");



// Title Typing Animation
const text = "Welcome to Rei0133's Portfolio!";
let index = 0;
function typeEffect() {
  if (index < text.length) {
    document.getElementById("typingText").textContent += text.charAt(index);
    index++;
    setTimeout(typeEffect, 100);
  }
}
typeEffect();

const skillBoxes = document.querySelectorAll("#skillList li");

// Skillbox animation
function animateSkills() {
    skillBoxes.forEach((skill, index) => {
        if (skill.getBoundingClientRect().top < window.innerHeight * 0.85) {
            setTimeout(() => {
                skill.classList.add("show");
            }, index * 150); 
        }
    });
}

// Run once at start + on scroll
window.addEventListener("scroll", animateSkills);
window.addEventListener("load", animateSkills);
animateSkills();

// Back to Top Button
const backToTop = document.getElementById("backToTop");

window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
        backToTop.classList.add("show");
    } else {
        backToTop.classList.remove("show");
    }
});

backToTop.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
});
// Particle Background Animation
particlesJS("particles-js", {
  particles: {
      number: { value: 50 },
      size: { value: 3 },
      move: { speed: 2 },
      line_linked: { enable: true }
  }
});

function loadParticles(isLightMode) {
  // Destroy existing particles (if any)
  if (window.pJSDom && window.pJSDom.length) {
      window.pJSDom[0].pJS.fn.vendors.destroypJS();
      window.pJSDom = [];
  }

  // Define colors for light and dark modes
  const particleColor = isLightMode ? "#cccccc" : "#ffffff"; // Light gray for light mode, white for dark mode
  const lineColor = isLightMode ? "#dddddd" : "#aaaaaa"; // Slightly darker gray lines for light mode

  // Initialize particles.js with new settings
  particlesJS("particles-js", {
      particles: {
          number: { value: 50 },
          color: { value: particleColor },
          size: { value: 3 },
          move: { speed: 2 },
          line_linked: {
              enable: true,
              color: lineColor
          }
      }
  });
}

// Run on page load with correct theme
document.addEventListener("DOMContentLoaded", () => {
  const isLightMode = document.body.classList.contains("light-mode");
  loadParticles(isLightMode);
});
});