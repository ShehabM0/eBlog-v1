const observer = new IntersectionObserver((entry) => {
  const elem = entry[0]
  if (elem.isIntersecting) elem.target.classList.add("show")
})
const hiddenElem = document.querySelector(".hidden")
if(hiddenElem) observer.observe(hiddenElem)



document.getElementById('create-post').addEventListener('click', () => {
  const modal = document.querySelectorAll('.modal')
  activeModal(modal)
})
document.getElementById('close-btn').addEventListener('click', () => {
  const modal = document.querySelectorAll('.modal')
  inactiveModel(modal)
})

function activeModal(modal) {
  if(modal == null) return
  modal.forEach(elem => elem.classList.add('active'))
}
function inactiveModel(modal) {
  if(modal == null) return
  modal.forEach(elem => elem.classList.remove('active'))
}