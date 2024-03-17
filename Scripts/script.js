const courses = [
  {
    title: "Self-Defense Fundamentals",
    short_description:
      "Learn the basics of self-defense and how to protect yourself in dangerous situations.",
    price: 2000,
    images: ["self_defense_fund.jpg"],
  },
  {
    title: "Body Awareness & Confidence Building",
    short_description:
      "This course would focus on physical and mental preparation for self-defense",
    price: 2500,
    images: [".jpg"],
  },
]; // array of courses



// Toggle the sidebar on smaller screens
const toggler = document.querySelector('.navbar-toggler');
const sidebar = document.querySelector('.navbar-collapse');
const overlay = document.createElement('div');
overlay.classList.add('overlay');

toggler.addEventListener('click', () => {
  sidebar.classList.toggle('show');
  overlay.classList.toggle('show');
  document.body.appendChild(overlay);
});

// Close the sidebar when clicking outside
overlay.addEventListener('click', () => {
  sidebar.classList.remove('show');
  overlay.classList.remove('show');
  overlay.remove();
});
