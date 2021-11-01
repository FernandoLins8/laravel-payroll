// Toggle employee type section
function showEmployeeTypeSection(e) {
  const value = e.target.value

  const hiddenSections = document.querySelectorAll('.hidden-section')
  hiddenSections.forEach(section => {
      section.classList.add('d-none')
  })

  if(value === 'Salaried' ) {
      const salariedSection = document.querySelector('.salaried-section')
      salariedSection.classList.remove('d-none')

  } else if(value === 'Commissioned') {
      const commissionedSections = document.querySelectorAll('.commissioned-section')
      commissionedSections.forEach(section => {
          section.classList.remove('d-none')
      })

  } else if(value === 'Hourly') {
      const hourlySection = document.querySelector('.hourly-section')
      hourlySection.classList.remove('d-none')
  }
}

const employeeTypeSelect = document.querySelector('#employee-type')
employeeTypeSelect.addEventListener('change', showEmployeeTypeSection)
