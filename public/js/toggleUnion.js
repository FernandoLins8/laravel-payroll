// toggle union tax
// 
const radioButtons = document.querySelectorAll('input[name=union]')

radioButtons.forEach(button => {
    button.addEventListener('change', toggleUnionTax)
})

function toggleUnionTax() {
    const unionTax = document.querySelector('#union-tax')
    unionTax.disabled = !unionTax.disabled

    const unionIdEl = document.querySelector('#union-id')
    if(unionIdEl) {
        unionIdEl.disabled = !unionIdEl.disabled
    }
}
