// Load trainer data from JSON file
fetch('./components/trainers.json')
  .then(response => response.json())
  .then(data => {
      const trainerList = document.getElementById('trainerList');
      data.forEach(trainer => {
          const trainerCard = document.createElement('a');
          trainerCard.classList.add('col-12', 'col-md-6', 'col-lg-4', 'col-xl-3', 'mb-4', 'text-decoration-none'); // Use BS5 classes for column layout and link styling
          trainerCard.href = `profile.html?id=${trainer.id}`;
          trainerCard.innerHTML = `
            <div class="card">
              <img src="${trainer.picture}" class="card-img-top" alt="${trainer.name}">
              <div class="card-body">
                <h5 class="card-title">${trainer.name}</h5>
              </div>
            </div>
          `;
          trainerList.appendChild(trainerCard);
      });
  })
  .catch(error => console.error('Error loading trainer data:', error));

