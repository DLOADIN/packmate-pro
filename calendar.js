document.addEventListener('DOMContentLoaded', function() {

  const currentMonthYear = document.getElementById('current-month-year');
  const datesContainer = document.getElementById('dates');
  const selectedDateInput = document.getElementById('selectedDate');
    
  let currentDate = new Date();
  function renderCalendar(date) {
      const month = date.getMonth();
      const year = date.getFullYear();
      const firstDayOfMonth = new Date(year, month, 1).getDay();
      const lastDateOfMonth = new Date(year, month + 1, 0).getDate();

      datesContainer.innerHTML = '';
      
      // Display current month and year
      currentMonthYear.textContent = `${date.toLocaleString('default', { month: 'long' })} ${year}`;
      
      // Add empty slots for days before the first day of the month
      for (let i = 0; i < firstDayOfMonth; i++) {
          const emptyDiv = document.createElement('div');
          datesContainer.appendChild(emptyDiv);
      }

      // Add dates
      for (let day = 1; day <= lastDateOfMonth; day++) {
          const dateDiv = document.createElement('div');
          dateDiv.textContent = day;
          dateDiv.classList.add('date');
          
          dateDiv.addEventListener('click', () => {
              // Remove selected class from previous selection
              const selectedDate = document.querySelector('.dates .selected');
              if (selectedDate) {
                  selectedDate.classList.remove('selected');
              }
              // Add selected class to the clicked date
              dateDiv.classList.add('selected');
              
              // Save the selected date in the hidden input
              selectedDateInput.value = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
          });
          
          datesContainer.appendChild(dateDiv);
      }
  }

  // Previous and next month navigation
  document.getElementById('prev-month').addEventListener('click', () => {
      currentDate.setMonth(currentDate.getMonth() - 1);
      renderCalendar(currentDate);
  });

  document.getElementById('next-month').addEventListener('click', () => {
      currentDate.setMonth(currentDate.getMonth() + 1);
      renderCalendar(currentDate);
  });

  // Initial render
  renderCalendar(currentDate);
})